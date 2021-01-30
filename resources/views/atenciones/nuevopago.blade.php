@extends('layouts.app')

@section('content')

@if ( session('mensaje') ) {{-- Si se crea OK! lo informa --}}
<div class="alert alert-success">
    <a href="{{ route('atenciones.show', $atencion) }}" class="btn btn-success btn-sm" role="button">Volver</a>
     {{ session('mensaje') }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuevo pago de {{$paciente->nombre}} {{$paciente->apellido}} para la atención #{{$atencion->id}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('atenciones.guardarPago') }}">
                        @csrf

                        
                        <input type="hidden" name="atencion_id" id="atencion_id" value="{{$atencion->id}}"> <!-- para la función guardarPago() en AtencionController -->

                        <div class="form-group row">
                            <label for="saldo" class="col-md-4 text-md-right">Saldo actual $</label>

                            <div class="col-md-6">
                                <h5> {{$atencion->importe - $atencion->pago}} </h5>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monto" class="col-md-4 col-form-label text-md-right">Monto a pagar $</label>

                            <div class="col-md-3">
                                <input id="monto" type="number" step="any" min="0" max="{{$atencion->importe - $atencion->pago}}" class="form-control @error('monto') is-invalid @enderror" name="monto" value="{{ old('monto') }}" required autocomplete="off" autofocus>

                                @error('monto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label for="cubierto_obra_social" class="col-md-2 col-form-label text-md-right">Cubierto O.S.</label>

                            <div class="col-md-1">
                                <input id="cubierto_obra_social" type="checkbox" class="form-control @error('cubierto_obra_social') is-invalid @enderror" name="cubierto_obra_social">

                                @error('cubierto_obra_social')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha de pago</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control @error('fecha') is-invalid @enderror" name="fecha" value="<?php echo date("Y-m-d"); ?>">

                                @error('fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">Detalle</label>

                            <div class="col-md-6">
                                <input id="detalle" type="text" maxlength="25" class="form-control @error('detalle') is-invalid @enderror" name="detalle" value="{{ old('detalle') }}" autocomplete="off">

                                @error('detalle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Pago
                                </button>
                                <a href="{{ route('atenciones.index') }}" class="btn btn-secondary">Volver</a>
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