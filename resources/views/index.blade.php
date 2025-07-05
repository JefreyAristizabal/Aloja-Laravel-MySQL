<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="">
  <meta name="keywords" content="app, landing, corporate, Creative, Html Template, Template">
  <meta name="author" content="web-themes">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
  integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  @vite(['resources/js/index.js'])
  <style>
    .dropdown-menu.user-dropdown-fix {
      margin-left: -1rem;
    }

  .nav-link.login:hover,
  .nav-link.login:focus {
    color: white !important;
    text-decoration: none !important;
  }

  .nav-link.login:focus {
    outline: none !important;
    box-shadow: none !important;
  }

  .login {
    padding: 0.4rem !important;
    display: flex !important;
    align-items: center !important;
    gap: 1rem !important;
    font-weight: 600 !important;
    color: var(--white) !important;
    background-color: var(--primary-color) !important;
    border-radius: 100% !important;
    cursor: pointer !important;
    transition: 0.3s !important;
    text-decoration: none !important;
  }

  .login:hover {
    background-color: var(--secondary-color) !important;
  }

  .login span {
    padding: 1.3rem !important;
    font-size: 1.5rem !important;
    color: var(--primary-color) !important;
    background-color: var(--white) !important;
    border-radius: 100% !important;
    display: inline-flex !important;
    align-items: center !important; 
    justify-content: center !important;
    height: 2rem !important;
    width: 2rem !important; 
  }

  .nav-item {
    display: flex !important;
    align-items: center !important;
  }

  .navbar-nav {
    display: flex !important;
    align-items: center !important;
  }

  #btnTop {
    position: fixed;
    background-color: var(--primary-color);
    bottom: 40px;
    right: 40px;
    z-index: 1000;
    display: none;
  }
  </style>
  <title>Aloja</title>
</head>

