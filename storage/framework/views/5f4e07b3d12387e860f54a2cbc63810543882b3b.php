<?php $__env->startSection('content'); ?>

<?php if(auth()->guard()->check()): ?>
    <?php if(auth()->user()->rol == 1): ?>
    <div class="container my-4">
        <h1><br><?php echo e($empleado->nombre); ?> <?php echo e($empleado->apellido); ?></h1>
        
        <!-- AVISO DE ELIMINADO -->
        <div class="col-md-8">
        <?php if( $empleado->deleted_at != null ): ?>
            <div class="alert alert-danger">
                    Usuario dado de baja (eliminado)
            </div>
        <?php endif; ?>

        <!-- DATOS PERSONALES -->
        <div class="card">
            <div class="card-header">Datos Personales</div>
            <div class="card-body">
            <table id="datos_personales">
                <tr><td><b>Dirección:</b></td><td>  <?php echo e($empleado->direccion); ?></td></tr>
                <tr><td><b>Nacimiento:</b></td><td>  <?php if($empleado->fechanacimiento): ?> <?php echo e(\Carbon\Carbon::parse($empleado->fechanacimiento)->formatLocalized('%d/%m/%Y')); ?> <?php endif; ?></td></tr>
                <tr><td><b>Edad:</b></td><td>   <?php if($empleado->fechanacimiento): ?> <?php echo e(\Carbon\Carbon::parse($empleado->fechanacimiento)->age); ?> <?php endif; ?></td></tr>
                <tr><td><b>Comentarios:</b></td><td> <?php echo e($empleado->comentarios); ?></td></tr>
            </table>
            <br><i><b>Creado:</b> <?php echo e($empleado->created_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($empleado->creado_por); ?></i>
            <?php if( $empleado->eliminado_por != null ): ?>
            <br><i><b>Eliminado:</b> <?php echo e($empleado->deleted_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($empleado->eliminado_por); ?></i>
            <?php elseif( $empleado->editado_por != null ): ?>
            <br><i><b>Actualizado:</b> <?php echo e($empleado->updated_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($empleado->editado_por); ?></i>
            <?php endif; ?>
        </div>

        <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary btn-sm" role="button">Volver</a>

    </div>
    <?php endif; ?>
<?php endif; ?>    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/empleados/detalles.blade.php ENDPATH**/ ?>