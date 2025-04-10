@extends('site.layouts.base')

@section('title', 'Produtos Detalhes- ' . config('app.name'))

@section('pageLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css">
    @vite(['resources/assets/site/css/slides.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
        crossorigin="anonymous" />
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
            <div class="leftProdutos flex_c">
                <h2 class="main-t bold blueFont uppercase fontRaleway margin20">categorias</h2>
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

            <div class="rightProdutos flex_c">
                <div class="flex_r flex_w margin100">
                    <div class="sliderProdutos" id="detail">
                        <div class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <a href="https://dummyimage.com/800x800/" class="swiper-slide" data-fancybox="id">
                                    <figure>
                                        <img src="https://dummyimage.com/800x800/" alt="Nome Produto">
                                    </figure>
                                </a>
                                @for ($b = 0; $b < 3; $b++)
                                    <a href="https://dummyimage.com/800x800/" class="swiper-slide" data-fancybox="id">
                                        <figure>
                                            <img src="https://dummyimage.com/800x800/" alt="Nome Produto">
                                        </figure>
                                    </a>
                                @endfor
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="flex">
                                        <img src="https://dummyimage.com/400x400/" alt="Nome Produto">
                                    </div>
                                </div>
                                @for ($b = 0; $b < 3; $b++)
                                    <div class="swiper-slide">
                                        <div class="flex">
                                            <img src="https://dummyimage.com/400x400/" alt="Nome Produto">
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="textoProdutos e_input flex_c">
                        <h3 class="blueFont main-t extrabold fontRaleway margin20">Nome Produto</h3>
                        <div class="catProduto flex flex_w gap10 margin10">
                            <span class="whiteFont uppercase">Nome Marca</span>
                            <span class="whiteFont uppercase">Nome Categoria</span>
                        </div>

                        {{-- @if (session('acesso_autorizado', false)) --}}
                        <h4 class="blueFont bold main-t margin50">R$ 5,30</h4>
                        {{-- @endif --}}

                        {{-- @if (session('acesso_autorizado', false)) --}}
                        <a href="javascript:;"
                            class="btnCarrinho flex middle med-t gap10 whiteFont bold zoomEfct margin50">
                            <figure class="whFitImg">
                                <img src="{{ @Vite::asset('resources/assets/site/img/cartButton.png') }}" alt="Cart Icon">
                            </figure>
                            ADICIONAR NO CARRINHO
                        </a>
                        {{-- @endif --}}

                        {{-- @if (!empty($produto->texto)) --}}
                            <h5 class="main-t extrabold blueFont fontRaleway margin20">Descrição:</h5>

<p>O Protetor Solar Facial FPS 50 Clareador oferece alta proteção solar aliada a um tratamento completo para manchas e sinais de envelhecimento. Sua fórmula inovadora, enriquecida com Niacinamida, Argila Orgânica e Vitamina E, reduz manchas, uniformiza o tom da pele e proporciona uma poderosa ação antissinais. Além disso, controla a oleosidade e combate os radicais livres. Com textura leve e de fácil absorção, é ideal para o uso diário.</p>                        {{-- @endif --}}
                    </div>
                </div>

                <h3 class="main-t extrabold blueFont t-center center fontRaleway margin30">Visite Também</h3>
                <div class="gridPrdutos grid3">
                    @for ($b = 0; $b < 3; $b++)
                        <div class="flex_c itemProdutos middle gap20">
                            <a href="javascript:;"
                                class="margin20">
                                <figure>
                                    <img src="https://dummyimage.com/400x400/" alt="Nome Produto">
                                </figure>
                            </a>
                            {{-- Título --}}
                            <a href="javascript:;"
                                class="small-t t-center center grayFont medium">Nome Produto</a>

                            {{-- Marca --}}
                            <h3 class="small-t t-center center blueFont bold uppercase">
                                nome marca
                            </h3>

                            {{-- @if (session('acesso_autorizado', false)) --}}
                                {{-- <h4 class="lightBlueFont bold t-center center">R$ {{ moeda($relacionado->valor) }}</h4> --}}
                            {{-- @else --}}
                                {{-- <a href="javascript:;" class="btnComprar zoomEfct flex whiteFont middle gap10 t-center">FAÇA LOGIN PARA
                                    COMPRAR
                                    <figure class="whFitImg">
                                        <img src="{{ @Vite::asset('resources/assets/site/img/arrowButton.svg') }}"
                                            alt="Seta Icon">
                                    </figure>
                                </a> --}}
                            {{-- @endif --}}
                        </div>
                    @endfor
                </div>
            </div>

        </div>
    </section>

</main>
@endsection

@section('pageScripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
    integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
    crossorigin="anonymous"></script>

<script>
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

    $.fancybox.defaults.backFocus = false;
</script>
@endsection
