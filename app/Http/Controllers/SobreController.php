<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreController extends SiteBaseController
{
    public function index()
    {
        return view('site.sobre', $this->viewData);
    }
}
