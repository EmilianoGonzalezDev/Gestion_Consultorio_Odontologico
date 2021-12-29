@extends('layouts.app')

@section('content')

<!-- Título -->
<h2 style="text-align: center;">Pacientes - Registros Eliminados</h2>

<!-- Tabla -->
<div class="div_tabla my-4">
    <table id="pacientes_elim" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>Cód</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>E-mail</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes as $paciente)
            <tr>
                <th scope="row">
                    <a href="{{route('pacientes.show', $paciente) }}">
                        {{$paciente->id}}
                    </a>
                </th>
                <td>{{$paciente->nombre}}</td>
                <td>{{$paciente->apellido}}</td>
                <td>{{$paciente->dni}}</td>
                <td>{{$paciente->telefono}}</td>
                <td>{{$paciente->email}}</td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap text-center" role="group" aria-label="Basic example">
                        <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-info btn-group">Ver</a>
                        @if (auth()->user()->rol == 1)
                        <form action="{{ route('pacientes.restore', $paciente) }}" class="d-inline">
                            @csrf
                            <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar" onclick="if(confirm('Se restaurará el paciente ¿Continuar?')){this.form.submit();}" />
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#pacientes_elim').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>
@endsection