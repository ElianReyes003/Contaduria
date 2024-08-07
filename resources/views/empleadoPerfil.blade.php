<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard (Empleado) | JP Despacho Contable</title>
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('alertas')
    <div>
        {{-- ICONO --}}
        <h1>Dashboard</h1>
    </div>
    <table id="tareaPendientesEmpleado" class="display">
        <thead>
            <tr>
                <th>Tarea</th>
                <th>Categoría pendiente</th>
                <th>Confirmación</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($datosPendientesCliente as $dato) --}}
                <tr>
                     {{-- <td>{{ $dato->Tarea }}</td> --}}
                    <td></td>
                    <td></td>
                    <td><button>Terminado</button></td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>

    <script>
         $(document).ready(function() {
            $('#tareaPendientesEmpleado').DataTable();
        });
    </script>
</body>
</html>