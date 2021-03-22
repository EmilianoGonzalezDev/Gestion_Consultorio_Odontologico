@extends('layouts.app')

@section('content')

<!-- Mensajes post acción -->
<div class="container my-4">
    @if ( session('mensaje') )
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('mensaje') }}
    </div>
    @endif
</div>

<!-- Título -->
<h2 style="text-align: center;">Compras de insumo - Registros Eliminados</h2>

<!-- Tabla -->
<div class="div_tabla my-4">
    <table id="comprainsumos_elim" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>#N°</th>
                <th>Cód</th>
                <th>Insumo</th>
                <th>Marca</th>
                <th>Contenido</th>
                <th>Costo</th>
                <th>Comprado</th>
                <th>Fecha Compra</th>
                <th>Eliminado por</th>
                <th>Eliminado el</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comprainsumos as $compra)
            @if ($compra->insumo) {{-- evita error al intentar mostrar info sobre insumos eliminados --}}
            @php $insumo = $compra->insumo->find($compra->insumo_id) @endphp
            <tr>
                <th scope="row">{{$compra->id}}</th>
                <td>{{$compra->insumo_id}}</td>
                <td>{{$insumo->nombre}}</td>
                <td>{{$insumo->marca}}</td>
                <td>{{$insumo->contenido_cantidad}} {{$insumo->contenido_unidad}}</td>
                <td>${{$compra->precio_compra}}</td>
                <td>{{$compra->cantidad_adquirida}}</td>
                <td>{{$compra->fecha_compra->formatLocalized('%d/%m/%Y')}}</td>
                <td>{{$compra->eliminado_por}}</td>
                <td>{{$compra->deleted_at->formatLocalized('%d/%m/%Y')}}</td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap" role="group" aria-label="Basic example">
                        <form action="{{ route('comprainsumos.restore', $compra) }}" class="d-inline">
                            @csrf
                            <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar" onclick="if(confirm('Se restaurará este registro de compra de insumo ¿Continuar?')){this.form.submit();}" />
                        </form>
                    </div>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('comprainsumos.index') }}" class="btn btn-secondary btn-sm float-right my-4">Volver</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#comprainsumos_elim').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>


@endsection