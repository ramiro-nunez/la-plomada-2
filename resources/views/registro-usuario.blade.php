@extends('app') <!-- Se extiende del padre app -->

@section('title', 'Registrarse')
@section('content')<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow-lg bg">
        <h3 class="mx-4 mt-3">Registrese</h3>
        <div class="m-3">
          <form action="{{ url('/registrarse') }}" method="POST">
          @csrf  <!-- Genera un token que es solicitado por Laravel 
            buscando evitar ataques maliciosos -->
            <div>
              <label class="form-label mx-2" for="name">Nombre</label>
              <input id="name" name="name" value="{{ old('name') }}" class="form-control" type="text" placeholder="Ingresa tu nombre" required>
              @error('name')
                <span style="color: red;">El nombre es obligatorio.</span>
              @enderror
            </div>
            <div>
              <label class="form-label mx-2" for="lastname">Apellido</label>
              <input id="lastname" name="lastname" value="{{ old('lastname') }}" class="form-control" type="text" placeholder="Ingresa tu apellido" required>
              @error('lastname')
                <span style="color: red;">El apellido es obligatorio.</span>
              @enderror
            </div>
            <div>
              <label class="form-label mx-2" for="email">Correo electrónico</label>
              <input id="email" name="email" value="{{ old('email') }}" class="form-control" type="email" placeholder="ejemplo@gmail.com" required>
              @error('email')
                <span style="color: red;">Este correo electrónico ya está registrado.</span>
              @enderror
            </div>
            <div>
              <label class="form-label mx-2" for="password">Contraseña</label>
              <input id="password" name="password" class="form-control" type="password" placeholder="Ingrese una contraseña segura" required>
              @error('password')
                <span style="color: red;">La contraseña es obligatoria</span>
              @enderror
            </div>
            <div>
              <label for="password_confirmation">Confirmar contraseña</label>
              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
              @error('password_confirmation')
                <span style="color: red;">Las contraseñas no coinciden.</span>
              @enderror
            </div>
            <span>¿Ya posee una cuenta?</span><a class="btn btn-info m-2" href="/iniciar-sesion">Iniciar sesión</a>
            
            <div class="row m-1 ">
              <button type="submit" class="btn btn-success mt-3 mx-auto">Registrarse</button>
              <a class="btn btn-danger mt-2 mx-auto"  href="/" type="cancel"> Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection