<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: @json(session('success')),
                confirmButtonColor: '#4e54c8'
            }).then(() => {
                window.location.href = "{{ session('redirect_to') ?? url()->previous() }}";
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: @json(session('error')),
                confirmButtonColor: '#d33'
            }).then(() => {
                window.location.href = "{{ session('redirect_to') ?? url()->previous() }}";
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Errores en el formulario',
                html: `{!! implode('', $errors->all('<li>:message</li>')) !!}`,
                confirmButtonColor: '#d33'
            }).then(() => {
                window.location.href = "{{ session('redirect_to') ?? url()->previous() }}";
            });
        @endif
    });
</script>

</body>
</html>
