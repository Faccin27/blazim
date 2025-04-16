<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Sobre;
use Illuminate\Http\Request;

class CarrinhoController extends SiteBaseController
{
    public function index()
    {
        $this->viewData['sobre'] = Sobre::all();

        return view('site.carrinho', $this->viewData);
    }

    public function adicionarAoCarrinho(Request $request)
{
    $produtoId = $request->produto_id;
    $quantidade = $request->quantidade ?? 1;

    // Buscar informações do produto no banco de dados
    $produto = Produto::find($produtoId);

    if (!$produto) {
        return redirect()->back()->with('error', 'Produto não encontrado');
    }

    // Preparar dados do item
    $item = [
        'id' => $produto->id,
        'nome' => $produto->nome,
        'valor' => $produto->valor,
        'quantidade' => $quantidade,
        'foto_thumb' => $produto->foto_thumb,
    ];

    // Obter o carrinho atual da sessão ou criar um novo
    $carrinho = session()->get('carrinho', []);

    // Verificar se o produto já está no carrinho
    if (isset($carrinho[$produtoId])) {
        $carrinho[$produtoId]['quantidade'] += $quantidade;
    } else {
        $carrinho[$produtoId] = $item;
    }

    // Atualizar a sessão
    session()->put('carrinho', $carrinho);

    return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
}

}
