<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserCreateEvent;
use App\Events\UserDestroyEvent;
use App\Events\UserUpdateEvent;
use App\Events\UserUpdateOrderEvent;
use App\Http\Requests\Sobre\SobreFotosRequest;
use App\Http\Requests\Sobre\SobreStoreRequest;
use App\Http\Requests\Sobre\SobreUpdateRequest;
use App\Models\Sobre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use App\Traits\UploadTrait;

class SobreController extends Controller
{
    use ImageTrait, UploadTrait;

    private const POR_PAGINA = 10;

    private const CAMINHOS = [
        'FOTOS' => 'fotos_sobre'
    ];

    private const FOTO = [
        'LARGURA' => 500,
        'ALTURA' => 450
    ];

    /* Views */


    public function edit(Sobre $sobre)
    {
        $ViewData['sobre'] = $sobre;

        return view('admin.sobre.edit', $ViewData);
    }

    public function fotos(Sobre $sobre)
    {
        $ViewData['sobre'] = $sobre;

        return view('admin.sobre.fotos', $ViewData);
    }


    public function update(SobreUpdateRequest $request, Sobre $sobre)
    {
        $sobre->update($request->validated());

        event(new UserUpdateEvent($sobre));

        return response()->json(['mensagem' => "Registro de sobre alterado."], 200);
    }

    public function updateFotos(SobreFotosRequest $request, Sobre $sobre)
    {
        $foto = $this->uploadFoto($request);

        if(!empty($foto)){

            deleteFile($sobre->foto);

            $sobre->update(['foto' => $foto]);

            event(new UserUpdateEvent($sobre));
        }

        return response()->json(['mensagem' => "Foto alterada."], 200);
    }



    public function destroy(Sobre $sobre)
    {
        deleteFile($sobre->foto);

        $sobre->delete();

        event(new UserDestroyEvent($sobre));

        return response()->json(['mensagem' => "Registro de sobre removido."], 200);
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
