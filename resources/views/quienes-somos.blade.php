@extends('app') <!-- Se extiende del padre app -->

@section('title', 'Quiénes Somos')
@section('content')
    <section class="text-white d-flex align-items-center justify-content-center quienes-hero">
        <h1 class="display-5 text-center fw-bold">SOBRE NOSOTROS</h1>
    </section>
 
    <section class="py-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-success shadow-sm p-4 p-md-5">
                        <h3 class="text-success fw-bold mb-4">Nuestra Historia</h3>
                        <div class="text-muted lh-lg">
                            <p>
                                <strong>La Plomada</strong> nació de la pasión por el Paraná y el aire libre, 
                                buscando crear un espacio donde los aventureros de Corrientes y todo el país 
                                encuentren el equipo ideal.
                            </p>
                            <p>
                                Lo que empezó como un sueño entre amigos pescadores ha crecido gracias a la 
                                confianza de nuestra comunidad. Nos dedicamos a seleccionar solo lo mejor 
                                para que tu única preocupación sea disfrutar del pique.
                            </p>
                            <p>
                                Hoy, seguimos con la misma esencia: equipar tus aventuras y ayudarte a crear 
                                recuerdos inolvidables en contacto con la naturaleza.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold subtitulo-seccion mb-5">Nuestros Valores</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 border rounded-3 h-100 shadow-hover bg-light">
                        <i class="bi bi-heart-fill text-success display-5 mb-3"></i>
                        <h3 class="h5 fw-bold">Pasión por la Naturaleza</h3>
                        <p class="small text-muted">Amamos lo que hacemos y compartimos tu pasión por las actividades al aire libre.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 border rounded-3 h-100 shadow-hover bg-light">
                        <i class="bi bi-award-fill text-success display-5 mb-3"></i>
                        <h3 class="h5 fw-bold">Calidad Garantizada</h3>
                        <p class="small text-muted">Seleccionamos cuidadosamente productos de marcas reconocidas y confiables.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 border rounded-3 h-100 shadow-hover bg-light">
                        <i class="bi bi-people-fill text-success display-5 mb-3"></i>
                        <h3 class="h5 fw-bold">Comunidad</h3>
                        <p class="small text-muted">Somos más que una tienda, somos una comunidad de aventureros y pescadores.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="p-4 border rounded-3 h-100 shadow-hover bg-light">
                        <i class="bi bi-bullseye text-success display-5 mb-3"></i>
                        <h3 class="h5 fw-bold">Compromiso</h3>
                        <p class="small text-muted">Nos comprometemos con tu satisfacción y el cuidado del medio ambiente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-success text-white">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <div class="display-5 fw-bold">10+</div>
                    <div class="small opacity-75">Años de Experiencia</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="display-5 fw-bold">50K+</div>
                    <div class="small opacity-75">Clientes Satisfechos</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="display-5 fw-bold">500+</div>
                    <div class="small opacity-75">Productos</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="display-5 fw-bold">24/7</div>
                    <div class="small opacity-75">Atención</div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold subtitulo-seccion mb-4">Un Equipo Apasionado</h2>
            <div class="card border-0 shadow-sm p-4 max-w-700 mx-auto">
                <p class="text-muted mb-0">
                    No somos solo vendedores, somos <strong>compañeros de aventura</strong>. 
                    Cada miembro de nuestro equipo ha probado los productos que ofrecemos y puede darte 
                    consejos basados en experiencia real.
                </p>
            </div>
        </div>
    </section>
    <section class="py-5">
    <div class="container">
        <h2 class="text-center subtitulo-seccion fw-bold mb-5">El Equipo detrás del Código</h2>
        <div class="row justify-content-center g-4">
            <div class="col-md-5 col-lg-4">
                <!-- card antonio -->
                <div class="shadow-hover card border-0 shadow-sm text-center p-4 dev-card h-100">
                    <div class="mx-auto mb-3 rounded-circle overflow-hidden shadow-sm" style="width: 140px; height: 140px; border: 4px solid #f8f9fa;">
                        <img src="{{ asset('img/devs/antonio.jpg') }}" alt="Antonio Quintana" class="w-100 h-100 object-fit-cover">
                    </div>

                    <h4 class="fw-bold mb-1">Antonio Quintana <i class="bi bi-patch-check-fill text-success"></i></h4>
                    <p class="text-success fw-semibold mb-3">Full Stack Developer</p>
                    
                    <p class="text-muted small mb-4">
                        Estudiante de Sistemas en la <strong>UNNE</strong>. Experiencia con stack <strong>MERN</strong> y la resolución de problemas complejos mediante algoritmos eficientes. Transformo ideas en soluciones funcionales para <strong>La Plomada</strong>.
                    </p>

                    <div class="mb-4">
                        <span class="badge bg-dark-subtle text-dark border ">MERN Stack</span>
                        <span class="badge bg-dark-subtle text-dark border ">PHP</span>
                        <span class="badge bg-dark-subtle text-dark border ">Data Analist</span>
                    </div>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="https://github.com/antonioQuintana" target="_blank" class="btn btn-outline-dark btn-sm rounded-circle shadow-sm" title="GitHub">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/ricardo-quintana-7b4287196" target="_blank" class="btn btn-outline-primary btn-sm rounded-circle shadow-sm" title="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <div class="position-relative d-flex flex-column align-items-center">
                            <button type="button" class="btn btn-outline-danger btn-sm rounded-circle shadow-sm" title="Email"
                                onclick="copiarEmail(this, 'quintanarijoan@gmail.com')">
                                <i class="bi bi-envelope-at"></i>
                            </button>
                            <div class="mini-toast">¡Mail copiado!</div>
                        </div>
                    </div>
                </div>
            </div>  
                <!-- card ramiro -->
            <div class="col-md-5 col-lg-4">
                <div class=" shadow-hover card border-0 shadow-sm text-center p-4 dev-card h-100">
                    <div class="mx-auto mb-3 rounded-circle overflow-hidden shadow-sm" style="width: 140px; height: 140px; border: 4px solid #f8f9fa;">
                        <img src="{{ asset('img/devs/ramiro.jpg') }}" alt="Ramiro Núñez" class="w-100 h-100 object-fit-cover">
                    </div>

                    <h4 class="fw-bold mb-1">Ramiro Núñez <i class="bi bi-patch-check-fill text-success"></i></h4>
                    <p class="text-success fw-semibold mb-3">Lead Developer & AI Specialist</p>
                    
                    <p class="text-muted small mb-4">
                        Estudiante de Sistemas en la UNNE. Experto en <strong>Python</strong> y automatización con <strong>n8n</strong>. Mi meta es innovar en el ecommerce local fusionando el código con la pasión por el aire libre.
                    </p>

                    <div class="mb-4">
                        <span class="badge bg-dark-subtle text-dark border">Python</span>
                        <span class="badge bg-dark-subtle text-dark border">JavaScript</span>
                        <span class="badge bg-dark-subtle text-dark border">n8n</span>
                    </div>

                    <div class="d-flex justify-content-center gap-3">
                        <a href="https://github.com/ramiro-nunez" target="_blank" class="btn btn-outline-dark btn-sm rounded-circle shadow-sm" title="GitHub">
                            <i class="bi bi-github"></i>
                        </a>
                        <div class="position-relative d-flex flex-column align-items-center">
                            <button type="button" class="btn btn-outline-danger btn-sm rounded-circle shadow-sm" title="Email"
                                onclick="copiarEmail(this, 'ramirosebastiann@gmail.com')">
                                <i class="bi bi-envelope-at"></i>
                            </button>
                            <div class="mini-toast">¡Mail copiado!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function copiarEmail(button, email) {
        const toast = button.parentElement.querySelector('.mini-toast');
        if (!navigator.clipboard) {
            const textarea = document.createElement('textarea');
            textarea.value = email;
            textarea.style.position = 'fixed';
            textarea.style.left = '-9999px';
            document.body.appendChild(textarea);
            textarea.focus();
            textarea.select();
            try {
                document.execCommand('copy');
            } catch (err) {
                console.error('Copy fallback failed', err);
            }
            document.body.removeChild(textarea);
            mostrarToast(toast);
            return;
        }

        navigator.clipboard.writeText(email)
            .then(() => mostrarToast(toast))
            .catch((error) => {
                console.error('No se pudo copiar el email:', error);
                mostrarToast(toast, 'No se pudo copiar el email');
            });
    }

    function mostrarToast(toast, message = '¡Mail copiado!') {
        toast.textContent = message;
        toast.classList.add('show');

        if (toast._timeout) {
            clearTimeout(toast._timeout);
        }

        toast._timeout = setTimeout(() => {
            toast.classList.remove('show');
        }, 2000);
    }
    </script>
</section>

@endsection