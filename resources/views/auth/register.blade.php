@extends('app') <!-- Se extiende del padre app -->

@section('title', 'Registrarse')
@section('content')<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8">
      <div class="card shadow-lg bg">
        <h3 class="mx-4 mt-3">Registrese</h3>
        <div class="m-3">
          <form action="{{ route('register') }}" method="POST">
          @csrf  <!-- Genera un token que es solicitado por Laravel 
            buscando evitar ataques maliciosos -->
            <label class="form-label mx-2" for="name">Nombre</label>
            <input 
                name="name" 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name') }}" 
                placeholder="Ingresa tu nombre" 
                required
            >
            @error('name')
                <div class="invalid-feedback mx-2">
                    {{ $message }} </div>
            @enderror
            <label class="form-label mx-2 mt-2" for="apellido">Apellido</label>
            <input 
                name="apellido" 
                type="text" 
                class="form-control @error('apellido') is-invalid @enderror" 
                value="{{ old('apellido') }}" 
                placeholder="Ingresa tu apellido" 
                required
            >
            @error('apellido')
                <div class="invalid-feedback mx-2">
                    {{ $message }} </div>
            @enderror

            <label class="form-label mx-2 mt-2" for="email">Correo electrónico</label>
            <input 
                name="email" 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}" 
                placeholder="ejemplo@gmail.com" 
                required
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
                placeholder="Ingrese una contraseña segura" 
                required
            >
            @error('password')
                <div class="invalid-feedback mx-2">
                    {{ $message }}
                </div>
            @enderror
            <label class="form-label mx-2 mt-2" for="password_confirmation">Repetir contraseña</label>
            <input 
                name="password_confirmation" 
                type="password" 
                class="form-control @error('password_confirmation') is-invalid @enderror" 
                value="{{ old('password_confirmation') }}" 
                placeholder="Confirmar contraseña" 
                required
            >
            @error('password_confirmation')
                <div class="invalid-feedback mx-2">
                    {{ $message }}
                </div>
            @enderror
                
            
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
{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
