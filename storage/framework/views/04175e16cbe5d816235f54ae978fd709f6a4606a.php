<?php $__env->startSection('content'); ?>

<?php if( session('mensaje') ): ?> 
<div class="alert alert-success">
    <a href="<?php echo e(route('ortodoncias.index')); ?>" class="btn btn-success btn-sm" role="button">Volver</a>
     <?php echo e(session('mensaje')); ?>

</div>
<?php endif; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Ortodoncias</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('ortodoncias.update', $ortodoncia->id)); ?>">
                        <?php echo method_field('PATCH'); ?>
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="motivo" class="col-md-4 col-form-label text-md-right">Motivo</label>

                            <div class="col-md-6">
                                <input id="motivo" type="text" maxlength="40" class="form-control <?php if ($errors->has('motivo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('motivo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="motivo" value="<?php echo e($ortodoncia->motivo); ?>" >

                                <?php if ($errors->has('motivo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('motivo'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="diagnostico" class="col-md-4 col-form-label text-md-right">Diagnóstico</label>

                            <div class="col-md-6">
                                <input id="diagnostico" type="text" maxlength="40" class="form-control <?php if ($errors->has('diagnostico')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('diagnostico'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="diagnostico" value="<?php echo e($ortodoncia->diagnostico); ?>">

                                <?php if ($errors->has('diagnostico')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('diagnostico'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="objetivos" class="col-md-4 col-form-label text-md-right">Objetivos</label>

                            <div class="col-md-6">
                                <input id="objetivos" type="text" maxlength="40" class="form-control <?php if ($errors->has('objetivos')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('objetivos'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="objetivos" value="<?php echo e($ortodoncia->objetivos); ?>">

                                <?php if ($errors->has('objetivos')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('objetivos'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="plan_tratamiento" class="col-md-4 col-form-label text-md-right">Plan de tratamiento</label>

                            <div class="col-md-6">
                                <input id="plan_tratamiento" type="text" maxlength="40" class="form-control <?php if ($errors->has('plan_tratamiento')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('plan_tratamiento'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="plan_tratamiento" value="<?php echo e($ortodoncia->plan_tratamiento); ?>">

                                <?php if ($errors->has('plan_tratamiento')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('plan_tratamiento'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aparatologia" class="col-md-4 col-form-label text-md-right">Aparatología</label>

                            <div class="col-md-6">
                                <input id="aparatologia" type="text" maxlength="40" class="form-control <?php if ($errors->has('aparatologia')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('aparatologia'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="aparatologia" value="<?php echo e($ortodoncia->aparatologia); ?>" autocomplete>

                                <?php if ($errors->has('aparatologia')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('aparatologia'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="presupuesto" class="col-md-4 col-form-label text-md-right">Presupuesto</label>

                            <div class="col-md-6">
                                <input id="presupuesto" type="number" min="0" max="99999" class="form-control <?php if ($errors->has('presupuesto')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('presupuesto'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="presupuesto" value="<?php echo e($ortodoncia->presupuesto); ?>">

                                <?php if ($errors->has('presupuesto')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('presupuesto'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inicial" class="col-md-4 col-form-label text-md-right">Monto inicial</label>

                            <div class="col-md-6">
                                <input id="inicial" type="number" min="0" max="99999" class="form-control <?php if ($errors->has('inicial')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inicial'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="inicial" value="<?php echo e($ortodoncia->inicial); ?>">

                                <?php if ($errors->has('inicial')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('inicial'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cuota" class="col-md-4 col-form-label text-md-right">Monto cuota</label>

                            <div class="col-md-6">
                                <input id="cuota" type="number" min="0" max="99999" class="form-control <?php if ($errors->has('cuota')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cuota'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cuota" value="<?php echo e($ortodoncia->cuota); ?>">

                                <?php if ($errors->has('cuota')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cuota'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                    <a href="<?php echo e(route('ortodoncias.index')); ?>" class="btn btn-secondary" role="button">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/ortodoncias/editar.blade.php ENDPATH**/ ?>