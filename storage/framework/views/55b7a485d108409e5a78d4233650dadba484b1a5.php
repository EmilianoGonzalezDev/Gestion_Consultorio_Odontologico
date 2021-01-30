<?php $__env->startSection('content'); ?>
<div marginwidth = "20">
    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary btn-sm" role="button">Volver</a>

    <h1><?php echo e($ortodoncia->nombre); ?></h1>
    <h4>
            <br><b>Creado:</b> <?php echo e($ortodoncia->created_at->formatLocalized('%A %d de %B de %Y a las %H:%M')); ?> por <?php echo e($ortodoncia->creado_por); ?>

            <?php if( $ortodoncia->eliminado_por != null ): ?>
                <br><b>Eliminado:</b> <?php echo e($ortodoncia->deleted_at->formatLocalized('%A %d de %B de %Y a las %H:%M')); ?> por <?php echo e($ortodoncia->eliminado_por); ?>

            <?php elseif( $ortodoncia->editado_por != null ): ?>
                <br><b>Actualizado:</b> <?php echo e($ortodoncia->updated_at->formatLocalized('%A %d de %B de %Y a las %H:%M')); ?> por <?php echo e($ortodoncia->editado_por); ?>

            <?php endif; ?>
    </h4>

    <?php if( $ortodoncia->deleted_at != null ): ?>
        <div class="alert alert-danger">
                Ortodoncia dado de baja (eliminado)
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/ortodoncias/detalles.blade.php ENDPATH**/ ?>