<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de empleados | JP Despacho Contable</title>
    <link href="{{ asset('img/logo.ico') }}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <style>
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ddd;
            z-index: 1000;
        }
        .dropdown-menu.show {
            display: block;
        }
        .dropdown-menu a {
            display: block;
            padding: 8px 16px;
            color: #333;
            text-decoration: none;
        }
        .dropdown-menu a:hover {
            background-color: #f8f9fa;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div>
        <div>
            {{-- Icono --}}
            <h1>Empleados</h1>
        </div>
        <a href="{{ route('formEmpleado') }}">Agregar empleado +</a>
    </div>

    <table id="empleadosTable" class="display">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datosEmpleados as $empleado)
                <tr>
                    <td>{{ $empleado->pkEmpleado }}</td>
                    <td>{{ $empleado->persona->nombre_completo }}</td>
                    <td>{{ $empleado->nombreUsuario }}</td>
                    <td>{{ $empleado->contraseña }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button">
                                Acciones
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('empleado.mostrarPorId', ['pkEmpleado' => $empleado->pkEmpleado, 'vista' => 'editarEmpleado']) }}">Editar</a>
                                <form action="{{ route('empleado.baja') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="pkEmpleado" value="{{ $empleado->pkEmpleado }}">
                                    <button type="submit">Dar de baja empleado</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#empleadosTable').DataTable();
        });

         
          $('.dropdown-toggle').on('click', function() {
            $(this).next('.dropdown-menu').toggleClass('show');
        });
        
     
        $(document).on('click', function(event) {
            if (!$(event.target).closest('.dropdown').length) {
                $('.dropdown-menu').removeClass('show');
            }
        });
    
    </script>
</body>

</html>
