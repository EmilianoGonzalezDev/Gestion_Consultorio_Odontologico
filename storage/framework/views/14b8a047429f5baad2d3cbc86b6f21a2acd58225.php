<?php $__env->startSection('content'); ?>
    <div class="container my-4">        
        <h2>Reportes</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Listado de pacientes atendidos en un período</div>

                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('reportes.mostrarPacientesPorFecha')); ?>" target="_blank">
                                <?php echo csrf_field(); ?>
                                
                                <div class="form-group row">
                                    <label for="fechanainicial" class="col-md-4 col-form-label text-md-right">Desde</label>

                                    <div class="col-md-6">
                                        <input id="fechanainicial" type="date" class="form-control <?php $__errorArgs = ['fechanainicial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fechanainicial" value=<?php echo e(\Carbon\Carbon::today()->sub('1 month')); ?> required>

                                        <?php $__errorArgs = ['fechanainicial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label for="fechafinal" class="col-md-4 col-form-label text-md-right">Hasta</label>

                                    <div class="col-md-6">
                                        <input id="fechafinal" type="date" class="form-control <?php $__errorArgs = ['fechafinal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fechafinal" value="<?php echo date("Y-m-d"); ?>" required>

                                        <?php $__errorArgs = ['fechafinal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                                <a href="<?php echo e(route('reportes.ingresoDeEfectivo')); ?>" class="btn btn-primary btn-lg" target="_blank">Obtener</a>
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
                                <a href="<?php echo e(route('reportes.PacientesPorNacimiento')); ?>" class="btn btn-primary btn-lg" target="_blank">Obtener</a>
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
                                <a href="<?php echo e(route('home')); ?>" class="btn btn-primary btn-lg">Obtener</a>
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
                                    <a href="<?php echo e(route('backup.index')); ?>" class="btn btn-primary btn-lg">Obtener</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/reportes/index.blade.php ENDPATH**/ ?>