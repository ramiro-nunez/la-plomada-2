@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Crear Variante')

@section('content')
<div class="bg-dark py-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-lg bg">
                <h3 class="mx-4 mt-3">Crear Variante</h3>
                <div class="m-3">
                    <form action="/crear-variante" method='POST' enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Descripción del variante" required>
                            <label class="form-label mx-2" for="descripcion">Descripción del Variante</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="id_producto" name="id_producto" required>
                                @foreach($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                            <label class="form-label mx-2" for="id_producto">Producto</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" id="precio" name="precio" value="{{ old('precio') }}" class="form-control" placeholder="Precio de la variante" required>
                            <label class="form-label mx-2" for="precio">Precio</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" id="stock" name="stock" value="{{ old('stock') }}" class="form-control" placeholder="Stock de la variante" required>
                            <label class="form-label mx-2" for="stock">Stock</label>
                        </div>
                        <div class="mb-3">
                            <label for="url_img">Imagen del producto</label>
                            <input type="file" id="url_img" name="url_img" accept="image/jpg, image/jpeg" required>
                        </div>
                        <div class="row m-1 ">
                            <button class="btn btn-success mt-3 mx-auto">Ingresar</button>
                            <a class="btn btn-danger mt-2 mx-auto" href='/panel-control'>Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="row justify-content-center mt-3">
            @if($variantes->isEmpty())
                <div class="alert alert-warning alert-dismissible fade show shadow-sm text-center"><p>No hay variantes disponibles en este momento.</p></div>
            @else
                <div class="table-responsive">
                    <table class="table table-dark table-bordered border-warning table-hover text-center mb-0">
                        <thead class="table-warning">
                            <tr>
                                <th class="py-3 px-2 border-bottom-2">Ícono</th>
                                <th class="py-3 px-2 border-bottom-2">Nombre</th>
                                <th class="d-none d-md-table-cell py-3 px-2 border-bottom-2">Costo</th>
                                <th class="d-none d-md-table-cell py-3 px-2 border-bottom-2">Stock</th>
                                <th class="d-none d-md-table-cell py-3 px-2 border-bottom-2">Editar</th>
                                <th class="d-none d-md-table-cell py-3 px-2 border-bottom-2">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($variantes as $variante)
                            <tr>
                                <td class="py-3 px-2"><img src="{{ asset('storage/' . $variante->url_img) }}"  style="width: 60px; height: 60px; object-fit: cover;"></td>
                                <td class="py-3 px-2">{{ $variante->descripcion }}</td>
                                <td class="d-none d-md-table-cell py-3 px-2">${{ number_format($variante->precio, 2) }}</td>
                                <td class="d-none d-md-table-cell py-3 px-2">{{ $variante->stock }}</td>
                                <td class="d-none d-md-table-cell py-3 px-2">
                                    <a href="{{ route('variantes.editar', $variante->id) }}" class="btn btn-warning">
                                        <i class="bi bi-pencil-fill me-2"></i>
                                    </a>
                                </td>
                                <td class="d-none d-md-table-cell py-3 px-2">
                                <!-- Accion directa de eliminación de artículo -->
                                    <form action="{{ route('variantes.destroy', $variante->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este artículo? Esta acción no se puede deshacer.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill me-2"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection