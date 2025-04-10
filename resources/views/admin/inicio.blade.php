@extends('admin.layout.base')

@section('titulo', 'Início')


@section('caminho')
    <li class="breadcrumb-item active"><a><i class="fa fa-home fa-lg"></i>Início</a></li>
@endsection

@section('conteudo')
<div class="card">
        <div class="card-body">
            <p class="mt-3">{{'Olá ' . Auth::user()->name.', este é o painel de administração do seu site.'}}</p>
        </div>
    </div>
</div>
@endsection
