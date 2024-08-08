<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <!-- Incluir List.js y su extensión List.pagination.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.pagination.js/0.1.1/list.pagination.min.js"></script>
</head>



<body>
    <div>
        <div>Agregar Pendiente a Empleado</div>    
 
    </div>


    
    <form id="formulario" action="{{ route('pendienteCliente.agregar') }}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="p-4 sm:ml-64 mt-16 md:mt-10">
        <!-- Guias del tamaño del contenedor -->
        <div class="p-4">
            <!-- PON EL CODIGO DEL MODULO AQUI -->
            <div class="bg-white rounded-lg shadow-lg p-4">
              
                <div class="flex justify-center mt-5 md:mt-10">
                    <h1 class="text-center font-bold text-2xl">Registrar Pendiente a empleado</h1>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-10">
                 
                    <div>
                        <label for="rfc" class="block mb-2 text-sm font-medium text-gray-900">Titulo Pendiente</label>
                        <input type="text" name="tareaEmpleado"  class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>

         
                    <div>
                        <label for="estatusPatron" class="block mb-2 text-sm font-medium text-gray-900">Tipo Pendiente</label>
                        <select name="fkTipoPendiente"  class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5">
                        @php
                        use App\Models\TipoPendiente;
                        $datosTipoPendiente = TipoPendiente::get();
                        @endphp
                        <option value="">Seleccion un tipo pendiente</option>
                            @foreach (  $datosTipoPendiente as $dato)
                                <option value="{{$dato->pkTipoPendiente}}">{{$dato->nombreTipoPendiente}}</option>
                            @endforeach
						</select>
                        </select>
                    </div>

                    <div class="flex justify-center md:justify-normal items-center mt-10">
            <form class="w-[13rem] md:w-[30rem]">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="busqueda"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-400 focus:border-green-400"
                        placeholder="Buscar" required>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow-lg mt-10">
            <div class="flex justify-center mb-[1rem]">
                <div class="">
                    <h1 class="text-center font-bold text-2xl mt-5">Selecciona persona</h1>
                </div>
            </div>

            <table class="w-full table-auto mt-[1rem]" id="tablaPersonas" class="display nowrap" width="90%">
                <thead class="text-center">
                    <tr class="h-24 text-center">
                        <td class="oculto">ID</td>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Seleccionar</th>
                    </tr>
                <tbody>
                    @foreach ($datoPersonaRelacionadas  as $dato)
                        <tr class="h-20">
                            <td class="oculto">{{ $dato->pkPersona }}</td>
                            <th>{{ $dato->nombre }}</th>
                            <th>{{ $dato->apellidoPaterno }}</th>
                            <th>{{ $dato->apellidoMaterno }}</th>
                            <td class="items-center flex justify-center">
                                <div class="mt-2 md:mt-5">
                                    <input type="checkbox" name="persona-seleccionado" class="seleccionar-persona"
                                        data-persona-id="{{ $dato->pkPersona }}"
                                        class="w-6 h-6 rounded text-green-400 bg-gray-100 border-gray-300 focus:ring-green-400 focus:ring-2">
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                </thead>
            </table>

            <table class="w-full table-auto mt-[1rem]" id="persona-lista" class="display nowrap" width="90%">
                <thead class="text-center">
                    <tr class="h-24 text-center">
                        <td>ID</td>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Cancelar</th>
                    </tr>
                <tbody id="detalle-persona-body">

                </tbody>
                </thead>
            </table>
            <div class="flex justify-center	mt-16">
                <div class="md:p-10 p-5">
                    <div class="flex">
                        <!-- Previous Button -->
                        <button id="previousBtn2"
                            class="flex items-center justify-center px-4 h-10 md:px-10 md:mr-20 mr-10 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
                            Anterior
                        </button>
                        <!-- Next Button -->
                        <button id="nextBtn2"
                            class="flex items-center justify-center px-4 h-10 md:px-10 md:ml-20 ml-10 ms-3 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
                            Siguiente
                        </button>
                    </div>
                </div>
            </div>


             
                </div>
             
                </div>
            </div>
        </div>
    </div>


    <button id="completar" type="submit" class="w-full flex items-center bg-green-500 p-2 text-base font-medium text-white rounded-lg hover:bg-green-400">
                    <svg class="flex-shrink-0 w-7 h-7 text-white transition duration-75 group-hover:text-green-" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="m16 0c8.836556 0 16 7.163444 16 16s-7.163444 16-16 16-16-7.163444-16-16 7.163444-16 16-16zm6.4350288 11.7071068c-.3905242-.3905243-1.0236892-.3905243-1.4142135 0l-6.3646682 6.3632539-3.5348268-3.5348268c-.3905242-.3905243-1.0236892-.3905243-1.41421352 0-.39052429.3905243-.39052429 1.0236893 0 1.4142136l4.24264072 4.2426407c.3905243.3905242 1.0236892.3905242 1.4142135 0 .0040531-.0040531.0080641-.0081323.012033-.0122371l7.0590348-7.0588308c.3905243-.3905242.3905243-1.0236892 0-1.4142135z" fill="currentColor" fill-rule="evenodd"/>
                    </svg>
                    <p class="flex-1 ms-3 whitespace-nowrap">Aplicar</p>
        </button>

    
    <input type="hidden" name="persona[]" value="">



    </form>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


    <script>
        $(document).ready(function() {
           
            var tablePersona = $('#tablaPersonas').DataTable({
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

            var tablePersonaSeleccionados = $('#persona-lista').DataTable({
                responsive: true,
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla",
                },
            });

      

            // Eventos para la navegación en las tablas
            $('#previousBtn').on('click', function(e) {
                e.preventDefault();
                tablePersona.page('previous').draw(false);
            });

            $('#nextBtn').on('click', function(e) {
                e.preventDefault();
                tablePersona.page('next').draw(false);
            });

            $('#previousBtn2').on('click', function(e) {
                e.preventDefault();
                tablePersonaSeleccionados.page('previous').draw(false);
            });

            $('#nextBtn2').on('click', function(e) {
                e.preventDefault();
                tablePersonaSeleccionados.page('next').draw(false);
            });

    

            // Eventos para la búsqueda
            $('#busqueda').on('keyup', function() {
                var filtroBusqueda = $('#busqueda').val();
                tablePersona.search(filtroBusqueda).draw();
            });

        

            // Evento para limpiar filtros
            $('#limpiarFiltros').on('click', function() {
                $('#fkEstatus, #fkCategoria').val('');
                tablePersona.search('').columns().search('').draw();
            });

            // Evento para seleccionar y desmarcar personas
            $('#tablaPersonas tbody').on('click', '.seleccionar-persona', function() {
                var checkbox = $(this);
                var row = checkbox.closest('tr');
                var data = tablePersona.row(row).data();
                var personaId = data[0];

                if (checkbox.prop('checked')) {
                    tablePersonaSeleccionados.row.add([
                        data[0],
                        data[1],
                        data[2],
                        data[3],
                        `<button class="cancelar-persona flex items-center justify-center px-4 h-10 md:px-10 md:mr-20 mr-10 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400" data-persona-id="${personaId}">Cancelar</button>`
                    ]).draw();
                } else {
                    tablePersonaSeleccionados.rows().every(function() {
                        if (this.data()[0] === personaId) {
                            this.remove().draw();
                        }
                    });
                }

                actualizarCamposOcultos();
            });

            // Evento para seleccionar y desmarcar compañías
            // Evento para cancelar la selección de una persona
            $('#persona-lista tbody').on('click', 'button.cancelar-persona', function() {
                var personaId = $(this).data('persona-id');
                tablePersonaSeleccionados.row($(this).closest('tr')).remove().draw();

                $('#tablaPersonas tbody tr').each(function() {
                    var data = tablePersona.row(this).data();
                    if (data[0] === personaId) {
                        $(this).find('.seleccionar-persona').prop('checked', false);
                    }
                });

                actualizarCamposOcultos();
            });


            // Función para actualizar los campos ocultos en el formulario
            function actualizarCamposOcultos() {
                $('#formulario').find('input[name="persona[]"]').remove();
                $('#formulario').find('input[name="compañia[]"]').remove();

                tablePersonaSeleccionados.rows().every(function() {
                    var data = this.data();
                    var personaId = data[0];
                    $('#formulario').append(`<input type='hidden' name='persona[]' value='${personaId}'>`);
                });

            

               
            }

            // Evento para completar la selección y enviar el formulario
            $('#completar').click(function() {
                actualizarCamposOcultos();
                $('#formulario').submit();
            });
        });
    </script>




</body>
</html>