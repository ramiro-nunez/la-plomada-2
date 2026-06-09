@extends('app') <!-- Se extiende del padre app -->

@section('title', 'Panel de Control')
@section('content')
    <div class="bg-dark py-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif
        <div class="container py-4">
            <h2 class="subtitulo-seccion fw-bold text-center mb-5">Gestión de Artículos</h2>
            <div class="row justify-content-center text-dark mb-5">
                <div class="col">
                    <a class="btn btn-warning mt-2 w-100" href='/crear-categoria'>Agregar Categoria</a>
                </div>
                <div class="col">
                    <a class="btn btn-warning mt-2 w-100" href='/crear-producto'>Agregar Artículo</a>
                </div>
                <div class="col">
                    <a class="btn btn-warning mt-2 w-100" href='/crear-variante'>Agregar Variante</a>
                </div>
            </div>
            <div class="card-body p-0">
                <h2 class="subtitulo-seccion fw-bold text-center my-5">Usuarios Registrados</h2>
                <div class="table-responsive">
                    <table class="table table-dark table-bordered border-warning table-hover table-striped text-center mb-0">
                        <thead class="table-warning">
                            <tr>
                                <th class="py-3 border-bottom-2">Ícono</th>
                                <th class="py-3 border-bottom-2">Nombre</th>
                                <th class="d-none d-md-table-cell py-3 border-bottom-2">Costo</th>
                                <th class="d-none d-md-table-cell py-3 border-bottom-2">Rol</th>
                                <th class="d-none d-md-table-cell py-3 border-bottom-2">Cambiar Rol</th>
                            </tr>
                        </thead>
                        <tbody class="text-secondary text-nowrap ">
                            @foreach($usuarios as $usuario)
                            <tr>
                                <td class="py-3">{{ $usuario->name }}</td>
                                <td class="d-none d-md-table-cell py-3">{{ $usuario->lastname }}</td>
                                <td class="d-none d-md-table-cell py-3">{{ $usuario->email }}</td>
                                <td class="d-none d-md-table-cell py-3">{{ $usuario->role }}</td>
                                <td class="d-none d-md-table-cell py-3">
                                    <!-- Accion directa de cambio de Rol de Usuario -->
                                    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select form-control" id="role" name="role" required>
                                            <option value="" disabled selected>Seleccionar</option>
                                            <option value="admin">admin</option>
                                            <option value="customer">customer</option>
                                        </select>
                                        <button type="submit" class="btn btn-warning">Cambiar Rol</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection