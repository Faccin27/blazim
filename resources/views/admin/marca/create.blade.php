@extends('admin.layout.base')

@section('titulo', 'Marca')

@section('pageLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css"
        integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('caminho')

    <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}"><i class="fa fa-home fa-lg"></i>Início</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.marca') }}">Marca</a></li>
    <li class="breadcrumb-item active">Cadastrar</li>

@endsection

@section('conteudo')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Cadastrar</h4>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('admin.marca.store') }}" onsubmit="crudHelper.Cadastrar(event,this)">

                <div class="form-group col-md-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input id="nome" class="form-control" type="text" name="nome" value="" maxlength="255">
                </div>

                <div class="form-group col-md-6">
                    <label for="url" class="form-label">Url</label>
                    <input id="url" class="form-control" type="url" name="url" value="" maxlength="255">
                </div>

                <x-admin.cropper.input label="Foto Principal ( jpg, png ) 300x200" name="foto" width="300" height="200" />

                <div class="col-md-12">
                    <hr>
                </div>

                <div class="col-12">
                    <div class="progress progress-primary progress-sm  mb-4" style="display: none;">
                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end aling-itens-center">
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

    <x-admin.cropper.modal />
@endsection

@section('pageScripts')
    @vite(['resources/assets/admin/js/cropperInput.js'])
@endsection
