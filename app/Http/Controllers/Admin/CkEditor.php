<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class CkEditor extends Controller
{
    use UploadTrait, ImageTrait;
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $foto = $this->upload($request->file('upload'), 'fotos_editor');

        $this->resize($foto);

        return response()->json(['url' => $foto]);
    }
}
