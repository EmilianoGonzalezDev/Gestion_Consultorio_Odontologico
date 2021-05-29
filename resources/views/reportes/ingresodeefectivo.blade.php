<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<div class="container my-4">
    <div class="card-body">
        <h5>Ingresos de efectivo</h5>
        
        <table id="ingreso_efectivo">
            <thead>
            <tr>
                <th>Año</th>
                <th>Mes</th>
                <th>Monto</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($ganancias as $ganancia)
                <tr><th scope="row">{{$ganancia->anio}}</th>
                        <td>{{$ganancia->mes}}</td>
                        <td>{{$ganancia->monto}}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>