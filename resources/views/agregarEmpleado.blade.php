<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar empleado | JP Despacho Contable</title>
    <link href="{{ asset('img/logo.ico') }}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('alertas')
    <div>
        {{-- Icono --}}
        <h1>Empleados</h1>
    </div>
    <form action="{{ route('empleado.agregar') }}" method="POST">
        @csrf
        <div>
            <h2>Registrar empleado</h2>
            <hr>
            <div>
                <h3>Datos personales</h3>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
                <label for="apellidop">Apellido paterno</label>
                <input type="text" name="apellidop" id="apellidop" required>
                <label for="apellidom">Apellido materno</label>
                <input type="text" name="apellidom" id="apellidom" required>
            </div>
            <div>
                <h3>Datos de acceso</h3>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" required>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>
        </div>
        <button type="submit">Registrar empleado</button>
    </form>
</body>

</html>
