@extends('layouts.app')

@section('content')

@if ( session('mensaje') ) {{-- Si se crea OK! lo informa --}}
<div class="alert alert-success">
    <a href="{{ route('ortodoncias.index') }}" class="btn btn-success btn-sm" role="button">Volver</a>
     {{ session('mensaje') }}
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nueva ficha de ortodoncia</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ortodoncias.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="paciente_id" class="col-md-4 col-form-label text-md-right">Paciente</label>
                            <div class="select col-md-6">
                                <select name="paciente_id" id="paciente_id" required class="form-control">
                                    <option value=""></option>
                                    @foreach ($pacientes as $paciente)
                                        <option value="{{$paciente->id}}">{{$paciente->nombre}} {{$paciente->apellido}} - cód. {{$paciente->id}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="motivo" class="col-md-4 col-form-label text-md-right">Motivo</label>

                            <div class="col-md-6">
                                <input id="motivo" type="text" maxlength="40" class="form-control @error('motivo') is-invalid @enderror" name="motivo" value="{{ old('motivo') }}" >

                                @error('motivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="diagnostico" class="col-md-4 col-form-label text-md-right">Diagnóstico</label>

                            <div class="col-md-6">
                                <input id="diagnostico" type="text" maxlength="40" class="form-control @error('diagnostico') is-invalid @enderror" name="diagnostico" value="{{ old('diagnostico') }}">

                                @error('diagnostico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="objetivos" class="col-md-4 col-form-label text-md-right">Objetivos</label>

                            <div class="col-md-6">
                                <input id="objetivos" type="text" maxlength="40" class="form-control @error('objetivos') is-invalid @enderror" name="objetivos" value="{{ old('objetivos') }}">

                                @error('objetivos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plan_tratamiento" class="col-md-4 col-form-label text-md-right">Plan de tratamiento</label>

                            <div class="col-md-6">
                                <input id="plan_tratamiento" type="text" maxlength="40" class="form-control @error('plan_tratamiento') is-invalid @enderror" name="plan_tratamiento" value="{{ old('plan_tratamiento') }}">

                                @error('plan_tratamiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aparatologia" class="col-md-4 col-form-label text-md-right">Aparatología</label>

                            <div class="col-md-6">
                                <input id="aparatologia" type="text" maxlength="40" class="form-control @error('aparatologia') is-invalid @enderror" name="aparatologia" value="{{ old('aparatologia') }}" autocomplete>

                                @error('aparatologia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="presupuesto" class="col-md-4 col-form-label text-md-right">Presupuesto</label>

                            <div class="col-md-6">
                                <input id="presupuesto" type="number" step="any" min="0" max="99999" class="form-control @error('presupuesto') is-invalid @enderror" name="presupuesto" value="{{ old('presupuesto') }}">

                                @error('presupuesto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inicial" class="col-md-4 col-form-label text-md-right">Monto inicial</label>

                            <div class="col-md-6">
                                <input id="inicial" type="number" step="any" min="0" max="99999" class="form-control @error('inicial') is-invalid @enderror" name="inicial" value="{{ old('inicial') }}">

                                @error('inicial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cuota" class="col-md-4 col-form-label text-md-right">Monto cuota</label>

                            <div class="col-md-6">
                                <input id="cuota" type="number" step="any" min="0" max="99999" class="form-control @error('cuota') is-invalid @enderror" name="cuota" value="{{ old('cuota') }}">

                                @error('cuota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear ficha
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