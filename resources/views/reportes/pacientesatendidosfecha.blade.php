@include('layouts.styles') <!-- Incluye los estilos -->

<div class="container my-4">
    <div class="card-body">
        <h5>Pacientes atendidos en período de tiempo</h5>
        
        <table id="pacientes">
            <thead>
            <tr>
                <th>Paciente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Edad</th>
                <th>Fecha Atención</th>
                <th>Hora</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($atenciones as $atencion)
                @if( ($atencion->fecha >= $fechaInicial) && ($atencion->fecha <= $fechaFinal) )
                    @php $paciente = App\Paciente::paciente($atencion->paciente_id) @endphp
                            <tr>
                                <th scope="row">
                                    <a href="{{route('pacientes.show', $paciente) }}">
                                        #{{$paciente->id}}
                                    </a></th>
                                <td>{{$paciente->nombre}}</td>
                                <td>{{$paciente->apellido}}</td>
                                <td>{{$paciente->dni}}</td>
                                <td>@if(($paciente->fechanacimiento)) {{\Carbon\Carbon::parse($paciente->fechanacimiento)->age}} @endif</td> 
                                <td><a href="{{route('atenciones.show', $atencion) }}">{{\Carbon\Carbon::parse($atencion->fecha)->formatLocalized('%d/%m/%Y')}}</a></td>
                                <td>{{$atencion->hora}}</td>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>