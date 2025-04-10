<form class="d-flex flex-wrap justify-content-end" action="{{$rota}}" method="get">
    <div class="col-lg-2 col-md-3 col-12 me-auto mb-3">
        <select class="form-select" name="porPagina" onchange="$(this).parent().parent().submit()">
            <option value="10" {{$porPagina == 10 ? 'selected' : null}}>10 registros</option>
            <option value="25" {{$porPagina == 25 ? 'selected' : null}}>25 registros</option>
            <option value="50" {{$porPagina == 50 ? 'selected' : null}}>50 registros</option>
            <option value="-1" {{$porPagina == -1 ? 'selected' : null}}>Todos</option>
        </select>
    </div>

    <div class="col-lg-3 col-md-4 col-12 mb-3 me-md-3">
        <input type="text" class="form-control" name="busca" value="{{$busca}}" placeholder="Digite sua Busca:">
    </div>

    <button type="submit" class="btn btn-primary mb-3"><i class="bi bi-search"></i> Buscar</button>
</form>
