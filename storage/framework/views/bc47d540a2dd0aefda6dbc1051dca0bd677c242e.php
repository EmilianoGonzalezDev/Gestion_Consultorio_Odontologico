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
                <div class="card-header">Agregar Stock</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('comprainsumos.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="insumo_id" class="col-md-4 col-form-label text-md-right">Insumo</label>
                            <div class="select col-md-6">
                                <select name="insumo_id" id="insumo_id" class="form-control" value="<?php echo e(old('insumo_id')); ?>">
                                    <?php if( isset($insumo) ): ?>
                                        <option value="<?php echo e($insumo->id); ?>"><?php echo e($insumo->nombre); ?> <?php echo e($insumo->marca); ?> <?php echo e($insumo->contenido_cantidad); ?> <?php echo e($insumo->contenido_unidad); ?> (código: <?php echo e($insumo->id); ?>)</option>
                                    <?php else: ?>
                                        <option value=""></option>
                                        <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insumo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($insumo->id); ?>"><?php echo e($insumo->nombre); ?> <?php echo e($insumo->marca); ?> <?php echo e($insumo->contenido_cantidad); ?> <?php echo e($insumo->contenido_unidad); ?> (código: <?php echo e($insumo->id); ?>)</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Comprado por</label>
                            <div class="select col-md-6">
                                <select name="user_id" id="user_id" class="form-control" required>
                                        <option value=""></option>
                                    <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($empleado->odontologo): ?>
                                        <option value="<?php echo e($empleado->id); ?>"><?php echo e($empleado->nombre); ?> <?php echo e($empleado->apellido); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_compra" class="col-md-4 col-form-label text-md-right">Fecha de compra</label>

                            <div class="col-md-6">
                                <input id="fecha_compra" type="date" class="form-control <?php $__errorArgs = ['fecha_compra'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fecha_compra" value="<?php echo date("Y-m-d"); ?>">

                                <?php $__errorArgs = ['fecha_compra'];
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
                            <label for="cantidad_adquirida" class="col-md-4 col-form-label text-md-right">Cantidad Adquirida</label>

                            <div class="col-md-6">
                                <input id="cantidad_adquirida" type="number" min="0" max="999999" class="form-control <?php $__errorArgs = ['cantidad_adquirida'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="cantidad_adquirida" value="<?php echo e(old('cantidad_adquirida')); ?>" required autocomplete="cantidad_adquirida" >

                                <?php $__errorArgs = ['cantidad_adquirida'];
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
                            <label for="precio_compra" class="col-md-4 col-form-label text-md-right">Precio de Compra $</label>

                            <div class="col-md-6">
                                <input id="precio_compra" type="number" step="any" min="0" max="999999" class="form-control <?php $__errorArgs = ['precio_compra'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="precio_compra" value="<?php echo e(old('precio_compra')); ?>" required autocomplete="precio_compra" >

                                <?php $__errorArgs = ['precio_compra'];
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
                                    Registrar Compra
                                </button>
                                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-secondary">Volver</a>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/comprainsumos/crear.blade.php ENDPATH**/ ?>