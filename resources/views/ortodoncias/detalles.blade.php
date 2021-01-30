@extends('layouts.app')

@section('content')
<div marginwidth = "20">
    <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm" role="button">Volver</a>

    <h1>{{ $ortodoncia->nombre }}</h1>
    <h4>
            <br><b>Creado:</b> {{ $ortodoncia->created_at->formatLocalized('%A %d de %B de %Y a las %H:%M') }} por {{ $ortodoncia->creado_por }}
            @if ( $ortodoncia->eliminado_por != null )
                <br><b>Eliminado:</b> {{ $ortodoncia->deleted_at->formatLocalized('%A %d de %B de %Y a las %H:%M') }} por {{ $ortodoncia->eliminado_por }}
            @elseif ( $ortodoncia->editado_por != null )
                <br><b>Actualizado:</b> {{ $ortodoncia->updated_at->formatLocalized('%A %d de %B de %Y a las %H:%M') }} por {{ $ortodoncia->editado_por }}
            @endif
    </h4>

    @if ( $ortodoncia->deleted_at != null )
        <div class="alert alert-danger">
                Ortodoncia dado de baja (eliminado)
        </div>
    @endif
</div>
@endsection