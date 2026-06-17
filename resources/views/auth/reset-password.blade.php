@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Restablecer-Contraseña')
@section('content')
<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow-lg bg">
        <h3 class="mx-4 mt-3">Restablecer Contraseña</h3>
        <div class="m-3">
          <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <label class="form-label mx-2 mt-2" for="email">Correo electrónico</label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email', $request->email) }}" 
                placeholder="ejemplo@gmail.com" 
                required 
                autofocus 
                autocomplete="username"
            >
            @error('email')
                <div class="invalid-feedback mx-2">
                    {{ $message }}
                </div>
            @enderror

            <!-- Password -->
            <label class="form-label mx-2 mt-3" for="password">Contraseña</label>
            <input 
                id="password" 
                name="password" 
                type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                placeholder="Ingrese su nueva contraseña" 
                required 
                autocomplete="new-password"
            >
            @error('password')
                <div class="invalid-feedback mx-2">
                    {{ $message }}
                </div>
            @enderror

            <!-- Confirm Password -->
            <label class="form-label mx-2 mt-3" for="password_confirmation">Confirmar Contraseña</label>
            <input 
                id="password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="form-control @error('password_confirmation') is-invalid @enderror" 
                placeholder="Confirme su contraseña" 
                required 
                autocomplete="new-password"
            >
            @error('password_confirmation')
                <div class="invalid-feedback mx-2">
                    {{ $message }}
                </div>
            @enderror

            <div class="row m-1 mt-4">
              <button type="submit" class="btn btn-success mt-3 mx-auto">
                Restablecer Contraseña
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
