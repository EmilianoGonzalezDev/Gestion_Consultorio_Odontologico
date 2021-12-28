@extends('layouts.app')

@section('content')

<div class="container my-4">

    @if (Session::has('deleted'))
    <div class="alert alert-warning alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        Registro eliminado, si desea deshacer haga <a href="{{ route('insumos.restaurarReduccion', [Session::get('deleted')]) }}">Click aquí</a> </div>
    @endif    

    <a href="{{ route('insumos.index') }}" class="btn btn-primary btn-sm" role="button">Volver</a>
    <a href="{{ route('comprainsumos.crearDesdeListado', $insumo) }}" class="btn btn-warning btn-sm">Agregar stock</a>
    <h1><br>#{{ $insumo->id }} - {{ $insumo->nombre }} {{ $insumo->marca }}</h1>
    
    <!-- AVISO DE ELIMINADO -->
    <div class="col-md-8">
        @if ( $insumo->deleted_at != null )
            <div class="alert alert-danger">
                Elemento dado de baja (eliminado)
            </div>
        @endif

        <!-- DATOS -->
        <div class="card">
            <div class="card-header">Detalles</div>
            <div class="card-body">
                    <table>
                    <tr><td><b>Stock restante:</b></td><td>  {{ $insumo->stock }}</td></tr>
                    <tr><td><b>Stock bajo en:</b></td><td>  {{ $insumo->stock_bajo }}</td></tr>
                    <tr><td><b>Contenido:</b></td><td>  {{ $insumo->contenido_cantidad }} {{ $insumo->contenido_unidad }}</td></tr>
                    <tr><td><b>Detalles:</b></td><td>  {{ $insumo->detalles }}</td></tr>
                    </table>
                    <br><i><b>Creado:</b> {{ $insumo->created_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $insumo->creado_por }}</i>
                    @if ( $insumo->eliminado_por != null )
                    <br><i><b>Eliminado:</b> {{ $insumo->deleted_at->formatLocalized('%d/%m/%Y %H:%M') }} por {{ $insumo->eliminado_por }}</i>
                    @elseif ( $insumo->editado_por != null )
                    <br><b>Actualizado:</b> {{ $insumo->updated_at->formatLocalized('%A %d de %B de %Y a las %H:%M') }} por {{ $insumo->editado_por }}
                    @endif
            </div>
        </div>
    </div>
    
    <div>
        <br>
        <!-- HISTORIAL COMPRAS  -->
        <div style="float: left" > 
        <h4>Historial de Compras</h4>
        <table id="historial_stock" class="table table-hover table-bordered table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Precio $</th>
                        <th>Registrado por</th>
                    </tr>
                </thead>
                <tbody>           
                    @foreach ($compras as $compra)
                                <tr style="height: 54px;">
                                    <th scope="row">{{$compra->id}}</th>
                                    <th>{{$compra->fecha_compra->formatLocalized('%d/%m/%Y')}}</th>
                                    <th class="text-center">{{$compra->cantidad_adquirida}}</th>
                                    <th class="money">{{$compra->precio_compra}}</th>
                                    <th>{{$compra->creado_por}}</th>
                                </tr>
                    @endforeach
                </tbody>
        </table>
        </div>

        <!-- HISTORIAL Reducciones Stock  -->
        <div style="float: left">
        <h4>Reducciones de Stock</h4>
        <table id="reducciones_stock" class="table table-hover table-bordered table-responsive">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Registrado por</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>           
                    @foreach ($reducciones as $reduccion)
                                <tr>
                                    <th scope="row">{{$reduccion->id}}</th>
                                    <th>{{$reduccion->fecha->formatLocalized('%d/%m/%Y %H:%M')}}</th>
                                    <th>{{$reduccion->cantidad}}</th>
                                    <th>{{$reduccion->creado_por}}</th>
                                    <td>
                                        <!-- <div class="btn-group-sm" role="group" aria-label="Basic example"> -->
                                            <form action="{{ route('insumos.deshacerReduccion', $reduccion) }}" method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type=button class="btn btn-danger btn-sm" value="Eliminar"
                                                            onclick="if(confirm('Se eliminará la acción ¿Continuar?')){this.form.submit();}"/>
                                            </form>
                                        <!-- </div>                   -->
                                    </td>
                                </tr>
                    @endforeach
                </tbody>
        </table>
        </div>
    </div>


</div>

@endsection