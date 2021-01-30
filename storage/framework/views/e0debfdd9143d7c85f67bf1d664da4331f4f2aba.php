<div class="card-body">
    <h5>Pacientes atendidos en período de tiempo</h5>
    
    <table id="pacientes">
        <thead>
            <tr>
                <th>Año</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $años; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $año): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  <!-- En cada vuelta, guarda una fila de la tabla Pacientes en la variable $paciente -->
            <tr>
                <td><?php echo e($año->anio); ?></td>
                <td><?php echo e($año->cantidad); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div><?php /**PATH C:\laragon\www\odonto\resources\views/reportes/pacientesporedad.blade.php ENDPATH**/ ?>