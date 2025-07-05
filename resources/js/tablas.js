function inicializarTablas() {
  const tabla = $('.data-table').DataTable({
    dom:
      "<'row mb-3'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row mt-3'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    lengthMenu: [5, 10, 25, 50, 100],
    buttons: [
      {
        extend: 'pdfHtml5',
        className: 'buttons-pdf d-none',
        exportOptions: {
          columns: ':not(.no-export)'
        }
      },
      {
        extend: 'excelHtml5',
        className: 'buttons-excel d-none',
        exportOptions: {
          columns: ':not(.no-export)'
        }
      },
      {
        extend: 'csvHtml5',
        className: 'buttons-csv d-none',
        exportOptions: {
          columns: ':not(.no-export)'
        }
      }
    ],
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
    },
    initComplete: function () {
      $('.dataTables_length select').addClass('form-select form-select-sm');

      $('.dataTables_paginate').addClass('pagination-container');
      $('.dataTables_paginate .paginate_button').each(function () {
        $(this).addClass('page-link');
        $(this).wrap('<li class="page-item"></li>');
      });

      $('.dataTables_paginate .paginate_button.current')
        .parent()
        .addClass('active');
    }
  });

  // Validación para evitar error si los botones no están disponibles
  if (!tabla.button || typeof tabla.button !== 'function') {
    console.error('❌ DataTables Buttons no está disponible. Asegúrate de que los scripts están bien cargados.');
    return;
  }

  // Export manual
  const botonExportar = document.getElementById('btn-exportar');
  const tipoExportacion = document.getElementById('tipo-exportacion');

  if (botonExportar && tipoExportacion) {
    botonExportar.addEventListener('click', function () {
      const tipo = tipoExportacion.value;
      switch (tipo) {
        case 'pdf':
          tabla.button(0).trigger();
          break;
        case 'excel':
          tabla.button(1).trigger();
          break;
        case 'csv':
          tabla.button(2).trigger();
          break;
      }
    });
  }
}

document.addEventListener('DOMContentLoaded', inicializarTablas);
