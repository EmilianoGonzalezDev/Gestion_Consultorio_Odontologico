<?php $__env->startSection('content'); ?>

<?php if( session('mensaje') ): ?> 
<div class="alert alert-success">
    <a href="<?php echo e(route('pacientes.index')); ?>" class="btn btn-success btn-sm" role="button">Volver</a>
     <?php echo e(session('mensaje')); ?>

</div>
<?php endif; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Paciente</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('pacientes.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre *</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" maxlength="25" class="form-control <?php if ($errors->has('nombre')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nombre'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nombre" value="<?php echo e(old('nombre')); ?>" required autocomplete="nombre" autofocus>

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
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido *</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" maxlength="25" class="form-control <?php if ($errors->has('apellido')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('apellido'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="apellido" value="<?php echo e(old('apellido')); ?>" required autocomplete="apellido" >

                                <?php if ($errors->has('apellido')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('apellido'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">DNI *</label>

                            <div class="col-md-6">
                                <input id="dni" type="number" min="0" max="999999999" class="form-control <?php if ($errors->has('dni')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dni'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="dni" value="<?php echo e(old('dni')); ?>" required autocomplete="off" >

                                <?php if ($errors->has('dni')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dni'); ?>
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
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" maxlength="60" class="form-control <?php if ($errors->has('direccion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('direccion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="direccion" value="<?php echo e(old('direccion')); ?>" autocomplete="off">

                                <?php if ($errors->has('direccion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('direccion'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono</label>
    
                                <div class="col-md-6">
                                    <input id="telefono" type="text" maxlength="35" class="form-control <?php if ($errors->has('telefono')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('telefono'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="telefono" value="<?php echo e(old('telefono')); ?>" autocomplete="off">
    
                                    <?php if ($errors->has('telefono')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('telefono'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" maxlength="45" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" autocomplete="off" value="<?php echo e(old('email')); ?>">

                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
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
                            <label for="fechanacimiento" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input id="fechanacimiento" type="date" class="form-control <?php if ($errors->has('fechanacimiento')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fechanacimiento'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="fechanacimiento" value="<?php echo e(old('fechanacimiento')); ?>">

                                <?php if ($errors->has('fechanacimiento')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fechanacimiento'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ocupacion" class="col-md-4 col-form-label text-md-right">Ocupación</label>

                            <div class="col-md-6">
                                <input id="ocupacion" type="text" maxlength="60" class="form-control <?php if ($errors->has('ocupacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ocupacion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="ocupacion" value="<?php echo e(old('ocupacion')); ?>" autocomplete="off">

                                <?php if ($errors->has('ocupacion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('ocupacion'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="estado_civil" class="col-md-4 col-form-label text-md-right">Estado Civil</label>

                            <div class="col-md-3">
                                <select name="estado_civil" id="estado_civil" class="form-control" value="<?php echo e(old('estado_civil')); ?>">
                                    <option value=""></option>
                                    <option value="Soltero">Soltero</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Casado">Separado</option>
                                    <option value="Divorciado">Divorciado</option>
                                    <option value="Divorciado">Otro</option>
                                </select>
                                <?php if ($errors->has('estado_civil')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('estado_civil'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            
                            <label for="genero" class="col-form-label text-md">Género</label>

                            <div class="col-md-2">
                                <select name="genero" id="genero" class="form-control" value="<?php echo e(old('genero')); ?>">
                                    <option value=""></option>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                    <option value="O">O</option>
                                </select>
                                <?php if ($errors->has('genero')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('genero'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cobertura" class="col-md-4 col-form-label text-md-right">Cobertura médica</label>

                            <div class="col-md-6">
                                <input id="cobertura" type="text" maxlength="100" class="form-control <?php if ($errors->has('cobertura')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cobertura'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cobertura" value="<?php echo e(old('cobertura')); ?>">

                                <?php if ($errors->has('cobertura')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cobertura'); ?>
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
                                <input id="detalles" type="text" maxlength="100" class="form-control <?php if ($errors->has('detalles')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('detalles'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="detalles" value="<?php echo e(old('detalles')); ?>" autocomplete="off">

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
                            <label for="comentarios" class="col-md-4 col-form-label text-md-right">Comentario</label>

                            <div class="col-md-6">
                                <input id="comentarios" type="text" maxlength="40" class="form-control <?php if ($errors->has('comentarios')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('comentarios'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="comentarios" value="<?php echo e(old('comentarios')); ?>" autocomplete="off">

                                <?php if ($errors->has('comentarios')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('comentarios'); ?>
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
                                <button type="submit" class="btn btn-primary" id="enviar_formulario">
                                    Registrar Paciente
                                </button>
                                <a href="<?php echo e(route('pacientes.index')); ?>" class="btn btn-secondary" role="button">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/pacientes/crear.blade.php ENDPATH**/ ?>