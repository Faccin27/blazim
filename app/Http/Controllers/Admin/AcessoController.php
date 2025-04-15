<?php

 namespace App\Http\Controllers\Admin;

 use App\Events\UserUpdateEvent;
 use App\Http\Requests\Acesso\AcessoUpdateRequest;
 use App\Models\Acesso;
 use App\Http\Controllers\Controller;

 class AcessoController extends Controller
 {
     /* Views */
     public function edit(Acesso $acesso)
     {
         $ViewData['acesso'] = $acesso;

         return view('admin.acesso.edit', $ViewData);
     }

     public function update(AcessoUpdateRequest $request, Acesso $acesso)
     {
         $acesso->update($request->except(['_token']));

         event(new UserUpdateEvent($acesso));

         return response()->json(['mensagem' => "Registro de Acesso alterado."], 200);
     }
 }
