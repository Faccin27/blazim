<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends SiteBaseController
{
    public function index()
    {
        return view('site.clientes', $this->viewData);
    }
}
