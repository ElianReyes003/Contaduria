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
        <div>Agregar Cliente</div>    
 
    </div>

    

    <form id="formulario" action="{{ route('personaFisico.actualizar') }}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="p-4 sm:ml-64 mt-16 md:mt-10">
        <!-- Guias del tamaño del contenedor -->
        <div class="p-4">
            <!-- PON EL CODIGO DEL MODULO AQUI -->
            <div class="bg-white rounded-lg shadow-lg p-4">
                <div class="flex justify-center mt-5 md:mt-10">
                    <h1 class="text-center font-bold text-2xl">Ingrese los datos de usuario de cliente</h1>
                </div>


                <input type="hidden" name="pkCliente" value="{{$datoPersonaFisica->pkCliente}}">
                <div class="mt-10">
                    <div class="grid gap-6 mb-6 md:grid-cols-2 mt-10">
                        <div>
                            <label for="nombreUsuarioCliente" class="block mb-2 text-sm font-medium text-gray-900">Nombre Cliente</label>
                            <input type="text" name="nombreUsuarioCliente" value="{{$datoPersonaFisica->nombreUsuarioCliente}}"id="nombreUsuarioCliente" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                        </div>
                        <div>
                            <label for="contraseñaCliente" class="block mb-2 text-sm font-medium text-gray-900">Contraseña Cliente</label>
                            <input type="text" name="contraseñaCliente"  value="{{$datoPersonaFisica->contraseñaCliente}}" id="contraseñaCliente" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-5 md:mt-10">
                    <h1 class="text-center font-bold text-2xl">Datos personales</h1>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-10">
                    <div>
                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                        <input type="text" name="nombre" value="{{$datoPersonaFisica->nombre}}" id="nombre" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="apellidoPaterno" class="block mb-2 text-sm font-medium text-gray-900">Apellido Paterno</label>
                        <input type="text" name="apellidoPaterno" value="{{$datoPersonaFisica->apellidoPaterno}}" id="apellidoPaterno" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="apellidoMaterno" class="block mb-2 text-sm font-medium text-gray-900">Apellido Materno</label>
                        <input type="text" name="apellidoMaterno"  value="{{$datoPersonaFisica->apellidoMaterno}}" id="apellidoMaterno" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="rfc" class="block mb-2 text-sm font-medium text-gray-900">RFC</label>
                        <input type="text" name="rfc" id="rfc"   value="{{$datoPersonaFisica->rfc}}" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="curp" class="block mb-2 text-sm font-medium text-gray-900">CURP</label>
                        <input type="text" name="curp" id="curp"  value="{{$datoPersonaFisica->curp}}" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="estatusPatron" class="block mb-2 text-sm font-medium text-gray-900">Estatus del patrón</label>
                        <select name="estatusPatron" id="estatusPatron" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5">
                            <option value="1" {{ $datoPersonaFisica->estatusPatron == 1 ? 'selected' : '' }}>Activo</option>
                            <option value="2" {{ $datoPersonaFisica->estatusPatron == 2 ? 'selected' : '' }}>Inactivo</option>
                        </select>

                    </div>
                    <div>
                        <label for="fecha_inicio_operaciones" class="block mb-2 text-sm font-medium text-gray-900">Fecha de inicio de operaciones</label>
                        <input type="date" name="fecha_inicio_operaciones" value="{{$datoPersonaFisica->fecha_inicio_operaciones}}" id="fecha_inicio_operaciones" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="fecha_ultimo_cambio_de_estado" class="block mb-2 text-sm font-medium text-gray-900">Fecha de último cambio de estado</label>
                        <input type="date" name="fecha_ultimo_cambio_de_estado" value="{{$datoPersonaFisica->fecha_ultimo_cambio_de_estado}}" id="fecha_ultimo_cambio_de_estado" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
                    </div>
                </div>
                <div class="flex justify-center mt-5 md:mt-10">
                    <h1 class="text-center font-bold text-2xl">Datos del domicilio</h1>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-10">
                    <div>
                        <label for="codigoPostal" class="block mb-2 text-sm font-medium text-gray-900">Código Postal</label>
                        <input type="text" name="codigoPostal" value="{{$datoPersonaFisica->codigoPostal}}" id="codigoPostal" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="tipoViabilidad" class="block mb-2 text-sm font-medium text-gray-900">Tipo Viabilidad</label>
                        <input type="text" name="tipoViabilidad" value="{{$datoPersonaFisica->tipoViabilidad}}" id="tipoViabilidad" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="nombreViabilidad" class="block mb-2 text-sm font-medium text-gray-900">Nombre de Viabilidad</label>
                        <input type="text" name="nombreViabilidad"  value="{{$datoPersonaFisica->nombreViabilidad}}"id="nombreViabilidad" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="numeroInterior" class="block mb-2 text-sm font-medium text-gray-900">Número interior</label>
                        <input type="text" name="numeroInterior" value="{{$datoPersonaFisica->numeroInterior}}" id="numeroInterior" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="colonia" class="block mb-2 text-sm font-medium text-gray-900">Colonia</label>
                        <input type="text" name="colonia"  value="{{$datoPersonaFisica->colonia}}" id="colonia" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="localidad" class="block mb-2 text-sm font-medium text-gray-900">Localidad</label>
                        <input type="text" name="localidad" value="{{$datoPersonaFisica->localidad}}" id="localidad" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="municipio" class="block mb-2 text-sm font-medium text-gray-900">Municipio</label>
                        <input type="text" name="municipio" value="{{$datoPersonaFisica->municipio}}" id="municipio" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="entidadFederativa" class="block mb-2 text-sm font-medium text-gray-900">Entidad Federativa</label>
                        <input type="text" name="entidadFederativa" value="{{$datoPersonaFisica->entidadFederativa}}" id="entidadFederativa" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="entreCalle" class="block mb-2 text-sm font-medium text-gray-900">Entre Calle</label>
                        <input type="text" name="entreCalle" id="entreCalle" value="{{$datoPersonaFisica->entreCalle}}"  class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="yCalle" class="block mb-2 text-sm font-medium text-gray-900">Y Calle</label>
                        <input type="text" name="yCalle" id="yCalle" value="{{$datoPersonaFisica->yCalle}}" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="correoElectronico" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico</label>
                        <input type="text" name="correoElectronico" value="{{$datoPersonaFisica->correoElectronico}}" id="correoElectronico" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                </div>
            </div>
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
                        <th>Seleccionar</th>
					</tr>
					<tbody>
                    @foreach ($datosPersonasFisicas as $dato ) 
						<tr class="h-20">
                        <td class="oculto">{{$dato->pkPersona}}</td>
                        <th>{{$dato->nombre}}</th>
                        <th>{{$dato->apellidoPaterno}}</th>
                        <th>{{$dato->apellidoMaterno}}</th>
							<td class="items-center flex justify-center">									
								<div class="mt-2 md:mt-5">
									<input type="checkbox" name="persona-seleccionado" class="seleccionar-persona" data-persona-id="{{$dato->pkPersona}}" class="w-6 h-6 rounded text-green-400 bg-gray-100 border-gray-300 focus:ring-green-400 focus:ring-2">
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
                <td >ID</td>
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
					<h1 class="text-center font-bold text-2xl mt-5">Selecciona Compañia</h1>
				</div>
			</div>

			<table class="w-full table-auto mt-[1rem]"  id="tablaCompañia" class="display nowrap" width="90%">
				<thead class="text-center">
					<tr class="h-24 text-center">
                        <td class="oculto">ID</td>
                        <th>Compañia</th>
                        <th>Seleccionar</th>
                    
					</tr>
					<tbody>
                    @foreach ($datosCompañias as $dato ) 
						<tr class="h-20">
                        <td class="oculto">{{$dato->pkCompañia}}</td>
                        <th>{{$dato->nombreComercial}}</th>
            
							<td class="items-center flex justify-center">									
								<div class="mt-2 md:mt-5">
									<input type="checkbox" name="compañia-seleccionado" class="seleccionar-compañia" data-persona-id="{{$dato->pkCompañia}}" class="w-6 h-6 rounded text-green-400 bg-gray-100 border-gray-300 focus:ring-green-400 focus:ring-2">
                                </div>
							</td>
						</tr>
                    @endforeach

					</tbody>
					</thead>
				</table>

    <table class="w-full table-auto mt-[1rem]" id="compañia-lista" class="display nowrap" width="90%">
			<thead class="text-center">
				<tr class="h-24 text-center">
                <td >ID</td>
                        <th>Compañia</th>
                        <th>Cancelar</th>
				</tr>
				<tbody id="detalle-compañia-body">
					
				</tbody>
				</thead>
			</table>
			<div class="flex justify-center	mt-16">
				<div class="md:p-10 p-5">
					  <div class="flex">
						<!-- Previous Button -->
                            <button id="previousBtn3" class="flex items-center justify-center px-4 h-10 md:px-10 md:mr-20 mr-10 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
							  Anterior
							</button>
							<!-- Next Button -->
							<button   id="nextBtn3"  class="flex items-center justify-center px-4 h-10 md:px-10 md:ml-20 ml-10 ms-3 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
							  Siguiente
							</button>
					  </div>
				</div>
			</div>




