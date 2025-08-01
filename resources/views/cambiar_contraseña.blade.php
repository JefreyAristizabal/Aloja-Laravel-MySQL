{{-- resources/views/cambiar_contraseña.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Cambiar Contraseña | Aloja</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(to right, rgba(89, 2, 2, 0.7), rgba(0, 0, 0, 0)),
                url('{{ Vite::asset('resources/img/bg-login.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0px 1000px transparent inset !important;
            -webkit-text-fill-color: #fff !important;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">

    <section class="relative max-w-md w-full bg-transparent border-2 border-white/50 rounded-2xl backdrop-blur-lg p-8">

        <form action="{{ route('admin.cambiar_contraseña.update') }}" method="POST" class="flex flex-col gap-6">
            @csrf
            @method('PATCH')
            <h1 class="text-2xl text-white text-center font-semibold">Cambiar Contraseña</h1>

            <!-- Contraseña actual -->
            <div class="relative mt-6">
                <input type="password" name="old_password" id="actual" required placeholder=" " class="peer w-full h-14 bg-transparent border-b-2 border-white text-white px-2 placeholder-transparent focus:outline-none" />
                <label for="actual" class="absolute left-2 text-white text-sm top-[-10px] transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:-translate-y-1/2 peer-focus:top-[-10px]">Contraseña Actual</label>
                <i class="fa-solid fa-eye-slash toggle-password absolute right-4 top-5 text-white cursor-pointer" data-target="actual"></i>
            </div>

            <!-- Nueva contraseña -->
            <div class="relative mt-6">
                <input type="password" name="new_password" id="nueva" required placeholder=" " class="peer w-full h-14 bg-transparent border-b-2 border-white text-white px-2 placeholder-transparent focus:outline-none" />
                <label for="nueva" class="absolute left-2 text-white text-sm top-[-10px] transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:-translate-y-1/2 peer-focus:top-[-10px]">Nueva Contraseña</label>
                <i class="fa-solid fa-eye-slash toggle-password absolute right-4 top-5 text-white cursor-pointer" data-target="nueva"></i>
            </div>

            <!-- Confirmar nueva contraseña -->
            <div class="relative mt-6">
                <input
                    type="password"
                    name="new_password_confirmation"
                    id="confirmar"
                    required
                    placeholder=" "
                    class="peer w-full h-14 bg-transparent border-b-2 border-white text-white px-2 placeholder-transparent focus:outline-none"
                    oninput="validarCoincidencia()"
                />
                <label
                    for="confirmar"
                    class="absolute left-2 text-white text-sm top-[-10px] transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:-translate-y-1/2 peer-focus:top-[-10px]"
                >
                    Confirmar Contraseña
                </label>
                <i class="fa-solid fa-eye-slash toggle-password absolute right-4 top-5 text-white cursor-pointer" data-target="confirmar"></i>
                <!-- Mensaje de validación -->
                <p id="mensajeCoincidencia" class="text-sm mt-2 hidden"></p>
            </div>

            <!-- Botón -->
            <button type="submit" class="w-full h-10 mt-6 rounded-full bg-white text-black font-semibold hover:bg-white/50 transition">Guardar cambios</button>

            <!-- Volver -->
            <a href="{{ route('inicio') }}" class="text-sm text-white text-center mt-3 hover:underline">Volver al inicio</a>
        </form>

    </section>

    <script>
        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.addEventListener('click', function () {
                const target = document.getElementById(this.getAttribute('data-target'));
                const isPassword = target.type === 'password';
                target.type = isPassword ? 'text' : 'password';
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
    <script>
        function validarCoincidencia() {
            const nueva = document.getElementById("nueva");
            const confirmar = document.getElementById("confirmar");
            const mensaje = document.getElementById("mensajeCoincidencia");

            if (confirmar.value === "") {
                mensaje.classList.add("hidden");
                return;
            }

            if (nueva.value === confirmar.value) {
                mensaje.textContent = "✅ Las contraseñas coinciden";
                mensaje.className = "text-green-400 text-sm mt-2 block";
            } else {
                mensaje.textContent = "❌ Las contraseñas no coinciden";
                mensaje.className = "text-red-400 text-sm mt-2 block";
            }
        }
    </script>
</body>
</html>
