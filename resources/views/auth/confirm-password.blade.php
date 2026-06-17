@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Confirmar-Contraseña')
@section('content')
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow-lg bg">
        <h3 class="mx-4 mt-3">Confirmar Contraseña</h3>
        <div class="m-3">
          <p class="text-muted small mx-2 mb-4">
            Esta es un área segura de la aplicación. Por favor confirma tu contraseña antes de continuar.
          </p>

          <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <label class="form-label mx-2 mt-2" for="password">Contraseña</label>
            <input 
                id="password" 
                name="password" 
                type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                placeholder="Ingrese su contraseña" 
                required 
                autocomplete="current-password"
            >
            @error('password')
                <div class="invalid-feedback mx-2">
                    {{ $message }}
                </div>
            @enderror

            <div class="row m-1 mt-4">
              <button type="submit" class="btn btn-success mt-3 mx-auto">
                Confirmar
              </button>
              <a class="btn btn-danger mt-2 mx-auto" href="/">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection