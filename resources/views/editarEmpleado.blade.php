<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar empleado | JP Despacho Contable</title>
    <link href="{{ asset('img/logo.ico') }}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
</head>

<body>
    <div>
        <h1>Empleados</h1>
    </div>
    <form  action="{{ route('empleado.actualizar') }}" method="POST">
        @csrf
        <div>
            <h2>Actualizar datos del empleado ({{$dato->persona->nombre_completo }})</h2>
            <input type="hidden" name="pkEmpleado" value="{{ $dato->pkEmpleado }}">
            <hr>
            <div>
                <h3>Datos personales</h3>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{ $dato->persona->nombre }}" required>
                <label for="apellidop">Apellido paterno</label>
                <input type="text" name="apellidop" id="apellidop" value="{{ $dato->persona->apellidoPaterno }}" required>
                <label for="apellidom">Apellido materno</label>
                <input type="text" name="apellidom" id="apellidom" value="{{ $dato->persona->apellidoMaterno }}" required>
            </div>
            <div>
                <h3>Datos de acceso</h3>
                <label for="usuario">Usuario</label> 
                <input type="text" name="usuario" id="usuario" value="{{ $dato->nombreUsuario }}" required>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" value="{{ $dato->contraseña }}" required>
            </div>
        </div>
        <button type="submit">Actualizar empleado</button>
    </form>
</body>

</html>