<body>
  <div class="container">
  <nav class="navigation">
    <div class="nav__logo" onclick="window.open('{{ url('/') }}', '_self')">
    <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo" />
    </div>
    <ul class="nav__links">
    <li class="link-nav"><a href="#habitaciones">Habitaciones</a></li>
    <li class="link-nav"><a href="#nuestros-servicios">Nuestros Servicios</a></li>
    <li class="link-nav"><a href="#contactanos">Contáctanos</a></li>
    <li class="link-nav"><a href="#sobre-nosotros">Sobre Nosotros</a></li>
    </ul>
    @php
      $usuario = session('usuario');
      $rol = session('rol');
    @endphp

    @if ($usuario && $rol)
      <ul class="navbar-nav d-flex">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle login" style="border-radius: 3rem !important;padding: 0.4rem !important;gap: 0 !important;"
            href="#"
            id="userDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false">
            <span style="padding: 1.3rem !important;"><i class="ri-user-3-fill"></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end user-dropdown-fix" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Perfil</a>
            <a class="dropdown-item" href="{{ route('admin.cambiar_contraseña') }}">Cambiar contraseña</a>

            @if ($rol === 'ADMIN')
              <a class="dropdown-item" href="{{ route('admin.panel') }}">Interfaz de admin</a>
            @elseif ($rol === 'EMPLEADO')
              <a class="dropdown-item" href="{{ route('empleado.panel') }}">Interfaz de Empleado</a>
            @endif

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ url('logout') }}">Cerrar sesión</a>
          </div>
        </li>
      </ul>
    @else
      <div class="login" onclick="window.open('{{ url('login') }}', '_self')">
        <span><i class="ri-user-3-fill"></i></span>
      </div>
    @endif
  </nav>
  <nav class="second-nav">
    <ul class="nav__links-2">
    <li class="link-nav"><a href="#habitaciones">Habitaciones</a></li>
    <li class="link-nav"><a href="#nuestros-servicios">Nuestros Servicios</a></li>
    <li class="link-nav"><a href="#contactanos">Contáctanos</a></li>
    <li class="link-nav"><a href="#sobre-nosotros">Sobre Nosotros</a></li>
    </ul>
  </nav>
  <div class="destination__container">
    <img class="bg__img__1" src="{{ Vite::asset('resources/img/bg-dots.png') }}" alt="bg" />
    <img class="bg__img__2" src="{{ Vite::asset('resources/img/bg-arrow.png') }}" alt="bg" />
    <div class="socials">
    <span><i class="ri-twitter-fill"></i></span>
    <span><i class="ri-facebook-fill"></i></span>
    <span><i class="ri-instagram-line"></i></span>
    <span><i class="ri-youtube-fill"></i></span>
    </div>
    <div class="content">
    <h1>EXPLORA<br />RESERVA<br /><span>DISFRUTA</span></h1>
    <p>
      Aloja conecta viajeros con anfitriones, ofreciendo alojamientos únicos,
      seguros y accesibles en todo el mundo.
      Con un sistema de reservas fácil y confiable,
      te garantizamos una experiencia auténtica y cómoda en cada destino.
    </p>
    <button class="btn-ini" onclick="location.href='#contactanos'">Contáctanos Ahora</button>
    </div>

    <div class="destination__grid">
    @foreach($habitacionesDestacadas as $habitacion)
    <div class="destination__card">
      <img src="{{ Vite::asset('resources/' . $habitacion->IMAGEN) }}" alt="Habitación" />
      <div class="card__content">
      <h4>{{ $habitacion->NOMBRE }}</h4>
      <p>
        {{ $habitacion->DESCRIPCION }}
      </p>
      <button class="btn-ini" onclick="location.href='#habitaciones'">Ver Más</button>
      </div>
    </div>
    @endforeach
    </div>
  </div>
  </div>
  <div class="content-2" id="sobre-nosotros">
  <div class="aloja-alojamientos">
    <h2>Aloja</h2>
    <p>
    En Aloja, ofrecemos una selección de alojamientos ideales para todo tipo de viajeros, desde modernos
    apartamentos en el centro de la ciudad y acogedoras casas familiares en barrios tranquilos hasta cabañas
    rústicas en la montaña y villas de lujo con piscina. También contamos con estudios funcionales para estancias
    cortas y habitaciones privadas en hostales para quienes buscan opciones más accesibles.
    </p>
  </div>
  <section class="section__container">
    <h2>Testimonials</h2>
    <h1>What our customers say</h1>
    <div class="section__grid">
    <div class="section__card">
      <span><i class="ri-double-quotes-l"></i></span>
      <h4>Love the simplicity</h4>
      <p>
      They understood our brand and created a stunning website design.
      Professional, responsive, and on-time delivery. Highly recommended!
      </p>
      <img src="{{ Vite::asset('resources/img/reviews/user-1.jpg') }}" alt="user" />
      <h5>Allan Collins</h5>
      <h6>Managing Director</h6>
    </div>
    <div class="section__card">
      <span><i class="ri-double-quotes-l"></i></span>
      <h4>Excellent Designs</h4>
      <p>
      Efficient, reliable, and results-oriented. Visually appealing
      website, improved online visibility. Highly recommended!
      </p>
      <img src="{{ Vite::asset('resources/img/reviews/user-2.jpg') }}" alt="user" />
      <h5>Tanya Grant</h5>
      <h6>Ceo & Founder</h6>
    </div>
    <div class="section__card">
      <span><i class="ri-double-quotes-l"></i></span>
      <h4>Efficient and Reliable</h4>
      <p>
      Best decision we made. Stunning website, exceptional support. Always
      available and prompt issue resolution. Hassle-free experience!
      </p>
      <img src="{{ Vite::asset('resources/img/reviews/user-3.jpg') }}" alt="user" />
      <h5>Clay Washington</h5>
      <h6>Fashion Designer</h6>
    </div>
    </div>
  </section>
  <div class="container-carousel my-5">
    <h2 class="mb-4 title-carousel">Destinos más populares</h2>
    <div class="slider-container">
    <button class="slider-btn left" id="prevBtn"><i class="bi bi-chevron-left"></i></button>
    <div class="slider-track " id="sliderTrack" style="transform: translateX(0px);">
      <div class="slider-item card">
      <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/11/eb/1f/cb/outdoor-pool.jpg?w=1200&amp;h=-1&amp;s=1" class="card-img-top" alt="Barranquilla">
      <div class="card-body">
        <h5 class="card-title">Barranquilla</h5>
      </div>
      </div>
      <div class="slider-item card">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkZ39An4RTUPbiVKwybrn07AB7NPegEA4XOQ&amp;s" class="card-img-top" alt="Santa Marta">
      <div class="card-body">
        <h5 class="card-title">Santa Marta</h5>
      </div>
      </div>
      <div class="slider-item card">
      <img src="https://image-tc.galaxy.tf/wijpeg-31cp8djaxhqlkidjc7eqxhmcf/imagen-principal-jpg-2.jpg?width=1920" class="card-img-top" alt="París">
      <div class="card-body">
        <h5 class="card-title">París</h5>
      </div>
      </div>
      <div class="slider-item card">
      <img src="https://media.staticontent.com/media/pictures/32546000-d18a-4f9c-a379-6fcbd8fc3982/378x200?op=NONE&amp;enlarge=false&amp;gravity=ce_0_0&amp;quality=80" class="card-img-top" alt="Villa de Leyva">
      <div class="card-body">
        <h5 class="card-title">Villa de Leyva</h5>
      </div>
      </div>
      <div class="slider-item card">
      <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/501583198.jpg?k=cab318a4d36b870776abfb8eeaa2d78311d63ea9897e4e03d5cfeb84fe5b5641&amp;o=&amp;hp=1" class="card-img-top" alt="Villa de Leyva">
      <div class="card-body">
        <h5 class="card-title">Villa de Leyva</h5>
      </div>
      </div>
      <div class="slider-item card">
      <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/501583198.jpg?k=cab318a4d36b870776abfb8eeaa2d78311d63ea9897e4e03d5cfeb84fe5b5641&amp;o=&amp;hp=1" class="card-img-top" alt="Villa de Leyva">
      <div class="card-body">
        <h5 class="card-title">Villa de Leyva</h5>
      </div>
      </div>
      <div class="slider-item card">
      <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/501583198.jpg?k=cab318a4d36b870776abfb8eeaa2d78311d63ea9897e4e03d5cfeb84fe5b5641&amp;o=&amp;hp=1" class="card-img-top" alt="Villa de Leyva">
      <div class="card-body">
        <h5 class="card-title">Villa de Leyva</h5>
      </div>
      </div>
    </div>
    <button class="slider-btn right" id="nextBtn"><i class="bi bi-chevron-right"></i></button>
    </div>
  </div>
  <script>
    // ... (igual que antes)
    const sliderContainer = document.querySelector('.slider-container');
    const sliderTrack = document.getElementById('sliderTrack');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let isMouseDown = false;
    let startX;
    let currentPosition = 0;
    let scrollLeft;
    function clampPosition() {
    const containerWidth = sliderContainer.offsetWidth;
    const trackWidth = sliderTrack.scrollWidth;
    if (-currentPosition > trackWidth - containerWidth) {
      currentPosition = -(trackWidth - containerWidth);
    }
    if (currentPosition > 0) {
      currentPosition = 0;
    }
    sliderTrack.style.transform = `translateX(${currentPosition}px)`;
    }
    nextBtn.addEventListener('click', () => {
    currentPosition -= 260;
    clampPosition();
    });
    prevBtn.addEventListener('click', () => {
    currentPosition += 260;
    clampPosition();
    });
    window.addEventListener('resize', clampPosition);
    function handleDragStart(e) {
    isMouseDown = true;
    startX = e.pageX || e.touches[0].pageX;
    scrollLeft = currentPosition;
    sliderContainer.style.cursor = 'grabbing';
    e.preventDefault();
    }
    function handleDragMove(e) {
    if (!isMouseDown) return;
    const x = e.pageX || e.touches[0].pageX;
    const walk = (x - startX);
    currentPosition = scrollLeft + walk;
    clampPosition();
    }
    function handleDragEnd() {
    isMouseDown = false;
    sliderContainer.style.cursor = 'default';
    }
    sliderContainer.style.cursor = 'default';
    sliderContainer.addEventListener('mousedown', handleDragStart);
    sliderContainer.addEventListener('mousemove', handleDragMove);
    sliderContainer.addEventListener('mouseup', handleDragEnd);
    sliderContainer.addEventListener('mouseleave', handleDragEnd);
    sliderContainer.addEventListener('touchstart', handleDragStart);
    sliderContainer.addEventListener('touchmove', handleDragMove);
    sliderContainer.addEventListener('touchend', handleDragEnd);
    sliderContainer.addEventListener('touchcancel', handleDragEnd);
  </script>
  <div class="card_wrapper" id="habitaciones">
    <div class="container-carousel">
      <div class="row">
        <div class="col-12 text-center">
          <h2 class="head_text">Habitaciones Destacadas</h2>
          <p class="head_para">Aenean at ligula massa. Donec ipsum elit, placenta sed duierrut<br> dapibus semper turpin Fusce nec premium nuns.</p>
        </div>
        <div class="col-12">
          <div class="owl-carousel slider_carousel">
            @foreach($habitaciones as $habitacion)
            <div class="card_box">
              <img class="img-fluid w-100" src="{{ Vite::asset('resources/' . $habitacion->IMAGEN) }}" alt="Habitación">
              <div class="card_text">
                <h4>{{ $habitacion->NOMBRE }}</h4>
                <p>Capacidad: {{ $habitacion->CAPACIDAD }} Personas</p>
                @php
                  $precioSeguro = is_numeric($habitacion->PRECIO ?? null)
                    ? number_format($habitacion->PRECIO, 0, ',', '.')
                    : '0';
                @endphp
                <button class="btn btn-danger deep-red mt-2" onclick='abrirModalHabitacion(
                  @json($habitacion->NOMBRE),
                  @json($habitacion->DESCRIPCION),
                  @json($precioSeguro),
                  @json(Vite::asset('resources/' . $habitacion->IMAGEN)),
                  @json($habitacion->CAPACIDAD),
                  @json($habitacion->MODALIDAD)
                )'>Ver Detalles</button>
                <style>
                  .btn.deep-red {
                  background-color: #a00000 !important;
                  border-color: #a00000 !important;
                  }
                  .btn.deep-red:hover {
                  background-color: #870000 !important;
                  border-color: #870000 !important;
                  }
                </style>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="habitacionModal" tabindex="-1" role="dialog" aria-labelledby="habitacionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-narrow" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="habitacionModalLabel" style="color: #920000;">Nombre habitación</h5>
      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cerrar">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
      <img id="imagenHabitacion" src=""
         class="img-fluid w-100 rounded mb-3 border border-danger d-block"
         alt="Imagen habitación"
         style="object-fit: contain; height: auto; max-height: 400px;">
      <p><strong style="color: #920000;">Descripción: </strong><span id="descHabitacion"></span></p>
      <p><strong style="color: #920000;">Precio: </strong><span id="precioHabitacion"></span> Por <span id="modalidadHabitacion"></span></p>
      <p><strong style="color: #920000;">Capacidad: </strong><span id="capacidadHabitacion"></span> personas</p>
      <p>Contáctanos para saber más</p>
      </div>
    </div>
    </div>
  </div>

  <style>
    .modal-narrow {
    max-width: 400px;
    width: 100%;
    }
  </style>

  <script>
    function abrirModalHabitacion(nombre, descripcion, precio, imagen, capacidad, modalidad) {
    document.getElementById('habitacionModalLabel').textContent = nombre;
    document.getElementById('descHabitacion').textContent = descripcion;
    document.getElementById('precioHabitacion').textContent = precio;
    document.getElementById('imagenHabitacion').src = imagen;
    document.getElementById('capacidadHabitacion').textContent = capacidad;
    document.getElementById('modalidadHabitacion').textContent = modalidad;
    $('#habitacionModal').modal('show');
    }
  </script>
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script>
    function slider_carouselInit() {
      $('.owl-carousel.slider_carousel').owlCarousel({
        dots: false,
        loop: false,
        margin: 15,
        stagePadding: 35,
        autoplay: false,
        nav: true,
        navText: ["<i class='far fa-arrow-alt-circle-left'></i>","<i class='far fa-arrow-alt-circle-right'></i>"],
        autoplayTimeout: 1500,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1
          },
          768: {
            items: 3
          },
          992: {
            items: 4
          }
        }
      });
    }
    slider_carouselInit();
  </script>
  <h1 class="title-services" id="nuestros-servicios">Nuestros Servicios</h1>
  <div class="services">
    <div class="services-grid">
    <div class="services-item">
      <div class="services-icon"><i class="fa-solid fa-wifi"></i><h2>Wi-Fi</h2></div>
      <p>Conéctate sin problemas en todo el hotel con nuestro internet de alta velocidad, disponible en todas las áreas.</p>
    </div>
    <div class="services-item">
      <div class="services-icon"><i class="fa-solid fa-tv"></i><h2>Televisión</h2></div>
      <p>Disfruta de una selección de canales nacionales e internacionales en tu habitación para un entretenimiento completo.</p>
    </div>
    <div class="services-item">
      <div class="services-icon"><i class="fa-solid fa-shirt"></i><h2>Lavandería</h2></div>
      <p>Ofrecemos servicio de lavandería y planchado, con opciones exprés para tu comodidad.</p>
    </div>
    <div class="services-item">
      <div class="services-icon"><i class="fa-solid fa-bowl-food"></i><h2>Alimentación</h2></div>
      <p>Deléitate con opciones gastronómicas frescas y deliciosas, desde un desayuno buffet hasta cenas gourmet. También ofrecemos servicio a la habitación.</p>
    </div>
    </div>
  </div>
  </div>
  <footer id="contactanos">
  <div class="row">
    <div class="col-footer">
    <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="Logo" class="logo-footer">
    <p>Aloja te conecta con los mejores alojamientos, desde acogedoras cabañas hasta modernos apartamentos, para que
      disfrutes de una estancia única y cómoda en cualquier destino.</p>
    </div>
    <div class="col-footer">
    <h3>Office <div class="underline"><span></span></div>
    </h3>
    <p>ITPL Road</p>
    <p>Withefield, Bangalore</p>
    <p>Karnataka, PIN 560066, India</p>
    <p class="email-id">jefreyarisprecian@gmail.com</p>
    <h4>+57 - 3185173933</h4>
    </div>
    <div class="col-footer">
    <h3>Links <div class="underline"><span></span></div>
    </h3>
    <ul>
      <li><a href="">Inicio</a></li>
      <li><a href="">Habitaciones</a></li>
      <li><a href="">Contáctanos</a></li>
      <li><a href="">Sobre Nosotros</a></li>
    </ul>
    </div>
    <div class="col-footer">
    <h3>Redes Sociales <div class="underline"><span></span></div>
    </h3>
    <div class="social-icons-footer">
      <i class="fa-brands fa-facebook-f"></i>
      <i class="fa-brands fa-twitter"></i>
      <i class="fa-brands fa-whatsapp"></i>
      <i class="fa-brands fa-instagram"></i>
    </div>
    </div>
    <hr class="footer-line">
    <p class="copyright">Aloja &copy; 2025 - Todos Los Derechos Reservados</p>
  </div>
  </footer>
  <!-- Botón scroll up -->
  <button id="btnTop" class="btn rounded-circle">
  <span><i class="bi bi-chevron-up text-white" style="padding: 0rem !important;"></i></span>
  </button>
  <script src="https://kit.fontawesome.com/472897ad37.js" crossorigin="anonymous"></script>
  <script>
  const btnTop = document.getElementById("btnTop");
  window.onscroll = () => {
    btnTop.style.display = (document.documentElement.scrollTop > 600) ? "block" : "none";
  };
  btnTop.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
  </script>
</body>

</html>
