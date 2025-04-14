<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Site;
use Illuminate\Support\Facades\Cache;

abstract class SiteBaseController extends Controller
{
    protected $viewData;

    public function __construct()
    {
        $this->viewData['site'] = Cache::rememberForever('SiteBaseController::site', function () {
            return Site::find(1);
        });
        $this->viewData['marcas'] = Marca::with('categorias')->get();

    }
}
