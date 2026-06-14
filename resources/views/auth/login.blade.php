@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Iniciar-Sesion')
@section('content')
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow-lg bg">
        <h3 class="mx-4 mt-3">Iniciar Sesión</h3>
        <div class="m-3">
          <form action="{{ route('login')}}" method='POST'>
          @csrf <!-- Genera un token que es solicitado por Laravel 
            buscando evitar ataques maliciosos -->
            <label class="form-label mx-2 mt-2" for="email">Correo electrónico</label>
            <input 
                name="email" 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}" 
                placeholder="ejemplo@gmail.com" 
                required
                autofocus autocomplete="email"
            >
            @error('email')
                <div class="invalid-feedback mx-2">
                    {{ $message }}
                </div>
            @enderror
            <label class="form-label mx-2 mt-2" for="password">Contraseña</label>
            <input 
                name="password" 
                type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                value="{{ old('password') }}" 
                placeholder="Ingrese su contraseña" 
                required
                autocomplete="current-password"
            >
            @error('password')
                <div class="invalid-feedback mx-2">
                    {{ $message }}
                </div>
            @enderror
            <span>¿No posee una cuenta?</span><a class="btn btn-info m-2" href="/register">Registrese</a>
            <div class="row m-1 ">
              <button class="btn btn-success mt-3 mx-auto">Ingresar</button>
              <a class="btn btn-danger mt-2 mx-auto" href='/'>Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection