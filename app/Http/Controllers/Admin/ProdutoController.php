<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserCreateEvent;
use App\Events\UserDestroyEvent;
use App\Events\UserUpdateEvent;
use App\Events\UserUpdateOrderEvent;
use App\Http\Requests\Produto\ProdutoFotosRequest;
use App\Http\Requests\Produto\ProdutoStoreRequest;
use App\Http\Requests\Produto\ProdutoUpdateRequest;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\ProdutoFoto;
use App\Traits\ImageTrait;
use App\Traits\UploadTrait;

class ProdutoController extends Controller
{
    use UploadTrait, ImageTrait;

    private const POR_PAGINA = 10;

    private const CAMINHOS = [
        'FOTOS' => 'fotos_produto',
        'THUMBS' => 'fotos_produto/thumbs'
    ];

    private const FOTO_THUMB = [
        'LARGURA' => 800,
        'ALTURA' => 800
    ];

    private const GALERIA_THUMB = [
        'LARGURA' => 800,
        'ALTURA' => 800
    ];

    /* Views */
    public function index(Request $request)
    {
        $ViewData['porPagina'] = $request->integer('porPagina', self::POR_PAGINA);
        $ViewData['busca'] = $request->busca ?? "";

        $ViewData['produtos'] = Produto::search($ViewData['busca'])->paginate($ViewData['porPagina'] == -1 ? PHP_INT_MAX : $ViewData['porPagina']);

        return view('admin.produto.list', $ViewData);
    }

    public function create()
    {
        $ViewData['marcas'] = Marca::all();

        return view('admin.produto.create', $ViewData);
    }

    public function edit(Produto $produto)
    {
        $ViewData['produto'] = $produto;

        $ViewData['marcas'] = Marca::all();

        return view('admin.produto.edit', $ViewData);
    }

    public function fotos(Produto $produto)
    {
        $ViewData['produto'] = $produto;

        return view('admin.produto.fotos', $ViewData);
    }

    public function ajaxCategoria(Request $request)
    {
        $categorias = Categoria::query()->where('id_marca', $request->id_marca)->get();

        return response()->json(['categorias' => $categorias]);
    }

    /* Data */

    public function store(ProdutoStoreRequest $request)
    {
        $produto = new Produto($request->validated());

        $produto->ativo = $request->boolean('ativo');
        $produto->destaque = $request->boolean('destaque');

        $produto->foto = $this->uploadFoto($request);
        $produto->foto_thumb = $this->uploadFotoThumb($request);

        $produto->save();

        $this->storeProdutoFoto($request, $produto);

        event(new UserCreateEvent($produto));

        return response()->json([
            'mensagem' => "Registro de Produto cadastrado.",
            'redirecionamento' => route('admin.produto')
        ], 201);
    }

    public function update(ProdutoUpdateRequest $request, Produto $produto)
    {
        $data = $request->except(['_token', 'ativo', 'destaque']);

        $data['ativo'] = $request->boolean('ativo');
        $data['destaque'] = $request->boolean('destaque');

        $produto->update($data);


        event(new UserUpdateEvent($produto));

        return response()->json(['mensagem' => "Registro de Produto alterado."], 200);
    }

    public function updateFotos(ProdutoFotosRequest $request, Produto $produto)
    {
        $foto = $this->uploadFoto($request);
        $foto_thumb = $this->uploadFotoThumb($request);

        if(!empty($foto) && !empty($foto_thumb)){

            deleteFile($produto->foto);
            deleteFile($produto->foto_thumb);

            $produto->update([
                'foto' => $foto,
                'foto_thumb' => $foto_thumb
            ]);

            event(new UserUpdateEvent($produto));
        }

        $this->storeProdutoFoto($request, $produto);

        return response()->json(['mensagem' => "Fotos alteradas"], 200);
    }

    public function order(Request $request)
    {
        foreach ($request->ordem as $posicao => $id) {

            Produto::query()->where('produtos.id', $id)->update(['ordem' => $posicao]);
        }

        event(new UserUpdateOrderEvent(new Produto()));

        return response()->json(['mensagem' => "Ordem de Produto alterada."], 200);
    }

    public function orderProdutoFoto(Request $request)
    {
        foreach ($request->ordem as $posicao => $id) {

            ProdutoFoto::query()->where('produtos_fotos.id', $id)->update(['ordem' => $posicao]);
        }

        event(new UserUpdateOrderEvent(new ProdutoFoto()));

        return response()->json([
            'tipo' => "success"
        ], 200);
    }

    public function destroyAllProdutoFoto(Produto $produto)
    {
        foreach ($produto->fotos as $produtoFoto) {
            deleteFile($produtoFoto->foto);
            deleteFile($produtoFoto->foto_thumb);
        }

        $produto->fotos()->delete();

        event(new UserDestroyEvent($produto));

        return response()->json(['mensagem' => "Fotos removidas."], 200);
    }

    public function destroyProdutoFoto(ProdutoFoto $produtoFoto)
    {
        deleteFile($produtoFoto->foto);
        deleteFile($produtoFoto->foto_thumb);

        $produtoFoto->delete();

        event(new UserDestroyEvent($produtoFoto));

        return response()->json(['mensagem' => "Foto removida."], 200);
    }

    public function destroy(Produto $produto)
    {
        deleteFile($produto->foto);
        deleteFile($produto->foto_thumb);

        foreach ($produto->fotos as $produtoFoto){
            deleteFile($produtoFoto->foto);
            deleteFile($produtoFoto->foto_thumb);
        }

        $produto->delete();

        event(new UserDestroyEvent($produto));

        return response()->json(['mensagem' => "Registro de Produto removido."], 200);
    }

    private function uploadFoto($request)
    {
        if(!$request->hasFile('foto')){
            return null;
        }

        $foto = $this->upload($request->file('foto'), self::CAMINHOS['FOTOS']);

        $this->resize($foto);

        return $foto;
    }

    private function uploadFotoThumb($request)
    {
        if(!$request->hasFile('foto')){
            return null;
        }

        $foto = $this->upload($request->file('foto'), self::CAMINHOS['THUMBS']);

        $this->crop(
            $foto,
            $request->foto_x,
            $request->foto_y,
            $request->foto_width,
            $request->foto_height
        );

        $this->resize($foto, self::FOTO_THUMB['LARGURA'], self::FOTO_THUMB['ALTURA']);

        return $foto;
    }

    private function storeProdutoFoto($request, $produto): void
    {
        if(!$request->hasFile('fotos')){
            return;
        }

        foreach ($request->file('fotos') as $file){

            $foto = $this->upload($file, self::CAMINHOS['FOTOS']);

            $this->resize($foto);

            $foto_thumb = $this->upload($file, self::CAMINHOS['THUMBS']);

            $this->resizeFit($foto_thumb, self::GALERIA_THUMB['LARGURA'], self::GALERIA_THUMB['ALTURA']);

            $produtoFoto = $produto->fotos()->create([
                'foto' => $foto,
                'foto_thumb' => $foto_thumb
            ]);

            event(new UserCreateEvent($produtoFoto));
        }
    }
}
