@extends('layouts.app')

@section('content')

<!-- Mensaje post eliminar -->
@if (Session::has('deleted'))
<div class="container my-4">
    <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Paciente eliminado, si desea deshacer haga <a href="{{ route('pacientes.restore', [Session::get('deleted')]) }}">Click aquí</a>
    </div>
</div>
@endif

<!-- Título y botón "Nuevo" -->
<div class="div_titulo">
    <h2>Pacientes</h2>
    <div class="my-4 btn-group-sm">
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Nuevo Paciente</a>
    </div>
</div>

<!-- Tabla -->
<div class="div_tabla">
    <table id="pacientes" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>Cód</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Teléfono</th>
                <th>E-mail</th>
                @if (auth()->user()->rol != 1)
                <th>Saldo</th>
                @endif
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
                @if (auth()->user()->rol != 1)
                <td class="money">$ {{ App\Paciente::deuda($paciente->id) }}</td>
                @endif
                <td>
                    <div class="btn-group-sm dt-col-nowrap" role="group" aria-label="Basic example">
                        <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-dark">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <input type="button" class="btn btn-danger btn-sm" value="Eliminar" onclick="if(confirm('Se eliminará el paciente ¿Continuar?')){this.form.submit();}" />
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('pacientes.verEliminados') }}" class="btn btn-secondary btn-sm float-right">Ver Pacientes Eliminados</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#pacientes').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>


@endsection