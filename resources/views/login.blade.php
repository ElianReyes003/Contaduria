<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | JP Despacho Contable</title>         
    <link href="{{ asset('img/logo.ico') }}" rel="icon" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
</head>
<body>
   <div>
       <div>
            <form action="{{ route('inicioSesion') }}" enctype="multipart/form-data" method="post">
                @csrf
                <h1>Bienvenidos</h1>
                <label for="">Usuario</label>
                <input name="nombreUsuario" id="nombreUsuario" type="text" required>
                <label for="">Contraseña</label>
                <input name="contraseña" id="contraseña" type="password" required>
                <button type="submit">Iniciar sesión</button>
            </form>
       </div>
       <div>
            <img src="{{asset('img/logo.webp')}}" alt="Logo de la empresa">
       </div>
   </div>
</body>
</html>                 