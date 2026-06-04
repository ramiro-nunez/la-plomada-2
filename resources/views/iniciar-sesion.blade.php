@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Iniciar-Sesion')

@section('content')
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow-lg bg">
        <h3 class="mx-4 mt-3">Iniciar Sesión</h3>
        <div class="m-3">
          <form action="{{ url('login') }}" method='POST'>
          @csrf <!-- Genera un token que es solicitado por Laravel 
            buscando evitar ataques maliciosos -->
            <div>
              <label class="form-label mx-2" for="email">Correo electrónico</label>
              <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="ejemplo@gmail.com" required>
              @error('email')
                  <span style="color: red;">{{ $message }}</span>
              @enderror
            </div>
            <div>
              <label class="form-label mx-2" for="password">Contraseña</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="********" required>
              @error('password')
                <span style="color: red;">{{ $message }}</span>
              @enderror
            </div>
              <span>¿No posee una cuenta?</span><a class="btn btn-info m-2" href="/registrarse">Registrese</a>
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