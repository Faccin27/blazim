@extends('admin.layout.base')

@section('titulo', 'Site')

@section('pageLinks')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/theme/nord.min.css">

    <style>
        .CodeMirror {
            height: 60vh;
        }
    </style>
@endsection

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
                    <a class="nav-link" href="{{ route('admin.site') }}">Dados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.site.head') }}">Head</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="javascript:;">Body</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.site.footer') }}">Footer</a>
                </li>
            </ul>

            <form class="row g-3" action="{{ route('admin.site.updateCodigos') }}" onsubmit="crudHelper.Alterar(event, this)">

                <div class="form-group col-md-12">
                    <label for="codigos_body" class="form-label">Códigos - Body</label>
                    <textarea id="codigos_body" class="form-control" name="codigos_body" rows="5">{{ $site->codigos_body }}</textarea>
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

@section('pageScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/javascript/javascript.min.js"></script>
    <script>
        var textarea = document.getElementById("codigos_body");
        var editor = CodeMirror.fromTextArea(textarea, {
            mode: "htmlmixed", // Define o modo inicial como HTML + JavaScript
            lineNumbers: true, // Mostra números de linha
            tabSize: 2, // Tamanho da tabulação
            indentUnit: 2, // Unidade de indentação
            theme: "nord" // Escolha do tema
        });

        editor.on("change", function(instance, object){
            textarea.value = instance.getValue();
        });
    </script>
@endsection
