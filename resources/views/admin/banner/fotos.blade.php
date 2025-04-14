@extends('admin.layout.base')

@section('titulo', 'Banner')

@section('pageLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css"
        integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('caminho')

    <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}"><i class="fa fa-home fa-lg"></i>Início</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.banner') }}">Banner</a></li>
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
                    <a class="nav-link" href="{{ route('admin.banner.edit', ['banner' => $banner->id]) }}">Dados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="javascript:;">Fotos</a>
                </li>
            </ul>

            <h4>Foto - Computador</h4>

            <hr />

            <div>
                <img src="{{ $banner->foto_computador }}" style="max-width: 100%; width: auto; height: auto;" />
            </div>

            <hr />


            <h4>Foto - Celular</h4>

            <hr />

            <div>
                <img src="{{ $banner->foto_celular }}" style="max-width: 100%; width: auto; height: auto;" />
            </div>

            <hr />

            <form class="row g-3" action="{{ route('admin.banner.updateFotos', ['banner' => $banner->id]) }}"
                onsubmit="crudHelper.AlterarArquivos(event, this)">

                <x-admin.cropper.input label="Foto computador ( jpg, png ) 1920x640" name="foto_computador" width="1920"
                    height="640" />

                <x-admin.cropper.input label="Foto celular ( jpg, png ) 900x900" name="foto_celular" width="900"
                    height="900" />

                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12">
                    <div class="progress progress-primary progress-sm  mb-4" style="display: none;">
                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <button id="botao-enviando" class="btn btn-primary" type="button" disabled="" style="display:none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Enviando...
                    </button>
                    <button id="botao-alterar" type="submit" class="btn btn-primary btn-lg mx-1">Alterar</button>
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
