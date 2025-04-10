<ul class="dl-menu">
    <li {!! Request::routeIs('home') ? 'class="ativo"' : null !!}><a href="{{ route('home') }}">Início</a></li>
    <li {!! Request::routeIs('sobre') ? 'class="ativo"' : null !!}><a href="{{ route('sobre') }}">Sobre</a></li>
    <li {!! Request::routeIs('produtos') ? 'class="ativo"' : null !!}><a href="{{ route('produtos') }}">Produtos</a></li>
    <li {!! Request::routeIs('contato*') ? 'class="ativo"' : null !!}><a href="{{ route('contato') }}">Representantes</a></li>
    <li {!! Request::routeIs('contato*') ? 'class="ativo"' : null !!}><a href="{{ route('contato') }}">Contato</a></li>

</ul>
