<?php echo $__env->make('layouts.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Incluye los estilos -->

<div class="container my-4">
    <div class="card-body">
        <h5>Ingresos de efectivo</h5>
        
        <table id="ingreso_efectivo">
            <thead>
            <tr>
                <th>Año</th>
                <th>Mes</th>
                <th>Monto</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $ganancias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ganancia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr><th scope="row"><?php echo e($ganancia->anio); ?></th>
                        <td><?php echo e($ganancia->mes); ?></td>
                        <td><?php echo e($ganancia->monto); ?></td>
                    </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div><?php /**PATH C:\laragon\www\odonto\resources\views/reportes/ingresodeefectivo.blade.php ENDPATH**/ ?>