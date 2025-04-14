@extends('site.layouts.base')

@section('title', 'Contato - ' . config('app.name'))

@section('conteudo')

@endsection

@section('pageScripts')
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <script>
        $('#telefone').mask('(00) 00000-0000');
    </script>
@endsection
