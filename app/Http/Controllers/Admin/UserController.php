<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserCreateEvent;
use App\Events\UserDestroyEvent;
use App\Events\UserUpdateEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdatePassRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $ViewData['porPagina'] = $request->filled('porPagina') ? $request->porPagina : 10;
        $ViewData['busca'] = $request->filled('busca') ? $request->busca : "";

        $ViewData['users'] = User::search($ViewData['busca'], $ViewData['porPagina']);

        return view('admin.users.list', $ViewData);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function edit(User $user)
    {
        $ViewData['user'] = $user;

        return view('admin.users.edit', $ViewData);
    }

    public function changePassword(User $user)
    {
        $ViewData['user'] = $user;

        return view('admin.users.change', $ViewData);
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'role' => 'admin',
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        event(new UserCreateEvent($user));

        return response()->json([
            'mensagem' => "Usuário cadastrado.",
            'redirecionamento' => route('admin.users')
        ], 201);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new UserUpdateEvent($user));

        return response()->json(['mensagem' => "Usuário alterado."], 200);
    }

    public function updatePassword(UserUpdatePassRequest $request, User $user)
    {
        $user->update([
            'password' => Hash::make($request->novaSenha),
        ]);

        event(new UserUpdateEvent($user));

        return response()->json(['mensagem' => "Usuário alterado."], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        event(new UserDestroyEvent($user));

        return response()->json(['mensagem' => "Usuário removido"], 200);
    }
}
