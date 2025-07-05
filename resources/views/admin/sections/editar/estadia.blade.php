@extends('admin.adminsite')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <span><i class="bi bi-pencil-square me-2"></i></span> Editar Estadía
        </div>
        <div class="card-body">
          <h2>Editar Estadía</h2>
          <form action="{{ route('admin.estadias.update', $estadia->idEstadia) }}" method="POST" enctype="multipart/form-data" id="formulario-estadia">
            @csrf
            @method('PUT')

            <!-- Fecha Inicio -->
            <div class="mb-3">
              <label for="fechaInicio_estadia" class="form-label">Fecha de inicio</label>
              <input type="date" class="form-control" id="fechaInicio_estadia" name="Fecha_Inicio"
                     value="{{ old('Fecha_Inicio') ?? \Carbon\Carbon::parse($estadia->Fecha_Inicio)->format('Y-m-d') }}" required>
              <div class="valid-feedback d-none">Fecha válida.</div>
              <div class="invalid-feedback d-none">La fecha de inicio debe ser hoy o posterior y menor que la de fin.</div>
            </div>

            <!-- Fecha Fin -->
            <div class="mb-3">
              <label for="fechaFin_estadia" class="form-label">Fecha de fin</label>
              <input type="date" class="form-control" id="fechaFin_estadia" name="Fecha_Fin"
                     value="{{ old('Fecha_Fin') ?? \Carbon\Carbon::parse($estadia->Fecha_Fin)->format('Y-m-d') }}" required>
              <div class="valid-feedback d-none">Fecha válida.</div>
              <div class="invalid-feedback d-none">La fecha de fin debe ser mayor que la de inicio.</div>
            </div>

            <!-- Costo -->
            <div class="mb-3">
              <label for="costo_estadia" class="form-label">Costo</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" id="costo_estadia" name="Costo" step="0.01"
                       value="{{ old('Costo', $estadia->Costo) }}" required>
              </div>
              <div class="valid-feedback d-none">Costo válido.</div>
              <div class="invalid-feedback d-none">El costo debe ser mayor a 0.</div>
            </div>

            <!-- ID habitación -->
            <div class="mb-3">
              <label for="id_habitacion_estadia" class="form-label">ID de Habitación</label>
              <input type="number" name="Habitacion_idHabitacion" id="id_habitacion_estadia" class="form-control"
                     value="{{ old('Habitacion_idHabitacion', $estadia->Habitacion_idHabitacion) }}" required>
              <div class="valid-feedback d-none">ID válido.</div>
              <div class="invalid-feedback d-none">Debe ingresar un ID mayor a 0.</div>
            </div>

            <div id="error" class="text-danger mb-3"></div>
            <button type="submit" class="btn btn-primary mb-2">Actualizar</button>
          </form>

          {{-- Validación JS (idéntica a la de crear) --}}
          <script>
            const form = document.getElementById('formulario-estadia');

            const inicioInput = document.getElementById('fechaInicio_estadia');
            const finInput = document.getElementById('fechaFin_estadia');
            const costoInput = document.getElementById('costo_estadia');
            const habitacionInput = document.getElementById('id_habitacion_estadia');

            function validarFechaInicio() {
              const hoy = new Date();
              hoy.setHours(0, 0, 0, 0);
              const inicio = new Date(inicioInput.value);
              const fin = new Date(finInput.value);

              if (inicio >= hoy && (!finInput.value || inicio < fin)) {
                setValido(inicioInput);
              } else {
                setInvalido(inicioInput);
              }
            }

            function validarFechaFin() {
              const inicio = new Date(inicioInput.value);
              const fin = new Date(finInput.value);

              if (fin > inicio) {
                setValido(finInput);
              } else {
                setInvalido(finInput);
              }
            }

            function validarCosto() {
              const costo = parseFloat(costoInput.value);
              if (!isNaN(costo) && costo > 0) {
                setValido(costoInput);
              } else {
                setInvalido(costoInput);
              }
            }

            function validarHabitacion() {
              const id = parseInt(habitacionInput.value);
              if (!isNaN(id) && id > 0) {
                setValido(habitacionInput);
              } else {
                setInvalido(habitacionInput);
              }
            }

            function setValido(input) {
              input.classList.add('is-valid');
              input.classList.remove('is-invalid');
              mostrarFeedback(input, true);
            }

            function setInvalido(input) {
              input.classList.add('is-invalid');
              input.classList.remove('is-valid');
              mostrarFeedback(input, false);
            }

            function mostrarFeedback(input, valido) {
              const container = input.closest('.mb-3');
              const valid = container.querySelector('.valid-feedback');
              const invalid = container.querySelector('.invalid-feedback');

              if (valido) {
                valid.classList.remove('d-none');
                valid.classList.add('d-block');
                invalid.classList.remove('d-block');
                invalid.classList.add('d-none');
              } else {
                invalid.classList.remove('d-none');
                invalid.classList.add('d-block');
                valid.classList.remove('d-block');
                valid.classList.add('d-none');
              }
            }

            // Eventos
            inicioInput.addEventListener('input', () => {
              validarFechaInicio();
              validarFechaFin();
            });

            finInput.addEventListener('input', () => {
              validarFechaInicio();
              validarFechaFin();
            });

            costoInput.addEventListener('input', validarCosto);
            habitacionInput.addEventListener('input', validarHabitacion);

            form.addEventListener('submit', (e) => {
              validarFechaInicio();
              validarFechaFin();
              validarCosto();
              validarHabitacion();

              if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
              }

              form.classList.add('was-validated');
            });
          </script>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
