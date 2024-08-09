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
        <div>Agregar Documento</div>

    </div>

    <form id="formulario" action="{{ route('documentoCompañia.agregar') }}" enctype="multipart/form-data" method="POST">
        @csrf
        
               <input type="hidden"  value="{{$pkCompañia}}" name="pkCompañia">
                
                <div class="flex justify-center mt-5 md:mt-10">
                    <h1 class="text-center font-bold text-2xl">Datos personales</h1>
                </div>

                <label for="">Documento</label>

                <input type="file" name="documentoSubido">



                <label for="estatusPatron" class="block mb-2 text-sm font-medium text-gray-900">Tipo Documento</label>
                        <select name="fkTipoDocumento"  id="fkTipoDocumento" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5">
                        @php
                        use App\Models\tipoDocumento;
                        $datosTipoPendiente = tipoDocumento::get();
                        @endphp
                        <option value="">Seleccion un tipo pendiente</option>
                            @foreach (  $datosTipoPendiente as $dato)
                                <option value="{{$dato->pkTipoDocumento}}">{{$dato->nombreDocumento}}</option>
                            @endforeach
				</select>



                <div>
                    <label for="fechaExpedicion" class="block mb-2 text-sm font-medium text-gray-900">Fecha de
                        Expedición</label>
                    <input type="date" name="fechaExpedicion" id="fechaExpedicion"
                        class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5"
                        >
                </div>

                <div>
                    <label for="fechaVencimiento" class="block mb-2 text-sm font-medium text-gray-900">Fecha de
                        Vencimiento</label>
                    <input type="date" name="fechaVencimiento" id="fechaVencimiento"
                        class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5"
                        >
                </div>

                
                <!-- BRO PON IF  Si es tipo factura que active esto -->

                <label for="">Serie</label>
                <input type="text" name="serie" id="totalFactura"
                        class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5"
                        >
                <label for="">Total Factura</label>
                <input type="number" name="totalFactura" id="totalFactura"
                        class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5"
                        >
                <label for="estatusPatron" class="block mb-2 text-sm font-medium text-gray-900">Tipo Documento</label>
                        <select name="fkMoneda"  id="fkTipoDocumento" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5">
                        @php
                        use App\Models\Moneda;
                        $datosMoneda = Moneda::get();
                        @endphp
                        <option value="">Seleccion un tipo pendiente</option>
                            @foreach (  $datosMoneda as $dato)
                                <option value="{{$dato->pkMoneda}}">{{$dato->nombreMoneda}}</option>
                            @endforeach
				</select>


                <label for="estatusPatron" class="block mb-2 text-sm font-medium text-gray-900">Tipo Documento</label>
                        <select name="fkTipoCambio"  id="fkTipoCambio" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5">
                        @php
                        use App\Models\tipoCambio;
                        $datosCambio = tipoCambio::get();
                        @endphp
                        <option value="">Seleccion un tipo pendiente</option>
                            @foreach (  $datosCambio as $dato)
                                <option value="{{$dato->pkTipoCambio}}">{{$dato->nombreTipoCambio}}</option>
                            @endforeach
				</select>

                <!-- BRO PON IF  Si es mas de un tipo de archivo -->


                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="documentos">Subir Archivos
                        Extras</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-green-50 focus:outline-none"
                        aria-describedby="file_input_help" type="file" id="documentos" name="documentos[]"
                        multiple>
                </div>


               


                <button id="completar" type="submit"
                    class="w-full flex items-center bg-green-500 p-2 text-base font-medium text-white rounded-lg hover:bg-green-400">
                    <svg class="flex-shrink-0 w-7 h-7 text-white transition duration-75 group-hover:text-green-"
                        width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m16 0c8.836556 0 16 7.163444 16 16s-7.163444 16-16 16-16-7.163444-16-16 7.163444-16 16-16zm6.4350288 11.7071068c-.3905242-.3905243-1.0236892-.3905243-1.4142135 0l-6.3646682 6.3632539-3.5348268-3.5348268c-.3905242-.3905243-1.0236892-.3905243-1.41421352 0-.39052429.3905243-.39052429 1.0236893 0 1.4142136l4.24264072 4.2426407c.3905243.3905242 1.0236892.3905242 1.4142135 0 .0040531-.0040531.0080641-.0081323.012033-.0122371l7.0590348-7.0588308c.3905243-.3905242.3905243-1.0236892 0-1.4142135z"
                            fill="currentColor" fill-rule="evenodd" />
                    </svg>
                    <p class="flex-1 ms-3 whitespace-nowrap">Aplicar</p>
                </button>



    </form>

   


</body>

</html>
