@extends('app') <!-- Lo siguiente se extiende del padre app -->
@section('title', 'Carrito')

@section('content')
<div class="container my-5">
    <h2 class="mb-4"><i class="bi bi-cart3"></i> Mis compras</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    
</div>


@endsection