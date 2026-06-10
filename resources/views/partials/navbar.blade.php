<!-- Componente del navbar -->
<nav class="navbar navbar-expand-lg navbar-plomada">
  <div class="container-fluid d-flex justify-content-center">
      <!-- request()->is('/') ? pregunta si la si es la ruta raiz para incluir
        la clase nav-active que señala con un estilo distinto en que sección se
        encuentra el usuario -->
      <a class="navbar-brand mb-1 nav-active" href="/">La plomada</a>
      <button class="navbar-toggler position-absolute end-0" data-as-theme="white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Botones que irán dentro del menu colapsable -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
        <div class="navbar-nav text-center" >
          @auth
            <!-- si esta autenticado y es admin -->
            @if(optional(Auth::user())->rol == 'admin')
              <a class="nav-link {{ request()->is('panel-control') ? 'nav-active' : ''}}" href="/panel-control"><i class="bi bi-gear"></i> Panel de Control</a>
              <a class="nav-link {{ request()->is('productos') ? 'nav-active' : ''}}" href="/productos" >Catálogo</a>
              <form method="POST" action="{{ route('logout') }}" class="d-inline">
              @csrf
              <a class="nav-link text-danger" href="javascript:void(0)" onclick="event.preventDefault(); this.closest('form').submit();"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a>
              </form>
            @else
            <!-- request para agregar una clase que cambia el estilo según ruta -->
            <a class="nav-link {{ request()->is('quienes-somos') ? 'nav-active' : ''}}" href="/quienes-somos">Quienes Somos</a>
            <a class="nav-link {{ request()->is('comercio') ? 'nav-active' : ''}}" href="/comercio" >Comercializacion</a>
            <a class="nav-link {{ request()->is('productos') ? 'nav-active' : ''}}" href="/productos" >Catálogo</a>
            <a class="nav-link {{ request()->is('terms') ? 'nav-active' : ''}}" href="/terms">Terminos y condiciones</a>
            <a class="nav-link {{ request()->is('contactanos') ? 'nav-active' : ''}}" href="/contactanos">Contacto</a>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mi Cuenta
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Mis compras</a></li>
                <li><a class="dropdown-item" href="/profile">Editar perfil</a></li>
                
                <li><hr class="dropdown-divider"></li>
                
                <li>
                  <form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">
                    @csrf
                  </form>
                  <a class="dropdown-item text-danger" href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                  </a>
                </li>
              </ul>
            </li>
            <a class="nav-link mx-2" href="#">
                <i class="bi bi-cart3 fs-5"></i>
            </a>        
            @endif
          @else
          <!-- request para agregar una clase que cambia el estilo según ruta -->
          <a class="nav-link {{ request()->is('quienes-somos') ? 'nav-active' : ''}}" href="/quienes-somos">Quienes Somos</a>
          <a class="nav-link {{ request()->is('comercio') ? 'nav-active' : ''}}" href="/comercio" >Comercializacion</a>
          <a class="nav-link {{ request()->is('productos') ? 'nav-active' : ''}}" href="/productos" >Catálogo</a>
          <a class="nav-link {{ request()->is('terms') ? 'nav-active' : ''}}" href="/terms">Terminos y condiciones</a>
          <a class="nav-link {{ request()->is('contactanos') ? 'nav-active' : ''}}" href="/contactanos">Contacto</a>
          
          <li class="nav-item">
            <a class="nav-link text-warning" href="{{ route('login') }}">
              <i class="bi bi-person-lock"></i> Iniciar Sesión
            </a>
          </li>
          @endauth
        </div>
      </div>
  </div>
</nav>