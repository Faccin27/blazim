<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserCreateEvent;
use App\Events\UserDestroyEvent;
use App\Events\UserUpdateEvent;
use App\Events\UserUpdateOrderEvent;
use App\Http\Requests\Banner\BannerFotosRequest;
use App\Http\Requests\Banner\BannerStoreRequest;
use App\Http\Requests\Banner\BannerUpdateRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use App\Traits\UploadTrait;

class BannerController extends Controller
{
    use ImageTrait, UploadTrait;

    private const POR_PAGINA = 10;

    private const CAMINHOS = [
        'FOTOS' => 'fotos_banner'
    ];

    private const FOTO_COMPUTADOR = [
        'LARGURA' => 1920,
        'ALTURA' => 640
    ];

    private const FOTO_CELULAR = [
        'LARGURA' => 900,
        'ALTURA' => 900
    ];

    /* Views */
    public function index(Request $request)
    {
        $ViewData['porPagina'] = $request->integer('porPagina', self::POR_PAGINA);
        $ViewData['busca'] = $request->busca ?? "";

        $ViewData['banners'] = Banner::search($ViewData['busca'])->paginate($ViewData['porPagina'] == -1 ? PHP_INT_MAX : $ViewData['porPagina']);

        return view('admin.banner.list', $ViewData);
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function edit(Banner $banner)
    {
        $ViewData['banner'] = $banner;

        return view('admin.banner.edit', $ViewData);
    }

    public function fotos(Banner $banner)
    {
        $ViewData['banner'] = $banner;

        return view('admin.banner.fotos', $ViewData);
    }

    /* Data */

    public function store(BannerStoreRequest $request)
    {
        $banner = new Banner($request->validated());

        $banner->foto_computador = $this->uploadFotoComputador($request);
        $banner->foto_celular = $this->uploadFotoCelular($request);


        $banner->save();

        event(new UserCreateEvent($banner));

        return response()->json([
            'mensagem' => "Novo registro de Banner cadastrado.",
            'redirecionamento' => route('admin.banner'),
        ], 201);
    }

    public function update(BannerUpdateRequest $request, Banner $banner)
    {
        $banner->update($request->validated());

        event(new UserUpdateEvent($banner));

        return response()->json(['mensagem' => "Registro de Banner alterado."], 200);
    }

    public function updateFotos(BannerFotosRequest $request, Banner $banner)
    {
        $foto_computador = $this->uploadFotoComputador($request);
        $foto_celular = $this->uploadFotoCelular($request);


        if(!empty($foto_computador)){

            deleteFile($banner->foto_computador);

            $banner->update(['foto_computador' => $foto_computador]);

            event(new UserUpdateEvent($banner));
        }

        if(!empty($foto_celular)){

            deleteFile($banner->foto_celular);

            $banner->update(['foto_celular' => $foto_celular]);

            event(new UserUpdateEvent($banner));
        }

        return response()->json(['mensagem' => "Foto alterada."], 200);
    }

    public function order(Request $request)
    {
        foreach ($request->ordem as $posicao => $id) {

            Banner::query()->where('banners.id', $id)->update(['ordem' => $posicao]);
        }

        event(new UserUpdateOrderEvent(new Banner()));

        return response()->json(['mensagem' => "Ordem de Banner alterada."], 200);
    }

    public function destroy(Banner $banner)
    {
        deleteFile($banner->foto_celular);
        deleteFile($banner->foto_computador);


        $banner->delete();

        event(new UserDestroyEvent($banner));

        return response()->json(['mensagem' => "Registro de Banner removido."], 200);
    }

    private function uploadFotoComputador($request)
    {
        if(!$request->hasFile('foto_computador')){
            return null;
        }

        $foto_computador = $this->upload($request->file('foto_computador'), self::CAMINHOS['FOTOS']);

        $this->crop(
            $foto_computador,
            $request->foto_computador_x,
            $request->foto_computador_y,
            $request->foto_computador_width,
            $request->foto_computador_height
        );

        $this->resize($foto_computador, self::FOTO_COMPUTADOR['LARGURA'], self::FOTO_COMPUTADOR['ALTURA']);

        return $foto_computador;
    }

    private function uploadFotoCelular($request)
    {
        if(!$request->hasFile('foto_celular')){
            return null;
        }

        $foto_celular = $this->upload($request->file('foto_celular'), self::CAMINHOS['FOTOS']);

        $this->crop(
            $foto_celular,
            $request->foto_celular_x,
            $request->foto_celular_y,
            $request->foto_celular_width,
            $request->foto_celular_height
        );

        $this->resize($foto_celular, self::FOTO_CELULAR['LARGURA'], self::FOTO_CELULAR['ALTURA']);

        return $foto_celular;
    }
}
