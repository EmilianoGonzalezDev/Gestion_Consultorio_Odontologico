@extends('layouts.app')

@section('content')
@auth
    @if (auth()->user()->rol == 1)
        <div class="container my-4">
            @if ( session('mensaje') ) {{-- mensaje de OK, cuando se edita/elimina un empleado --}}
                <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    {{ session('mensaje') }}
                </div>
            @endif
        
            <h2>Usuarios Eliminados</h2>
            <table id="empleados" class="display nowrap" cellspacing="0">
                <thead>
                <tr>
                    <th>#N°</th>
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
                            </a></th>
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
                                    <form action="{{ route('empleados.restore', $empleado) }}" class="d-inline">
                                            @csrf
                                            <input type=button class="btn btn-danger btn-sm btn-group" value="Restaurar"
                                                onclick="if(confirm('Se restaurará el empleado ¿Continuar?')){this.form.submit();}"/>
                                    </form>
                                </div>                  
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
        </div>

        <script>
        $(document).ready( function ()
        {
            $('#empleados').DataTable
            ({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
                responsive: true
            });
        });
        </script>
    @endif
@endauth
@endsection