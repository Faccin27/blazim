@extends('admin.layout.base')

@section('titulo', 'Usuários')

@section('caminho')

    <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}"><i class="fa fa-home fa-lg"></i> Início</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Usuários</a></li>
    <li class="breadcrumb-item active">Cadastrar</li>

@endsection

@section('conteudo')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Cadastrar</h4>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('admin.users.store') }}" onsubmit="crudHelper.Cadastrar(event, this)">

                <div class="form-group col-md-6">
                    <label for="name" class="form-label">Nome</label>
                    <input id="name" class="form-control form-control-lg" type="text" name="name">
                </div>

                <div class="form-group col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" class="form-control form-control-lg" type="email" name="email">
                </div>

                <div class="form-group col-md-6">
                    <label for="password" class="form-label">Senha</label>
                    <div class="input-group mb-3">
                        <input id="password" class="form-control form-control-lg" type="password" name="password">
                        <button class="btn btn-outline-secondary" type="button" id="password-button"><i
                                class="bi bi-eye"></i></button>
                    </div>
                </div>

                <div class="col-md-12">
                    <hr>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button id="botao-enviando" class="btn btn-primary" type="button" disabled="" style="display:none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Enviando...
                    </button>
                    <button id="botao-cadastrar" type="submit" class="btn btn-primary btn-lg mx-1">Cadastrar</button>
                    <button type="button" class="btn btn-secondary btn-lg mx-1"
                        onclick="javascript:history.back()">Voltar</button>
                </div>

            </form>
        </div>
    </div>

@endsection

@section('pageScripts')
    <script>
        $(document).on('click', '#password-button', function(e) {
            var input = $('#password');
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
            } else {
                input.attr('type', 'password');
            }
        });
    </script>
@endsection
