<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Marca;
use App\Models\Popup;

class HomeController extends SiteBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->viewData['popup'] = Popup::first();
        $this->viewData['banners'] = Banner::all();


        return view('site.home', $this->viewData);
    }


}
