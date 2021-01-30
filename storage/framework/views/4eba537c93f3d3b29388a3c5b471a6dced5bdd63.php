<?php echo $__env->make('layouts.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Incluye los estilos -->

<div class="container my-4">
<div class="card-body">
    <h5>Cantidad de pacientes por año de nacimiento</h5>
    
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
                <td><?php echo e($año->anio); ?> | </td>
                <td><?php echo e($año->cantidad); ?> Pacientes</td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH C:\laragon\www\odonto\resources\views/reportes/pacientespornacimiento.blade.php ENDPATH**/ ?>