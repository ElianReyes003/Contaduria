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
        <div>Registrar Compañia</div>    
 
    </div>

    

    <form id="formulario" action="{{ route('compañia.insertar') }}" enctype="multipart/form-data" method="post">
    @csrf


    <h2>Sube los archivos (si es necesario)</h2>
        <label for="">firma electronica</label>

      <input type="file" name="firmaElectronica">
      <h3>Fecha Expedicion firma</h3>
      <input type="date" name="fechaExpedicionFirma">
      <h3>Fecha Vencimiento firma</h3>
      <input type="date" name="fechaExpedicionVencimientoFirma">


      <label for="">Carga Factura</label>

      <input type="file" name="factura">
      <h3>Fecha Expedicion Factura</h3>
      <input type="date" name="fechaExpedicionFactura">
      <h3>Fecha Vencimiento Factura</h3>
      <input type="date" name="fechaExpedicionVencimientoFactura">


      <label for="">Carga Factura</label>

        <input type="file" name="factura">
        <h3>Fecha Expedicion Factura</h3>
        <input type="date" name="fechaExpedicionFactura">
        <h3>Fecha Vencimiento Factura</h3>
        <input type="date" name="fechaExpedicionVencimientoFactura">


        <label for="">Estado de cuenta</label>

        <input type="file" name="estadoCuenta">
        <h3>Fecha Expedicion Estado de Cuenta</h3>
        <input type="date" name="fechaExpedicionEstadoCuenta">
        <h3>Fecha Vencimiento Estado de Cuenta</h3>
        <input type="date" name="fechaVencimientoEstadoCuenta">



        <label for="">Papeles de trabajo</label>

        <input type="file" name="papelesDeTrabajo">
        <h3>Fecha Expedicion Estado de Cuenta</h3>
        <input type="date" name="fechaExpedicionPapelesTrabajo">
        <h3>Fecha Vencimiento Estado de Cuenta</h3>
        <input type="date" name="fechaVencimientoPapelesTrabajo">

        <label for="">Subir Archivos Extras</label>

        <input type="file" name="documentos[]"  multiple>









    <div class="p-4 sm:ml-64 mt-16 md:mt-10">
        <!-- Guias del tamaño del contenedor -->
        <div class="p-4">
            <!-- PON EL CODIGO DEL MODULO AQUI -->
            <div class="bg-white rounded-lg shadow-lg p-4">
              
                <div class="flex justify-center mt-5 md:mt-10">
                    <h1 class="text-center font-bold text-2xl">Registrar Compañia</h1>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-10">
                 
                    <div>
                        <label for="rfc" class="block mb-2 text-sm font-medium text-gray-900">RFC</label>
                        <input type="text" name="rfc" id="rfc" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>
                    <div>
                        <label for="curp" class="block mb-2 text-sm font-medium text-gray-900">Denominacion Fiscal</label>
                        <input type="text" name="denominacion" id="denominacion" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>

                    <div>
                        <label for="curp" class="block mb-2 text-sm font-medium text-gray-900">Regimen Capital</label>
                        <input type="text" name="regimenCapital" id="denominacion" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
                    </div>

                    <div>
                        <label for="curp" class="block mb-2 text-sm font-medium text-gray-900">Nombre Comercial</label>
                        <input type="text" name="nombreComercial" id="denominacion" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" placeholder="" required>
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
                        <input type="date" name="fechaOperaciones" id="fecha_inicio_operaciones" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
                    </div>
                    <div>
                        <label for="fecha_ultimo_cambio_de_estado" class="block mb-2 text-sm font-medium text-gray-900">Fecha de último cambio de estado</label>
                        <input type="date" name="fechaCambioEstado" id="fecha_ultimo_cambio_de_estado" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5" required>
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
            </div>
        </div>
    </div>



        <input type="hidden" name="persona[]" value="">
       

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

   

</script>


</body>
</html>