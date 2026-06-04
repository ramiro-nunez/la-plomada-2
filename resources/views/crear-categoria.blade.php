@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Crear Categoría')

@section('content')
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow-lg bg">
        <h3 class="mx-4 mt-3">Crear Categoría</h3>
        <div class="m-3">
            <form action="/" method='POST'>
            @csrf <!-- Genera un token que es solicitado por Laravel 
            buscando evitar ataques maliciosos -->
            <div>
            <label class="form-label mx-2" for="nombre">Nombre de Categoría</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre de la categoría" required>
                @error('nombre')
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