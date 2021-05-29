@extends('layouts.app')
@section('content')

@auth
    @if (auth()->user()->rol == 1)
    <div class="container my-4">
        <h1><br>{{ $empleado->nombre }} {{ $empleado->apellido }}</h1>
        
        <!-- AVISO DE ELIMINADO -->
        <div class="col-md-8">
        @if ( $empleado->deleted_at != null )
            <div class="alert alert-danger">
                    Usuario dado de baja (eliminado)
            </div>
        @endif

        <!-- DATOS PERSONALES -->
        <div class="card">
            <div class="card-header">Datos Personales</div>
            <div class="card-body">
            <table id="datos_personales">
                <tr><td><b>Dirección:</b></td><td>  {{ $empleado->direccion }}</td></tr>
                <tr><td><b>Nacimiento:</b></td><td>  @if($empleado->fechanacimiento) {{ \Carbon\Carbon::parse($empleado->fechanacimiento)->formatLocalized('%d/%m/%Y')}} @endif</td></tr>
                <tr><td><b>Edad:</b></td><td>   @if($empleado->fechanacimiento) {{ \Carbon\Carbon::parse($empleado->fechanacimiento)->age }} @endif</td></tr>
                <tr><td><b>E-Mail:</b></td><td> {{ $empleado->email }}</td></tr>
                <tr><td><b>Comentarios:</b></td><td> {{ $empleado->comentarios }}</td></tr>
            </table>
            <br><i><b>Creado:</b> {{ $empleado->created_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $empleado->creado_por }}</i>
            @if ( $empleado->eliminado_por != null )
            <br><i><b>Eliminado:</b> {{ $empleado->deleted_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $empleado->eliminado_por }}</i>
            @elseif ( $empleado->editado_por != null )
            <br><i><b>Actualizado:</b> {{ $empleado->updated_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $empleado->editado_por }}</i>
            @endif
        </div>

        <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm" role="button">Volver</a>

    </div>
    @endif
@endauth    

@endsection