<div class="flex justify-center mt-5 md:mt-10">
    <h1 class="text-center font-bold text-2xl">Datos personales</h1>
</div>


    <label class="block mb-2 text-sm font-medium text-gray-900" for="firmaElectronica">Carga Firma-E</label>
    <input name="firmaElectronica" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-green-50 focus:outline-none" aria-describedby="file_input_help" id="firmaElectronica" type="file">


<div>
    <label for="fechaExpedicionFirma" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Expedición</label>
    <input type="date" name="fechaExpedicionFirma" id="fechaExpedicionFirma" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
</div>

<div>
    <label for="fechaVencimientoFirma" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Vencimiento</label>
    <input type="date" name="fechaVencimientoFirma" id="fechaVencimientoFirma" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
</div>

<div>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="factura">Carga Factura</label>
    <input name="factura" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-green-50 focus:outline-none" aria-describedby="file_input_help" id="factura" type="file">
</div>

<div>
    <label for="fechaExpedicionFactura" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Expedición</label>
    <input type="date" name="fechaExpedicionFactura" id="fechaExpedicionFactura" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
</div>

<div>
    <label for="fechaVencimientoFactura" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Vencimiento</label>
    <input type="date" name="fechaVencimientoFactura" id="fechaVencimientoFactura" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
</div>

<div>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="estadoCuenta">Estado de cuenta</label>
    <input name="estadoCuenta" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-green-50 focus:outline-none" aria-describedby="file_input_help" id="estadoCuenta" type="file">
</div>

<div>
    <label for="fechaExpedicionEstadoCuenta" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Expedición</label>
    <input type="date" name="fechaExpedicionEstadoCuenta" id="fechaExpedicionEstadoCuenta" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
</div>

<div>
    <label for="fechaVencimientoEstadoCuenta" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Vencimiento</label>
    <input type="date" name="fechaVencimientoEstadoCuenta" id="fechaVencimientoEstadoCuenta" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
</div>

<div>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="papelesDeTrabajo">Papeles de trabajo</label>
    <input name="papelesDeTrabajo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-green-50 focus:outline-none" aria-describedby="file_input_help" id="papelesDeTrabajo" type="file">
</div>

<div>
    <label for="fechaExpedicionPapelesTrabajo" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Expedición</label>
    <input type="date" name="fechaExpedicionPapelesTrabajo" id="fechaExpedicionPapelesTrabajo" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
</div>

<div>
    <label for="fechaVencimientoPapelesTrabajo" class="block mb-2 text-sm font-medium text-gray-900">Fecha de Vencimiento</label>
    <input type="date" name="fechaVencimientoPapelesTrabajo" id="fechaVencimientoPapelesTrabajo" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
</div>

<div>
    <label class="block mb-2 text-sm font-medium text-gray-900" for="documentos">Subir Archivos Extras</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-green-50 focus:outline-none" aria-describedby="file_input_help" type="file" id="documentos" name="documentos[]" multiple>
</div>


        <input type="hidden" name="persona[]" value="">
        <input type="hidden" name="compañia[]" value="">
       

        <button id="completar" type="submit" class="w-full flex items-center bg-green-500 p-2 text-base font-medium text-white rounded-lg hover:bg-green-400">
                    <svg class="flex-shrink-0 w-7 h-7 text-white transition duration-75 group-hover:text-green-" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="m16 0c8.836556 0 16 7.163444 16 16s-7.163444 16-16 16-16-7.163444-16-16 7.163444-16 16-16zm6.4350288 11.7071068c-.3905242-.3905243-1.0236892-.3905243-1.4142135 0l-6.3646682 6.3632539-3.5348268-3.5348268c-.3905242-.3905243-1.0236892-.3905243-1.41421352 0-.39052429.3905243-.39052429 1.0236893 0 1.4142136l4.24264072 4.2426407c.3905243.3905242 1.0236892.3905242 1.4142135 0 .0040531-.0040531.0080641-.0081323.012033-.0122371l7.0590348-7.0588308c.3905243-.3905242.3905243-1.0236892 0-1.4142135z" fill="currentColor" fill-rule="evenodd"/>
                    </svg>
                    <p class="flex-1 ms-3 whitespace-nowrap">Aplicar</p>
        </button>



</form>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>




    <script>
$(document).ready(function () {
    var tableCompañia = $('#tablaCompañia').DataTable({
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

    var tableCompañiasSeleccionados = $('#compañia-lista').DataTable({
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

    $('#previousBtn3').on('click', function(e) {
        e.preventDefault();
        tableCompañia.page('previous').draw(false);
    });

    $('#nextBtn3').on('click', function(e) {
        e.preventDefault();
        tableCompañia.page('next').draw(false);
    });

    // Eventos para la búsqueda
    $('#busqueda').on('keyup', function() {
        var filtroBusqueda = $('#busqueda').val();
        tablePersona.search(filtroBusqueda).draw();
    });

    $('#busqueda2').on('keyup', function() {
        var filtroBusqueda2 = $('#busqueda2').val();
        tableCompañia.search(filtroBusqueda2).draw();
    });

    // Evento para limpiar filtros
    $('#limpiarFiltros').on('click', function () {
        $('#fkEstatus, #fkCategoria').val('');
        tablePersona.search('').columns().search('').draw();
    });

    // Evento para seleccionar y desmarcar personas
    $('#tablaPersonas tbody').on('click', '.seleccionar-persona', function () {
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
            tablePersonaSeleccionados.rows().every(function () {
                if (this.data()[0] === personaId) {
                    this.remove().draw();
                }
            });
        }

        actualizarCamposOcultos();
    });

    // Evento para seleccionar y desmarcar compañías
    $('#tablaCompañia tbody').on('click', '.seleccionar-compañia', function () {
        var checkbox = $(this);
        var row = checkbox.closest('tr');
        var data = tableCompañia.row(row).data();
        var compañiaId = data[0];

        if (checkbox.prop('checked')) {
            tableCompañiasSeleccionados.row.add([
                data[0],
                data[1],
                `<button class="cancelar-compañia flex items-center justify-center px-4 h-10 md:px-10 md:mr-20 mr-10 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400" data-compañia-id="${compañiaId}">Cancelar</button>`
            ]).draw();
        } else {
            tableCompañiasSeleccionados.rows().every(function () {
                if (this.data()[0] === compañiaId) {
                    this.remove().draw();
                }
            });
        }

        actualizarCamposOcultos();
    });

    // Evento para cancelar la selección de una persona
    $('#persona-lista tbody').on('click', 'button.cancelar-persona', function () {
        var personaId = $(this).data('persona-id');
        tablePersonaSeleccionados.row($(this).closest('tr')).remove().draw();

        $('#tablaPersonas tbody tr').each(function () {
            var data = tablePersona.row(this).data();
            if (data[0] === personaId) {
                $(this).find('.seleccionar-persona').prop('checked', false);
            }
        });

        actualizarCamposOcultos();
    });

    // Evento para cancelar la selección de una compañía
    $('#compañia-lista tbody').on('click', 'button.cancelar-compañia', function () {
        var compañiaId = $(this).data('compañia-id');
        tableCompañiasSeleccionados.row($(this).closest('tr')).remove().draw();

        $('#tablaCompañia tbody tr').each(function () {
            var data = tableCompañia.row(this).data();
            if (data[0] === compañiaId) {
                $(this).find('.seleccionar-compañia').prop('checked', false);
            }
        });

        actualizarCamposOcultos();
    });

    // Función para actualizar los campos ocultos en el formulario
    function actualizarCamposOcultos() {
        $('#formulario').find('input[name="persona[]"]').remove();
        $('#formulario').find('input[name="compañia[]"]').remove();

        tablePersonaSeleccionados.rows().every(function () {
            var data = this.data();
            var personaId = data[0];
            $('#formulario').append(`<input type='hidden' name='persona[]' value='${personaId}'>`);
        });

        tableCompañiasSeleccionados.rows().every(function () {
            var data = this.data();
            var compañiaId = data[0];
            $('#formulario').append(`<input type='hidden' name='compañia[]' value='${compañiaId}'>`);
        });

        var fileInputs = ['firmaElectronica', 'factura', 'estadoCuenta', 'papelesDeTrabajo'];
        fileInputs.forEach(function(inputName) {
            var fileInput = document.getElementById(inputName);
            if (fileInput.files.length > 0) {
                $('#formulario').append(`<input type='hidden' name='${inputName}' value='${fileInput.files[0].name}'>`);
            }
        });

        var documentosInput = document.getElementById('documentos');
        for (var i = 0; i < documentosInput.files.length; i++) {
            $('#formulario').append(`<input type='hidden' name='documentos[]' value='${documentosInput.files[i].name}'>`);
        }
    }

    // Evento para completar la selección y enviar el formulario
    $('#completar').click(function () {
        actualizarCamposOcultos();
        $('#formulario').submit();
    });
});
</script>

</body>
</html>