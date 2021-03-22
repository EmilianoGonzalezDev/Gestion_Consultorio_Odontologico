@extends('layouts.app')

@section('content')

<!-- Mensaje post eliminar -->
@if (Session::has('deleted'))
<div class="container my-4">
    <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Registro de compra eliminado, si desea deshacer haga <a href="{{ route('comprainsumos.restore', [Session::get('deleted')]) }}">Click aquí</a>
    </div>
</div>
@endif

<!-- Título y botón "Nuevo" -->
<div class="div_titulo">
    <h2>Historial de compra de insumos</h2>
    <div class="my-4 btn-group-sm">
        <a href="{{ route('comprainsumos.create') }}" class="btn btn-primary">Nueva Compra</a>
        <a href="{{ route('insumos.index') }}" class="btn btn-secondary">Ver Insumos</a>
    </div>
</div>

<!-- Tabla -->
<div class="div_tabla">
    <table id="comprainsumos" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>#N°</th>
                <th>Cód</th>
                <th>Insumo</th>
                <th>Marca</th>
                <th>Contenido</th>
                <th>Costo</th>
                <th>Comprados</th>
                <th>Comprado por</th>
                <th>Registrado por</th>
                <th>Fecha Compra</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comprainsumos as $compra)
            @if ($compra->insumo)
            <!-- ( "Si existe el insumo para esta compra..." ) | evita error al intentar mostrar info sobre insumos eliminados -->
            @php
            $insumo = App\Insumo::find($compra->insumo_id);
            $profesional = App\User::find($compra->user_id);
            @endphp
            <tr>
                <th scope="row">{{$compra->id}}</th>
                <td>{{$compra->insumo_id}}</td>
                <td>{{$insumo->nombre}}</td>
                <td>{{$insumo->marca}}</td>
                <td>{{$insumo->contenido_cantidad}} {{$insumo->contenido_unidad}}</td>
                <td>${{$compra->precio_compra}}</td>
                <td>{{$compra->cantidad_adquirida}}</td>
                <td>{{$profesional->nombre}} {{$profesional->apellido}}</td>
                <td>{{$compra->creado_por}}</td>
                <td>{{$compra->fecha_compra->formatLocalized('%d/%m/%Y')}}</td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap" role="group" aria-label="Basic example">
                        @if ($compra->cantidad_adquirida <= $insumo->stock )
                            <form action="{{ route('comprainsumos.destroy', $compra) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <input type="button" class="btn btn-danger btn-sm" value="Eliminar" onclick="if(confirm('Se eliminará este registro de compra de insumo ¿Continuar?')){this.form.submit();}" />
                            </form>
                            @endif
                    </div>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('comprainsumos.verEliminados') }}" class="btn btn-secondary btn-sm float-right">Ver Registros Eliminados</a>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#comprainsumos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            responsive: true
        });
    });
</script>

@endsection