<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('mensaje')
    
<h2>Compañias registradas </h2>


    
<div class="flex justify-center md:justify-normal items-center mt-10">
                <form class="w-[13rem] md:w-[30rem]">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search"  id="busqueda2"  class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-400 focus:border-green-400" placeholder="Buscar" required>
                    </div>
                </form>
             </div>

<div class="bg-white rounded-lg shadow-lg mt-10">
                    <div class="flex justify-center mb-[1rem]">
                            <div class="">
                                    <h1 class="text-center font-bold text-2xl mt-5">Selecciona compañia</h1>
                            </div>
                    </div>

                    <table class="w-full table-auto mt-[1rem]"  id="tablaCompañias" class="display nowrap" width="90%">
                            <thead class="text-center">
                                    <tr class="h-24 text-center">
                    <td class="oculto">ID</td>
                    <th>Nombre Compañias</th>
                    <th>Detalle</th>
                                    </tr>
                                    <tbody>
                @foreach ($datosCompañias as $dato ) 
                                            <tr class="h-20">
                    <td class="oculto">{{$dato->pkCompañia}}</td>
                    <th>{{$dato->nombreComercial}}</th>
                                                    <td class="items-center flex justify-center">									
                                                    <select id="opciones" onchange="redirigir(this)">
                                                    <option value="">Selecciona una opción</option>
                                                        <option value="{{ route('personaMoral.detalle', ['pkCompañia' => $dato->pkCompañia, 'vista' =>'detalleCompañia' ]) }}">Detalle</option>
                                                        <option value="{{ route('personaMoral.detalle', ['pkCompañia' => $dato->pkCompañia, 'vista' =>'editarClientePersonaMoral' ]) }}">Actualizar</option>
                                                        <option value="{{ route('personaMoral.baja', ['pkCompañia' => $dato->pkCompañia]) }}">Baja</option>
                                                    </select>


                                                    </td>
                                            </tr>
                @endforeach

                                    </tbody>
                                    </thead>
                            </table>
                            <div class="flex justify-center	mt-16">
				<div class="md:p-10 p-5">
					  <div class="flex">
						<!-- Previous Button -->
                            <button id="previousBtn2" class="flex items-center justify-center px-4 h-10 md:px-10 md:mr-20 mr-10 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
							  Anterior
							</button>
							<!-- Next Button -->
							<button   id="nextBtn2"  class="flex items-center justify-center px-4 h-10 md:px-10 md:ml-20 ml-10 ms-3 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
							  Siguiente
							</button>
					  </div>
				</div>
			</div>






   <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


    <script>
    function confirmarBaja(select) {
        const selectedOption = select.options[select.selectedIndex];
        const url = selectedOption.value;

        if (url) {
            Swal.fire({
                title: '¿Seguro?',
                text: '¿Desea dar de baja esta compañía?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, dar de baja',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                } else {
                    // Reset select value to prevent accidental redirection
                    select.selectedIndex = 0;
                }
            });
        }
    }
</script>




    <script>
function redirigir(select) {
    const url = select.value;
    if (url) {
        window.location.href = url;
    }
}
</script>




    <script>




var tableCompañia = $('#tablaCompañias').DataTable({
    responsive: true,
    "language": {
        "search": "Buscar compra:",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "zeroRecords": "Sin resultados",
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    },
});





$('#previousBtn2').on('click', function(e) {
  e.preventDefault();
  tableCompañia.page('previous').draw(false);
});

// Agrega evento de clic al botón Next
$('#nextBtn2').on('click', function(e) {
  e.preventDefault();
  tableCompañia.page('next').draw(false);
});



$('#busqueda2').on('keyup', function (e) {
    var filtroBusqueda = $('#busqueda').val();
    tableCompañia.search(filtroBusqueda).draw();
});


</script>


</body>
</html>