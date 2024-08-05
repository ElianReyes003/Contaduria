import './bootstrap';
import 'datatables.net-dt/css/jquery.dataTables.css';
import $ from 'jquery';
import dt from 'datatables.net';

// inicializa el DataTable
$(document).ready(function() {
    $('#empleadosTable').DataTable();
});
