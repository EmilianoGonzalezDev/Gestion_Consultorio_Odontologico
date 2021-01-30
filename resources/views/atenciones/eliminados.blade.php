@extends('layouts.app')

@section('content')

    <div class="container my-4">
        @if ( session('mensaje') ) {{-- mensaje de OK, cuando se edita/elimina un atencion --}}
            <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                {{ session('mensaje') }}
            </div>
        @endif
    
        <h2>Atenciones - Registros Eliminados</h2>
        <div class="my-4 btn-group-sm">

        </div>
        <table id="atenciones">
            <thead>
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
                @foreach ($atenciones as $atencion)  <!-- En cada vuelta, guarda una fila de la tabla Atencion en la variable $atencion -->
                
                <tr>
                    <th scope="row"><a href="">{{$atencion->id}}</a></th>
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
                            <div class="btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ route('atenciones.show', $atencion) }}" class="btn btn-info btn-group">Ver</a>
                                <form action="{{ route('atenciones.restore', $atencion) }}" class="d-inline">
                                        @csrf
                                        <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar"
                                               onclick="if (confirm('Se restaurará este registro de atencion incluyendo el importe y el pago ¿Continuar?')){this.form.submit();}"/>
                                </form>
                            </div>                  
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('atenciones.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#atenciones').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
        });
    });
    </script>
  

@endsection