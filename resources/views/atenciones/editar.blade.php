@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Atención #{{ $atencion->id }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('atenciones.update', $atencion->id) }}">
                        @method('PATCH')
                        @csrf

                        <!-- <div class="form-group row">
                            <label for="arcada_superior" class="col-md-4 col-form-label text-md-right">Arcada Superior</label>
                            <div class="col-md-6">
                                <input id="arcada_superior" type="text" maxlength="40" class="form-control @error('arcada_superior') is-invalid @enderror" name="arcada_superior" value="{{ $atencion->arcada_superior }}">
                                @error('arcada_superior') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="proximo_turno" class="col-md-4 col-form-label text-md-right">Próximo Turno</label>
                            <div class="col-md-6">
                                <input id="proximo_turno" type="date" class="form-control @error('proximo_turno') is-invalid @enderror" name="proximo_turno" value="{{ $atencion->proximo_turno }}">
                                @error('proximo_turno') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                <a href="{{ route('atenciones.index') }}" class="btn btn-secondary" role="button">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection