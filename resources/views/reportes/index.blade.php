@extends('layouts.app')

@section('content')
    <div class="container my-4">        
        <h2>Reportes</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Listado de pacientes atendidos en un período</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('reportes.mostrarPacientesPorFecha') }}" target="_blank">
                                @csrf
                                
                                <div class="form-group row">
                                    <label for="fechanainicial" class="col-md-4 col-form-label text-md-right">Desde</label>

                                    <div class="col-md-6">
                                        <input id="fechanainicial" type="date" class="form-control @error('fechanainicial') is-invalid @enderror" name="fechanainicial" value={{\Carbon\Carbon::today()->sub('1 month')}} required>

                                        @error('fechanainicial')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label for="fechafinal" class="col-md-4 col-form-label text-md-right">Hasta</label>

                                    <div class="col-md-6">
                                        <input id="fechafinal" type="date" class="form-control @error('fechafinal') is-invalid @enderror" name="fechafinal" value="<?php echo date("Y-m-d"); ?>" required>

                                        @error('fechafinal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>                                    
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-lg" id="enviar_formulario">
                                            Obtener
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
        </div>

        <hr>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Ingreso de efectivo</div>
                            <div class="card-body">
                                <a href="{{ route('reportes.ingresoDeEfectivo') }}" class="btn btn-primary btn-lg" target="_blank">Obtener</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Cantidad de pacientes por año de nacimiento</div>
                            <div class="card-body">
                                <a href="{{ route('reportes.PacientesPorNacimiento') }}" class="btn btn-primary btn-lg" target="_blank">Obtener</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
        <hr>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Insumos con stock bajo</div>
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="btn btn-primary btn-lg">Obtener</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    

        <hr>

        <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Backup</div>
                                <div class="card-body">
                                    <a href="{{ route('backup.index') }}" class="btn btn-primary btn-lg">Obtener</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection