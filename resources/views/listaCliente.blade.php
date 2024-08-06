<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div>Lista de clientes</div>    
 
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
                            <input type="search"  id="busqueda"  class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-400 focus:border-green-400" placeholder="Buscar" required>
                        </div>
                    </form>
                 </div>

    <div class="bg-white rounded-lg shadow-lg mt-10">
			<div class="flex justify-center mb-[1rem]">
				<div class="">
					<h1 class="text-center font-bold text-2xl mt-5">Selecciona persona</h1>
				</div>
			</div>

			<table class="w-full table-auto mt-[1rem]"  id="tablaPersonas" class="display nowrap" width="90%">
				<thead class="text-center">
					<tr class="h-24 text-center">
                        <td class="oculto">ID</td>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Detalle</th>
					</tr>
					<tbody>
                    @foreach ($datosPersonasFisicas as $dato ) 
						<tr class="h-20">
                        <td class="oculto">{{$dato->pkPersona}}</td>
                        <th>{{$dato->nombre}}</th>
                        <th>{{$dato->apellidoPaterno}}</th>
                        <th>{{$dato->apellidoMaterno}}</th>
							<td class="items-center flex justify-center">	
                                
                            
                            <select id="opciones" onchange="redirigir(this)">
                                                    <option value="">Selecciona una opción</option>
                                                        <option value="{{  route('clienteFisico.detalle', ['pkCliente' => $dato->pkCliente])  }}">Detalle</option>
                                                        <option value="{{  route('clienteFisico.detalle', ['pkCliente' => $dato->pkCliente ,'vista' => 'editarCliente' ])  }}">Actualizar</option>
                                                        <option value="{{  route('personaFisca.baja', ['pkCliente' => $dato->pkCliente])  }}">Baja</option>
                            </select>
                      
							</td>
						</tr>
                    @endforeach

					</tbody>
					</thead>
				</table>

   


                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


    <script>
function redirigir(select) {
    const url = select.value;
    if (url) {
        window.location.href = url;
    }
}
</script>




    <script>





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


$('#previousBtn').on('click', function(e) {
  e.preventDefault();
  tablePersona.page('previous').draw(false);
});

// Agrega evento de clic al botón Next
$('#nextBtn').on('click', function(e) {
  e.preventDefault();
  tablePersona.page('next').draw(false);
});
$('#limpiarFiltros').on('click', function () {
    $('#fkEstatus, #fkCategoria').val('');
    tablePersona.search('').columns().search('').draw();
});

var tablePersonaSeleccionados = $('#persona-lista').DataTable({
    responsive: true,
    "language": {
        "emptyTable": "No hay datos disponibles en la tabla",
    },
});
$('#previousBtn2').on('click', function(e) {
  e.preventDefault();
  tablePersonaSeleccionados.page('previous').draw(false);
});

// Agrega evento de clic al botón Next
$('#nextBtn2').on('click', function(e) {
  e.preventDefault();
  tablePersonaSeleccionados.page('next').draw(false);
});



$('#busqueda').on('keyup', function (e) {
    var filtroBusqueda = $('#busqueda').val();
    tablePersona.search(filtroBusqueda).draw();
});

$('#limpiarFiltros').on('click', function () {
    $('#fkEstatus, #fkCategoria').val('');
    tablePersona.search('').columns().search('').draw();
});

</script>

</body>
</html>