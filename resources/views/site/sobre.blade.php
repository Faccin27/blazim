@extends('site.layouts.base')

@section('title', 'Produtos - ' . config('app.name'))

@section('conteudo')
    <section class="preHeader flex">
        <div class="main flex_c t-center middle">
            <h1 class="main-t fontRaleway bold whiteFont center uppercase t-center center">QUEM SOMOS</h1>
        </div>
    </section>

    <main class="mainSobre container">
        <div class="main flex_c about_us">
            @foreach ($sobre as $sobreItem)
                <div class="grid2 about_box">
                    <div>
                        <h1 class="about_title margin50">Blazim Distribuidora – Excelência em Conectar Marcas ao Varejo</h1>
                        <div class="about_description">
                            {!! $sobreItem->texto !!}
                        </div>
                    </div>
                    <div class="about_image">
                        <div class="flex_c middle">
                            <figure>
                                @if (!empty($sobreItem->foto))
                                    <a href="{{ $sobreItem->foto }}" data-fancybox="sobre">
                                        <img src="{{ $sobreItem->foto }}" alt="Imagem sobre">
                                    </a>
                                @else
                                    <img src="https://dummyimage.com/550x450/" alt="Imagem padrão">
                                @endif
                            </figure>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
