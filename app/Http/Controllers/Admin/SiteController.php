<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserUpdateEvent;
use App\Http\Requests\Site\SiteUpdateRequest;
use App\Models\Site;
use App\Http\Controllers\Controller;
use App\Traits\ImageTrait;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    use UploadTrait, ImageTrait;

    private $siteService;

    public function index()
    {
        return view('admin.site.edit', ['site' => Site::first()]);
    }

    public function head()
    {
        return view('admin.site.head', ['site' => Site::first()]);
    }

    public function body()
    {
        return view('admin.site.body', ['site' => Site::first()]);
    }

    public function footer()
    {
        return view('admin.site.footer', ['site' => Site::first()]);
    }

    /* Data */

    public function update(SiteUpdateRequest $request)
    {
        $site = Site::first();

        $site->update($request->except(['_token']));

        event(new UserUpdateEvent($site));

        return response()->json(['mensagem' => "Registro de site alterado."], 200);
    }

    public function updateCodigos(Request $request)
    {
        $site = Site::first();

        $site->update($request->all());

        event(new UserUpdateEvent($site));

        return response()->json(['mensagem' => "Registro de site alterado."], 200);
    }

}
