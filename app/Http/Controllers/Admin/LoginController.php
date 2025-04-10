<?php

namespace App\Http\Controllers\Admin;

use App\Events\LoginAdminEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginAuthRequest;
use App\Http\Requests\Login\LoginForgotRequest;
use App\Mail\SendMailUserPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function auth(LoginAuthRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($credentials, $request->remember)) {

            return redirect()->back()->with('error', 'Não foi possível efetuar o login.<br> Verifique seus dados e tente novamente.');
        }

        $request->session()->regenerate();

        event(new LoginAdminEvent(Auth::user()->name));

        return redirect()->route('admin.inicio');
    }

    public function forgot(LoginForgotRequest $request)
    {
        $user = User::where('email', $request->email)->get()->first();

        $senha = randomString(8);

        $user->password = Hash::make($senha);

        $user->save();

        Mail::to($user->email)->send(new SendMailUserPassword($senha));

        return response()->json(['mensagem' => "Senha alterada!<br>Verifique seu e-mail."], 200);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}
