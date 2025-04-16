<?php

namespace App\Livewire;

use Livewire\Component;

class CarrinhoLista extends Component
{
    public $itens = [];

    public function mount()
    {
        $carrinho = session()->get('carrinho', []);
        $this->itens = array_values($carrinho);
    }

    public function incrementar($index)
    {
        $this->itens[$index]['quantidade']++;
        $this->atualizarSessao();
    }

    public function decrementar($index)
    {
        if ($this->itens[$index]['quantidade'] > 1) {
            $this->itens[$index]['quantidade']--;
            $this->atualizarSessao();
        }
    }

    public function remover($index)
    {
        $itemId = $this->itens[$index]['id'];
        unset($this->itens[$index]);
        $this->itens = array_values($this->itens);
        $this->atualizarSessao();
    }


    private function atualizarSessao()
    {
        $carrinho = [];
        foreach ($this->itens as $item) {
            $carrinho[$item['id']] = $item;
        }
        session()->put('carrinho', $carrinho);
    }

    public function render()
    {
        return view('livewire.carrinho-lista');
    }
}
