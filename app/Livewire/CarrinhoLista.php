<?php

namespace App\Livewire;

use Livewire\Component;

class CarrinhoLista extends Component
{
    public $itens = [];

    public function mount()
    {
        $this->itens = [
            [
                'id' => 1,
                'nome' => 'Protetor Solar Facial BB Cream Antiacne FPS 30',
                'preco' => 5.30,
                'quantidade' => 1,
                'imagem' => 'resources/assets/site/img/ricosol.png',
            ],
        ];
    }

    public function incrementar($index)
    {
        $this->itens[$index]['quantidade']++;
    }

    public function decrementar($index)
    {
        if ($this->itens[$index]['quantidade'] > 1) {
            $this->itens[$index]['quantidade']--;
        }
    }

    public function remover($index)
    {
        unset($this->itens[$index]);
        $this->itens = array_values($this->itens); // reindexar o array $this->itens
    }

    public function render()
    {
        return view('livewire.carrinho-lista');
    }
}
