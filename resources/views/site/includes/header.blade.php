<header>
    <div class="infosHeader">
        <div class="main flex_r middle">
            <a href="mailto:{{ $site->email }}" class="small-t blueFont flex middle whiteFont gap10">
                <figure class="whFitImg">
                    <img src="{{@Vite::asset('resources/assets/site/img/mailIcon.png')}}" alt="Email">
                </figure>
                {{ $site->email }}
            </a>

            <a href="javascript:;" class="small-t blueFont flex middle whiteFont gap10" onclick="funcoesHelper.sendWhatsapp('{{ $site->whatsapp }}', 'Olá, tudo bem? Estava navegando no site {{ config('app.name') }} e gostaria de mais informações.')">
                <figure class="whFitImg">
                    <img src="{{@Vite::asset('resources/assets/site/img/whatsIcon.png')}}" alt="Whatsapp">
                </figure>
                {{ $site->whatsapp }}
            </a>
        </div>
    </div>

    <section class="header">
        <div class="main flex_r flex_w middle">
            <a href="{{ route('home') }}" class="logoH whFitImg flex">
                <img src="{{ @vite::asset('resources/assets/site/img/logo.png') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
            </a>

            <nav id="menu">
                @include('site.includes.menu')
            </nav>

            <div class="flex gap30 middle">
                <a href="javascript:;" id="btnLogin" class="btnLogin flex middle med-t whiteFont">
                    Pedidos
                </a>

                <a href="javascript:;" class="carrinhoH flex middle">
                    <div class="whFitImg flex">
                        <img src="{{ @Vite::asset('resources/assets/site/img/cartIcon.png') }}" alt="Carrinho">
                    </div>

                    <span>1</span>
                </a>
            </div>
        </div>
    </section>

    <div class="menuHeader">
        <div class="main flex_r middle">
            <ul class="menuProdutosDesk">

                <li class="menuCategoria">
                    <a href="javascript:;" class="drop">
                        <figure class="whFitImg flex">
                            <img src="{{@Vite::asset('resources/assets/site/img/menuIcon.png')}}" alt="Menu icon">
                        </figure>
                        Linha de Produtos
                    </a>

                    <ul class="submenuProdutosDesk">
                        @for ($s = 0; $s < 12; $s++)
                        <li class="marcaMenu"><a href="javascript:;" class="flex_r middle">Marca Nome
                            <figure class="whFitImg">
                                <img src="{{ @Vite::asset('resources/assets/site/img/arrowMenu.png') }}" alt="Arrow Menu">
                            </figure>
                        </a>

                            <ul class="produtosSubmenuDesk">
                                @for ($y = 0; $y < 5; $y++)
                                <li><a href="javascript:;">Nome do produto</a></li>
                                @endfor
                            </ul>

                        </li>
                        @endfor
                    </ul>
                </li>

            </ul>

            @include('site.includes.formSearch')
        </div>
    </div>

    @include('site.includes.menuMobile')
</header>

<header class="scroller">

    <section class="header">
        <div class="main flex_r flex_w middle">
            <a href="{{ route('home') }}" class="logoH whFitImg flex">
                <img src="{{ @vite::asset('resources/assets/site/img/logo.png') }}" alt="{{ config('app.name') }}" title="{{ config('app.name') }}">
            </a>

            <nav id="menu">
                @include('site.includes.menu')
            </nav>

            <div class="flex gap30 middle">

                <a href="javascript:;" id="btnLogin" class="btnLogin flex middle med-t whiteFont">
                    Pedidos
                </a>

                <a href="javascript:;" class="carrinhoH flex middle">
                    <div class="whFitImg flex">
                        <img src="{{ @Vite::asset('resources/assets/site/img/cartIcon.png') }}" alt="Carrinho">
                    </div>

                    <span>1</span>
                </a>
            </div>
        </div>
    </section>
    @include('site.includes.menuMobile')
</header>
