@extends('layouts.app')

@section('content')
@auth
@if (auth()->user()->rol == 1)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nomeclatura</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('nomeclaturas.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nomeclatura" class="col-md-4 col-form-label text-md-right">Nomeclatura *</label>
                            <div class="col-md-6">
                                <input id="nomeclatura" type="text" maxlength="12" class="form-control @error('nomeclatura') is-invalid @enderror" name="nomeclatura" value="{{ old('nomeclatura') }}" required autofocus>
                                @error('nomeclatura') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripción *</label>
                            <div class="col-md-6">
                                <input id="descripcion" type="text" maxlength="128" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required>
                                @error('descripcion') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear nomeclatura
                                </button>
                                <a href="{{ route('nomeclaturas.index') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endauth
@endsection