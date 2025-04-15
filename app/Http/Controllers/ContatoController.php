<?php

namespace App\Http\Controllers;

use App\Mail\SendMailContato;
use App\Mail\SendMailTrabalhe;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContatoController extends SiteBaseController
{
    public function index()
    {
        return view('site.contato', $this->viewData);
    }

    public function trabalhe()
    {
        return view('site.trabalhe', $this->viewData);
    }

    public function enviar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => ['required'],
            'email' => ['required', 'email'],
            'telefone' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => $validator->errors()->first()
            ], 422);
        }

        $formulario = [
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'mensagem' => $request->mensagem
        ];

        if (config('app.env') == "production") {

            $site = Site::find(1);

            Mail::to($site->email)->send(new SendMailContato($formulario['nome'] . " entrou em contato pelo site " . config('app.name'), $formulario));
        }

        return response()->json([
            'mensagem' => "Sua mensagem foi enviada. Em breve entraremos em contato."
        ], 200);
    }

    public function enviarTrabalho(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => ['required'],
            'email' => ['required', 'email'],
            'telefone' => ['required'],
            'arquivo' => ['nullable', 'mimes:pdf,doc,docx,jpg,jpeg'],
            'mensagem' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'erro' => $validator->errors()->first()
            ], 422);
        }

        $formulario = [
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'mensagem' => $request->mensagem
        ];

        if (config('app.env') == "production") {

            $site = Site::find(1);

            Mail::to($site->email)->send(new SendMailTrabalhe($formulario['nome'] . " entrou em contato pelo trabalhe conosco " . config('app.name'), $formulario, $request->file('arquivo')));
        }

        return response()->json([
            'mensagem' => "Sua mensagem foi enviada. Em breve entraremos em contato."
        ], 200);
    }
}
