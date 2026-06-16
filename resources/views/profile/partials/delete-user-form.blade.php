<section id="seccion-eliminar" class="card shadow-sm border border-danger mt-4">
    <div class="card-body p-4">
        
        <header class="mb-4">
            <h3 class="h5 text-danger fw-bold mb-1">
                Eliminar Cuenta
            </h3>
            <p class="text-muted small">
                Una vez que tu cuenta sea eliminada, todos sus recursos y datos se borrarán de forma permanente. Antes de proceder, por favor descargá cualquier información que desees conservar.
            </p>
        </header>

        <button type="button" class="btn btn-danger fw-semibold" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
            Eliminar Cuenta
        </button>

        <div class="modal fade @if($errors->userDeletion->isNotEmpty()) show d-block bg-dark bg-opacity-50 @endif" 
     id="confirmUserDeletionModal" 
     tabindex="-1" 
     aria-labelledby="confirmUserDeletionModalLabel" 
     aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            
            <form method="post" action="{{ route('profile.destroy') }}" class="needs-validation">
                @csrf
                @method('delete')

                <div class="modal-header border-bottom-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold text-dark" id="confirmUserDeletionModalLabel">
                        ¿Estás seguro de que querés eliminar tu cuenta?
                    </h5>
                    <a href="{{ route('profile.edit') }}" class="btn-close" aria-label="Cerrar"></a>
                </div>

                <div class="modal-body px-4 py-2">
                    <p class="text-muted small">
                        Una vez que tu cuenta sea eliminada, todos sus datos se perderán para siempre. Por favor, ingresá tu contraseña para confirmar que realmente deseás eliminarla.
                    </p>

                    <div class="mb-3 mt-3">
                        <label for="password" class="form-label fw-semibold visually-hidden">Contraseña</label>
                        <input id="password" name="password" type="password" 
                               class="form-control @error('password', 'userDeletion') is-invalid @enderror" 
                               placeholder="Contraseña requerida" required>
                        
                        @error('password', 'userDeletion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer border-top-0 pb-4 px-4 d-flex justify-content-end gap-2">
                    <a href="{{ route('profile.edit') }}" class="btn btn-secondary fw-semibold">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-danger fw-semibold">
                        Eliminar Definitivamente
                    </button>
                </div>
            </form>

       
                </div>
            </div>
        </div>

    </div>
</section>
