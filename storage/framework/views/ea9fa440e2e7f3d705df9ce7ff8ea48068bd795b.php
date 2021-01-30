<?php echo $__env->make('layouts.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!-- Incluye los estilos -->

<div class="container my-4">
    <div class="card-body">
        <h5>Pacientes atendidos en período de tiempo</h5>
        
        <table id="pacientes">
            <thead>
            <tr>
                <th>Paciente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Edad</th>
                <th>Fecha Atención</th>
                <th>Hora</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $atenciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atencion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( ($atencion->fecha >= $fechaInicial) && ($atencion->fecha <= $fechaFinal) ): ?>
                    <?php $paciente = App\Paciente::paciente($atencion->paciente_id) ?>
                            <tr>
                                <th scope="row">
                                    <a href="<?php echo e(route('pacientes.show', $paciente)); ?>">
                                        #<?php echo e($paciente->id); ?>

                                    </a></th>
                                <td><?php echo e($paciente->nombre); ?></td>
                                <td><?php echo e($paciente->apellido); ?></td>
                                <td><?php echo e($paciente->dni); ?></td>
                                <td><?php if(($paciente->fechanacimiento)): ?> <?php echo e(\Carbon\Carbon::parse($paciente->fechanacimiento)->age); ?> <?php endif; ?></td> 
                                <td><a href="<?php echo e(route('atenciones.show', $atencion)); ?>"><?php echo e(\Carbon\Carbon::parse($atencion->fecha)->formatLocalized('%d/%m/%Y')); ?></a></td>
                                <td><?php echo e($atencion->hora); ?></td>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div><?php /**PATH C:\laragon\www\odonto\resources\views/reportes/pacientesatendidosfecha.blade.php ENDPATH**/ ?>