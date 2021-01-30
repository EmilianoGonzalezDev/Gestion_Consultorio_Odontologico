@extends('layouts.app')

@section('content')
@auth
    @if (auth()->user()->rol == 1)
        <div class="container my-4">
            @if ( session('mensaje') ) {{-- mensaje de OK, cuando se registra/edita/restaura un empleado --}}
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
                    Empleado eliminado, si desea deshacer haga <a href="{{ route('empleados.restore', [Session::get('deleted')]) }}">Click aquí</a> </div>
            @endif
        
            <h2>Usuarios</h2>
            <div class="my-4"><a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm">Nuevo Usuario</a></div>
            <table id="empleados">
                <thead>
                <tr>
                    <th>Cód</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Odont.</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)  <!-- En cada vuelta, guarda una fila de la tabla Empleados en la variable $empleado -->
                    <tr>
                        <th scope="row">
                            <a href="{{route('empleados.show', $empleado) }}">
                                {{$empleado->id}}
                            </a>
                        </th>
                        <td>{{$empleado->usuario}}</td>
                        <td>{{$empleado->nombre}}</td>
                        <td>{{$empleado->apellido}}</td>
                        <td>{{$empleado->dni}}</td>
                        <td>{{$empleado->telefono}}</td>
                        <td>@if($empleado->odontologo) Si @else No @endif</td>
                        <td>{{$empleado->email}}</td>
                        <td>{{$empleado->rol}}</td>
                        <td>
                                <div class="btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="{{ route('empleados.show', $empleado) }}" class="btn btn-info btn-group">Ver</a>
                                    <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-dark btn-group">Editar</a>
                                    <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                                onclick="if(confirm('Se eliminará el empleado ¿Continuar?')){this.form.submit();}"/>
                                    </form>
                                </div>                  
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('empleados.verEliminados') }}" class="btn btn-secondary btn-sm float-right">Ver Usuarios Eliminados</a>
        </div>

        <script>
        $(document).ready( function ()
        {
            $('#empleados').DataTable
            ({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
            });
        });
        </script>
    
    @endif
@endauth
@endsection