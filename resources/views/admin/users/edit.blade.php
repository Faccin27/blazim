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
                    <a class="nav-link active" aria-current="page" href="javascript:;">Dados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.users.change', ['user' => $user->id]) }}">Trocar Senha</a>
                </li>
            </ul>

            <form class="row g-3" action="{{ route('admin.users.update', ['user' => $user->id]) }}" onsubmit="crudHelper.Alterar(event, this)">

                <div class="form-group col-md-6">
                    <label for="name" class="form-label">Nome</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" class="form-control" type="text" name="email" value="{{ $user->email }}">
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
