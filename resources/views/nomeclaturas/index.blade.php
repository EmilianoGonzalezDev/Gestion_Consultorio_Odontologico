@extends('layouts.app')

@section('content')
@auth
@if (auth()->user()->rol == 1)

<!-- Mensaje post eliminar -->
@if (Session::has('deleted'))
<div class="container my-4">
    <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Nomeclatura eliminada, si desea deshacer haga <a href="{{ route('nomeclaturas.restore', [Session::get('deleted')]) }}">Click aquí</a>
    </div>
</div>
@endif

<!-- Título y botón "Nuevo" -->
<div class="div_titulo">
    <h2>Nomeclaturas</h2>
    <div class="my-4 btn-group-sm">
        <a href="{{ route('nomeclaturas.create') }}" class="btn btn-primary">Nueva Nomeclatura</a>
    </div>
</div>

<!-- Tabla -->
<div class="div_tabla">
    <table id="nomeclaturas" class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>Nomeclatura</th>
                <th>Descripción</th>
                <th>Creado</th>
                <th>Editado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nomeclaturas as $nomeclatura)
            <tr>
                <th scope="row">
                {{$nomeclatura->nomeclatura}}
                </th>
                <td>{{$nomeclatura->descripcion}}</td>
                <td>{{$nomeclatura->created_at->formatLocalized('%d/%m/%Y %H:%M')}}</td>
                <td>{{$nomeclatura->updated_at->formatLocalized('%d/%m/%Y %H:%M')}}</td>
                <td>
                    <div class="btn-group-sm dt-col-nowrap" role="group" aria-label="Basic example">
                        <a href="{{ route('nomeclaturas.edit', $nomeclatura) }}" class="btn btn-dark btn-group">Editar</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Scripts -->
<script>
    $(document).ready(function() {
        $('#nomeclaturas').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
            },
            "order": [[ 0, "asc" ]],
            responsive: true
        });
    });
</script>

@endif
@endauth
@endsection