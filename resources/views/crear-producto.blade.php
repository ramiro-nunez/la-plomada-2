@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Crear Artículo')

@section('content')
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow-lg bg">
        <h3 class="mx-4 mt-3">Crear Artículo</h3>
        <div class="m-3">
            <form action="/" method='POST'>
                @csrf <!-- Genera un token que es solicitado por Laravel 
                buscando evitar ataques maliciosos -->
                <div>
                    <label class="form-label mx-2" for="name">Descripción del Artículo</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" placeholder="Descripción del artículo" required>
                        @error('name')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                </div>
                <div>
                    <label class="form-label mx-2" for="id_categoria">Categoría (ID)</label>
                    <input type="text" id="id_categoria" name="id_categoria" value="{{ old('id_categoria') }}" class="form-control" placeholder="ID de la categoría" required>
                        @error('id_categoria')
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