@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Crear Artículo')

@section('content')
<div class="bg-dark py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card shadow-lg bg">
                <h3 class="mx-4 mt-3">Crear Artículo</h3>
                    <div class="m-3">
                        <form action="/crear-producto" method='POST'>
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Descripción del artículo" required>
                                <label class="form-label mx-2" for="name">Descripción del Artículo</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-select" id="id_categoria" name="id_categoria" required>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                                <label class="form-label mx-2" for="id_categoria">Categoría</label>
                            </div>
                            <div class="row m-1 ">
                                <button class="btn btn-success mt-3 mx-auto">Ingresar</button>
                                <a class="btn btn-danger mt-2 mx-auto" href='/panel-control'>Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-dark table-bordered border-warning table-hover text-center mb-0">
                        <thead class="table-warning">
                            <tr class="text-center">
                                <th class="py-3 px-2 border-bottom-2">Productos Existentes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr class="text-center">
                                <td class="py-3 px-2">{{ $producto->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection