@extends('layouts.app')

@section('content')

<div class="container my-4">
            
            @if ( session('mensaje') ) {{-- mensaje de OK, cuando se registra/restaura un pago --}}
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
                    Pago eliminado, si desea deshacer haga <a href="{{ route('atenciones.restaurarPago', [Session::get('deleted')]) }}">Click aquí</a> </div>
            @endif

    <a href="{{ route('atenciones.index') }}" class="btn btn-primary btn-sm" role="button">Volver</a>
    <h1><br>Atención #{{ $atencion->id }}</h1>
    
    <!-- AVISO DE ELIMINADO -->
    <div class="col-md-8">
        @if ( $atencion->deleted_at != null )
            <div class="alert alert-danger">
                    Registro de atención dado de baja (eliminado)
            </div>
        @endif

        <!-- DATOS PERSONALES -->
        <div class="card">
            <div class="card-header">Detalles</div>
            <div class="card-body">
                    <table>
                    <tr><td><b>Paciente:</b></td><td>  #{{ $paciente->id }} - {{ $paciente->nombre }} {{ $paciente->apellido }}</td></tr>
                    <tr><td><b>Profesional:</b></td><td>  {{ $profesional->nombre }} {{ $profesional->apellido }} </td></tr>
                    <tr><td><b>Fecha:</b></td><td>  {{ $atencion->fecha->formatLocalized('%d/%m/%Y') }} {{\Carbon\Carbon::parse($atencion->hora)->formatLocalized('%H:%M')}}</td></tr>
                    <tr><td><b>Arcada superior:</b></td><td>  {{ $atencion->arcada_superior }}</td></tr>
                    <tr><td><b>Arcada inferior:</b></td><td>  {{ $atencion->arcada_inferior }}</td></tr>
                    <tr><td><b>Operación prevista:</b></td><td>  {{ $atencion->operacion_prevista }}</td></tr>
                    <tr><td><b>Importe:</b></td><td>  ${{ $atencion->importe }}</td></tr>
                    <tr><td><b>Pago:</b></td><td>  ${{ $atencion->pago }}</td></tr>
                    <tr><td><b>Saldo:</b></td><td> <b>${{ $atencion->importe - $atencion->pago }}</b></td></tr>
                    <tr><td><b>Próximo turno:</b></td><td> @if($atencion->proximo_turno) {{ \Carbon\Carbon::parse($atencion->proximo_turno)->formatLocalized('%d/%m/%Y') }} @endif</td></tr>
                    </table>
                    <br><i><b>Creado:</b> {{ $atencion->created_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $atencion->creado_por }}</i>
                    @if ( $atencion->eliminado_por != null )
                    <br><i><b>Eliminado:</b> {{ $atencion->deleted_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $atencion->eliminado_por }}</i>
                    @elseif ( $atencion->editado_por != null )
                    <br><i><b>Actualizado:</b> {{ $atencion->updated_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $atencion->editado_por }}</i>
                    @endif
            </div>
        </div>
    </div>
        
    <!-- HISTORIAL DE PAGOS -->
    <div class="col-md-12">
    <br>
    <h4>Historial de pagos recibidos para esta atención</h4>
    <table id="historia_pagos" border=1>
            <thead>
                <tr>
                    <th>#Pago</th>
                    <th>Fecha pago</th>
                    <th>Monto</th>
                    <th>Detalle</th>
                    <th>O. Social</th>
                    <th>Registrado por</th>
                    <th>Fecha registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>           
                @foreach ($pagos as $pago)
                            <tr>
                                <th scope="row">{{$pago->id}}</th>
                                <th>{{\Carbon\Carbon::parse($pago->fecha)->formatLocalized('%d/%m/%Y')}}</th>
                                <th>${{$pago->monto}}</th>
                                <th>{{$pago->detalle}}</th>
                                <td>@if ($pago->cubierto_obra_social) Si @else No @endif</td>
                                <th>{{$pago->creado_por}}</th>
                                <th>{{$pago->created_at->formatLocalized('%d/%m/%Y %H:%M')}}</th>
                                <th>
                                    <form action="{{ route('atenciones.eliminarPago', $pago) }}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                                onclick="if (confirm('Se eliminará el pago ¿Continuar?')){this.form.submit();}"/>
                                    </form>
                                </th>
                            </tr>
                @endforeach
            </tbody>
    </table>
    </div>
</div>

@endsection