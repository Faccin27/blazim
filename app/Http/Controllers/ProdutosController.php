<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutosController extends SiteBaseController
{
    public function index()
    {
        return view('site.produtos', $this->viewData);
    }

    public function detalhes()
    {
        return view('site.produtosDetalhes', $this->viewData);
    }

    public function detalhes2()
    {
        return view('site.produtosDetalhes2', $this->viewData);
    }
}
