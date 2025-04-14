@extends('admin.layout.base')

@section('titulo', 'Produto')

@section('caminho')

    <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}"><i class="fa fa-home fa-lg"></i>Início</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.produto') }}">Produto</a></li>
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
                    <a class="nav-link" href="{{ route('admin.produto.fotos', ['produto' => $produto->id]) }}">Fotos</a>
                </li>
            </ul>

            <form class="row g-3" action="{{ route('admin.produto.update', ['produto' => $produto->id]) }}" onsubmit="crudHelper.Alterar(event, this)">


                <div class="col-md-2">
                    <label><input class="form-check-input" type="checkbox" name="ativo" value="1" {{ $produto->ativo ? 'checked' : null }}> Ativo</label>
                </div>

                <div class="col-md-2">
                    <label><input class="form-check-input" type="checkbox" name="destaque" value="1" {{ $produto->destaque ? 'checked' : null }}> Destaque</label>
                </div>

                <div class="col-12"><hr></div>

                <div class="form-group col-md-6">
                    <label for="id_marca" class="form-label">Marca</label>
                    <select id="id_marca" class="form-select" name="id_marca" >
                        <option value="">Selecione:</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ $marca->id == $produto->categoria->id_marca ? 'selected' : null }}>{{ $marca->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="id_categoria" class="form-label">Categoria</label>
                    <select id="id_categoria" class="form-select" name="id_categoria" >
                        <option value="">Selecione:</option>
                        @foreach ($produto->categoria->marca->categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $categoria->id == $produto->id_categoria ? 'selected' : null }}>{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="nome" class="form-label">Nome</label>
                    <input id="nome" class="form-control" type="text" name="nome" value="{{ $produto->nome }}" maxlength="255">
                </div>

                <div class="form-group col-md-6">
                    <label for="valor" class="form-label">Valor ( R$ )</label>
                    <input id="valor" class="form-control" type="number" name="valor" value="{{ $produto->valor }}" step="any" maxlength="255">
                </div>

                <div class="form-group col-md-12">
                    <label for="texto" class="form-label">Texto</label>
                    <textarea id="texto" class="form-control" rows="10" name="texto">{{ $produto->texto }}</textarea>
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
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    @vite(['resources/assets/admin/js/ckEditorFacade.js'])

    <script>
        $(document).ready(function () {
            CKEditorFacade('[name="texto"]', [
				'bold'
            ]);
        });
    </script>
    <script>
        $(document).on('change', '#id_marca', function(){
            var select = $(this);

            $.ajax({
                type: "get",
                url: "{{ route('admin.produto.ajaxCategoria') }}",
                data: {id_marca: select.val()},
                dataType: "json",
                beforeSend: function(){
                    $('#id_categoria').html('<option value="">Selecione:</option>');
                },
                success: function (response) {
                    response.categorias.forEach(categoria => {
                        $('#id_categoria').append('<option value="' + categoria.id + '"> '+ categoria.nome + '</option>');
                    });
                }
            });
        });
    </script>
@endsection
