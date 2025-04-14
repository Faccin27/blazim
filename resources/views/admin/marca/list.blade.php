@extends('admin.layout.base')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('titulo', 'Marca')

@section('caminho')
    <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}"><i class="fa fa-home fa-lg"></i> Início</a></li>
    <li class="breadcrumb-item active">Marca</li>
@endsection

@section('conteudo')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Listagem</h4>
            <button class="btn btn-primary" type="button"
                onclick="window.location.href='{{ route('admin.marca.create') }}'">Novo Marca</button>
        </div>
        <div class="card-body">

            @include('admin.layout.includes.busca', [
                'rota' => route('admin.marca'),
                'porPagina' => isset($porPagina) ? $porPagina : null,
                'busca' => isset($busca) ? $busca : null,
            ])

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody class="ordenavel" data-rota="{{ route('admin.marca.order') }}">
                        @foreach ($marcas as $marca)
                            <tr data-id="{{ $marca->id }}">
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="handle btn btn-secondary"><i class="bi bi-arrows-move"></i></button>
                                        <a href="{{ route('admin.marca.edit', ['marca' => $marca->id]) }}"
                                            class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <button type="button" class="btn btn-danger" onclick="crudHelper.Remover(this)"
                                            data-rota="{{ route('admin.marca.destroy', ['marca' => $marca->id]) }}"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                                <td>{{ $marca->nome }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav class="d-flex justify-content-end">
                {{ $marcas->appends([
                        'busca' => isset($busca) ? $busca : null,
                        'porPagina' => isset($porPagina) && $porPagina != 10 ? $porPagina : null,
                    ])->links() }}
            </nav>
        </div>
    </div>
@endsection
