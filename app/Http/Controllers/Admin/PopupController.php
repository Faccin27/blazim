<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserUpdateEvent;
use App\Http\Requests\Popup\PopupFotosRequest;
use App\Http\Requests\Popup\PopupUpdateRequest;
use App\Models\Popup;
use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use App\Traits\UploadTrait;

class PopupController extends Controller
{
    use UploadTrait, ImageTrait;

    private const POR_PAGINA = 10;

    private const CAMINHOS = [
        'FOTOS' => 'fotos_popup'
    ];

    private const FOTO = [
        'LARGURA' => 800,
        'ALTURA' => 600
    ];

    public function index()
    {
        return view('admin.popup.edit', ['popup' => Popup::first()]);
    }

    public function foto()
    {
        return view('admin.popup.foto', ['popup' => Popup::first()]);
    }

    /* Data */

    public function update(PopupUpdateRequest $request)
    {
        $popup = Popup::first();

        $popup->update([
            'ativo' => $request->boolean('ativo'),
            'nome' => $request->nome,
            'url' => $request->url
        ]);

        event(new UserUpdateEvent($popup));

        return response()->json(['mensagem' => "Popup alterada."], 200);
    }

    public function updateFoto(PopupFotosRequest $request)
    {
        $popup = Popup::first();

        $foto = $this->uploadFoto($request);

        if (!empty($foto)) {

            deleteFile($popup->foto);

            $popup->foto = $foto;

            $popup->save();

            event(new UserUpdateEvent($popup));
        }

        return response()->json(['mensagem' => "Foto alterada."], 200);
    }

    private function uploadFoto($request)
    {
        if (!$request->hasFile('foto')) {
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
