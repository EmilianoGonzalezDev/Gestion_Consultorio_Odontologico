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
                <th>Paciente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Importe</th>
                <th>Pago</th>
                <th>Saldo</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($atenciones as $atencion)
            <tr>
                <th scope="row">
                    <a href="{{route('atenciones.show', $atencion) }}">
                        {{$atencion->id}}
                    </a>
                </th>
                <td>{{App\User::empleado($atencion->user_id)->nombre}} {{App\User::empleado($atencion->user_id)->apellido}}</td>
                <td>Pac #{{$atencion->paciente_id}}</a></td>
                <td><a href="{{ route('pacientes.show', $atencion->paciente_id) }}">{{App\Paciente::paciente($atencion->paciente_id)->nombre}}</td>
                <td><a href="{{ route('pacientes.show', $atencion->paciente_id) }}">{{App\Paciente::paciente($atencion->paciente_id)->apellido}}</a></td>
                <td>${{$atencion->importe}}</td>
                <td>${{$atencion->pago}}</td>
                <td>${{$atencion->importe - $atencion->pago}}</td>
                <td>{{$atencion->fecha->formatLocalized('%d/%m/%Y')}}</td>
                <td>{{\Carbon\Carbon::parse($atencion->hora)->formatLocalized('%H:%M')}}</td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap" role="group">
                        <a href="{{ route('atenciones.show', $atencion) }}" class="btn btn-info">Ver</span></a>
                        <a href="{{ route('atenciones.edit', $atencion) }}" class="btn btn-dark">Editar</a>
                        <form action="{{ route('atenciones.destroy', $atencion) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <input type="button" class="btn btn-danger btn-sm" value="Eliminar" onclick="if (confirm('Se eliminará este registro de atencion incluyendo el importe y los pagos ¿Continuar?')){this.form.submit();}" />
                        </form>
                        @if ($atencion->importe > $atencion->pago)
                        <a href="{{ route('atenciones.nuevoPago',$atencion ) }}" class="btn btn-warning">pago</a>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('atenciones.verEliminados') }}" class="btn btn-secondary btn-sm float-right my-4">Ver Eliminados</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#atenciones').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>

@endsection