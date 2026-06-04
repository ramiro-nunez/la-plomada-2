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
{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
--}}