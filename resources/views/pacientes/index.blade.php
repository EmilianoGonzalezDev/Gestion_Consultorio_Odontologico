@extends('layouts.app')

@section('content')

    <div class="container my-4">
        @if ( session('mensaje') ) {{-- mensaje de OK, cuando se registra/edita/restaura un paciente --}}
            <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                {{ session('mensaje') }}
            </div>
        @endif

        @if (Session::has('deleted'))
            <div class="alert alert-warning alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                Paciente eliminado, si desea deshacer haga <a href="{{ route('pacientes.restore', [Session::get('deleted')]) }}">Click aquí</a> </div>
        @endif
     
        <h2>Pacientes</h2>
        <div class="my-4"><a href="{{ route('pacientes.create') }}" class="btn btn-primary btn-sm">Nuevo Paciente</a></div>
        <table id="pacientes" class="display nowrap" cellspacing="0">
            <thead>
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
                @foreach ($pacientes as $paciente)  <!-- En cada vuelta, guarda una fila de la tabla Pacientes en la variable $paciente -->
                <tr>
                    <th scope="row">
                        <a href="{{route('pacientes.show', $paciente) }}">
                            {{$paciente->id}}
                        </a></th>
                    <td>{{$paciente->nombre}}</td>
                    <td>{{$paciente->apellido}}</td>
                    <td>{{$paciente->dni}}</td>
                    <td>{{$paciente->telefono}}</td>
                    <td>{{$paciente->email}}</td>
                    <td>
                        <div class="btn-group-sm" role="group" aria-label="Basic example">
                            <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-info btn-group">Ver</a>
                            <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-dark btn-group">Editar</a>
                            <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                            onclick="if(confirm('Se eliminará el paciente ¿Continuar?')){this.form.submit();}"/>
                            </form>
                        </div>                  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('pacientes.verEliminados') }}" class="btn btn-secondary btn-sm float-right">Ver Pacientes Eliminados</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#pacientes').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
            responsive: true
        });
    });

    </script>
  

@endsection