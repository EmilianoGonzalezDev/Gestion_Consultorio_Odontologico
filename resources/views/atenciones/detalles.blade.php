@extends('layouts.app')

@section('content')

<div class="container my-4">

    @if (Session::has('deleted'))
    <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Pago eliminado, si desea deshacer haga <a href="{{ route('atenciones.restaurarPago', [Session::get('deleted')]) }}">Click aquí</a>
    </div>
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
                    <tr>
                        <td><b>Paciente:</b></td>
                        <td> #{{ $paciente->id }} - {{ $paciente->nombre }} {{ $paciente->apellido }}</td>
                    </tr>
                    @if (App\Paciente::paciente($atencion->paciente_id)->deleted_at)
                    <tr>
                        <td></td>
                        <td><span style="color:red"> (paciente dado de baja) </span></td>
                    </tr>
                    @endif
                    <tr>
                        <td><b>Profesional:</b></td>
                        <td> {{ $profesional->nombre }} {{ $profesional->apellido }} </td>
                    </tr>
                    <tr>
                        <td><b>Fecha:</b></td>
                        <td> {{ $atencion->fecha->formatLocalized('%d/%m/%Y') }} {{\Carbon\Carbon::parse($atencion->hora)->formatLocalized('%H:%M')}}</td>
                    </tr>
                    <!--@ if (!(App\User::empleado($atencion->user_id)->ocultar_montos) && (App\User::empleado($atencion->user_id) != Auth::user()))-->
                    @if (auth()->user()->rol != 1)
                        <tr>
                            <td><b>Importe:</b></td>
                            <td> $ {{ $atencion->importe }}</td>
                        </tr>
                        <tr>
                            <td><b>Pago:</b></td>
                            <td> $ {{ $atencion->pago }}</td>
                        </tr>
                        <tr>
                            <td><b>Saldo:</b></td>
                            <td> <b>$ {{ $atencion->importe - $atencion->pago }}</b></td>
                        </tr>
                    @endif
                    <tr>
                        <td><b>Próximo turno:</b></td>
                        <td> @if($atencion->proximo_turno) {{ \Carbon\Carbon::parse($atencion->proximo_turno)->formatLocalized('%d/%m/%Y') }} @endif</td>
                    </tr>
                </table>

                <br>
                
                <table>
                    <tr>
                        <td><b><u>Servicios prestados</u></b></td>
                    </tr>
                        @foreach ($serviciosPrestados as $servicio)
                        <tr>
                            <td>{{ $servicio->nomeclatura }}</td>
                            <td>{{ $servicio->descripcion }}</td>
                        </tr>
                        @endforeach
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
</div>

<!-- HISTORIAL DE PAGOS -->
<div class="container">
    <br>
    <h4>Historial de pagos recibidos para esta atención</h4>
    <table class="table table-hover table-responsive">
        <thead class="thead-dark">
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
                <td scope="row">{{$pago->id}}</td>
                <td>{{\Carbon\Carbon::parse($pago->fecha)->formatLocalized('%d/%m/%Y')}}</td>
                @if ((App\User::empleado($atencion->user_id)->ocultar_montos) && (App\User::empleado($atencion->user_id) != Auth::user()))
                    <td>-</td>
                @else
                    <td class="money">$ {{$pago->monto}}</td>
                @endif
                <td>{{$pago->detalle}}</td>
                <td>@if ($pago->cubierto_obra_social) Si @else No @endif</td>
                <td>{{$pago->creado_por}}</td>
                <td>{{$pago->created_at->formatLocalized('%d/%m/%Y %H:%M')}}</td>
                <td>
                    <form action="{{ route('atenciones.eliminarPago', $pago) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar" onclick="if (confirm('Se eliminará el pago ¿Continuar?')){this.form.submit();}" />
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection