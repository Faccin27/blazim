<ul class="dl-menu">
    <li {!! Request::routeIs('home') ? 'class="ativo"' : null !!}><a href="{{ route('home') }}">Início</a></li>
    <li {!! Request::routeIs('home2') ? 'class="ativo"' : null !!}><a href="{{ route('home2') }}">Sobre</a></li>
    <li {!! Request::routeIs('sobre') ? 'class="ativo"' : null !!}><a href="{{ route('sobre') }}">Produtos</a></li>
    <li {!! Request::routeIs('blog*') ? 'class="ativo"' : null !!}><a href="{{ route('blog') }}">Representantes</a></li>
    <li {!! Request::routeIs('contato*') ? 'class="ativo"' : null !!}><a href="javascript:;">Contato</a></li>
</ul>
