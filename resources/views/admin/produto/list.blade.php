@extends('admin.layout.base')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('titulo', 'Produto')

@section('caminho')
    <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}"><i class="fa fa-home fa-lg"></i> Início</a></li>
    <li class="breadcrumb-item active">Produto</li>
@endsection

@section('conteudo')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Listagem</h4>
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('admin.produto.create') }}'">Novo Produto</button>
        </div>
        <div class="card-body">

            @include('admin.layout.includes.busca', [
                'rota' => route('admin.produto'),
                'porPagina' => isset($porPagina) ? $porPagina : null,
                'busca' => isset($busca) ? $busca : null,
            ])

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Ativo</th>
                            <th>Destaque</th>
                            <th>Marca</th>
                            <th>Categoria</th>
                            <th>Valor ( R$ )</th>
                        </tr>
                    </thead>
                    <tbody class="ordenavel" data-rota="{{ route('admin.produto.order') }}">
                        @foreach ($produtos as $produto)
                            <tr data-id="{{ $produto->id }}">
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="handle btn btn-secondary"><i class="bi bi-arrows-move"></i></button>
                                        <a href="{{ route('admin.produto.edit', ['produto' => $produto->id]) }}"
                                            class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <button type="button" class="btn btn-danger" onclick="crudHelper.Remover(this)"
                                            data-rota="{{ route('admin.produto.destroy', ['produto' => $produto->id]) }}"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->ativo ? 'Ativo' : null }}</td>
                                <td>{{ $produto->destaque ? 'Destaque' : null }}</td>
                                <td>{{ $produto->categoria->marca->nome }}</td>
                                <td>{{ $produto->categoria->nome }}</td>
                                <td>{{ moeda($produto->valor) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav class="d-flex justify-content-end">
                {{ $produtos->appends([
                        'busca' => isset($busca) ? $busca : null,
                        'porPagina' => isset($porPagina) && $porPagina != 10 ? $porPagina : null,
                    ])->links() }}
            </nav>
        </div>
    </div>
@endsection
