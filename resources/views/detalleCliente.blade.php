<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Dashboard (Cliente) | JP Despacho Contable</title>
    <link href="{{ asset('img/logo.ico') }}" rel="icon" type="image/x-icon">
</head>

<body>
    <div>

        <div>Detalle Cliente</div>

    </div>
    <div>
        {{ $datoPersonaFisica->nombre }}

    </div>

    <div>
        {{ $datoPersonaFisica->apellidoPaterno }}

    </div>

    <div>
        {{ $datoPersonaFisica->apellidoMaterno }}

    </div>

    <div>
        {{ $datoPersonaFisica->rfc }}

    </div>
    <div>
        {{ $datoPersonaFisica->curp }}

    </div>
    <div>
        {{ $datoPersonaFisica->fecha_inicio_operaciones }}

    </div>

    <div>
        {{ $datoPersonaFisica->fecha_ultimo_cambio_de_estado }}

    </div>
    <div>
        {{ $datoPersonaFisica->nombreUsuarioCliente }}

    </div>

    <div>
        {{ $datoPersonaFisica->contraseñaCliente }}

    </div>
    <div>
        {{ $datoPersonaFisica->estatusPatron }}

    </div>



    <div>
        {{ $datoPersonaFisica->codigoPostal }}

    </div>

    <div>
        {{ $datoPersonaFisica->tipoViabilidad }}

    </div>

    <div>
        {{ $datoPersonaFisica->nombreViabilidad }}

    </div>

    <div>
        {{ $datoPersonaFisica->colonia }}

    </div>

    <div>
        {{ $datoPersonaFisica->localidad }}

    </div>


    <div>
        {{ $datoPersonaFisica->municipio }}

    </div>

    <div>
        {{ $datoPersonaFisica->entidadFederativa }}

    </div>

    <div>
        {{ $datoPersonaFisica->entreCalle }}

    </div>
    <div>
        {{ $datoPersonaFisica->yCalle }}

    </div>
    <div>
        {{ $datoPersonaFisica->correoElectronico }}

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
                        use App\Models\TipoPendienteCliente;
                        $datosTipoPendiente = TipoPendienteCliente::get();
                        @endphp
                        <option value="">Seleccion un tipo pendiente</option>
                            @foreach (  $datosTipoPendiente as $dato)
                                <option value="{{$dato->nombreTipoPendienteCliente}}">{{$dato->nombreTipoPendienteCliente}}</option>
                            @endforeach
				</select>



			
                <div>
                    <button  type="button"id="limpiarFiltros3"  class="flex items-center justify-center px-4 h-10 md:px-10 md:ml-20 ml-10 ms-3 text-base font-medium text-white bg-orange-500 border rounded-lg hover:bg-orange-400">
                        Limpiar filtros
                    </button>
                </div>


    <h2>Pendientes</h2>
    <div class="flex justify-center md:justify-normal items-center mt-10">
        <form class="w-[13rem] md:w-[30rem]">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                   
                </div>
                <input type="search" id="busquedaPendientesClientes"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-400 focus:border-green-400"
                    placeholder="Buscar" required>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-lg mt-10">
        <div class="flex justify-center mb-[1rem]">
            <div class="">
                <h1 class="text-center font-bold text-2xl mt-5">Tareas de personas fisicas </h1>
            </div>
        </div>

        <table class="w-full table-auto mt-[1rem]" id="tablaPendientesClientes" class="display nowrap" width="90%">
            <thead class="text-center">
                <tr class="h-24 text-center">
                    <th>Tarea Pendiente</th>
                    <th>Nombre Completo</th>
                    <th>Categoria Pendiente</th>
                    <th>Fecha Pendiente</th>
                    <th>Subir</th>
                </tr>
            <tbody>
                @foreach ($datosPendientes as $dato)
                    <tr class="h-20">
                        <td class="oculto">{{ $dato->tareaCliente }}</td>
                        <th>{{ $dato->nombre .' '.$dato->apellidoPaterno . ' '. $dato->apellidoMaterno }}</th></th>
                        <th>{{$dato->nombreTipoPendienteCliente}}</th>
                        <th>{{$dato->fechaPendienteCliente}}</th>
                        <td class="items-center flex justify-center">
                            <a href="#"
                                class="flex w-11 h-11 items-center mt-2 bg-green-500 p-2 text-base font-medium text-white rounded-lg hover:bg-green-400">
                                <svg class="flex-shrink-0 w-7 h-7 text-white transition duration-75" fill="currentColor"
                                    width="800px" height="800px" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 11.46V16.46C2 18.75 3.85 20.6 6.14 20.6H17.85C20.14 20.6 22 18.74 22 16.45V11.46C22 10.79 21.46 10.25 20.79 10.25H3.21C2.54 10.25 2 10.79 2 11.46ZM8 17.25H6C5.59 17.25 5.25 16.91 5.25 16.5C5.25 16.09 5.59 15.75 6 15.75H8C8.41 15.75 8.75 16.09 8.75 16.5C8.75 16.91 8.41 17.25 8 17.25ZM14.5 17.25H10.5C10.09 17.25 9.75 16.91 9.75 16.5C9.75 16.09 10.09 15.75 10.5 15.75H14.5C14.91 15.75 15.25 16.09 15.25 16.5C15.25 16.91 14.91 17.25 14.5 17.25Z"
                                        fill="currentColor" />
                                    <path
                                        d="M13.5 4.60844V7.53844C13.5 8.20844 12.96 8.74844 12.29 8.74844H3.21C2.53 8.74844 2 8.18844 2 7.51844C2.01 6.38844 2.46 5.35844 3.21 4.60844C3.96 3.85844 5 3.39844 6.14 3.39844H12.29C12.96 3.39844 13.5 3.93844 13.5 4.60844Z"
                                        fill="currentColor" />
                                    <path
                                        d="M19.97 2H17.03C15.76 2 15 2.76 15 4.03V6.97C15 8.24 15.76 9 17.03 9H19.97C21.24 9 22 8.24 22 6.97V4.03C22 2.76 21.24 2 19.97 2ZM20.91 5.93C20.81 6.03 20.66 6.1 20.5 6.11H19.09L19.1 7.5C19.09 7.67 19.03 7.81 18.91 7.93C18.81 8.03 18.66 8.1 18.5 8.1C18.17 8.1 17.9 7.83 17.9 7.5V6.1L16.5 6.11C16.17 6.11 15.9 5.83 15.9 5.5C15.9 5.17 16.17 4.9 16.5 4.9L17.9 4.91V3.51C17.9 3.18 18.17 2.9 18.5 2.9C18.83 2.9 19.1 3.18 19.1 3.51L19.09 4.9H20.5C20.83 4.9 21.1 5.17 21.1 5.5C21.09 5.67 21.02 5.81 20.91 5.93Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
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
                    <button id="previousBtn3"
                        class="flex items-center justify-center px-4 h-10 md:px-10 md:mr-20 mr-10 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
                        Anterior
                    </button>
                    <!-- Next Button -->
                    <button id="nextBtn3"
                        class="flex items-center justify-center px-4 h-10 md:px-10 md:ml-20 ml-10 ms-3 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
                        Siguiente
                    </button>
                </div>
            </div>
        </div>



    
        <label for="underline_select" class="sr-only">Selecciona dia</label>
                    <input datepicker type="date" id="dia4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full ps-10 p-2.5" placeholder="Select date">
                </div>
                <div class="relative max-w-sm">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                  
                    </div>
                    <label for="underline_select" class="sr-only">Selecciona mes</label>
                    <input datepicker type="month" id="mes4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-400 focus:border-orange-400 block w-full ps-10 p-2.5" placeholder="Select date">
                </div>

    <label for="estatusPatron" class="block mb-2 text-sm font-medium text-gray-900">Tipo Pendiente</label>
                        <select name="fkTipoPendiente4"  id="fkTipoPendiente4" class="bg-green-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-400 focus:border-green-400 block w-full p-2.5">
                        @php
                        
                        $datosTipoPendiente = TipoPendienteCliente::get();
                        @endphp
                        <option value="">Seleccion un tipo pendiente</option>
                            @foreach (  $datosTipoPendiente as $dato)
                                <option value="{{$dato->nombreTipoPendienteCliente}}">{{$dato->nombreTipoPendienteCliente}}</option>
                            @endforeach
				</select>



			
                <div>
                    <button  type="button"id="limpiarFiltros4"  class="flex items-center justify-center px-4 h-10 md:px-10 md:ml-20 ml-10 ms-3 text-base font-medium text-white bg-orange-500 border rounded-lg hover:bg-orange-400">
                        Limpiar filtros
                    </button>
                </div>





        <h2>Pendientes Compañia</h2>
    <div class="flex justify-center md:justify-normal items-center mt-10">
        <form class="w-[13rem] md:w-[30rem]">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    
                </div>
                <input type="search" id="busqueda4"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-400 focus:border-green-400"
                    placeholder="Buscar" required>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-lg mt-10">
        <div class="flex justify-center mb-[1rem]">
            <div class="">
                <h1 class="text-center font-bold text-2xl mt-5">Pendientes Compañias</h1>
            </div>
        </div>

        <table class="w-full table-auto mt-[1rem]" id="tablaPendienteCompañias" class="display nowrap" width="90%">
            <thead class="text-center">
                <tr class="h-24 text-center">
                    <th>Tarea Pendiente</th>
                    <th>Nombre Completo</th>
                    <th>Categoria Pendiente</th>
                    <th>Fecha Pendiente</th>
                    <th>Subir</th>
                </tr>
            <tbody>
                @foreach ($datosPendientesCompañia as $dato)
                    <tr class="h-20">
                        <td class="oculto">{{ $dato->tareaCliente }}</td>
                        <th>{{ $dato->nombreComercial }}</th></th>
                        <th>{{$dato->nombreTipoPendienteCliente}}</th>
                        <th>{{$dato->fechaPendienteCliente}}</th>
                        <td class="items-center flex justify-center">
                            <a href="#"
                                class="flex w-11 h-11 items-center mt-2 bg-green-500 p-2 text-base font-medium text-white rounded-lg hover:bg-green-400">
                                <svg class="flex-shrink-0 w-7 h-7 text-white transition duration-75" fill="currentColor"
                                    width="800px" height="800px" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 11.46V16.46C2 18.75 3.85 20.6 6.14 20.6H17.85C20.14 20.6 22 18.74 22 16.45V11.46C22 10.79 21.46 10.25 20.79 10.25H3.21C2.54 10.25 2 10.79 2 11.46ZM8 17.25H6C5.59 17.25 5.25 16.91 5.25 16.5C5.25 16.09 5.59 15.75 6 15.75H8C8.41 15.75 8.75 16.09 8.75 16.5C8.75 16.91 8.41 17.25 8 17.25ZM14.5 17.25H10.5C10.09 17.25 9.75 16.91 9.75 16.5C9.75 16.09 10.09 15.75 10.5 15.75H14.5C14.91 15.75 15.25 16.09 15.25 16.5C15.25 16.91 14.91 17.25 14.5 17.25Z"
                                        fill="currentColor" />
                                    <path
                                        d="M13.5 4.60844V7.53844C13.5 8.20844 12.96 8.74844 12.29 8.74844H3.21C2.53 8.74844 2 8.18844 2 7.51844C2.01 6.38844 2.46 5.35844 3.21 4.60844C3.96 3.85844 5 3.39844 6.14 3.39844H12.29C12.96 3.39844 13.5 3.93844 13.5 4.60844Z"
                                        fill="currentColor" />
                                    <path
                                        d="M19.97 2H17.03C15.76 2 15 2.76 15 4.03V6.97C15 8.24 15.76 9 17.03 9H19.97C21.24 9 22 8.24 22 6.97V4.03C22 2.76 21.24 2 19.97 2ZM20.91 5.93C20.81 6.03 20.66 6.1 20.5 6.11H19.09L19.1 7.5C19.09 7.67 19.03 7.81 18.91 7.93C18.81 8.03 18.66 8.1 18.5 8.1C18.17 8.1 17.9 7.83 17.9 7.5V6.1L16.5 6.11C16.17 6.11 15.9 5.83 15.9 5.5C15.9 5.17 16.17 4.9 16.5 4.9L17.9 4.91V3.51C17.9 3.18 18.17 2.9 18.5 2.9C18.83 2.9 19.1 3.18 19.1 3.51L19.09 4.9H20.5C20.83 4.9 21.1 5.17 21.1 5.5C21.09 5.67 21.02 5.81 20.91 5.93Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
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
                    <button id="previousBtn4"
                        class="flex items-center justify-center px-4 h-10 md:px-10 md:mr-20 mr-10 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
                        Anterior
                    </button>
                    <!-- Next Button -->
                    <button id="nextBtn4"
                        class="flex items-center justify-center px-4 h-10 md:px-10 md:ml-20 ml-10 ms-3 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
                        Siguiente
                    </button>
                </div>
            </div>
        </div>









    <h2>Clientes Relacionados con la persona fisica</h2>




    <div class="flex justify-center md:justify-normal items-center mt-10">
        <form class="w-[13rem] md:w-[30rem]">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
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
                    <th>Detalle</th>
                </tr>
            <tbody>
                @foreach ($datoPersonaRelacionadas as $dato)
                    <tr class="h-20">
                        <td class="oculto">{{ $dato->pkPersona }}</td>
                        <th>{{ $dato->nombre }}</th>
                        <th>{{ $dato->apellidoPaterno }}</th>
                        <th>{{ $dato->apellidoMaterno }}</th>
                        <td class="items-center flex justify-center">
                            <a href="{{ route('clienteFisico.detalle', ['pkCliente' => $dato->pkCliente]) }}"
                                class="flex w-11 h-11 items-center mt-2 bg-green-500 p-2 text-base font-medium text-white rounded-lg hover:bg-green-400">
                                <svg class="flex-shrink-0 w-7 h-7 text-white transition duration-75" fill="currentColor"
                                    width="800px" height="800px" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 11.46V16.46C2 18.75 3.85 20.6 6.14 20.6H17.85C20.14 20.6 22 18.74 22 16.45V11.46C22 10.79 21.46 10.25 20.79 10.25H3.21C2.54 10.25 2 10.79 2 11.46ZM8 17.25H6C5.59 17.25 5.25 16.91 5.25 16.5C5.25 16.09 5.59 15.75 6 15.75H8C8.41 15.75 8.75 16.09 8.75 16.5C8.75 16.91 8.41 17.25 8 17.25ZM14.5 17.25H10.5C10.09 17.25 9.75 16.91 9.75 16.5C9.75 16.09 10.09 15.75 10.5 15.75H14.5C14.91 15.75 15.25 16.09 15.25 16.5C15.25 16.91 14.91 17.25 14.5 17.25Z"
                                        fill="currentColor" />
                                    <path
                                        d="M13.5 4.60844V7.53844C13.5 8.20844 12.96 8.74844 12.29 8.74844H3.21C2.53 8.74844 2 8.18844 2 7.51844C2.01 6.38844 2.46 5.35844 3.21 4.60844C3.96 3.85844 5 3.39844 6.14 3.39844H12.29C12.96 3.39844 13.5 3.93844 13.5 4.60844Z"
                                        fill="currentColor" />
                                    <path
                                        d="M19.97 2H17.03C15.76 2 15 2.76 15 4.03V6.97C15 8.24 15.76 9 17.03 9H19.97C21.24 9 22 8.24 22 6.97V4.03C22 2.76 21.24 2 19.97 2ZM20.91 5.93C20.81 6.03 20.66 6.1 20.5 6.11H19.09L19.1 7.5C19.09 7.67 19.03 7.81 18.91 7.93C18.81 8.03 18.66 8.1 18.5 8.1C18.17 8.1 17.9 7.83 17.9 7.5V6.1L16.5 6.11C16.17 6.11 15.9 5.83 15.9 5.5C15.9 5.17 16.17 4.9 16.5 4.9L17.9 4.91V3.51C17.9 3.18 18.17 2.9 18.5 2.9C18.83 2.9 19.1 3.18 19.1 3.51L19.09 4.9H20.5C20.83 4.9 21.1 5.17 21.1 5.5C21.09 5.67 21.02 5.81 20.91 5.93Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
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
                    <button id="previousBtn"
                        class="flex items-center justify-center px-4 h-10 md:px-10 md:mr-20 mr-10 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
                        Anterior
                    </button>
                    <!-- Next Button -->
                    <button id="nextBtn"
                        class="flex items-center justify-center px-4 h-10 md:px-10 md:ml-20 ml-10 ms-3 text-base font-medium text-white bg-green-500 border rounded-lg hover:bg-green-400">
                        Siguiente
                    </button>
                </div>
            </div>
        </div>




        <h2>Compañia Relacionas con persona Fisica</h2>



        <div class="flex justify-center md:justify-normal items-center mt-10">
            <form class="w-[13rem] md:w-[30rem]">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="busqueda2"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-400 focus:border-green-400"
                        placeholder="Buscar" required>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow-lg mt-10">
            <div class="flex justify-center mb-[1rem]">
                <div class="">
                    <h1 class="text-center font-bold text-2xl mt-5">Selecciona compañia</h1>
                </div>
            </div>

            <table class="w-full table-auto mt-[1rem]" id="tablaCompañias" class="display nowrap" width="90%">
                <thead class="text-center">
                    <tr class="h-24 text-center">
                        <td class="oculto">ID</td>
                        <th>Nombre Compañias</th>
                        
                        <th>Detalle</th>
                    </tr>
                <tbody>
                    @foreach ($datosCompañiasRelacionadas as $dato)
                        <tr class="h-20">
                            <td class="oculto">{{ $dato->pkCompañia }}</td>
                            <th>{{ $dato->nombreComercial }}</th>
                            <td class="items-center flex justify-center">
                                <a href="{{ route('personaMoral.detalle', ['pkCompañia' => $dato->pkCompañia, 'vista' => 'detalleCompañia']) }}"
                                    class="flex w-11 h-11 items-center mt-2 bg-green-500 p-2 text-base font-medium text-white rounded-lg hover:bg-green-400">
                                    <svg class="flex-shrink-0 w-7 h-7 text-white transition duration-75"
                                        fill="currentColor" width="800px" height="800px" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2 11.46V16.46C2 18.75 3.85 20.6 6.14 20.6H17.85C20.14 20.6 22 18.74 22 16.45V11.46C22 10.79 21.46 10.25 20.79 10.25H3.21C2.54 10.25 2 10.79 2 11.46ZM8 17.25H6C5.59 17.25 5.25 16.91 5.25 16.5C5.25 16.09 5.59 15.75 6 15.75H8C8.41 15.75 8.75 16.09 8.75 16.5C8.75 16.91 8.41 17.25 8 17.25ZM14.5 17.25H10.5C10.09 17.25 9.75 16.91 9.75 16.5C9.75 16.09 10.09 15.75 10.5 15.75H14.5C14.91 15.75 15.25 16.09 15.25 16.5C15.25 16.91 14.91 17.25 14.5 17.25Z"
                                            fill="currentColor" />
                                        <path
                                            d="M13.5 4.60844V7.53844C13.5 8.20844 12.96 8.74844 12.29 8.74844H3.21C2.53 8.74844 2 8.18844 2 7.51844C2.01 6.38844 2.46 5.35844 3.21 4.60844C3.96 3.85844 5 3.39844 6.14 3.39844H12.29C12.96 3.39844 13.5 3.93844 13.5 4.60844Z"
                                            fill="currentColor" />
                                        <path
                                            d="M19.97 2H17.03C15.76 2 15 2.76 15 4.03V6.97C15 8.24 15.76 9 17.03 9H19.97C21.24 9 22 8.24 22 6.97V4.03C22 2.76 21.24 2 19.97 2ZM20.91 5.93C20.81 6.03 20.66 6.1 20.5 6.11H19.09L19.1 7.5C19.09 7.67 19.03 7.81 18.91 7.93C18.81 8.03 18.66 8.1 18.5 8.1C18.17 8.1 17.9 7.83 17.9 7.5V6.1L16.5 6.11C16.17 6.11 15.9 5.83 15.9 5.5C15.9 5.17 16.17 4.9 16.5 4.9L17.9 4.91V3.51C17.9 3.18 18.17 2.9 18.5 2.9C18.83 2.9 19.1 3.18 19.1 3.51L19.09 4.9H20.5C20.83 4.9 21.1 5.17 21.1 5.5C21.09 5.67 21.02 5.81 20.91 5.93Z"
                                            fill="currentColor" />
                                    </svg>
                                </a>
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






            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

            <script>

