<!-- Página principal donde se inicializa el encabezado
    y dónde se incluyen los componentes parciales que son
    iguales para todas las rutas. Será como el "padre" del 
    del cual se extiendan las demas vistas.
 -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/ico" href="{{ asset('laplomada-icon.ico') }}">
  <title>La Plomada - @yield('title')</title>
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/quienes-somos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/contactanos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/comercio.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">

  @include('partials.navbar') <!-- Incluye el componente armado navbar -->

  <main class="flex-grow-1 fondo" >
    <!-- Es como un campo vacío donde se renderizaran
      los componentes segun las rutas -->
    @yield('content') 
    
  </main>

  @include('partials.footer') <!-- Incluye el componente armado navbar -->

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>