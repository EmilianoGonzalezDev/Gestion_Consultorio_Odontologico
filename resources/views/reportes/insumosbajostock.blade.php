<!-- no se hace el include app/styles porque este código va incrustado en la pagina home -->

<div class="card-body">
    <h5>Insumos bajos de stock</h5>
    
    <table id="insumos_stock_bajo">
        <tbody>
            @foreach ($insumos as $insumo)  <!-- En cada vuelta, guarda una fila de Insumos en la variable $insumo -->
                @if ($insumo->stock <= $insumo->stock_bajo)
                    <tr>
                        <td><a href="{{route('insumos.show', $insumo) }}" target="_blank"> PRODUCTO #{{$insumo->id}}</a> |</td>
                        <td style="text-transform: uppercase;">{{$insumo->nombre}} {{$insumo->marca}} {{$insumo->detalles }} x {{$insumo->contenido_cantidad}} {{$insumo->contenido_unidad}} </td>
                        <td>|  Stock Mínimo: {{$insumo->stock_bajo }}   |</td>
                        <td>Stock Actual: <i style="color:red;">{{$insumo->stock }}</i>
                        </td>
                    </tr>
                @endif 
            @endforeach
        </tbody>
    </table>
</div>