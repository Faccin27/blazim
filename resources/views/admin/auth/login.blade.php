<!DOCTYPE html>
<html lang="pt-br">

<head>
    <base href="{{ config('app.url') }}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Login - Admin Lovatel</title>
    <link rel="shortcut icon" href="{{ asset('admin-template/static/images/logo/logo.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin-template/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-template/compiled/css/auth.css') }}">
</head>

<body style="background-color: #fff">
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo" style="margin-bottom: 2rem;">
                        <a href="{{ route('admin.login') }}">
                            <img src="{{ asset('admin-template/compiled/svg/logo.svg') }}" alt="Logo">
                        </a>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {!! session('error') !!}
                        </div>
                    @endif
                    <form id="login" class="entrar" action="{{ route('admin.auth') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" name="email"
                                placeholder="E-mail" autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password"
                                placeholder="Senha">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" name="remember" value="1"
                                id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Mantenha-me conectado
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Entrar</button>
                    </form>

                    <div class="text-center mt-5 text-lg fs-4 entrar">
                        <p><a class="font-bold" href="javascript:;" onclick="auth.OpenForgot()">Esqueceu a senha?</a>
                        </p>
                    </div>

                    <form id="fotgot-password" class="trocar" action="{{ route('admin.forgot') }}"
                        style="display: none;" onsubmit="auth.Forgot(event, this)">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" name="email"
                                placeholder="E-mail">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Trocar
                            Senha</button>
                    </form>

                    <div class="text-center mt-5 text-lg fs-4 trocar" style="display: none;">
                        <p><a class="font-bold" href="javascript:;" onclick="auth.OpenLogin()">Voltar para Login</a></p>
                    </div>

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin-template/extensions/jquery/jquery.min.js') }}"></script>

    @vite(['resources/assets/admin/js/auth.js'])

</body>

</html>
