@extends('layouts.app')

@section('content')

<style>
    label {
    display: block;
    padding-left: 15px;
    text-indent: -15px;
}
 
input {
    width: 13px;
    height: 13px;
    padding: 0;
    margin:0;
    vertical-align: bottom;
    position: relative;
    top: -1px;
    *overflow: hidden;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Configuración - {{Auth::user()->nombre}} {{Auth::user()->apellido}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('empleados.guardarConfiguracion') }}">
                        @csrf

                        <label for="ocultar_montos" class="col-md col-form-label text-md-left">Ocultar monto de mis servicios prestados:</label>
                        
                        <div class="col-md">
                                <input id="ocultar_montos" type="checkbox" class="form-control" name="ocultar_montos" @if (Auth::user()->ocultar_montos) checked @endif >
                        </div>
                        
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                                <a href="{{ URL::previous() }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection