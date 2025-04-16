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

                @if (isset($marca))
                    <div class="leftProdutos flex_c">
                        <h2 class="main-t bold blueFont uppercase fontRaleway margin20">{{ $marca->nome }}</h2>
                        <a href="javascript:;" class="filtrarProd">Filtrar Produtos</a>
                        <div class="menuLateralProd fullW">
                            @include('site.includes.menuProd')
                        </div>

                        <div class="filtroMobile fullW">
                            <br>
                            <h3 class="main-t bold blueFont uppercase fontRaleway margin20">{{ $marca->nome }}</h3>
                            @include('site.includes.menuProd')
                        </div>
                    </div>
                @endif

                <div class="rightProdutos {{ request()->routeIs('produtos') ? 'fullW' : '' }} flex_c">

                    <div class="gridProdutos grid3">
                        @foreach ($produtos as $produto)
                            <div class="flex_c itemProdutos  middle gap20">

                                <a href="{{ route('produtos.detalhes', ['produto' => $produto->slug]) }}" class="margin20">
                                    <figure>
                                        <img src="{{ $produto->foto_thumb }}" alt="{{ $produto->nome }}" class="produto_img">
                                    </figure>
                                </a>

                                {{-- Título --}}
                                <a href="{{ route('produtos.detalhes', ['produto' => $produto->slug]) }}"
                                    class="small-t t-center center blackFont medium">{{ $produto->nome }}
                                </a>

                                {{-- Marca --}}
                                <h3 class="small-t t-center center blueFont bold uppercase">
                                    {{ $produto->categoria->nome }}
                                </h3>

                                @if (session('acesso_autorizado', false))
                                @csrf
                                <form action="{{ route('carrinho.adicionar') }}" method="POST" style="justify-content: center">
                                <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                <input type="hidden" name="quantidade" value="1">
                                    <button class="btn_login" type="submit">
                                        <h4 class="lightBlueFont bold t-center center">R$
                                            {{ moeda($produto->valor) }}
                                        </h4> <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18"
                                            viewBox="0 0 19 18" fill="none">
                                            <g clip-path="url(#clip0_1_37)">
                                                <path d="M2 9H17M17 9L10.25 2.25M17 9L10.25 15.75" stroke="white"
                                                    stroke-width="2" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1_37">
                                                    <rect width="18" height="18" fill="white"
                                                        transform="translate(0.5)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                </form>
                                @else
                                    <a href="javascript:;" class="btnComprar zoomEfct flex whiteFont middle gap10 t-center">
                                        FAÇA LOGIN PARA COMPRAR
                                        <figure class="whFitImg">
                                            <img src="{{ @Vite::asset('resources/assets/site/img/arrowButton.png') }}"
                                                alt="Seta Icon">
                                        </figure>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <nav>
                        {{ $produtos->appends([
                                'busca' => isset($busca) ? $busca : null,
                            ])->links() }}
                    </nav>
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
