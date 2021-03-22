<?php $__env->startSection('content'); ?>

<div class="container my-4">
            
            <?php if( session('mensaje') ): ?> 
                <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    <?php echo e(session('mensaje')); ?>

                </div>
            <?php endif; ?>

            <?php if(Session::has('deleted')): ?>
                <div class="alert alert-warning alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </button>
                    Pago eliminado, si desea deshacer haga <a href="<?php echo e(route('atenciones.restaurarPago', [Session::get('deleted')])); ?>">Click aquí</a> </div>
            <?php endif; ?>

    <a href="<?php echo e(route('atenciones.index')); ?>" class="btn btn-primary btn-sm" role="button">Volver</a>
    <h1><br>Atención #<?php echo e($atencion->id); ?></h1>
    
    <!-- AVISO DE ELIMINADO -->
    <div class="col-md-8">
        <?php if( $atencion->deleted_at != null ): ?>
            <div class="alert alert-danger">
                    Registro de atención dado de baja (eliminado)
            </div>
        <?php endif; ?>

        <!-- DATOS PERSONALES -->
        <div class="card">
            <div class="card-header">Detalles</div>
            <div class="card-body">
                    <table>
                        <tr><td><b>Paciente:</b></td><td>  #<?php echo e($paciente->id); ?> - <?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido); ?></td></tr>
                    <?php if(App\Paciente::paciente($atencion->paciente_id)->deleted_at): ?>
                        <tr><td></td><td><span style="color:red"> (paciente dado de baja) </span></td></tr>
                    <?php endif; ?>
                    <tr><td><b>Profesional:</b></td><td>  <?php echo e($profesional->nombre); ?> <?php echo e($profesional->apellido); ?> </td></tr>
                    <tr><td><b>Fecha:</b></td><td>  <?php echo e($atencion->fecha->formatLocalized('%d/%m/%Y')); ?> <?php echo e(\Carbon\Carbon::parse($atencion->hora)->formatLocalized('%H:%M')); ?></td></tr>
                    <tr><td><b>Arcada superior:</b></td><td>  <?php echo e($atencion->arcada_superior); ?></td></tr>
                    <tr><td><b>Arcada inferior:</b></td><td>  <?php echo e($atencion->arcada_inferior); ?></td></tr>
                    <tr><td><b>Operación prevista:</b></td><td>  <?php echo e($atencion->operacion_prevista); ?></td></tr>
                    <tr><td><b>Importe:</b></td><td>  $<?php echo e($atencion->importe); ?></td></tr>
                    <tr><td><b>Pago:</b></td><td>  $<?php echo e($atencion->pago); ?></td></tr>
                    <tr><td><b>Saldo:</b></td><td> <b>$<?php echo e($atencion->importe - $atencion->pago); ?></b></td></tr>
                    <tr><td><b>Próximo turno:</b></td><td> <?php if($atencion->proximo_turno): ?> <?php echo e(\Carbon\Carbon::parse($atencion->proximo_turno)->formatLocalized('%d/%m/%Y')); ?> <?php endif; ?></td></tr>
                    </table>
                    <br><i><b>Creado:</b> <?php echo e($atencion->created_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($atencion->creado_por); ?></i>
                    <?php if( $atencion->eliminado_por != null ): ?>
                    <br><i><b>Eliminado:</b> <?php echo e($atencion->deleted_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($atencion->eliminado_por); ?></i>
                    <?php elseif( $atencion->editado_por != null ): ?>
                    <br><i><b>Actualizado:</b> <?php echo e($atencion->updated_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($atencion->editado_por); ?></i>
                    <?php endif; ?>
            </div>
        </div>
    </div>
        
    <!-- HISTORIAL DE PAGOS -->
    <div class="col-md-8">
    <br>
    <h4>Historial de pagos recibidos para esta atención</h4>
    <table id="historia_pagos" class="table table-hover table-bordered table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th>#Pago</th>
                    <th>Fecha pago</th>
                    <th>Monto</th>
                    <th>Detalle</th>
                    <th>O. Social</th>
                    <th>Registrado por</th>
                    <th>Fecha registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>           
                <?php $__currentLoopData = $pagos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pago): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($pago->id); ?></th>
                                <th><?php echo e(\Carbon\Carbon::parse($pago->fecha)->formatLocalized('%d/%m/%Y')); ?></th>
                                <th>$<?php echo e($pago->monto); ?></th>
                                <th><?php echo e($pago->detalle); ?></th>
                                <td><?php if($pago->cubierto_obra_social): ?> Si <?php else: ?> No <?php endif; ?></td>
                                <th><?php echo e($pago->creado_por); ?></th>
                                <th><?php echo e($pago->created_at->formatLocalized('%d/%m/%Y %H:%M')); ?></th>
                                <th>
                                    <form action="<?php echo e(route('atenciones.eliminarPago', $pago)); ?>" method="POST" class="d-inline">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                            <input type=button class="btn btn-danger btn-sm btn-group" value="Eliminar"
                                                onclick="if (confirm('Se eliminará el pago ¿Continuar?')){this.form.submit();}"/>
                                    </form>
                                </th>
                            </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
    </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/atenciones/detalles.blade.php ENDPATH**/ ?>