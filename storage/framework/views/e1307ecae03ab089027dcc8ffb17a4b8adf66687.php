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
                <div class="card-header">Nuevo Elemento</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('insumos.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre *</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" maxlength="25" class="form-control <?php if ($errors->has('nombre')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nombre'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nombre" value="<?php echo e(old('nombre')); ?>" required autocomplete="off" autofocus>

                                <?php if ($errors->has('nombre')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nombre'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-md-4 col-form-label text-md-right">Marca *</label>

                            <div class="col-md-6">
                                <input id="marca" type="text" maxlength="25" class="form-control <?php if ($errors->has('marca')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('marca'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="marca" value="<?php echo e(old('marca')); ?>" required autocomplete="marca">

                                <?php if ($errors->has('marca')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('marca'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contenido_cantidad" class="col-md-4 col-form-label text-md-right">Contenido cantidad/Unidades *</label>

                            <div class="col-md-6">
                                <input id="contenido_cantidad" type="number" min="1" max="99999" class="form-control <?php if ($errors->has('contenido_cantidad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contenido_cantidad'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="contenido_cantidad" value="<?php echo e(old('contenido_cantidad')); ?>" required autocomplete="contenido_cantidad">
                                <?php if ($errors->has('contenido_cantidad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contenido_cantidad'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <hr />

                        <div class="form-group row">
                            <label for="contenido_unidad" class="col-md-4 col-form-label text-md-right">Contenido Unidad</label>

                            <div class="col-md-6">
                                <input id="contenido_unidad" type="text" maxlength="6" class="form-control <?php if ($errors->has('contenido_unidad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contenido_unidad'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="contenido_unidad" value="<?php echo e(old('contenido_unidad')); ?>">

                                <?php if ($errors->has('contenido_unidad')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('contenido_unidad'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="detalles" class="col-md-4 col-form-label text-md-right">Detalles</label>

                            <div class="col-md-6">
                                <input id="detalles" type="text" maxlength="25" class="form-control <?php if ($errors->has('detalles')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('detalles'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="detalles" value="<?php echo e(old('detalles')); ?>">

                                <?php if ($errors->has('detalles')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('detalles'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>


                        <div class="form-group row">
                                <label for="stock_bajo" class="col-md-4 col-form-label text-md-right">Stock Bajo</label>
    
                                <div class="col-md-6">
                                    <input id="stock_bajo" type="number" min="0" max="99999" class="form-control <?php if ($errors->has('stock_bajo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stock_bajo'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="stock_bajo" value="<?php echo e(old('stock_bajo')); ?>">
    
                                    <?php if ($errors->has('stock_bajo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('stock_bajo'); ?>
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
                                <button type="submit" class="btn btn-primary">
                                    Crear Elemento
                                </button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/insumos/crear.blade.php ENDPATH**/ ?>