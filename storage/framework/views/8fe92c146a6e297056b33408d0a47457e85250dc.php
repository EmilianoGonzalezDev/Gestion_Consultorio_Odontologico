<!-- no se hace el include app/styles porque este código va incrustado en la pagina home -->

<div class="card-body">
    <h5>Insumos bajos de stock</h5>
    
    <table id="insumos_stock_bajo">
        <tbody>
            <?php $__currentLoopData = $insumos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insumo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <!-- En cada vuelta, guarda una fila de Insumos en la variable $insumo -->
                <?php if($insumo->stock <= $insumo->stock_bajo): ?>
                    <tr>
                        <td><a href="<?php echo e(route('insumos.show', $insumo)); ?>" target="_blank"> PRODUCTO #<?php echo e($insumo->id); ?></a> |</td>
                        <td style="text-transform: uppercase;"><?php echo e($insumo->nombre); ?> <?php echo e($insumo->marca); ?> x <?php echo e($insumo->contenido_cantidad); ?><?php echo e($insumo->contenido_unidad); ?> <?php echo e($insumo->detalles); ?></td>
                        <td>|  Stock Mínimo: <?php echo e($insumo->stock_bajo); ?>   |</td>
                        <td>Stock Actual: <i style="color:red;"><?php echo e($insumo->stock); ?></i>
                        </td>
                    </tr>
                <?php endif; ?> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div><?php /**PATH C:\laragon\www\odonto\resources\views/reportes/insumosbajostock.blade.php ENDPATH**/ ?>