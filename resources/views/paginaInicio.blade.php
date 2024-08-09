<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('img/logo.ico') }}" rel="icon" type="image/x-icon">
    <title>Dashboard (Administrador) | JP Despacho Contable</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('alertas')
    <div>
        {{-- ICONO --}}
        <h1>Dashboard</h1>
    </div>
    <section>
        <div>
            {{-- ICONO --}}
            <h2>Empleados</h2>
        </div>
        <div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </section>

    <section>
        <div>
            {{-- ICONO --}}
            <h2>Clientes</h2>
        </div>
        <div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </section>

    <section>
        <div>
            {{-- ICONO --}}
            <h2>Asistencia empleados (Hoy)</h2>
        </div>
        
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Empleado</th>
                        <th>Hora</th>
                        <th>Hora final</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asistencias as $asistencia)
                        <tr>
                            <td>{{ $asistencia->nombre }} {{ $asistencia->apellidoPaterno }} {{ $asistencia->apellidoMaterno }}</td>
                            <td>{{ $asistencia->horaInicio }}</td>
                            <td>
                                @if($asistencia->horaFinal == null)
                                Sin registro
                            @else
                                {{ $asistencia->horaFinal }}
                            @endif
                            </td>
                            <td>
                                @if($asistencia->estatusAsistencia == 1)
                                    A tiempo
                                @else
                                    Retardo
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </section>

</body>
</html>