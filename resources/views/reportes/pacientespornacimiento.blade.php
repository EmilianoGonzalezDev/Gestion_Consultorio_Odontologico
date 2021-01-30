@include('layouts.styles') <!-- Incluye los estilos -->

<div class="container my-4">
<div class="card-body">
    <h5>Cantidad de pacientes por año de nacimiento</h5>
    
    <table id="pacientes">
        <thead>
            <tr>
                <th>Año</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($años as $año)  <!-- En cada vuelta, guarda una fila de la tabla Pacientes en la variable $paciente -->
            <tr>
                <td>{{$año->anio}} | </td>
                <td>{{$año->cantidad}} Pacientes</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
