<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div>Historial de pendientes de empleado 
        </div>
</div>


       
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

             <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                   
                    </div>
                    <label for="underline_select" class="sr-only">Selecciona dia</label>
                    <input datepicker type="date" id="dia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full ps-10 p-2.5" placeholder="Select date">
                </div>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  
                    </div>
                    <label for="underline_select" class="sr-only">Selecciona mes</label>
                    <input datepicker type="month" id="mes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full ps-10 p-2.5" placeholder="Select date">
                </div>
			    <label for="estatusPatron" class="block mb-2 text-sm font-medium text-gray-900">Tipo Pendiente</label>
                        <select name="fkTipoPendiente"  id="fkTipoPendiente" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5">
                        @php
                        use App\Models\TipoPendiente;
                        $datosTipoPendiente = TipoPendiente::get();
                        @endphp
                        <option value="">Seleccion un tipo pendiente</option>
                            @foreach (  $datosTipoPendiente as $dato)
                                <option value="{{$dato->nombreTipoPendiente}}">{{$dato->nombreTipoPendiente}}</option>
                            @endforeach
				</select>


                <label for="estatusPatron" class="block mb-2 text-sm font-medium text-gray-900">Estatus Pendiente</label>
                        <select name="estatus"  id="estatus" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5">
                
                        <option value="">Seleccion estatus</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Terminado">Terminado</option>
                          
				</select>
			
                <div>
                    <button  type="button"id="limpiarFiltros"  class="flex items-center justify-center px-4 h-10 md:px-10 md:ml-20 ml-10 ms-3 text-base font-medium text-white bg-orange-500 border rounded-lg hover:bg-orange-400">
                        Limpiar filtros
                    </button>
                </div>





<div class="bg-white rounded-lg shadow-lg mt-10">
                    <div class="flex justify-center mb-[1rem]">
                            <div class="">
                                    <h1 class="text-center font-bold text-2xl mt-5">Selecciona compañia</h1>
                            </div>
                    </div>

                    <table class="w-full table-auto mt-[1rem]"  id="tablaPendientes" class="display nowrap" width="90%">
                            <thead class="text-center">
            <tr class="h-24 text-center">
                    <th>Nombre Empleados</th>
                    <th>Titulo tarea</th>
                    <th>Categoria Pendiente</th>
                    <th>Fecha</th>
                    <th>Estatus</th>

                                    </tr>
                                    <tbody>
                @foreach ($todosPendientes as $dato ) 
                                            <tr class="h-20">
                                            <th>{{$dato->nombre.' '.$dato->apellidoPaterno.' '.$dato->apellidoMaterno}}</th> 
                                            <th>{{$dato->tareaEmpleado}}</th>
                                            <th>{{$dato->nombreTipoPendiente}}</th>
                                            <td>{{ $dato->fechaPendienteEmpleado }}</td>

                                            <th>
                                                @if($dato->estatusPendienteEmpleado == 1)
                                                    Pendiente
                                                @elseif($dato->estatusPendienteEmpleado == 0)
                                                    Terminado
                                                @endif
                                            </th>


                                                
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>



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




<script type="text/javascript" charset="utf8">
    $(document).ready(function() {
        var tablePendientes = $('#tablaPendientes').DataTable({
			responsive: true,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });

    $('#previousBtn2').on('click', function(e) {
      e.preventDefault();
      tablePendientes.page('previous').draw(false);
    });

    // Agrega evento de clic al botón Next
    $('#nextBtn2').on('click', function(e) {
      e.preventDefault();
      tablePendientes.page('next').draw(false);
    });
 

$('#fkTipoPendiente, #dia,#estatus, #mes').change(function () {
        var tipoPendiente = $('#fkTipoPendiente').val();
        var filtroMes = $('#mes').val();
        var filtroFecha = $('#dia').val();
        var estatus = $('#estatus').val();
        
        // Limpiar todos los filtros antes de aplicar nuevos
        tablePendientes.columns().search('').draw();

        // Aplicar los nuevos filtros
        if (tipoPendiente !== "") {
            tablePendientes.column(2).search(tipoPendiente).draw(); // Filtro para Nombre de Articulo
        }

        if (estatus !== "") {
            tablePendientes.column(4).search(estatus).draw(); // Filtro para Nombre de Articulo
        }
       
        if (filtroMes !== "") {
            tablePendientes.column(3).search(filtroMes).draw(); // Filtro para Mes
        }
        else if (filtroFecha !== "") {
            var fechaFormateada = moment(filtroFecha).format("YYYY-MM-DD");
            tablePendientes.column(3).search(fechaFormateada).draw(); // Filtro para Fecha
        }
        else {
            // Si no hay filtro de mes ni de fecha, limpia el filtro en esa columna
            tablePendientes.column(3).search('').draw();
        }
       
    });

    $('#busqueda2').on('keyup', function (e) {
        var filtroBusqueda = $('#busqueda2').val();
        tablePendientes.search(filtroBusqueda).draw();
    });

    $('#limpiarFiltros').on('click', function () {
        $('#fkTipoPendiente, #dia,#estatus, #mes').val('');
        tablePendientes.search('').columns().search('').draw();
    });

    });
</script>





</body>
</html>