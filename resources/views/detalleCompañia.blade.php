<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <div>Detalle Cliente</div>    
 
    </div>
    <div>
            {{$datoPersonaMoral->nombreComercial}}

    </div>

 
    <div>
            {{$datoPersonaMoral->rfc}}

    </div>
    <div>
            {{$datoPersonaMoral->denominacion}}

    </div>

    <div>
            {{$datoPersonaMoral->regimenCapital}}

    </div>
    <div>
            {{$datoPersonaMoral->fecha_inicio_operaciones}}

    </div>

    <div>
            {{$datoPersonaMoral->fecha_ultimo_cambio_de_estado}}

    </div>
 





    <div>
            {{$datoPersonaMoral->codigoPostal }}

    </div>

    <div>
            {{$datoPersonaMoral->tipoViabilidad }}

    </div>

    <div>
            {{$datoPersonaMoral->nombreViabilidad }}

    </div>

    <div>
            {{$datoPersonaMoral->colonia }}

    </div>

    <div>
            {{$datoPersonaMoral->localidad}}

    </div>


    <div>
            {{$datoPersonaMoral->municipio}}

    </div>

    <div>
            {{$datoPersonaMoral->entidadFederativa}}

    </div>

    <div>
            {{$datoPersonaMoral->entreCalle}}

    </div>
    <div>
            {{$datoPersonaMoral->yCalle}}

    </div>
    <div>
            {{$datoPersonaMoral->correoElectronico}}

    </div>





   <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.13.6/api/fnMultiFilter.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


    <script>

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







$('#busqueda').on('keyup', function (e) {
    var filtroBusqueda = $('#busqueda').val();
    tablePersona.search(filtroBusqueda).draw();
});


$('#busqueda2').on('keyup', function (e) {
    var filtroBusqueda = $('#busqueda').val();
    tableCompañia.search(filtroBusqueda).draw();
});

$('#limpiarFiltros').on('click', function () {
    $('#fkEstatus, #fkCategoria').val('');
    tablePersona.search('').columns().search('').draw();
});

</script>


</body>
</html>