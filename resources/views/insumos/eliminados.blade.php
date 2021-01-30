@extends('layouts.app')

@section('content')

    <div class="container my-4">
        @if ( session('mensaje') ) {{-- mensaje de OK, cuando se edita/elimina un insumo --}}
            <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                {{ session('mensaje') }}
            </div>
        @endif
     
        <h2>Insumos Eliminados</h2>

        <table id="insumos">
            <thead>
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
                @foreach ($insumos as $insumo)  <!-- En cada vuelta, guarda una fila de la tabla Insumos en la variable $insumo -->
                <tr>
                    <th scope="row">
                        <a href="{{route('insumos.show', $insumo) }}">
                            {{$insumo->id}}
                        </a></th>
                    <td>{{$insumo->nombre}}</td>
                    <td>{{$insumo->marca}}</td>
                    <td>{{$insumo->contenido_cantidad}} {{$insumo->contenido_unidad}}</td>
                    <td>{{$insumo->detalles }}</td>
                    <td>{{$insumo->stock }}</td>
                    <td>
                            <div class="btn-group-sm" role="group" aria-label="Basic example">
                                <a href="{{ route('insumos.show', $insumo) }}" class="btn btn-info btn-group">Ver</a>
                                <form action="{{ route('insumos.restore', $insumo) }}" class="d-inline">
                                        @csrf
                                        <input type=button class="btn btn-warning btn-sm btn-group" value="Restaurar"
                                               onclick="if(confirm('Se restaurará el insumo ¿Continuar?')){this.form.submit();}"/>
                                                                                                     
                                </form>
                            </div>                  
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('insumos.index') }}" class="btn btn-secondary btn-sm float-right">Volver</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#insumos').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
        });
    });

    </script>
  

@endsection