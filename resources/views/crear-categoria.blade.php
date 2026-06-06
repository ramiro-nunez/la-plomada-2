@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Crear Categoría')

@section('content')
<div class="bg-dark py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-lg bg">
                <h3 class="mx-4 mt-3">Crear Categoría</h3>
                <div class="m-3">
                    <form action="/crear-categoria" method='POST'>
                    @csrf
                        <div class="form-floating">
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre de la categoría" required>
                        <label class="form-label mx-2" for="nombre">Nombre de Categoría</label>
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
                            <th class="py-3 px-2 border-bottom-2">Categorias Existentes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr class="text-center">
                            <td class="py-3 px-2">{{ $categoria->nombre }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection