<section id="seccion-password" class="card shadow-sm border border-gray-200 mt-4">
    <div class="card-body p-4">
        
        <header class="mb-4">
            <h3 class="h5 text-dark fw-bold mb-1">
                Actualizar Contraseña
            </h3>
            <p class="text-muted small">
                Asegurate de que tu cuenta use una contraseña larga y aleatoria para mantenerte seguro.
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="needs-validation">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="update_password_current_password" class="form-label fw-semibold">Contraseña Actual</label>
                <input id="update_password_current_password" name="current_password" type="password" 
                       class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" 
                       autocomplete="current-password">
                
                @error('current_password', 'updatePassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="update_password_password" class="form-label fw-semibold">Nueva Contraseña</label>
                <input id="update_password_password" name="password" type="password" 
                       class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
                       autocomplete="new-password">
                
                @error('password', 'updatePassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="update_password_password_confirmation" class="form-label fw-semibold">Confirmar Contraseña</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                       class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" 
                       autocomplete="new-password">
                
                @error('password_confirmation', 'updatePassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-dark px-4 fw-semibold">
                    Actualizar Contraseña
                </button>

                @if (session('status') === 'password-updated')
                    <span
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 3000)"
                        class="text-success small fw-medium"
                    >
                        <i class="bi bi-check-circle-fill"></i> ¡Contraseña actualizada!
                    </span>
                @endif
            </div>
        </form>

    </div>
</section>