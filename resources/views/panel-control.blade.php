@extends('app') <!-- Se extiende del padre app -->

@section('title', 'Panel de Control')
@section('content')
    <div class="fondo py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif
        <div class="container py-4">
            <h2 class="subtitulo-seccion fw-bold text-center mb-5">Artículos</h2>
            <div class="row justify-content-center text-dark mb-5">
                <div class="col">
                    <a class="btn btn-warning mt-2 w-100" href='/crear-categoria'>Agregar Categoria</a>
                </div>
                <div class="col">
                    <a class="btn btn-warning mt-2 w-100" href='/crear-producto'>Agregar Artículo</a>
                </div>
                <div class="col">
                    <a class="btn btn-warning mt-2 w-100" href='/crear-variante'>Agregar Variante</a>
                </div>
            </div>
            <div class="card-body p-0">
                @if($var_productos->isEmpty())
                    <p>No hay productos disponibles en este momento.</p>
                @else
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th class="py-3 px-2 border-bottom-2">Ícono</th>
                                <th class="py-3 px-2 border-bottom-2">Nombre</th>
                                <th class="d-none d-md-table-cell py-3 px-2 border-bottom-2">Costo</th>
                                <th class="d-none d-md-table-cell py-3 px-2 border-bottom-2">Stock</th>
                                <th class="d-none d-md-table-cell py-3 px-2 border-bottom-2">Editar</th>
                                <th class="d-none d-md-table-cell py-3 px-2 border-bottom-2">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="text-secondary text-nowrap table-dark">
                            @foreach($var_productos as $var_producto)
                            <tr>
                                <td class="py-3 px-2"><img src="/img/catalogo/{{ $var_producto->url_img }}"  style="width: 60px; height: 60px; object-fit: cover;"></td>
                                <td class="py-3 px-2">{{ $var_producto->descripcion }}</td>
                                <td class="d-none d-md-table-cell py-3 px-2">${{ number_format($var_producto->precio, 2) }}</td>
                                <td class="d-none d-md-table-cell py-3 px-2">{{ $var_producto->stock }}</td>
                                <td class="d-none d-md-table-cell py-3 px-2">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $var_producto->id }}"><i class="bi bi-pencil-fill me-2"></i></button>
                                </td>
                                <td class="d-none d-md-table-cell py-3 px-2">
                                    <!-- Accion directa de eliminación de artículo -->
                                    <form action="{{ route('variantes.destroy', $var_producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este artículo? Esta acción no se puede deshacer.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash-fill me-2"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Modal de edición para cada producto -->
                            <div class="modal fade" id="modalEditar{{ $var_producto->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Editar: {{ $var_producto->descripcion }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('variantes.update', $var_producto->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label class="form-label" for="descripcion">Nombre del artículo</label>
                                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $var_producto->descripcion }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="precio">Precio</label>
                                                    <input type="number" class="form-control" id="precio" name="precio" value="{{ $var_producto->precio }}" step="0.01">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="stock">Stock</label>
                                                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $var_producto->stock }}">
                                                </div>
                                                <div class="modal-footer px-0 pb-0 border-0">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection