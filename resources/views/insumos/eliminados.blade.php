@extends('layouts.app')

@section('content')

<!-- Título -->
<h2 style="text-align: center;">Insumos - Registros Eliminados</h2>

<!-- Tabla -->
<div class="div_tabla my-4">
    <table id="insumos_elim" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>Cód</th>
                <th>Elemento</th>
                <th>Marca</th>
                <th>Contenido</th>
                <th>Detalles</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($insumos as $insumo)
            <tr>
                <th scope="row">
                    <a href="{{route('insumos.show', $insumo) }}">
                        {{$insumo->id}}
                    </a>
                </th>
                <td>{{$insumo->nombre}}</td>
                <td>{{$insumo->marca}}</td>
                <td>{{$insumo->contenido_cantidad}} {{$insumo->contenido_unidad}}</td>
                <td>{{$insumo->detalles }}</td>
                <td>{{$insumo->stock }}</td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap text-center" role="group" aria-label="Basic example">
                        <a href="{{ route('insumos.show', $insumo) }}" class="btn btn-info btn-group">Ver</a>
                        @if (auth()->user()->rol == 1)
                        <form action="{{ route('insumos.restore', $insumo) }}" class="d-inline">
                            @csrf
                            <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar" onclick="if(confirm('Se restaurará el insumo ¿Continuar?')){this.form.submit();}" />
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('insumos.index') }}" class="btn btn-secondary btn-sm float-right my-4">Volver</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#insumos_elim').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>

@endsection