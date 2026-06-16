@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Editar Variante')

@section('content')
<div class="bg-dark py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-lg bg">
                <h3 class="mx-4 mt-3">Editar Variante</h3>
                <div class="m-3">
                    <form action="{{ route('variantes.update', $var_producto->id) }}" method="POST" enctype="multipart/form-data">
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
                        <div class="mb-3">
                            <label for="url_img">Imagen del artículo</label>
                            <input type="file" id="url_img" name="url_img" accept="image/jpg, image/jpeg" required>
                        </div>
                        <div class="px-0 pb-0 border-0">
                            <a href="{{ route('variantes.create') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection