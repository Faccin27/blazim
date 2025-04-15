<?php

namespace App\Http\Controllers;

use App\Models\Acesso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LogarRepresentante extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => ['required', 'exists:acesso,login'],
            'password' => ['required']
        ]);

        if($validator->fails()){

            return response()->json([
                'erro' => $validator->errors()->first()
            ], 422);
        }

        $acesso = Acesso::where('login', $request->login)->first();

        if (!password_verify($request->password, $acesso->password)) {
            return response()->json([
                'erro' => "Senha incorreta."
            ], 422);
        }

        session(['acesso_autorizado' => true]);
        return response()->json(['mensagem' => "Acesso autorizado"], 200);
    }
}
