<section class="card shadow-sm border border-gray-200">
    <div class="card-body p-4">
        
        <header class="mb-4">
            <h3 class="h5 text-dark fw-bold mb-1">
                Información del Perfil
            </h3>
            <p class="text-muted small">
                Actualizá la información de tu cuenta y tu dirección de correo electrónico.
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="needs-validation">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nombre</label>
                <input id="name" name="name" type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name', $user->name) }}" 
                       required autocomplete="name">
                
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label fw-semibold">Apellido</label>
                <input id="apellido" name="apellido" type="text" 
                       class="form-control @error('apellido') is-invalid @enderror" 
                       value="{{ old('apellido', $user->apellido) }}" 
                       required autofocus autocomplete="apellido">
                
                @error('apellido')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                <input id="email" name="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email', $user->email) }}" 
                       required autocomplete="username">
                
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="alert alert-warning mt-3 p-2 small flex-grow-1" role="alert">
                        Tu dirección de correo electrónico no está verificada.
                        <button form="send-verification" class="btn btn-link p-0 text-decoration-underline small text-warning-dark align-baseline">
                            Hacé clic acá para volver a enviar el correo de verificación.
                        </button>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success mt-2 p-2 small" role="alert">
                            Se envió un nuevo enlace de verificación a tu dirección de correo electrónico.
                        </div>
                    @endif
                @endif
            </div>

            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-dark px-4 fw-semibold">
                    Guardar Cambios
                </button>

                @if (session('status') === 'profile-updated')
                    <span
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 3000)"
                        class="text-success small fw-medium"
                    >
                        <i class="bi bi-check-circle-fill"></i> ¡Guardado con éxito!
                    </span>
                @endif
            </div>
        </form>

    </div>
</section>
