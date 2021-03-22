@extends('layouts.app')

@section('content')

<!-- Mensajes post acción -->
<div class="container my-4">
    @if ( session('mensaje') )
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('mensaje') }}
    </div>
    @endif
</div>

<!-- Título -->
<h2 style="text-align: center;">Fichas de Ortodoncia - Registros Eliminados</h2>

<!-- Tabla -->
<div class="div_tabla my-4">
    <table id="ortodoncias_elim" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>#Ficha</th>
                <th>Paciente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Aparatología</th>
                <th>Presupuesto</th>
                <th>Inicial</th>
                <th>Cuota</th>
                <th>Eliminado por</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ortodoncias as $ortodoncia)
            <tr>
                <th scope="row">
                    <a href="{{route('ortodoncias.show', $ortodoncia) }}">
                        {{$ortodoncia->id}}
                    </a>
                </th>
                <td>Pac #{{$ortodoncia->paciente_id}}</td>
                <td><a href="{{ route('pacientes.show', $ortodoncia->paciente_id) }}">{{App\Paciente::paciente($ortodoncia->paciente_id)->nombre}}</td>
                <td><a href="{{ route('pacientes.show', $ortodoncia->paciente_id) }}">{{App\Paciente::paciente($ortodoncia->paciente_id)->apellido}}</a></td>
                <td>{{$ortodoncia->aparatologia}}</td>
                <td>{{$ortodoncia->presupuesto}}</td>
                <td>{{$ortodoncia->inicial}}</td>
                <td>{{$ortodoncia->cuota}}</td>
                <td>{{$ortodoncia->eliminado_por}} el {{ $ortodoncia->deleted_at->formatLocalized('%d/%m/%Y %H:%M') }}</td>
                <td>
                    <div class="btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{ route('pacientes.show', $ortodoncia->paciente_id) }}" class="btn btn-info btn-group">Ver</a>
                        <form action="{{ route('ortodoncias.restore', $ortodoncia) }}" class="d-inline">
                            @csrf
                            <input type=button class="btn btn-danger btn-sm btn-group" value="Restaurar" onclick="if(confirm('Se restaurará la ficha de ortodoncia ¿Continuar?')){this.form.submit();}" />
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('ortodoncias.index') }}" class="btn btn-secondary btn-sm float-right my-4">Volver</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#ortodoncias_elim').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>
@endsection