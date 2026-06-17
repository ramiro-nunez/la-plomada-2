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
                                <th class="py-3 px-2 border-bottom-2">Cat</th>
                                <th class="py-3 px-2 border-bottom-2">Producto</th>
                                <th class="py-3 px-2 border-bottom-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr class="text-center">
                                <td class="py-3 px-2">{{ $producto->categoria->nombre }}</td>
                                <td class="py-3 px-2">{{ $producto->nombre }}</td>
                                <td class="py-3 px-2 d-flex justify-content-center gap-2">
                                    <button type="button" class="btn btn-sm btn-warning px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $producto->id }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>                            
                                    {{-- Botón Baja Lógica (Soft Delete) --}}                            
                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger px-3 shadow-sm">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <div class="modal fade" id="editModal{{ $producto->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $producto->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg-secondary text-white border-warning">
                                        <div class="modal-header border-bottom border-warning border-opacity-25">
                                            <h5 class="modal-title fw-bold" id="editModalLabel{{ $producto->id }}"><i class="bi bi-pencil-square me-2"></i>Editar Categoría</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body py-4">
                                                <div class="form-floating text-dark">
                                                    <input type="text" id="edit_nombre{{ $producto->id }}" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="form-control" placeholder="Nombre" required>
                                                    <label for="edit_nombre{{ $producto->id }}">Nuevo Nombre de Producto</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-top border-warning border-opacity-25">
                                                <button type="button" class="btn btn-sm btn-outline-light" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-sm btn-warning fw-bold text-dark px-3">Guardar Cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection