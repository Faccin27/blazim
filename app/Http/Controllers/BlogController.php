<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends SiteBaseController
{
    public function index()
    {
        return view('site.blog', $this->viewData);
    }

    public function detalhes()
    {
        return view('site.blogDetalhes', $this->viewData);
    }
}
