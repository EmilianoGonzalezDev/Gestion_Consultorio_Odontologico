<?php $__env->startSection('content'); ?>
<?php if(auth()->guard()->check()): ?>
    <?php if(auth()->user()->rol == 1): ?>
        <?php if( session('mensaje') ): ?> 
        <div class="alert alert-success">
            <a href="<?php echo e(route('empleados.index')); ?>" class="btn btn-success btn-sm" role="button">Volver</a>
            <?php echo e(session('mensaje')); ?>

        </div>
        <?php endif; ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><?php echo e(__('Registrar Empleado')); ?></div>

                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('empleados.update', $empleado->id)); ?>">
                                <?php echo method_field('PATCH'); ?>
                                <?php echo csrf_field(); ?>

                                <div class="form-group row">
                                    <label for="usuario" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Usuario')); ?> *</label>

                                    <div class="col-md-6">
                                        <input id="usuario" type="text" maxlength="25" class="form-control <?php if ($errors->has('usuario')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('usuario'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="usuario" value="<?php echo e($empleado->usuario); ?>" required autocomplete="usuario" autofocus>

                                        <?php if ($errors->has('usuario')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('usuario'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Contraseña')); ?> *</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" maxlength="25" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password">

                                        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Confirmar contraseña')); ?> *</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" maxlength="25" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <hr />

                                <div class="form-group row">
                                    <label for="nombre" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nombre')); ?> *</label>

                                    <div class="col-md-6">
                                        <input id="nombre" type="text" maxlength="25" class="form-control <?php if ($errors->has('nombre')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nombre'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nombre" value="<?php echo e($empleado->nombre); ?>" required autocomplete="nombre" autofocus>

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
                                    <label for="apellido" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Apellido')); ?> *</label>

                                    <div class="col-md-6">
                                        <input id="apellido" type="text" maxlength="25" class="form-control <?php if ($errors->has('apellido')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('apellido'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="apellido" value="<?php echo e($empleado->apellido); ?>" required autocomplete="apellido" autofocus>

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
                                <label for="odontologo" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Odontólogo')); ?> *</label>
                                
                                <div class="col-md-6">
                                    <select name="odontologo" id="odontologo" class="form-control" required autocomplete="odontologo"> 
                                        <option value=""></option>
                                        <option value=1 <?php if($empleado->odontologo): ?> selected <?php endif; ?>>Si</option>
                                        <option value=0 <?php if(!$empleado->odontologo): ?> selected <?php endif; ?>>No</option>
                                    </select>

                                    <?php if ($errors->has('odontologo')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('odontologo'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                                <div class="form-group row">
                                    <label for="dni" class="col-md-4 col-form-label text-md-right"><?php echo e(__('DNI')); ?> *</label>

                                    <div class="col-md-6">
                                        <input id="dni" type="number" min="0" max="999999999" class="form-control <?php if ($errors->has('dni')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('dni'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="dni" value="<?php echo e($empleado->dni); ?>" required autocomplete="dni" autofocus>

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
                                    <label for="direccion" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Dirección')); ?></label>

                                    <div class="col-md-6">
                                        <input id="direccion" type="text" maxlength="60" class="form-control <?php if ($errors->has('direccion')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('direccion'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="direccion" value="<?php echo e($empleado->direccion); ?>">

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
                                    <label for="fechanacimiento" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Fecha de nacimiento')); ?></label>

                                    <div class="col-md-6">
                                        <input id="fechanacimiento" type="date" class="form-control <?php if ($errors->has('fechanacimiento')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fechanacimiento'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="fechanacimiento" value="<?php echo e($empleado->fechanacimiento); ?>">

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
                                    <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('E-Mail')); ?></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" maxlength="45" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e($empleado->email); ?>">

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

                                <div class="form-group row">
                                    <label for="telefono" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Teléfono')); ?></label>

                                    <div class="col-md-6">
                                        <input id="telefono" type="text" maxlength="35" class="form-control <?php if ($errors->has('telefono')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('telefono'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="telefono" value="<?php echo e($empleado->telefono); ?>">

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
                                    <label for="comentarios" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Comentarios')); ?></label>

                                    <div class="col-md-6">
                                        <input id="comentarios" type="text" maxlength="100" class="form-control <?php if ($errors->has('comentarios')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('comentarios'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="comentarios" value="<?php echo e($empleado->comentarios); ?>">

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

                                <div class="form-group row">
                                    <label for="rol" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Rol')); ?></label>

                                    <div class="col-md-6">
                                        <input id="rol" type="number" min="1" max="9" class="form-control <?php if ($errors->has('rol')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('rol'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="rol" value="<?php echo e($empleado->rol); ?>">

                                        <?php if ($errors->has('rol')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('rol'); ?>
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
                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Enviar')); ?></button>
                                        <a href="<?php echo e(route('empleados.index')); ?>" class="btn btn-secondary" role="button">Volver</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/empleados/editar.blade.php ENDPATH**/ ?>