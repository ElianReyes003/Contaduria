@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        showConfirmButton: false,
        text: '{{ session('error') }}',
        timer: 2000
    });
</script>
@endif

@if (session('warning'))
<script>
    Swal.fire({
        icon: 'warning',
        text: '{{ session('warning') }}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif

{{-- ACCESO DEL EMPLEADO --}}
@if (session('erroracces'))
<script>
    Swal.fire({
        icon: 'error',
        text: '{{ session('erroracces') }}',
        showConfirmButton: false,
        timer: 4000
    });
</script>
@endif

{{-- ACCESO DEL EMPLEADO --}}
@if (session('credentials'))
<script>
    Swal.fire({
        title: '{{ session('credentials') }}',
        icon: 'error',
        text: 'Por favor, intentelo nuevamente. ',
        showConfirmButton: false,
        timer: 3000
    });
</script>
@endif
