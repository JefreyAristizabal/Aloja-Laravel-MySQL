<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <title>Recuperar contraseña | Aloja</title>
    <style>
      body {
        font-family: 'Poppins', sans-serif;
        background-image: linear-gradient(to right, rgba(89, 2, 2, 0.7), rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)),
                          url('{{ Vite::asset('resources/img/bg-login.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
      }

      input:-webkit-autofill,
      input:-webkit-autofill:hover,
      input:-webkit-autofill:focus,
      input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0px 1000px transparent inset !important;
        -webkit-text-fill-color: #ffffff !important;
        caret-color: white;
        background-color: transparent !important;
        transition: background-color 9999s ease-out 0s;
        color: #ffffff !important;
      }

      input:focus {
        color: #ffffff !important;
      }
    </style>
  </head>
  <body class="min-h-screen flex flex-col items-center justify-center">

    <!-- Logo -->
    <div class="absolute top-0 left-0 w-full flex items-center justify-between p-4 z-30 cursor-pointer" onclick="window.open('../index.php', '_self')">
      <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo" class="max-w-[70px]" />
    </div>

    <!-- Formulario recuperación -->
    <section class="relative max-w-md w-full bg-transparent border-2 border-white/50 rounded-2xl backdrop-blur-lg p-8 sm:mt-0 mt-24">
      <form action="{{ route('recuperar.reset') }}" method="post" class="flex flex-col gap-4">
        @csrf
        <h1 class="text-2xl text-white text-center font-semibold">Recuperar contraseña</h1>
        <p class="text-white text-sm text-center mb-2">
          Ingresa tu usuario y nombre completo
        </p>

        <!-- Usuario -->
        <div class="relative mt-2">
          <input
            type="text"
            name="user"
            id="user"
            required
            placeholder=" "
            class="peer w-full h-14 bg-transparent border-b-2 border-white text-white text-base px-2 placeholder-transparent focus:outline-none"
          />
          <label
            for="user"
            class="absolute left-2 text-white text-sm top-[-10px] transition-all duration-300
                   peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:-translate-y-1/2
                   peer-focus:top-[-10px] peer-focus:text-sm peer-focus:-translate-y-0"
          >
            Usuario
          </label>
          <ion-icon name="person-outline" class="absolute right-2 top-5 text-white text-lg"></ion-icon>
        </div>

        <!-- Nombre completo -->
        <div class="relative mt-4">
          <input
            type="text"
            name="nombre"
            id="nombre"
            required
            placeholder=" "
            class="peer w-full h-14 bg-transparent border-b-2 border-white text-white text-base px-2 placeholder-transparent focus:outline-none"
          />
          <label
            for="nombre"
            class="absolute left-2 text-white text-sm top-[-10px] transition-all duration-300
                   peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:-translate-y-1/2
                   peer-focus:top-[-10px] peer-focus:text-sm peer-focus:-translate-y-0"
          >
            Nombre completo
          </label>
          <ion-icon name="person-circle-outline" class="absolute right-2 top-5 text-white text-lg"></ion-icon>
        </div>

        <!-- Botón -->
        <button
          type="submit"
          class="w-full h-10 mt-6 rounded-full bg-white text-black font-semibold transition duration-300 hover:bg-white/50"
        >
          Recuperar
        </button>

        <a href="{{ route('login.form') }}" class="text-sm text-white text-center mt-3 hover:underline block">
          ← Volver a iniciar sesión
        </a>
      </form>
    </section>

    <!-- Scripts -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>
