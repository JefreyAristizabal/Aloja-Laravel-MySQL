<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css">
        <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="shortcut icon" href="{{ Vite::asset('resources/img/logo.png') }}
    " type="image/x-icon">
    @vite(['resources/js/admin.js'])
    <title>Admin | Aloja</title>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
        <a
          class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
          style="position:absolute;"
          href="/"
          ><img src="{{ Vite::asset('resources/img/logo.png') }}" alt="" style="max-width:50px;"></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#topNavBar"
          aria-controls="topNavBar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2 text-white"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.cambiar_contraseña') }}">Cambiar contraseña</a></li>
                <li>
                  <a class="dropdown-item" href="/logout">Cerrar sesión</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav"
      tabindex="-1"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <div class="small fw-bold text-uppercase px-3 text-white">
                Principal
              </div>
            </li>
            <li>
              <a href="{{ route('admin.panel') }}" class="nav-link px-3 active text-white">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Panel</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-white small fw-bold text-uppercase px-3 mb-3">
                Interface
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link text-white"
                data-bs-toggle="collapse"
                href="#layouts-1"
              >
                <span class="me-2"><i class="bi bi-book"></i></span>
                <span>Estadías</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts-1">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="{{ route('admin.estadias.index') }}" class="nav-link px-3 text-white">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Tabla de Estadias</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('admin.estadias.create') }}" class="nav-link px-3 text-white">
                      <span class="me-2"><i class="bi bi-plus"></i></span>
                      <span>Agregar Estadía</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link text-white"
                data-bs-toggle="collapse"
                href="#layouts-2"
              >
                <span class="me-2"><i class="bi bi-person"></i></span>
                <span>Huespedes</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts-2">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="?section=tabla/tabla_huesped" class="nav-link px-3 text-white">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Tabla de Huespedes</span>
                    </a>
                  </li>
                  <li>
                    <a href="?section=agregar/agregar_huesped" class="nav-link px-3 text-white">
                      <span class="me-2"><i class="bi bi-plus"></i></span>
                      <span>Agregar Huesped</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link text-white"
                data-bs-toggle="collapse"
                href="#layouts-7"
              >
                <span class="me-2"><i class="bi bi-file-earmark-spreadsheet"></i></span>
                <span>Huesped x Estadía</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts-7">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="?section=tabla/tabla_huespedxestadia" class="nav-link px-3 text-white">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Tabla de Huesped x Estadía</span>
                    </a>
                  </li>
                  <li>
                    <a href="?section=agregar/agregar_huespedxestadia" class="nav-link px-3 text-white">
                      <span class="me-2"><i class="bi bi-plus"></i></span>
                      <span>Agregar Huesped x Estadía</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link text-white"
                data-bs-toggle="collapse"
                href="#layouts-3"
              >
                <span class="me-2"><i class="bi bi-briefcase"></i></span>
                <span>Empleados</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts-3">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="?section=tabla/tabla_empleado" class="nav-link px-3 text-white">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Tabla de Empleados</span>
                    </a>
                  </li>
                  <li>
                    <a href="?section=agregar/agregar_empleado" class="nav-link px-3 text-white">
                      <span class="me-2"><i class="bi bi-plus"></i></span>
                      <span>Agregar Empleado</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link text-white"
                data-bs-toggle="collapse"
                href="#layouts-4"
              >
                <span class="me-2"><i class="bi bi-house"></i></span>
                <span>Habitaciones</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts-4">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="?section=tabla/tabla_habitacion" class="nav-link px-3 text-white">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Tabla de Habitaciones</span>
                    </a>
                  </li>
                  <li>
                    <a href="?section=agregar/agregar_habitacion" class="nav-link px-3 text-white">
                      <span class="me-2"><i class="bi bi-plus"></i></span>
                      <span>Agregar Habitación</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link text-white"
                data-bs-toggle="collapse"
                href="#layouts-5"
              >
                <span class="me-2"><i class="bi bi-wallet"></i></span>
                <span>Tarifas</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts-5">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="?section=tabla/tabla_tarifa" class="nav-link px-3 text-white">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Tabla de Tarifas</span>
                    </a>
                  </li>
                  <li>
                    <a href="?section=agregar/agregar_tarifa" class="nav-link px-3 text-white">
                      <span class="me-2"><i class="bi bi-plus"></i></span>
                      <span>Agregar Tarifa</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link text-white"
                data-bs-toggle="collapse"
                href="#layouts-6"
              >
                <span class="me-2"><i class="bi bi-cash"></i></span>
                <span>Pagos</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts-6">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="?section=tabla/tabla_pago" class="nav-link px-3 text-white">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Tabla de Pagos</span>
                    </a>
                  </li>
                  <li>
                    <a href="?section=agregar/agregar_pago" class="nav-link px-3 text-white">
                      <span class="me-2"><i class="bi bi-plus"></i></span>
                      <span>Agregar Pago</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link text-white"
                data-bs-toggle="collapse"
                href="#layouts-8"
              >
                <span class="me-2"><i class="bi bi-exclamation-circle"></i></span>
                <span>Novedades</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts-8">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="?section=tabla/tabla_novedad" class="nav-link px-3 text-white">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Tabla de Novedades</span>
                    </a>
                  </li>
                  <li>
                    <a href="?section=agregar/agregar_novedad" class="nav-link px-3 text-white">
                      <span class="me-2"><i class="bi bi-plus"></i></span>
                      <span>Agregar Novedad</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      @yield('content')
    </main>
    <script>
    document.addEventListener('click', function (event) {
      const trigger = event.target.closest('[data-bs-toggle="modal"][data-bs-target="#imagenModal"]');
      if (!trigger) return;
    
      const imageUrl = trigger.getAttribute('data-img');
      const modalImg = document.getElementById('imagenModalSrc');
    
      if (imageUrl && modalImg) {
        modalImg.src = imageUrl;
        console.log("Imagen cargada:", imageUrl);
      } else {
        console.warn("No se pudo cargar la imagen.");
      }
    });

    // Limpieza opcional
    document.addEventListener('hidden.bs.modal', function (event) {
      if (event.target.id === 'imagenModal') {
        const modalImg = document.getElementById('imagenModalSrc');
        if (modalImg) modalImg.src = '';
      }
    });
    </script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <style>
    .dataTables_length select.form-select {
      padding-right: 0.5rem !important;
      min-width: 52px;
    }
    .dataTables_wrapper .dataTables_paginate {
      display: flex;
      justify-content: flex-end;
      margin-top: 1rem;
    }
    .dataTables_wrapper .paginate_button {
      display: inline-block;
      padding: 0.35rem 0.75rem;
      margin: 0 2px;
      font-size: 0.875rem;
      color: #4e54c8 !important;
      background-color: transparent;
      border: 1px solid #dee2e6;
      border-radius: 0.375rem;
      transition: all 0.2s ease-in-out;
    }
    .dataTables_wrapper .paginate_button:hover {
      background-color: #e9ecef !important;
      color: #4e54c8 !important;
      border-color: #ced4da !important;
      cursor: pointer;
    }
    .dataTables_wrapper .paginate_button.current {
      background-color: #4e54c8 !important;
      color: #fff !important;
      border: 1px solid #4e54c8 !important;
    }
    .dataTables_wrapper .paginate_button:active {
      box-shadow: none !important;
      outline: none !important;
    }
    </style>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons + Bootstrap + HTML5 -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>

    <!-- Dependencias de exportación -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ Vite::asset('resources/js/tablas.js') }}"></script>
  </body>
</html>
