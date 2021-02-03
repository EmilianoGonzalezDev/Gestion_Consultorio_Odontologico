@extends('layouts.app')

@section('content')

    <div class="container my-4">
        @if ( session('mensaje') ) {{-- mensaje de OK, cuando se registra/edita/restaura un ortodoncia --}}
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
                Registro eliminado, si desea deshacer haga <a href="{{ route('ortodoncias.restore', [Session::get('deleted')]) }}">Click aquí</a> </div>
        @endif
     
        <h2>Fichas de ortodoncia</h2>
        <div class="my-4"><a href="{{ route('ortodoncias.create') }}" class="btn btn-primary btn-sm">Crear nueva</a></div>
        <table id="ortodoncias" class="display nowrap" cellspacing="0">
            <thead>
            <tr>
                <th>#Ficha</th>
                <th>Paciente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Aparatología</th>
                <th>Presupuesto</th>
                <th>Inicial</th>
                <th>Cuota</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($ortodoncias as $ortodoncia)  <!-- En cada vuelta, guarda una fila de la tabla Ortodoncias en la variable $ortodoncia -->
                <tr>
                    <th scope="row">
                        <a href="{{route('ortodoncias.show', $ortodoncia) }}">
                            {{$ortodoncia->id}}
                        </a></th>
                    <td>Pac #{{$ortodoncia->paciente_id}}</td>
                    <td><a href="{{ route('pacientes.show', $ortodoncia->paciente_id) }}">{{App\Paciente::paciente($ortodoncia->paciente_id)->nombre}}</td>
                    <td><a href="{{ route('pacientes.show', $ortodoncia->paciente_id) }}">{{App\Paciente::paciente($ortodoncia->paciente_id)->apellido}}</a></td>
                    <td>{{$ortodoncia->aparatologia}}</td>
                    <td>{{$ortodoncia->presupuesto}}</td>
                    <td>{{$ortodoncia->inicial}}</td>
                    <td>{{$ortodoncia->cuota}}</td>
                    <td>
                            <div class="btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ route('pacientes.show', $ortodoncia->paciente_id) }}" class="btn btn-info btn-group">Ver</a>
                                <a href="{{ route('ortodoncias.edit', $ortodoncia) }}" class="btn btn-dark btn-group">Editar</a>
                                <form action="{{ route('ortodoncias.destroy', $ortodoncia) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                               onclick="if(confirm('Se eliminará el ortodoncia ¿Continuar?')){this.form.submit();}"/>
                                </form>
                            </div>                  
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('ortodoncias.verEliminados') }}" class="btn btn-secondary btn-sm float-right">Ver Eliminados</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#ortodoncias').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
            responsive: true
        });
    });

    </script>
  

@endsection