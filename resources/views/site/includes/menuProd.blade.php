<ul class="menuProduto">
    @foreach ($categorias as $categoria)
        <li class="{{ isset($categoriaSelecionada) && $categoriaSelecionada->id == $categoria->id ? 'ativo' : '' }}">
            <a href="{{ route('produtos.categoria', ['marca' => $marca->slug, 'categoria' => $categoria->slug]) }}">
                {{ $categoria->nome }}
            </a>
        </li>
    @endforeach
</ul>
