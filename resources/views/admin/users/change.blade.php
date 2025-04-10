@extends('admin.layout.base')

@section('titulo', 'Usuários')

@section('caminho')

    <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}"><i class="fa fa-home fa-lg"></i> Início</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Usuários</a></li>
    <li class="breadcrumb-item active">Editar</li>

@endsection

@section('conteudo')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Editar</h4>
        </div>
        <div class="card-body">

            <ul class="nav nav-tabs mb-3">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('admin.users.edit', ['user' => $user->id]) }}">Dados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:;">Trocar Senha</a>
                </li>
            </ul>

            <form class="row g-3" action="{{ route('admin.users.updatePassword', ['user' => $user->id]) }}" onsubmit="crudHelper.Alterar(event, this)">

                <div class="form-group col-md-6">
                    <label for="novaSenha" class="form-label">Nova Senha</label>
                    <div class="input-group mb-3">
                        <input id="novaSenha" class="form-control form-control-lg" type="password" name="novaSenha">
                        <button class="btn btn-outline-secondary" type="button" id="novaSenha-button"><i class="bi bi-eye"></i></button>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="confirmeASenha" class="form-label">Confirme a Senha</label>
                    <div class="input-group mb-3">
                        <input id="confirmeASenha" class="form-control form-control-lg" type="password" name="confirmeASenha">
                        <button class="btn btn-outline-secondary" type="button" id="confirmeASenha-button"><i class="bi bi-eye"></i></button>
                    </div>
                </div>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button id="botao-enviando" class="btn btn-primary" type="button" disabled="" style="display:none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Enviando...
                    </button>
                    <button id="botao-alterar" type="submit" class="btn btn-primary btn-lg mx-1">Alterar</button>
                    <button type="button" class="btn btn-secondary btn-lg mx-1" onclick="javascript:history.back()">Voltar</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('pageScripts')
    <script>
        $(document).on('click', '#novaSenha-button', function(e) {
            var input = $('#novaSenha');
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
            } else {
                input.attr('type', 'password');
            }
        });

        $(document).on('click', '#confirmeASenha-button', function(e) {
            var input = $('#confirmeASenha');
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
            } else {
                input.attr('type', 'password');
            }
        });
    </script>
@endsection
