@extends('layouts.app')

@section('content')

<!-- Título -->
<h2 style="text-align: center;">Atenciones - Registros Eliminados</h2>

<!-- Tabla -->
<div class="div_tabla my-4">
    <table id="atenciones_elim" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Profesional</th>
                <th>Paciente</th>
                <th>Nombre P.</th>
                <th>Apellido P.</th>
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
                <th scope="row"><a href="{{route('atenciones.show', $atencion) }}">{{$atencion->id}}</a></th>
                <td>{{App\User::empleado($atencion->user_id)->nombre}} {{App\User::empleado($atencion->user_id)->apellido}}</td>
                <td><a href="{{ route('pacientes.show', $atencion->paciente_id) }}">Pac #{{$atencion->paciente_id}}</a></td>
                <td>{{App\Paciente::paciente($atencion->paciente_id)->nombre}}</td>
                <td>{{App\Paciente::paciente($atencion->paciente_id)->apellido}}</td>
                <td>${{$atencion->importe}}</td>
                <td>${{$atencion->pago}}</td>
                <td>${{$atencion->importe - $atencion->pago}}</td>
                <td>{{$atencion->fecha->formatLocalized('%d/%m/%Y')}}</td>
                <td>{{$atencion->hora}}</td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap" role="group" aria-label="Basic example">
                        <a href="{{ route('atenciones.show', $atencion) }}" class="btn btn-info btn-group">Ver</a>
                        <form action="{{ route('atenciones.restore', $atencion) }}" class="d-inline">
                            @csrf
                            <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar" onclick="if (confirm('Se restaurará este registro de atencion incluyendo el importe y el pago ¿Continuar?')){this.form.submit();}" />
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('atenciones.index') }}" class="btn btn-secondary btn-sm float-right my-4">Volver</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#atenciones_elim').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>
@endsection