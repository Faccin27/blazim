@extends('site.layouts.base')

@section('title', 'Produtos - ' . config('app.name'))

@section('conteudo')

<section class="preHeader flex">
    <div class="main flex_c t-center middle">
        <h1 class="main-t fontRaleway bold whiteFont center uppercase t-center center">produtos</h1>
    </div>
</section>

<main class="mainProdutos container">
    <section class="sectionProdutos main flex_c">
        <div class="fullW flex_r">

            {{-- @isset($categorias) --}}
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
            {{-- @endisset --}}

            <div class="rightProdutos flex_c">

                <div class="gridPrdutos grid3">
                    @for ($s = 0; $s < 8; $s++)
                        <div class="flex_c itemProdutos middle gap20">
                            <a href="{{ route('produtos.detalhes') }}" class="margin20">
                                <figure>
                                    <img src="https://dummyimage.com/400x400/" alt="nome produto">
                                </figure>
                            </a>
                            <a href="javascript:;"
                                class="small-t t-center center blackFont medium">nome do produto
                            </a>

                            <h3 class="small-t t-center center blueFont bold uppercase">
                               marca produto
                            </h3>
                                <a href="javascript:;"
                                    class="btnComprar zoomEfct flex whiteFont middle gap10 t-center">
                                    FAÇA LOGIN PARA COMPRAR
                                    <figure class="whFitImg">
                                        <img src="{{ @Vite::asset('resources/assets/site/img/arrowButton.png') }}" alt="Seta Icon">
                                    </figure>
                                </a>
                        </div>
                    @endfor
                </div>

            </div>
        </div>
    </section>
</main>
@endsection


@section('pageScripts')
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

        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.href.includes('?busca')) {
                const rightProdutos = document.querySelector('.rightProdutos.flex_c');
                if (rightProdutos) {
                    rightProdutos.classList.add('fullW');
                }
            }
        });
    </script>

@endsection

