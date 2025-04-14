<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends SiteBaseController
{
    public function index(Request $request)
    {
        $query = Produto::query();

        $query->ativo();

        if ($request->filled('busca')) {

            $palavras = explode(' ', $request->busca);

            $query->where(function ($queryNome) use ($palavras) {
                foreach ($palavras as $palavra) {
                    $queryNome->where('produtos.nome', 'LIKE', "%{$palavra}%");
                }
            });
        }

        $this->viewData['produtos'] = $query->paginate(12);

        return view('site.produtos', $this->viewData);
    }

    public function marca(Marca $marca)
    {
        $this->viewData['marca'] = $marca;

        $this->viewData['categorias'] = $marca->categorias()->get();

        $this->viewData['produtos'] = Produto::whereHas('categoria', function ($query) use ($marca){

            $query->where('categorias.id_marca', $marca->id);

        })->ativo()->paginate(12);

        return view('site.produtos', $this->viewData);
    }

    public function categoria(Marca $marca, Categoria $categoria)
    {
        $this->viewData['marca'] = $marca;

        $this->viewData['categoria'] = $categoria;

        $this->viewData['categoriaSelecionada'] = $categoria;

        $this->viewData['categorias'] = $marca->categorias()->get();

        $this->viewData['produtos'] = $categoria->produtos()->ativo()->paginate(12);

        return view('site.produtos', $this->viewData);
    }

    public function detalhes(Produto $produto)
    {
        $this->viewData['produto'] = $produto;

        $this->viewData['categorias'] = Categoria::where('id_marca', $produto->categoria->id_marca)->get();

        $this->viewData['marca'] = $produto->categoria->marca;

        $this->viewData['categoriaSelecionada'] = $produto->categoria;

        $this->viewData['categoria'] = $produto->categoria;

        $this->viewData['relacionados'] = Produto::query()
            ->withoutGlobalScopes()
            ->ativo()
            ->whereNot('id', $produto->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('site.produtosDetalhes', $this->viewData);

    }
}
