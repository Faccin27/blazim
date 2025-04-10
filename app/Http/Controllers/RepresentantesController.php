<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepresentantesController extends SiteBaseController
{
    public function index()
    {
        return view('site.representantes', $this->viewData);
    }
}
