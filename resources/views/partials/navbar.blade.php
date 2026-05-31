<!-- Componente del navbar -->
<nav class="navbar navbar-expand-lg navbar-plomada">
  <div class="container-fluid d-flex justify-content-center">
      <!-- request()->is('/') ? pregunta si la si es la ruta raiz para incluir
        la clase nav-active que señala con un estilo distinto en que sección se
        encuentra el usuario -->
      <a class="navbar-brand mb-1  {{ request()->is('/') ? 'nav-active' : ''}}" href="/">La plomada</a>
      <button class="navbar-toggler position-absolute end-0" data-as-theme="white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Botones que irán dentro del menu colapsable -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
        <div class="navbar-nav text-center" >
          <!-- request para agregar una clase que cambia el estilo según ruta -->
          <a class="nav-link {{ request()->is('quienes-somos') ? 'nav-active' : ''}}" href="/quienes-somos">Quienes Somos</a>
          <a class="nav-link {{ request()->is('comercio') ? 'nav-active' : ''}}" href="/comercio" >Comercializacion</a>
          <a class="nav-link {{ request()->is('productos') ? 'nav-active' : ''}}" href="/productos" >Catálogo</a>
          <a class="nav-link {{ request()->is('terms') ? 'nav-active' : ''}}" href="/terms">Terminos y condiciones</a>
          <a class="nav-link {{ request()->is('contactanos') ? 'nav-active' : ''}}" href="/contactanos">Contacto</a>
          
          <!-- se verifica que haya una sesión activa, sino muestra el botón de iniciar sesión -->
          @auth
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="nav-link text-borderline-danger">Cerrar Sesión</button>
            </form>
          @else
            <a class="nav-link text-warning" href="/iniciar-sesion">
            <i class="bi bi-person-lock"></i>Iniciar Sesión</a>
          @endauth
        </div>
      </div>
  </div>
</nav>