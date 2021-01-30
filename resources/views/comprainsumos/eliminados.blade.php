@extends('layouts.app')

@section('content')

    <div class="container my-4">
        @if ( session('mensaje') ) {{-- mensaje de OK, cuando se edita/elimina una compra --}}
            <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                {{ session('mensaje') }}
            </div>
        @endif

        <h2>Registros eliminados de historial de compras de insumo</h2>

        <table id="comprainsumos">
            <thead>
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
                @foreach ($comprainsumos as $compra)  <!-- En cada vuelta, guarda una fila de la tabla CompraInsumos en la variable $compra --> 
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
                                    <div class="btn-group-sm" role="group" aria-label="Basic example">
                                        <form action="{{ route('comprainsumos.restore', $compra) }}" class="d-inline">
                                                @csrf
                                                <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar"
                                                    onclick="if(confirm('Se restaurará este registro de compra de insumo ¿Continuar?')){this.form.submit();}"/>
                                        </form>
                                    </div>                  
                                </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('comprainsumos.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#comprainsumos').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
        });
    });

    </script>
  

@endsection