@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Recuperar-Contraseña')
@section('content')
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow-lg bg">
        <h3 class="mx-4 mt-3">Recuperar Contraseña</h3>
        <div class="m-3">
          <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" />
          
          <p class="text-muted small mx-2 mb-4">
            ¿Olvidaste tu contraseña? No hay problema. Solo indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecerla.
          </p>

          <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <label class="form-label mx-2 mt-2" for="email">Correo electrónico</label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}" 
                placeholder="ejemplo@gmail.com" 
                required 
                autofocus 
                autocomplete="email"
            >
            @error('email')
                <div class="invalid-feedback mx-2">
                    {{ $message }}
                </div>
            @enderror

            <div class="row m-1 mt-4">
              <button type="submit" class="btn btn-success mt-3 mx-auto">
                Enviar Enlace
              </button>
              <a class="btn btn-danger mt-2 mx-auto" href="/login">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection