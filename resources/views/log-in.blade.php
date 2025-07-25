<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="shortcut icon" href="{{ Vite::asset('resources/img/logo.png') }}" type="image/x-icon">
    <title>Iniciar sesión | Aloja</title>
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

      /* Previene cambio de color en focus */
      input:focus {
        color: #ffffff !important;
      }
    </style>
  </head>
  <body class="min-h-screen flex flex-col items-center justify-center">

    <!-- Logo -->
    <div class="absolute top-0 left-0 w-full flex items-center justify-between p-4 z-30 cursor-pointer" onclick="window.open('/', '_self')">
      <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo" class="max-w-[70px]" />
    </div>

    <!-- Nav transparente superior -->
    <nav class="absolute top-0 left-0 w-full flex items-center justify-center gap-4 p-8">
    </nav>

    <nav class="hidden sm:flex"></nav>

    <!-- Formulario -->
    <section class="relative max-w-md w-full bg-transparent border-2 border-white/50 rounded-2xl backdrop-blur-lg p-8 sm:mt-0 mt-24">

      <form action="{{ route('login') }}" method="post" class="flex flex-col gap-4">
        @csrf
        <h1 class="text-2xl text-white text-center font-semibold">Iniciar sesión</h1>
      
        <!-- Subtítulo personalizado -->
        <p class="text-white text-sm text-center mb-2">
          Inicio de sesión exclusivo para el personal
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
      
        <!-- Contraseña -->
        <div class="relative mt-4">
          <input
            type="password"
            name="password"
            id="password"
            required
            placeholder=" "
            class="peer w-full h-14 bg-transparent border-b-2 border-white text-white text-base px-2 placeholder-transparent focus:outline-none"
          />
          <label
            for="password"
            class="absolute left-2 text-white text-sm top-[-10px] transition-all duration-300
                   peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:-translate-y-1/2
                   peer-focus:top-[-10px] peer-focus:text-sm peer-focus:-translate-y-0"
          >
            Contraseña
          </label>
          <ion-icon name="lock-closed-outline" class="absolute right-2 top-5 text-white text-lg"></ion-icon>
          <i
            class="fa-solid fa-eye-slash toggle-password absolute right-10 top-1/2 transform -translate-y-1/2 cursor-pointer text-white"
            id="togglePassword"
          ></i>
        </div>
      
        <!-- Botón -->
        <button
          type="submit"
          class="w-full h-10 mt-6 rounded-full bg-white text-black font-semibold transition duration-300 hover:bg-white/50"
        >
          Iniciar sesión
        </button>

        <!-- Enlace para recuperar contraseña -->
        <a href="{{ route('recuperar.form') }}" class="text-sm text-white text-center mt-3 hover:underline block">
          ¿Olvidaste tu contraseña?
        </a>
      </form>



    </section>

    <!-- Scripts -->
    <script>
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');

      togglePassword.addEventListener('click', function () {
        const isPassword = password.type === 'password';
        password.type = isPassword ? 'text' : 'password';
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </body>
</html>
