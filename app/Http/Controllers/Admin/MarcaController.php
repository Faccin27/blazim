<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserCreateEvent;
use App\Events\UserDestroyEvent;
use App\Events\UserUpdateEvent;
use App\Events\UserUpdateOrderEvent;
use App\Http\Requests\Marca\MarcaFotosRequest;
use App\Http\Requests\Marca\MarcaStoreRequest;
use App\Http\Requests\Marca\MarcaUpdateRequest;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use App\Traits\UploadTrait;

class MarcaController extends Controller
{
    use ImageTrait, UploadTrait;

    private const POR_PAGINA = 10;

    private const CAMINHOS = [
        'FOTOS' => 'fotos_marca'
    ];

    private const FOTO = [
        'LARGURA' => 300,
        'ALTURA' => 200
    ];

    /* Views */
    public function index(Request $request)
    {
        $ViewData['porPagina'] = $request->integer('porPagina', self::POR_PAGINA);
        $ViewData['busca'] = $request->busca ?? "";

        $ViewData['marcas'] = Marca::search($ViewData['busca'])->paginate($ViewData['porPagina'] == -1 ? PHP_INT_MAX : $ViewData['porPagina']);

        return view('admin.marca.list', $ViewData);
    }

    public function create()
    {
        return view('admin.marca.create');
    }

    public function edit(Marca $marca)
    {
        $ViewData['marca'] = $marca;

        return view('admin.marca.edit', $ViewData);
    }

    public function fotos(Marca $marca)
    {
        $ViewData['marca'] = $marca;

        return view('admin.marca.fotos', $ViewData);
    }

    /* Data */

    public function store(MarcaStoreRequest $request)
    {
        $marca = new Marca($request->validated());

        $marca->foto = $this->uploadFoto($request);

        $marca->save();

        event(new UserCreateEvent($marca));

        return response()->json([
            'mensagem' => "Novo registro de Marca cadastrado.",
            'redirecionamento' => route('admin.marca'),
        ], 201);
    }

    public function update(MarcaUpdateRequest $request, Marca $marca)
    {
        $marca->update($request->validated());

        event(new UserUpdateEvent($marca));

        return response()->json(['mensagem' => "Registro de Marca alterado."], 200);
    }

    public function updateFotos(MarcaFotosRequest $request, Marca $marca)
    {
        $foto = $this->uploadFoto($request);

        if(!empty($foto)){

            deleteFile($marca->foto);

            $marca->update(['foto' => $foto]);

            event(new UserUpdateEvent($marca));
        }

        return response()->json(['mensagem' => "Foto alterada."], 200);
    }

    public function order(Request $request)
    {
        foreach ($request->ordem as $posicao => $id) {

            Marca::query()->where('marcas.id', $id)->update(['ordem' => $posicao]);
        }

        event(new UserUpdateOrderEvent(new Marca()));

        return response()->json(['mensagem' => "Ordem de Marca alterada."], 200);
    }

    public function destroy(Marca $marca)
    {
        deleteFile($marca->foto);

        $marca->delete();

        event(new UserDestroyEvent($marca));

        return response()->json(['mensagem' => "Registro de Marca removido."], 200);
    }

    private function uploadFoto($request)
    {
        if(!$request->hasFile('foto')){
            return null;
        }

        $foto = $this->upload($request->file('foto'), self::CAMINHOS['FOTOS']);

        $this->crop(
            $foto,
            $request->foto_x,
            $request->foto_y,
            $request->foto_width,
            $request->foto_height
        );

        $this->resize($foto, self::FOTO['LARGURA'], self::FOTO['ALTURA']);

        return $foto;
    }
}
