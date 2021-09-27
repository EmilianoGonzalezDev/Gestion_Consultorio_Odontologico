@extends('layouts.app')

@section('content')

<!-- Mensaje post eliminar -->
@if (Session::has('deleted'))
<div class="container my-4">
    <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Registro eliminado, si desea deshacer haga <a href="{{ route('atenciones.restore', [Session::get('deleted')]) }}">Click aquí</a>
    </div>
</div>
@endif

<!-- Título y botón "Nuevo" -->
<div class="div_titulo">
    <h2>Atenciones</h2>
    <div class="my-4">
        <a href="{{ route('atenciones.create') }}" class="btn btn-primary btn-sm">Nueva Atención</a>
    </div>
</div>

<!-- Tabla -->
<div class="div_tabla">
    <table id="atenciones" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>#Atenc</th>
                <th>Profesional</th>
                <th>&nbsp;</th>
                <th>Paciente</th>
                <th>&nbsp;</th>
                @if (auth()->user()->rol != 1)
                <th>Importe</th>
                <th>Pago</th>
                <th>Saldo</th>
                @endif
                <th>Fecha</th>
                <th>Hora</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
    </table>
    <a href="{{ route('atenciones.verEliminados') }}" class="btn btn-secondary btn-sm float-right my-4">Ver Eliminados</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        if({{auth()->user()->rol == 1}}){
            $('#atenciones').DataTable({
                "language": {"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"},
                "ajax":"{{route('getAtenciones')}}",
                "columns":[
                    {data:'id'},
                    {data:'profesional_nombre'},
                    {data:'profesional_apellido'},
                    {data:'paciente_nombre'},
                    {data:'paciente_apellido'},
                    {data:'fecha'},
                    {data:'hora'},
                    {data:'botones'},
                ],
                responsive: true
            });
        }
        else{
            $('#atenciones').DataTable({
                "language": {"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"},
                "ajax":"{{route('getAtenciones')}}",
                "columns":[
                    {data:'id'},
                    {data:'profesional_nombre'},
                    {data:'profesional_apellido'},
                    {data:'paciente_nombre'},
                    {data:'paciente_apellido'},
                    {data:'importe'},
                    {data:'pago'},
                    {data:'saldo'},
                    {data:'fecha'},
                    {data:'hora'},
                    {data:'botones'},
                ],
                responsive: true
            });
        }
    });
</script>

@endsection