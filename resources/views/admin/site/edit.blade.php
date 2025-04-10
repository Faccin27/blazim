@extends('admin.layout.base')

@section('titulo', 'Site')

@section('caminho')

    <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}"><i class="fa fa-home fa-lg"></i>Início</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Site</a></li>
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
                    <a class="nav-link" href="{{ route('admin.site.head') }}">Head</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.site.body') }}">Body</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.site.footer') }}">Footer</a>
                </li>
            </ul>

            <form class="row g-3" action="{{ route('admin.site.update') }}" onsubmit="crudHelper.Alterar(event, this)">

                <div class="form-group col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" class="form-control" name="description" rows="5">{{ $site->description }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="keywords" class="form-label">Keywords</label>
                    <textarea id="keywords" class="form-control" name="keywords" rows="5">{{ $site->keywords }}</textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input id="facebook" class="form-control" type="url" name="facebook" value="{{ $site->facebook }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input id="instagram" class="form-control" type="url" name="instagram" value="{{ $site->instagram }}">
                </div>

                <div class="form-group col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ $site->email }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input id="telefone" class="form-control" type="text" name="telefone" value="{{ $site->telefone }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="whatsapp" class="form-label">Whatsapp</label>
                    <input id="whatsapp" class="form-control" type="text" name="whatsapp" value="{{ $site->whatsapp }}">
                </div>

                <div class="form-group col-md-12">
                    <label for="mapa" class="form-label">Mapa</label>
                    <input id="mapa" class="form-control" type="text" name="mapa" value="{{ $site->mapa }}">
                </div>

                <div class="form-group col-md-12">
                    <label for="endereco" class="form-label">Endereço</label>
                    <textarea id="endereco" class="form-control" name="endereco" rows="5">{{ $site->endereco }}</textarea>
                </div>

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button id="botao-enviando" class="btn btn-primary" type="button" disabled style="display:none;">
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
