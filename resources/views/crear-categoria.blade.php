@extends('app') <!-- Lo siguiente se extiende del padre app -->

@section('title', 'Crear Categoría')

@section('content')
<div class="bg-dark py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow-lg bg">
                <h3 class="mx-4 mt-3">Crear Categoría</h3>
                <div class="m-3">
                    <form action="/crear-categoria" method='POST'>
                    @csrf
                        <div class="form-floating">
                        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Nombre de la categoría" required>
                        <label class="form-label mx-2" for="nombre">Nombre de Categoría</label>
                        </div>
                        <div class="row m-1 ">
                            <button class="btn btn-success mt-3 mx-auto">Ingresar</button>
                            <a class="btn btn-danger mt-2 mx-auto" href='/panel-control'>Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-dark table-bordered border-warning table-hover text-center mb-0">
                    <thead class="table-warning">
                        <tr class="text-center">
                            <th class="py-3 px-2 border-bottom-2">Categorias Existentes</th>
                            <th class="py-3 px-2 border-bottom-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $categoria)
                        <tr class="text-center">
                            <td class="py-3 px-2">{{ $categoria->nombre }}</td>
                            <td class="py-3 px-2 d-flex justify-content-center gap-2">
                                <button type="button" class="btn btn-sm btn-warning px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $categoria->id }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>                            
                                {{-- Botón Baja Lógica (Soft Delete) --}}                            
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría? Los productos asociados se archivarán.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger px-3 shadow-sm">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="editModal{{ $categoria->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $categoria->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content bg-secondary text-white border-warning">
                                    <div class="modal-header border-bottom border-warning border-opacity-25">
                                        <h5 class="modal-title fw-bold" id="editModalLabel{{ $categoria->id }}"><i class="bi bi-pencil-square me-2"></i>Editar Categoría</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body py-4">
                                            <div class="form-floating text-dark">
                                                <input type="text" id="edit_nombre{{ $categoria->id }}" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" class="form-control" placeholder="Nombre" required>
                                                <label for="edit_nombre{{ $categoria->id }}">Nuevo Nombre de Categoría</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top border-warning border-opacity-25">
                                            <button type="button" class="btn btn-sm btn-outline-light" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-sm btn-warning fw-bold text-dark px-3">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if(!$categoriasEliminadas->isEmpty())
            <div class="bg-dark row justify-content-center pt-4">
                <h4 class="text-center text-white mb-3"><i class="bi bi-archive-fill me-2"></i> Categorias Archivadas / Eliminadas</h4>
                <div class="table-responsive">
                    <table class="table table-dark table-bordered border-secondary text-center mb-0">
                        <thead class="table-secondary text-dark">
                            <tr>
                                <th class="py-3 px-2">Nombre</th>
                                <th class="py-3 px-2">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categoriasEliminadas as $eliminada)
                            <tr class="align-middle">                                
                                <td class="py-3 text-start ps-3">
                                    <span class="">{{ $eliminada->nombre }}</span>
                                </td>
                                {{-- Acción de Restaurar --}}
                                <td class="py-3">
                                    <form action="{{ route('categorias.restore', $eliminada->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-primary px-3 shadow-sm" title="Volver a activar en el catálogo">
                                            <i class="bi bi-arrow-counterclockwise me-1"></i> Activar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        {{-- FIN SECCIÓN ELIMINADOS --}}
        </div>
    </div>
</div>
@endsection