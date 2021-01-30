@extends('atenciones.crear') <!-- incluye el formulario de creacion de atenciones en la parte de abajo de esta vista -->

@section('parte_superior') <!-- indicamos todo lo que va a estar arriba del formulario (y debajo de la barra de navegación) -->


<div class="container my-4">
    <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm" role="button">Volver</a>
    <a href="#div_nuevaprestacion" class="btn btn-warning btn-sm" role="button" id="ir_a_nueva_prestacion">Nueva prestación</a>
    
    <h1><br>{{ $paciente->nombre }} {{ $paciente->apellido }}</h1>
    
    <!-- AVISO DE ELIMINADO -->
    <div class="col-md-8">
        @if ( $paciente->deleted_at != null )
            <div class="alert alert-danger">
                    Paciente dado de baja (eliminado)
            </div>
        @endif

        <!-- DATOS PERSONALES -->
        <div class="card">
            <div class="card-header">Datos Personales</div>
            <div class="card-body">
                    <table id="datos_personales">
                    <tr><td><b>DNI:</b></td><td>  {{ $paciente->dni }}</td></tr>
                    <tr><td><b>Dirección:</b></td><td>  {{ $paciente->direccion }}</td></tr>
                    <tr><td><b>Teléfono:</b></td><td>  {{ $paciente->telefono }}</td></tr>
                    <tr><td><b>E-mail:</b></td><td>  {{ $paciente->email }}</td></tr>
                    <tr><td><b>Nacimiento:</b></td><td>  @if($paciente->fechanacimiento) {{ \Carbon\Carbon::parse($paciente->fechanacimiento)->formatLocalized('%d/%m/%Y')}} @endif</td></tr>
                    <tr><td><b>Edad:</b></td><td>   @if($paciente->fechanacimiento) {{ \Carbon\Carbon::parse($paciente->fechanacimiento)->age }} @endif</td></tr>
                    <tr><td><b>Ocupación:</b></td><td> {{ $paciente->ocupacion }}</td></tr>
                    <tr><td><b>Estado Cívil:</b></td><td> {{ $paciente->estado_civil }}</td></tr>
                    <tr><td><b>Género:</b></td><td> {{ $paciente->genero }}</td></tr>
                    <tr><td><b>Cobertura:</b></td><td> {{ $paciente->cobertura }}</td></tr>
                    <tr><td><b>Detalles:</b></td><td> {{ $paciente->detalles }}</td></tr>
                    <tr><td><b>Comentarios:</b></td><td> {{ $paciente->comentarios }}</td></tr>
                    </table>
                    <br><i><b>Creado:</b> {{ $paciente->created_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $paciente->creado_por }}</i>
                    @if ( $paciente->eliminado_por != null )
                    <br><i><b>Eliminado:</b> {{ $paciente->deleted_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $paciente->eliminado_por }}</i>
                    @elseif ( $paciente->editado_por != null )
                    <br><i><b>Actualizado:</b> {{ $paciente->updated_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $paciente->editado_por }}</i>
                    @endif
            </div>
        </div>
    </div>

    <!-- FICHA ORTODONCIA -->
    @if($ortodoncia != null)
    <br>
        <div class="col-md-8" id="ficha_ortodoncia">
            <div class="card">
                <div class="card-header">Ficha Ortodoncia</div>
                <div class="card-body">
                    <table id="ficha_ortod">        
                        <tr><td><b> Motivo:        </b></td>  <td> {{$ortodoncia->motivo}}       </td></tr>
                        <tr><td><b> Diagnóstico:   </b></td>  <td> {{$ortodoncia->diagnostico}}  </td></tr>
                        <tr><td><b> Objetivos:     </b></td>  <td> {{$ortodoncia->objetivos}}    </td></tr>
                        <tr><td><b> Tratamiento:   </b></td>  <td> {{$ortodoncia->tratamiento}}  </td></tr>
                        <tr><td><b> Aparatología:  </b></td>  <td> {{$ortodoncia->aparatologia}} </td></tr>
                        <tr><td><b> Presupuesto:   </b></td>  <td> $ {{$ortodoncia->presupuesto}}</td></tr>
                        <tr><td><b> Monto inicial: </b></td>  <td> $ {{$ortodoncia->inicial}}    </td></tr>
                        <tr><td><b> Cuota mensual: </b></td>  <td style="color: green"><b>$ {{$ortodoncia->cuota}}</b></td></tr>
                    </table>
                    <br><i><b>Creado:</b> {{ $ortodoncia->created_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $ortodoncia->creado_por }}</i>
                    @if ( $ortodoncia->editado_por != null )
                    <br><i><b>Actualizado:</b> {{ $ortodoncia->updated_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $ortodoncia->editado_por }}</i>
                    @endif
                </div>
            </div>
        </div>
    @endif
        
    <!-- HISTORIA CLÍNICA -->
    <div class="col-md-12">
    <br>
    <h4>Historia clínica</h4>
    <table id="historia_clinica" border=1>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Profesional</th>
                    <th>Arcada Superior</th>
                    <th>Arcada Inferior</th>
                    <th>Operación Prevista</th>
                    <th>Importe $</th>
                    <th>Pago $</th>
                    <th>Detalle</th>
                    <th>Saldo $</th>
                    <th>Fecha de atención</th>
                    <th>Próximo Turno</th>
                </tr>
            </thead>
            <tbody>           
                @foreach ($atenciones as $atencion)
                            <tr>
                                <th scope="row">{{$atencion->id}}</th>
                                <th>{{App\User::empleado($atencion->user_id)->nombre}} {{App\User::empleado($atencion->user_id)->apellido}}</th>
                                <th>{{$atencion->arcada_superior}}</th>
                                <th>{{$atencion->arcada_inferior}}</th>
                                <th>{{$atencion->operacion_prevista}}</th>
                                <th>{{$atencion->importe}}</th>
                                <th>{{$atencion->pago}}</th>
                                <th>{{$atencion->detalle}}</th>
                                <th>{{$atencion->importe - $atencion->pago}}</th>
                                <th>{{$atencion->fecha->formatLocalized('%d/%m/%Y')}} {{$atencion->hora}}</th>
                                <th>{{$atencion->proximo_turno}}</th>
                            </tr>
                @endforeach
            </tbody>
    </table>
    Saldo actual: <b> ${{ App\Paciente::deuda($paciente->id) }} </b>
    <br>
    </div>
</div>

<div id="div_nuevaprestacion"></div>

<!-- SCRIPTS -->
<script>
        $(document).ready(function() //en el select de paciente, selecciona automáticamente el paciente actual
        {
            var selectPaciente = document.getElementById('paciente_id');         
            selectPaciente.value = {{ $paciente->id }};
            //document.getElementById('form_crear_atencion').style = "display:none";
        });
</script>

<script>
        $(document).ready( function ()
        {
            $('#historia_clinica').DataTable
            ({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
            });
        });
</script>
@endsection