<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
</head>
<body>
    <div>
        <div>Agregar Cliente</div>    
 
    </div>

    

    <form id="formulario" action="{{ route('cliente.insertar') }}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="p-4 sm:ml-64 mt-16 md:mt-10">
        <!-- Guias del tamaño del contenedor -->
        <div class="p-4">
            <!-- PON EL CODIGO DEL MODULO AQUI -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <div class="flex justify-center mt-5 md:mt-10">
                    <h1 class="text-center font-bold text-2xl">Ingrese los datos de usuario de cliente</h1>
                </div>
                <div class="mt-10">
                    <div class="grid gap-6 mb-6 md:grid-cols-2 mt-10">
                        <div>
                            <label for="nombreUsuarioCliente" class="block mb-2 text-sm font-medium text-gray-900">Nombre Cliente</label>
                            <input type="text" name="nombreUsuarioCliente" id="nombreUsuarioCliente" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div>
                            <label for="contraseñaCliente" class="block mb-2 text-sm font-medium text-gray-900">Contraseña Cliente</label>
                            <input type="text" name="contraseñaCliente" id="contraseñaCliente" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-5 md:mt-10">
                    <h1 class="text-center font-bold text-2xl">Datos personales</h1>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-10">
                    <div>
                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="apellidoPaterno" class="block mb-2 text-sm font-medium text-gray-900">Apellido Paterno</label>
                        <input type="text" name="apellidoPaterno" id="apellidoPaterno" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="apellidoMaterno" class="block mb-2 text-sm font-medium text-gray-900">Apellido Materno</label>
                        <input type="text" name="apellidoMaterno" id="apellidoMaterno" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="rfc" class="block mb-2 text-sm font-medium text-gray-900">RFC</label>
                        <input type="text" name="rfc" id="rfc" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="curp" class="block mb-2 text-sm font-medium text-gray-900">CURP</label>
                        <input type="text" name="curp" id="curp" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="estatusPatron" class="block mb-2 text-sm font-medium text-gray-900">Estatus del patrón</label>
                        <select name="estatusPatron" id="estatusPatron" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div>
                        <label for="fecha_inicio_operaciones" class="block mb-2 text-sm font-medium text-gray-900">Fecha de inicio de operaciones</label>
                        <input type="date" name="fecha_inicio_operaciones" id="fecha_inicio_operaciones" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="fecha_ultimo_cambio_de_estado" class="block mb-2 text-sm font-medium text-gray-900">Fecha de último cambio de estado</label>
                        <input type="date" name="fecha_ultimo_cambio_de_estado" id="fecha_ultimo_cambio_de_estado" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
                    </div>
                </div>
                <div class="flex justify-center mt-5 md:mt-10">
                    <h1 class="text-center font-bold text-2xl">Datos del domicilio</h1>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-10">
                    <div>
                        <label for="codigoPostal" class="block mb-2 text-sm font-medium text-gray-900">Código Postal</label>
                        <input type="text" name="codigoPostal" id="codigoPostal" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="tipoViabilidad" class="block mb-2 text-sm font-medium text-gray-900">Tipo Viabilidad</label>
                        <input type="text" name="tipoViabilidad" id="tipoViabilidad" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="nombreViabilidad" class="block mb-2 text-sm font-medium text-gray-900">Nombre de Viabilidad</label>
                        <input type="text" name="nombreViabilidad" id="nombreViabilidad" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="numeroInterior" class="block mb-2 text-sm font-medium text-gray-900">Número interior</label>
                        <input type="text" name="numeroInterior" id="numeroInterior" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="colonia" class="block mb-2 text-sm font-medium text-gray-900">Colonia</label>
                        <input type="text" name="colonia" id="colonia" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="localidad" class="block mb-2 text-sm font-medium text-gray-900">Localidad</label>
                        <input type="text" name="localidad" id="localidad" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="municipio" class="block mb-2 text-sm font-medium text-gray-900">Municipio</label>
                        <input type="text" name="municipio" id="municipio" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="entidadFederativa" class="block mb-2 text-sm font-medium text-gray-900">Entidad Federativa</label>
                        <input type="text" name="entidadFederativa" id="entidadFederativa" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="entreCalle" class="block mb-2 text-sm font-medium text-gray-900">Entre Calle</label>
                        <input type="text" name="entreCalle" id="entreCalle" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="yCalle" class="block mb-2 text-sm font-medium text-gray-900">Y Calle</label>
                        <input type="text" name="yCalle" id="yCalle" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="correoElectronico" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico</label>
                        <input type="text" name="correoElectronico" id="correoElectronico" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                </div>
                <button type="submit" class="w-full flex items-center bg-green-500 p-2 text-base font-medium text-white rounded-lg hover:bg-green-400">
                    <svg class="flex-shrink-0 w-7 h-7 text-white transition duration-75 group-hover:text-green-" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="m16 0c8.836556 0 16 7.163444 16 16s-7.163444 16-16 16-16-7.163444-16-16 7.163444-16 16-16zm6.4350288 11.7071068c-.3905242-.3905243-1.0236892-.3905243-1.4142135 0l-6.3646682 6.3632539-3.5348268-3.5348268c-.3905242-.3905243-1.0236892-.3905243-1.41421352 0-.39052429.3905243-.39052429 1.0236893 0 1.4142136l4.24264072 4.2426407c.3905243.3905242 1.0236892.3905242 1.4142135 0 .0040531-.0040531.0080641-.0081323.012033-.0122371l7.0590348-7.0588308c.3905243-.3905242.3905243-1.0236892 0-1.4142135z" fill="currentColor" fill-rule="evenodd"/>
                    </svg>
                    <p class="flex-1 ms-3 whitespace-nowrap">Aplicar</p>
                </button>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg mt-10">
			<div class="flex justify-center mb-[1rem]">
				<div class="">
					<h1 class="text-center font-bold text-2xl mt-5">Selecciona articulos</h1>
				</div>
			</div>
			<table class="w-full table-auto mt-[1rem]"  id="tablaArticulos" class="display nowrap" width="90%">
				<thead class="text-center">
					<tr class="h-24 text-center">
                        <td class="oculto">ID</td>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Estatus</th>
                        <th>Enganche</th>
                        <th>Seleccionar</th>
					</tr>
					<tbody>
                    @foreach ($datosArticulos as $dato ) 
						<tr class="h-20">
                        <td class="oculto">{{$dato->pkArticulo}}</td>
                        <th>{{$dato->nombreArticulo}}</th>
                        <th>{{$dato->nombreCategoriaArticulo}}</th>
                        <th>{{$dato->cantidadTipoVenta}}</th>
                        <th>
                            @if($dato->ESTATUSARTICULO == 1)
                                Disponible
                            @elseif($dato->ESTATUSARTICULO == 2)
                                Por Agotarse
                            @elseif($dato->ESTATUSARTICULO == 0)
                                No Disponible
                            @else
                                Estado Desconocido
                            @endif
                        </th>
                        <th>{{$dato->enganche}}</th>
							<td class="items-center flex justify-center">									
								<div class="mt-2 md:mt-5">
									<input type="checkbox" name="articulo-seleccionado" class="seleccionar-articulo" data-articulo-id="{{$dato->pkArticulo}}" class="w-6 h-6 rounded text-green-400 bg-gray-100 border-gray-300 focus:ring-green-400 focus:ring-2">
                                </div>
							</td>
						</tr>
                    @endforeach

					</tbody>
					</thead>
				</table>

    <table class="w-full table-auto mt-[1rem]" id="articulos-lista" class="display nowrap" width="90%">
			<thead class="text-center">
				<tr class="h-24 text-center">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Ingresa cantidad</th>
                    <th>Tipo de compra</th>
                    <th>Enganche</th>
                    <th>Cancelar</th>
				</tr>
				<tbody id="detalle-articulos-body">
					
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






        <input type="hidden" name="producto_id[]" value="">
        <input type="hidden" name="cantidadotas[]" value="">
        <input type="hidden" name="tipoVenta[]" value="">




</form>


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>







</body>
</html>