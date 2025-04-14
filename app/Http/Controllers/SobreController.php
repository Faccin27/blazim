<?php

namespace App\Http\Controllers;

use App\Models\Sobre;
use Illuminate\Http\Request;

class SobreController extends SiteBaseController
{
    public function index()
    {
        $this->viewData['sobre'] = Sobre::all();

        return view('site.sobre', $this->viewData);
    }
}
