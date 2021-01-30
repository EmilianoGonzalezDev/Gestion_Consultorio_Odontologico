@extends('layouts.app')

@section('content')

@if ( session('mensaje') ) {{-- Si se crea OK! lo informa --}}
<div class="alert alert-success">
    <a href="{{ route('insumos.index') }}" class="btn btn-success btn-sm" role="button">Volver</a>
    {{ session('mensaje') }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reducir Stock de {{$insumo->nombre}} {{$insumo->marca}} {{$insumo->contenido_cantidad}}{{$insumo->contenido_unidad}}

                <div class="card-body">
                    <form method="POST" action="{{ route('insumos.guardarReducirStock') }}">
                        @csrf

                        <input type="hidden" name="insumo_id" id="insumo_id" value="{{$insumo->id}}"> <!-- para la función guardarReduccionStock() en InsumoController -->
                        
                        <div class="form-group row">
                            <label for="stock" class="col-md-4 text-md-right">Stock actual: </label>

                            <div class="col-md-6">
                                <h5> {{$insumo->stock}} </h5>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad a quitar*</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="number" min="1" max="{{$insumo->stock}}" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ $insumo->cantidad }}" required autocomplete="cantidad" autofocus>

                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                <a href="{{ route('insumos.index') }}" class="btn btn-secondary" role="button">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection