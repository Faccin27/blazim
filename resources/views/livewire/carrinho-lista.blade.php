<div class="carrinho-container">
    @foreach ($itens as $index => $item)
        <div class="item">
            <div class="item-info">
                <img src="{{ $item['foto_thumb'] }}" alt="Produto">
                <div class="item-text">
                    <h3>{{ $item['nome'] }}</h3>
                    <p>R$ {{ moeda($item['valor']) }}</p>
                </div>
            </div>
            <div class="quantidade">
                <button wire:click="decrementar({{ $index }})">-</button>
                <span>{{ $item['quantidade'] }}</span>
                <button wire:click="incrementar({{ $index }})">+</button>
                <button wire:click="remover({{ $index }})" class="remove-btn" style="margin-left:10px;"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M7 21C6.45 21 5.97933 20.8043 5.588 20.413C5.19667 20.0217 5.00067 19.5507 5 19V6H4V4H9V3H15V4H20V6H19V19C19 19.55 18.8043 20.021 18.413 20.413C18.0217 20.805 17.5507 21.0007 17 21H7ZM17 6H7V19H17V6ZM9 17H11V8H9V17ZM13 17H15V8H13V17Z"
                            fill="#696867" />
                    </svg></button>
            </div>
        </div>
    @endforeach
</div>
