<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserCreateEvent;
use App\Events\UserDestroyEvent;
use App\Events\UserUpdateEvent;
use App\Events\UserUpdateOrderEvent;
use App\Http\Requests\Categoria\CategoriaStoreRequest;
use App\Http\Requests\Categoria\CategoriaUpdateRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marca;

class CategoriaController extends Controller
{

    private const POR_PAGINA = 10;

    /* Views */
    public function index(Request $request)
    {
        $ViewData['porPagina'] = $request->integer('porPagina', self::POR_PAGINA);
        $ViewData['busca'] = $request->busca ?? "";

        $ViewData['categorias'] = Categoria::search($ViewData['busca'])->paginate($ViewData['porPagina'] == -1 ? PHP_INT_MAX : $ViewData['porPagina']);

        return view('admin.categoria.list', $ViewData);
    }

    public function create()
    {
        $ViewData['marcas'] = Marca::all();
        return view('admin.categoria.create', $ViewData);
    }

    public function edit(Categoria $categoria)
    {
        $ViewData['categoria'] = $categoria;

        $ViewData['marcas'] = Marca::all();

        return view('admin.categoria.edit', $ViewData);
    }


    /* Data */

    public function store(CategoriaStoreRequest $request)
    {
        $categoria = new Categoria($request->validated());

        $categoria->save();

        event(new UserCreateEvent($categoria));

        return response()->json([
            'mensagem' => "Novo registro de Categoria cadastrado.",
            'redirecionamento' => route('admin.categoria'),
        ], 201);
    }

    public function update(CategoriaUpdateRequest $request, Categoria $categoria)
    {
        $categoria->update($request->validated());

        event(new UserUpdateEvent($categoria));

        return response()->json(['mensagem' => "Registro de Categoria alterado."], 200);
    }


    public function order(Request $request)
    {
        foreach ($request->ordem as $posicao => $id) {

            Categoria::query()->where('categorias.id', $id)->update(['ordem' => $posicao]);
        }

        event(new UserUpdateOrderEvent(new Categoria()));

        return response()->json(['mensagem' => "Ordem de Categoria alterada."], 200);
    }

    public function destroy(Categoria $categoria)
    {

        if($categoria->produtos()->count() > 0){

            return response()->json(['erro' => "Não é possível remover uma Categoria com Produtos associados."], 422);
        }

        $categoria->delete();

        event(new UserDestroyEvent($categoria));

        return response()->json(['mensagem' => "Registro de Categoria removido."], 200);
    }

}
