@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Insumo</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('insumos.update', $insumo->id) }}">
                        @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre *</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" maxlength="25" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $insumo->nombre }}" required autocomplete="nombre" autofocus>
                                @error('nombre') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-md-4 col-form-label text-md-right">Marca *</label>
                            <div class="col-md-6">
                                <input id="marca" type="text" maxlength="25" class="form-control @error('marca') is-invalid @enderror" name="marca" value="{{ $insumo->marca }}" required autocomplete="marca" autofocus>
                                @error('marca') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contenido_cantidad" class="col-md-4 col-form-label text-md-right">Contenido cantidad *</label>
                            <div class="col-md-6">
                                <input id="contenido_cantidad" type="number" min="1" max="99999" class="form-control @error('contenido_cantidad') is-invalid @enderror" name="contenido_cantidad" value="{{ $insumo->contenido_cantidad }}" required autocomplete="contenido_cantidad" autofocus>
                                @error('contenido_cantidad') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <hr />

                        <div class="form-group row">
                            <label for="contenido_unidad" class="col-md-4 col-form-label text-md-right">Contenido Unidad</label>
                            <div class="col-md-6">
                                <input id="contenido_unidad" type="text" maxlength="4" class="form-control @error('contenido_unidad') is-invalid @enderror" name="contenido_unidad" value="{{ $insumo->contenido_unidad }}">
                                @error('contenido_unidad') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalles" class="col-md-4 col-form-label text-md-right">Detalles</label>
                            <div class="col-md-6">
                                <input id="detalles" type="text" maxlength="25" class="form-control @error('detalles') is-invalid @enderror" name="detalles" value="{{ $insumo->detalles }}">
                                @error('detalles') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="stock_bajo" class="col-md-4 col-form-label text-md-right">Stock Bajo</label>
    
                                <div class="col-md-6">
                                    <input id="stock_bajo" type="number" min="0" class="form-control @error('stock_bajo') is-invalid @enderror" name="stock_bajo" value="{{ $insumo->stock_bajo }}">
    
                                    @error('stock_bajo')
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