<div class="carrinho-container">
    @foreach ($itens as $index => $item)
        <div class="item">
            <div class="item-info">
                <img src="{{ Vite::asset($item['imagem']) }}" alt="Produto">
                <div class="item-text">
                    <h3>{{ $item['nome'] }}</h3>
                    <p>R$ {{ number_format($item['preco'], 2, ',', '.') }}</p>
                </div>
            </div>
            <div class="quantidade">
                <button wire:click="decrementar({{ $index }})">-</button>
                <span>{{ $item['quantidade'] }}</span>
                <button wire:click="incrementar({{ $index }})">+</button>
                <button wire:click="remover({{ $index }})" style="margin-left:10px;">🗑️</button>
            </div>
        </div>
    @endforeach
</div>
