<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutRepresentante extends Controller
{
    public function __invoke(Request $request)
    {
        session()->forget('acesso_autorizado');

        session()->invalidate();

        return redirect()->back();
    }
}
