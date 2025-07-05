@extends('admin.adminsite')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <span><i class="bi bi-table me-2"></i></span> Estadías
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="table table-striped data-table w-100">
              <thead>
                <tr>
                  <th>ID de Estadía</th>
                  <th>Fecha de Inicio</th>
                  <th>Fecha de Fin</th>
                  <th>Fecha de Registro</th>
                  <th>Costo</th>
                  <th>ID de Habitación</th>
                  <th class="no-export">Acción</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($estadias as $estadia)
                <tr>
                  <td>{{ $estadia->idEstadia }}</td>
                  <td>{{ $estadia->Fecha_Inicio }}</td>
                  <td>{{ $estadia->Fecha_Fin }}</td>
                  <td>{{ $estadia->Fecha_Registro }}</td>
                  <td>{{ $estadia->Costo }}</td>
                  <td>{{ $estadia->Habitacion_idHabitacion }}</td>
                  <td class="no-export">
                    <a href="{{ route('admin.estadias.edit', $estadia->idEstadia) }}" class="btn btn-warning btn-sm">
                      <i class="bi bi-pencil-square"></i> Editar
                    </a>
                    <button class="btn btn-danger btn-sm" onclick="confirmarEliminacion({{ $estadia->idEstadia }})">
                      <i class="bi bi-trash"></i> Eliminar
                    </button>
                  </td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>ID de Estadía</th>
                  <th>Fecha de Inicio</th>
                  <th>Fecha de Fin</th>
                  <th>Fecha de Registro</th>
                  <th>Costo</th>
                  <th>ID de Habitación</th>
                  <th class="no-export">Acción</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="d-flex justify-content-end align-items-center gap-2 mb-3 mx-3">
  <select id="tipo-exportacion" class="form-select w-auto">
    <option value="pdf">PDF</option>
    <option value="excel">Excel</option>
    <option value="csv">CSV</option>
  </select>
  <button id="btn-exportar" class="btn btn-primary">
    <i class="bi bi-download me-1"></i>Exportar
  </button>
</div>
<script>
function confirmarEliminacion(id) {
  Swal.fire({
    title: '¿Estás seguro?',
    text: '¡Esta acción no se puede deshacer!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      // Crear formulario oculto dinámicamente
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = `/admin/estadias/${id}`;
      
      // CSRF token
      const token = document.createElement('input');
      token.type = 'hidden';
      token.name = '_token';
      token.value = '{{ csrf_token() }}'; // Blade lo reemplaza
      form.appendChild(token);

      // Método DELETE
      const method = document.createElement('input');
      method.type = 'hidden';
      method.name = '_method';
      method.value = 'DELETE';
      form.appendChild(method);

      document.body.appendChild(form);
      form.submit();
    } else {
      Swal.fire('Cancelado', 'La acción ha sido cancelada.', 'info');
    }
  });
}
</script>

@endsection



