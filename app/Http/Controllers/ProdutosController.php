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
        return view('site.produtosDetalhe', $this->viewData);
    }
    public function carrinho()
    {
        return view('site.carrinho', $this->viewData);
    }
}
