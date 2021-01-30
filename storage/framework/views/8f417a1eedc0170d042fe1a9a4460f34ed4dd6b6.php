<?php $__env->startSection('content'); ?>

<?php if( session('mensaje') ): ?> 
<div class="alert alert-success">
    <a href="<?php echo e(route('atenciones.show', $atencion)); ?>" class="btn btn-success btn-sm" role="button">Volver</a>
     <?php echo e(session('mensaje')); ?>

</div>
<?php endif; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuevo pago de <?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido); ?> para la atención #<?php echo e($atencion->id); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('atenciones.guardarPago')); ?>">
                        <?php echo csrf_field(); ?>

                        
                        <input type="hidden" name="atencion_id" id="atencion_id" value="<?php echo e($atencion->id); ?>"> <!-- para la función guardarPago() en AtencionController -->

                        <div class="form-group row">
                            <label for="saldo" class="col-md-4 text-md-right">Saldo actual $</label>

                            <div class="col-md-6">
                                <h5> <?php echo e($atencion->importe - $atencion->pago); ?> </h5>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="monto" class="col-md-4 col-form-label text-md-right">Monto a pagar $</label>

                            <div class="col-md-3">
                                <input id="monto" type="number" step="any" min="0" max="<?php echo e($atencion->importe - $atencion->pago); ?>" class="form-control <?php $__errorArgs = ['monto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="monto" value="<?php echo e(old('monto')); ?>" required autocomplete="off" autofocus>

                                <?php $__errorArgs = ['monto'];
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

                            <label for="cubierto_obra_social" class="col-md-2 col-form-label text-md-right">Cubierto O.S.</label>

                            <div class="col-md-1">
                                <input id="cubierto_obra_social" type="checkbox" class="form-control <?php $__errorArgs = ['cubierto_obra_social'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cubierto_obra_social">

                                <?php $__errorArgs = ['cubierto_obra_social'];
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
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha de pago</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control <?php $__errorArgs = ['fecha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fecha" value="<?php echo date("Y-m-d"); ?>">

                                <?php $__errorArgs = ['fecha'];
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
                            <label for="detalle" class="col-md-4 col-form-label text-md-right">Detalle</label>

                            <div class="col-md-6">
                                <input id="detalle" type="text" maxlength="25" class="form-control <?php $__errorArgs = ['detalle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="detalle" value="<?php echo e(old('detalle')); ?>" autocomplete="off">

                                <?php $__errorArgs = ['detalle'];
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar Pago
                                </button>
                                <a href="<?php echo e(route('atenciones.index')); ?>" class="btn btn-secondary">Volver</a>
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
            if (<?php echo e(Auth::user()->odontologo); ?>) selectEmpleado.value = <?php echo e(Auth::user()->id); ?>;
        });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/atenciones/nuevopago.blade.php ENDPATH**/ ?>