var tablePendientesCompañia = $('#tablaPendienteCompañias').DataTable({
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

    $('#previousBtn4').on('click', function(e) {
      e.preventDefault();
      tablePendientesCompañia.page('previous').draw(false);
    });

    // Agrega evento de clic al botón Next
    $('#nextBtn4').on('click', function(e) {
      e.preventDefault();
      tablePendientesCompañia.page('next').draw(false);
    });
 

$('#fkTipoPendiente4, #dia4, #mes4').change(function () {
        var tipoPendiente = $('#fkTipoPendiente4').val();
        var filtroMes = $('#mes4').val();
        var filtroFecha = $('#dia4').val();
   
        
        // Limpiar todos los filtros antes de aplicar nuevos
        tablePendientesCompañia.columns().search('').draw();

        // Aplicar los nuevos filtros
        if (tipoPendiente !== "") {
            tablePendientesCompañia.column(2).search(tipoPendiente).draw(); // Filtro para Nombre de Articulo
        }

       
        if (filtroMes !== "") {
            tablePendientesCompañia.column(3).search(filtroMes).draw(); // Filtro para Mes
        }
        else if (filtroFecha !== "") {
            var fechaFormateada = moment(filtroFecha).format("YYYY-MM-DD");
            tablePendientesCompañia.column(3).search(fechaFormateada).draw(); // Filtro para Fecha
        }
        else {
            // Si no hay filtro de mes ni de fecha, limpia el filtro en esa columna
            tablePendientesCompañia.column(3).search('').draw();
        }
       
    });

    $('#busqueda4').on('keyup', function (e) {
        var filtroBusqueda = $('#busquedaPendientesClientes').val();
        tablePendientesCompañia.search(filtroBusqueda).draw();
    });

    $('#limpiarFiltros4').on('click', function () {
        $('#fkTipoPendiente4, #dia4,#mes4').val('');
        tablePendientesCompañia.search('').columns().search('').draw();
    });




















var tablePendientesClientes = $('#tablaPendientesClientes').DataTable({
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

    $('#previousBtn3').on('click', function(e) {
      e.preventDefault();
      tablePendientesClientes.page('previous').draw(false);
    });

    // Agrega evento de clic al botón Next
    $('#nextBtn3').on('click', function(e) {
      e.preventDefault();
      tablePendientesClientes.page('next').draw(false);
    });
 

$('#fkTipoPendiente, #dia, #mes').change(function () {
        var tipoPendiente = $('#fkTipoPendiente').val();
        var filtroMes = $('#mes').val();
        var filtroFecha = $('#dia').val();
   
        
        // Limpiar todos los filtros antes de aplicar nuevos
        tablePendientesClientes.columns().search('').draw();

        // Aplicar los nuevos filtros
        if (tipoPendiente !== "") {
            tablePendientesClientes.column(2).search(tipoPendiente).draw(); // Filtro para Nombre de Articulo
        }

       
        if (filtroMes !== "") {
            tablePendientesClientes.column(3).search(filtroMes).draw(); // Filtro para Mes
        }
        else if (filtroFecha !== "") {
            var fechaFormateada = moment(filtroFecha).format("YYYY-MM-DD");
            tablePendientesClientes.column(3).search(fechaFormateada).draw(); // Filtro para Fecha
        }
        else {
            // Si no hay filtro de mes ni de fecha, limpia el filtro en esa columna
            tablePendientesClientes.column(3).search('').draw();
        }
       
    });

    $('#busquedaPendientesClientes').on('keyup', function (e) {
        var filtroBusqueda = $('#busquedaPendientesClientes').val();
        tablePendientesClientes.search(filtroBusqueda).draw();
    });

    $('#limpiarFiltros3').on('click', function () {
        $('#fkTipoPendiente, #dia,#mes').val('');
        tablePendientesClientes.search('').columns().search('').draw();
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




                $('#previousBtn').on('click', function(e) {
                    e.preventDefault();
                    tablePersona.page('previous').draw(false);
                });

                // Agrega evento de clic al botón Next
                $('#nextBtn').on('click', function(e) {
                    e.preventDefault();
                    tablePersona.page('next').draw(false);
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







                $('#busqueda').on('keyup', function(e) {
                    var filtroBusqueda = $('#busqueda').val();
                    tablePersona.search(filtroBusqueda).draw();
                });


                $('#busqueda2').on('keyup', function(e) {
                    var filtroBusqueda = $('#busqueda').val();
                    tableCompañia.search(filtroBusqueda).draw();
                });

                $('#limpiarFiltros').on('click', function() {
                    $('#fkEstatus, #fkCategoria').val('');
                    tablePersona.search('').columns().search('').draw();
                });
            </script>



    </div>

        </div>

</body>

</html>
