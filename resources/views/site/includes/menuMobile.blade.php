<div class="menuMobile fullW">
    <span class="menuText">MENU</span>
    <a class="buttonMenu" onclick="this.querySelector('svg').classList.toggle('is-closed')">
        <svg class="burger-6 ham hamRotate ham1" viewBox="0 0 100 100">
            <path class="line topLine"
                d="m 30,33 h 40 c 0,0 9.044436,-0.654587 9.044436,-8.508902 0,-7.854315 -8.024349,-11.958003 -14.89975,-10.85914 -6.875401,1.098863 -13.637059,4.171617 -13.637059,16.368042 v 40" />
            <path class="line middleLine" d="m 30,50 h 40" />
            <path class="line bottomLine"
                d="m 30,67 h 40 c 12.796276,0 15.357889,-11.717785 15.357889,-26.851538 0,-15.133752 -4.786586,-27.274118 -16.667516,-27.274118 -11.88093,0 -18.499247,6.994427 -18.435284,17.125656 l 0.252538,40" />
        </svg>
    </a>
</div>

<div class="menuMobileContent">
    @include('site.includes.formSearch')

    <ul class="menuMobileList">
        <li {!! Request::routeIs('home') ? 'class="ativo"' : null !!}><a href="{{ route('home') }}">Início</a></li>
        <li {!! Request::routeIs('sobre') ? 'class="ativo"' : null !!}><a href="{{ route('sobre') }}">Sobre</a></li>
        <li {!! Request::routeIs('produtos*') ? 'class="ativo"' : null !!}><a class="produtosMobile" href="javascript:;">Produtos</a> </li>
        <li {!! Request::routeIs('contato') ? 'class="ativo"' : null !!}><a href="{{ route('contato') }}">Contato</a></li>
        <li {!! Request::routeIs('contato') ? 'class="ativo"' : null !!}><a href="{{ route('contato') }}">Representantes</a></li>

    </ul>
    <a href="javascript:;" class="btnLogin flex middle blueFont">
        Pedidos
    </a>
</div>

<div class="listagemProdutos" >
    <div class="back-button" onclick="goBack()">←</div>
    <ul class="mobile-subMenu">
        {{-- Loop de categorias--}}

        <li class="mobile-submenu-item margin20" >
            <a href="javascript:;" class="categoria-link" >Nome marca</a>
            <ul class="mobile-dropMenu categoria-id">
                {{-- Loop de subcategoria --}}

                <li class="mobile-product-item margin20">
                    <a href="javascript:;">Nome produto</a>
                </li>

            </ul>
        </li>

    </ul>
</div>
