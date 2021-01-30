<?php $__env->startSection('content'); ?>

<?php if( session('mensaje') ): ?> 
<div class="alert alert-success">
    <a href="<?php echo e(route('insumos.index')); ?>" class="btn btn-success btn-sm" role="button">Volver</a>
    <?php echo e(session('mensaje')); ?>

</div>
<?php endif; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reducir Stock de <?php echo e($insumo->nombre); ?> <?php echo e($insumo->marca); ?> <?php echo e($insumo->contenido_cantidad); ?><?php echo e($insumo->contenido_unidad); ?>


                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('insumos.guardarReducirStock')); ?>">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="insumo_id" id="insumo_id" value="<?php echo e($insumo->id); ?>"> <!-- para la función guardarReduccionStock() en InsumoController -->
                        
                        <div class="form-group row">
                            <label for="stock" class="col-md-4 text-md-right">Stock actual: </label>

                            <div class="col-md-6">
                                <h5> <?php echo e($insumo->stock); ?> </h5>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad a quitar*</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="number" min="1" max="<?php echo e($insumo->stock); ?>" class="form-control <?php if ($errors->has('cantidad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cantidad'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cantidad" value="<?php echo e($insumo->cantidad); ?>" required autocomplete="cantidad" autofocus>

                                <?php if ($errors->has('cantidad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cantidad'); ?>
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
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                                <a href="<?php echo e(route('insumos.index')); ?>" class="btn btn-secondary" role="button">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/insumos/reducirstock.blade.php ENDPATH**/ ?>