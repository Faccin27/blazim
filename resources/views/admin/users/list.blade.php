@extends('admin.layout.base')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('titulo', 'Usuários')

@section('caminho')
    <li class="breadcrumb-item"><a href="{{ route('admin.inicio') }}"><i class="fa fa-home fa-lg"></i> Início</a></li>
    <li class="breadcrumb-item active">Usuários</li>
@endsection

@section('conteudo')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Lista</h4>
            <button class="btn btn-primary" type="button" onclick="window.location.href='{{ route('admin.users.create') }}'">Novo Usurário</button>
        </div>
        <div class="card-body">

        @include('admin.layout.includes.busca', [
            'rota' => route('admin.users'),
            'porPagina' => isset($porPagina) ? $porPagina : null,
            'busca' => isset($busca) ? $busca : null,
        ])

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                        </th>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @can ('view', $user)
                            <tr>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.users.edit', ['user' => $user->id]) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                        <button type="button" class="btn btn-danger" onclick="crudHelper.Remover(this)"
                                            data-rota="{{ route('admin.users.destroy', ['user' => $user->id]) }}"><i class="bi bi-trash"></i></button>
                                    </div>
                                    <a href="{{route('admin.users.change', ['user' => $user->id])}}" class="btn btn-primary">Trocar Senha</a>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endcan
                    @endforeach
                </tbody>
            </table>
        </div>

        <nav class="d-flex justify-content-end">
            {{ $users->appends([
                    'busca' => isset($busca) ? $busca : null,
                    'porPagina' => isset($porPagina) && $porPagina != 10 ? $porPagina : null,
                ])->links() }}
        </nav>

    </div>

    </div>
@endsection

