@extends('layouts.app')

@section('content')

    <div class="container my-4">
        @if ( session('mensaje') ) {{-- mensaje de OK, cuando se registra/edita/restaura un elemento --}}
            <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                {{ session('mensaje') }}
            </div>
        @endif

        @if (Session::has('deleted'))
            <div class="alert alert-warning alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                Elemento eliminado, si desea deshacer haga <a href="{{ route('insumos.restore', [Session::get('deleted')]) }}">Click aquí</a> </div>
        @endif
     
        <h2>Insumos</h2>
        <div class="my-4 btn-group-sm">
            <a href="{{ route('insumos.create') }}" class="btn btn-primary">Nuevo Insumo</a>
            <a href="{{ route('comprainsumos.index') }}" class="btn btn-secondary">Ver Compras</a>
        </div>
        <table id="insumos" class="display nowrap" cellspacing="0">
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
                @foreach ($insumos as $insumo)  <!-- En cada vuelta, guarda una fila de Insumos en la variable $insumo -->
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
                                <a href="{{ route('insumos.edit', $insumo) }}" class="btn btn-dark btn-group">Editar</a>
                                <a href="{{ route('comprainsumos.crearDesdeListado', $insumo) }}" class="btn btn-warning btn-group">Agregar</a>
                                @if( $insumo->stock == 0)
                                    <form action="{{ route('insumos.destroy', $insumo) }}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                                onclick="if (confirm('Se eliminará el insumo y todo el historial de compras (stock) ¿Continuar?')){this.form.submit();}"/>
                                    </form>
                                @else
                                    <a href="{{ route('insumos.reducirStock', $insumo) }}" class="btn btn-danger btn-group">Reducir</a>
                                @endif
                            </div>                  
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('insumos.verEliminados') }}" class="btn btn-secondary btn-sm float-right">Ver Eliminados</a>
    </div>

    <script>
    $(document).ready( function ()
    {
        $('#insumos').DataTable
        ({
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" },
            responsive: true
        });
    });

    </script>
  

@endsection