@extends('site.layouts.base')

@section('title', $produto->nome . ' - ' . config('app.name'))

@section('pageLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css">
    @vite(['resources/assets/site/css/slides.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endsection

@section('conteudo')
    <section class="preHeader flex">
        <div class="main flex_c t-center middle">
            <h1 class="main-t fontRaleway bold whiteFont center uppercase t-center center">Produtos em Destaque</h1>
        </div>
    </section>

    <main class="mainProdutosDetalhes container">
        <section class="sectionProdutosDetalhes main flex_c">
            <div class="fullW flex_r">

                @if (isset($marca))
                    <div class="leftProdutos flex_c">
                        <h2 class="main-t bold blueFont uppercase fontRaleway margin20">{{ $marca->nome }}</h2>
                        <a href="javascript:;" class="filtrarProd">Filtrar Produtos</a>
                        <div class="menuLateralProd fullW">
                            @include('site.includes.menuProd')
                        </div>

                        <div class="filtroMobile fullW">
                            <br>
                            <h3 class="main-t bold blueFont uppercase fontRaleway margin20">categorias</h3>
                            @include('site.includes.menuProd')
                        </div>
                    </div>
                @endif

                <div class="rightProdutos flex_c">
                    <div class="flex_r flex_w margin100">
                        <div class="sliderProdutos" id="detail">
                            <div class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                    <a href="{{ $produto->foto }}" class="swiper-slide" data-fancybox="id">
                                        <figure>
                                            <img src="{{ $produto->foto_thumb }}" alt="{{ $produto->nome }}">
                                        </figure>
                                    </a>
                                    @foreach ($produto->fotos as $produtoFoto)
                                        <a href="{{ $produtoFoto->foto }}" class="swiper-slide" data-fancybox="id">
                                            <figure>
                                                <img src="{{ $produtoFoto->foto_thumb }}" alt="{{ $produto->nome }}">
                                            </figure>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="flex">
                                            <img src="{{ $produto->foto_thumb }}" alt="{{ $produto->nome }}">
                                        </div>
                                    </div>
                                    @foreach ($produto->fotos as $produtoFoto)
                                        <div class="swiper-slide">
                                            <div class="flex">
                                                <img src="{{ $produtoFoto->foto_thumb }}" alt="{{ $produto->nome }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="textoProdutos e_input flex_c">
                            <h3 class="blueFont main-t extrabold fontRaleway margin20">{{ $produto->nome }}</h3>
                            <div class="catProduto flex flex_w gap10 margin10">
                                <span class="whiteFont uppercase">{{ $produto->categoria->marca->nome }}</span>
                                <span class="whiteFont uppercase">{{ $produto->categoria->nome }}</span>
                            </div>

                            @if (session('acesso_autorizado', false))
                                <h4 class="blueFont bold main-t margin50">R$ {{ moeda($produto->valor) }}</h4>
                            @endif

                            @if (session('acesso_autorizado', false))
                                @csrf
                                <form action="{{ route('carrinho.adicionar') }}" method="POST"
                                    style="justify-content: center">
                                    <button type="submit">
                                        <a class="btnCarrinho flex middle med-t gap10 whiteFont bold zoomEfct margin50">
                                            <figure class="whFitImg">
                                                <img src="{{ @Vite::asset('resources/assets/site/img/cartButton.png') }}"
                                                    alt="Cart Icon">
                                            </figure>
                                            ADICIONAR NO CARRINHO
                                        </a>
                                    </button>
                                </form>
                            @endif

                            @if (!empty($produto->texto))
                                <h5 class="main-t extrabold blueFont fontRaleway margin20">Descrição:</h5>

                                {!! $produto->texto !!}
                            @endif
                        </div>
                    </div>

                    <h3 class="main-t extrabold blueFont t-center center fontRaleway margin30">Visite Também</h3>
                    <div class="gridPrdutos grid3">
                        @foreach ($relacionados as $relacionado)
                            <div class="flex_c itemProdutos middle gap20">
                                <a href="{{ route('produtos.detalhes', ['produto' => $relacionado->slug]) }}"
                                    class="margin20">
                                    <figure>
                                        <img src="{{ $relacionado->foto_thumb }}" alt="{{ $relacionado->nome }}">
                                    </figure>
                                </a>
                                {{-- Título --}}
                                <a href="javascript:;" class="small-t t-center center grayFont medium">
                                    {{ $relacionado->categoria->nome }}</a>

                                {{-- Marca --}}
                                <h3 class="small-t t-center center blueFont bold uppercase">
                                    {{ $produto->categoria->marca->nome }}
                                </h3>

                                @if (session('acesso_autorizado', false))
                                    <h4 class="grayFont bold t-center center">R$ {{ moeda($relacionado->valor) }}</h4>
                                @else
                                    <a href="javascript:;"
                                        class="btnComprar zoomEfct flex whiteFont middle gap10 t-center">FAÇA LOGIN PARA
                                        COMPRAR
                                        <figure class="whFitImg">
                                            <img src="{{ @Vite::asset('resources/assets/site/img/arrowButton.png') }}"
                                                alt="Seta Icon">
                                        </figure>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection

@section('pageScripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>


    <script>
        //Inicio de FancyBox
        Fancybox.bind("[data-fancybox]", {
            Images: {
                initialSize: "fit",
                Panzoom: {
                    maxScale: 2,
                },
            }
        });

        $(function() {
            $(".menuProduto li a").click(function() {
                // Fechar todos os outros submenus
                $(".menuProduto li a").not(this).next().slideUp();


                // Remover a classe 'ativo' de todos os outros itens
                $(".menuProduto li").not($(this).parent()).removeClass('ativo');

                // Alternar o submenu do item clicado
                $(this).next().slideToggle();

                // Adicionar a classe 'ativo' ao item clicado
                $(this).parent().toggleClass('ativo');
            });
        });

        $('.filtrarProd').click(function() {
            $('.filtroMobile').toggleClass('showF');
        });

        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
            breakpoints: {
                1150: {
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
                500: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                }
            }
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
@endsection
