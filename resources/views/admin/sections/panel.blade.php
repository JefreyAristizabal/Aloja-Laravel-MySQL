@extends('admin.adminsite')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <h4>Panel</h4>
    </div>
  </div>

  {{-- Tarjetas --}}
  <div class="row">

    <div class="col-md-3 mb-3">
      <div class="card bg-primary text-white h-100">
        <div class="card-body py-3">
          <h6 class="card-title mb-3">Estadías Totales</h6>
          <p class="card-text fs-4">{{ $totalEstadias }}</p>
        </div>
        <div class="card-footer text-center py-2">
          <a href="{{ route('admin.estadias.index') }}" class="text-white text-decoration-none">
            Ver Estadías <i class="bi bi-chevron-right ms-1"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-3">
      <div class="card bg-info text-white h-100">
        <div class="card-body py-3">
          <h6 class="card-title mb-3">Estadías en {{ $nombreMes }}</h6>
          <p class="card-text fs-4">{{ $estadiasMes }}</p>
        </div>
        <div class="card-footer text-center py-2">
          <a href="{{ route('admin.estadias.index') }}" class="text-white text-decoration-none">
            Ver Estadías <i class="bi bi-chevron-right ms-1"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-3">
      <div class="card bg-success text-white h-100">
        <div class="card-body py-3">
          <h6 class="card-title mb-3">Pagos Totales</h6>
          <p class="card-text fs-4">{{ $totalPagos }}</p>
        </div>
        <div class="card-footer text-center py-2">
          <a href="#" class="text-white text-decoration-none">
            Ver Pagos <i class="bi bi-chevron-right ms-1"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-3">
      <div class="card bg-warning text-dark h-100">
        <div class="card-body py-3">
          <h6 class="card-title mb-3">Pagos en {{ $nombreMes }}</h6>
          <p class="card-text fs-4">{{ $pagosMes }}</p>
        </div>
        <div class="card-footer text-center py-2">
          <a href="#" class="text-white text-decoration-none">
            Ver Pagos <i class="bi bi-chevron-right ms-1"></i>
          </a>
        </div>
      </div>
    </div>

  </div>

  {{-- Tabla Estadías --}}
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <span><i class="bi bi-table me-2"></i></span> Estadías
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="tabla-estadias" class="table table-striped data-table w-100">
              <thead>
                <tr>
                  <th>ID de Estadía</th>
                  <th>Fecha de Inicio</th>
                  <th>Fecha de Fin</th>
                  <th>Fecha de Registro</th>
                  <th>Costo</th>
                  <th>ID de Habitación</th>
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
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Tabla Huespedes --}}
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <span><i class="bi bi-table me-2"></i></span> Huéspedes
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="tabla-huespedes" class="table table-striped data-table w-100">
              <thead>
                <tr>
                  <th>ID de Huésped</th>
                  <th>Nombre Completo</th>
                  <th>Tipo de Documento</th>
                  <th>Número de Documento</th>
                  <th>Teléfono</th>
                  <th>Origen</th>
                  <th>Nombre de Contacto</th>
                  <th>Teléfono de Contacto</th>
                  <th>Observaciones</th>
                  <th>Otras Observaciones</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($huespedes as $huesped)
                <tr>
                  <td>{{ $huesped->idHUESPED }}</td>
                  <td>{{ $huesped->Nombre_completo }}</td>
                  <td>{{ $huesped->tipo_documento }}</td>
                  <td>{{ $huesped->numero_documento }}</td>
                  <td>{{ $huesped->Telefono_huesped }}</td>
                  <td>{{ $huesped->Origen }}</td>
                  <td>{{ $huesped->Nombre_Contacto }}</td>
                  <td>{{ $huesped->Telefono_contacto }}</td>
                  <td>{{ $huesped->Observaciones }}</td>
                  <td>{{ $huesped->observaciones2 }}</td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>ID de Huésped</th>
                  <th>Nombre Completo</th>
                  <th>Tipo de Documento</th>
                  <th>Número de Documento</th>
                  <th>Teléfono</th>
                  <th>Origen</th>
                  <th>Nombre de Contacto</th>
                  <th>Teléfono de Contacto</th>
                  <th>Observaciones</th>
                  <th>Otras Observaciones</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Tabla Habitaciones --}}
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <span><i class="bi bi-table me-2"></i></span> Habitaciones
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="tabla-habitaciones" class="table table-striped data-table w-100">
              <thead>
                <tr>
                  <th>ID de Habitación</th>
                  <th>Nombre</th>
                  <th>Capacidad</th>
                  <th>Descripción</th>
                  <th>Imagen</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($habitaciones as $habitacion)
                <tr>
                  <td>{{ $habitacion->idHABITACION }}</td>
                  <td>{{ $habitacion->NOMBRE }}</td>
                  <td>{{ $habitacion->CAPACIDAD }}</td>
                  <td>{{ $habitacion->DESCRIPCION }}</td>
                  <td>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#imagenModal" data-img="{{ Vite::asset('resources/' . $habitacion->IMAGEN) }}">
                      Ver Imagen
                    </button>
                  </td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>ID de Habitación</th>
                  <th>Nombre</th>
                  <th>Capacidad</th>
                  <th>Descripción</th>
                  <th>Imagen</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Tabla Tarifas --}}
  <div class="row">
    <div class="col-md-12 mb-3">
      <div class="card">
        <div class="card-header">
          <span><i class="bi bi-table me-2"></i></span> Tarifas
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="tabla-tarifas" class="table table-striped data-table w-100">
              <thead>
                <tr>
                  <th>ID de Tarifa</th>
                  <th>Modalidad</th>
                  <th>Número de Huéspedes</th>
                  <th>Valor</th>
                  <th>ID de Habitación</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($tarifas as $tarifa)
                <tr>
                  <td>{{ $tarifa->idTarifa}}</td>
                  <td>{{ $tarifa->Modalidad }}</td>
                  <td>{{ $tarifa->NroHuespedes }}</td>
                  <td>{{ $tarifa->Valor }}</td>
                  <td>{{ $tarifa->Habitacion_idHabitacion }}</td>
                </tr>
              @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>ID de Tarifa</th>
                  <th>Modalidad</th>
                  <th>Número de Huéspedes</th>
                  <th>Valor</th>
                  <th>ID de Habitación</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Modal Imagen --}}
<div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Imagen de la Habitación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body text-center">
        <img id="imagenModalSrc" src="" class="img-fluid rounded" alt="Comprobante">
      </div>
    </div>
  </div>
</div>

@endsection
