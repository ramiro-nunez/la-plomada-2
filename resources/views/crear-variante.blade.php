@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Crear Variante')

@section('content')
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow-lg bg">
        <h3 class="mx-4 mt-3">Crear Variante</h3>
        <div class="m-3">
            <form action="/" method='POST'>
                @csrf <!-- Genera un token que es solicitado por Laravel 
                buscando evitar ataques maliciosos -->
                <div>
                    <label class="form-label mx-2" for="descripcion">Nombre de Variante</label>
                    <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="form-control" placeholder="Nombre de la variante" required>
                        @error('descripcion')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                </div>
                <div>
                    <label class="form-label mx-2" for="precio">Precio</label>
                    <input type="text" id="precio" name="precio" value="{{ old('precio') }}" class="form-control" placeholder="Precio de la variante" required>
                        @error('precio')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                </div>
                <div>
                    <label class="form-label mx-2" for="stock">Stock</label>
                    <input type="text" id="stock" name="stock" value="{{ old('stock') }}" class="form-control" placeholder="Stock de la variante" required>
                        @error('stock')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
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
</div>
@endsection