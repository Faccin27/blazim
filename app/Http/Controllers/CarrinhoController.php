<?php

namespace App\Http\Controllers;

use App\Models\Sobre;
use Illuminate\Http\Request;

class CarrinhoController extends SiteBaseController
{
    public function index()
    {
        $this->viewData['sobre'] = Sobre::all();

        return view('site.carrinho', $this->viewData);
    }
}
