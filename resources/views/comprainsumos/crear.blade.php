@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agregar Stock</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comprainsumos.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="insumo_id" class="col-md-4 col-form-label text-md-right">Insumo</label>
                            <div class="select col-md-6">
                                <select name="insumo_id" id="insumo_id" class="form-control" value="{{ old('insumo_id') }}">
                                    @if ( isset($insumo) )
                                        <option value="{{$insumo->id}}">{{$insumo->nombre}} {{$insumo->marca}} {{$insumo->contenido_cantidad}} {{$insumo->contenido_unidad}} (código: {{$insumo->id}})</option>
                                    @else
                                        <option value=""></option>
                                        @foreach ($insumos as $insumo)
                                            <option value="{{$insumo->id}}">{{$insumo->nombre}} {{$insumo->marca}} {{$insumo->contenido_cantidad}} {{$insumo->contenido_unidad}} (código: {{$insumo->id}})</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Comprado por</label>
                            <div class="select col-md-6">
                                <select name="user_id" id="user_id" class="form-control" required>
                                        <option value=""></option>
                                    @foreach ($empleados as $empleado)
                                        @if($empleado->odontologo)
                                        <option value="{{$empleado->id}}">{{$empleado->nombre}} {{$empleado->apellido}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_compra" class="col-md-4 col-form-label text-md-right">Fecha de compra</label>

                            <div class="col-md-6">
                                <input id="fecha_compra" type="date" class="form-control @error('fecha_compra') is-invalid @enderror" name="fecha_compra" value="<?php echo date("Y-m-d"); ?>">

                                @error('fecha_compra')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cantidad_adquirida" class="col-md-4 col-form-label text-md-right">Cantidad Adquirida</label>

                            <div class="col-md-6">
                                <input id="cantidad_adquirida" type="number" min="0" max="999999" class="form-control @error('cantidad_adquirida') is-invalid @enderror" name="cantidad_adquirida" value="{{ old('cantidad_adquirida') }}" required autocomplete="cantidad_adquirida" >

                                @error('cantidad_adquirida')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precio_compra" class="col-md-4 col-form-label text-md-right">Precio de Compra $</label>

                            <div class="col-md-6">
                                <input id="precio_compra" type="number" step="any" min="0" max="999999" class="form-control @error('precio_compra') is-invalid @enderror" name="precio_compra" value="{{ old('precio_compra') }}" required autocomplete="precio_compra" >

                                @error('precio_compra')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Compra
                                </button>
                                <a href="{{ route('comprainsumos.index') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function() //Si el usuario actual es odontÃ³logo, lo pone automÃ¡ticamente en el select de crear atenciÃ³n
        {
            var selectEmpleado = document.getElementById('user_id');
            if ({{ Auth::user()->odontologo }}) selectEmpleado.value = {{ Auth::user()->id }};
        });
</script>

@endsection