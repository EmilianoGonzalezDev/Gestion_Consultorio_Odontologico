 <!-- incluye el formulario de creacion de atenciones en la parte de abajo de esta vista -->

<?php $__env->startSection('parte_superior'); ?> <!-- indicamos todo lo que va a estar arriba del formulario (y debajo de la barra de navegación) -->


<div class="container my-4">
    <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary btn-sm" role="button">Volver</a>
    <a href="#div_nuevaprestacion" class="btn btn-warning btn-sm" role="button" id="ir_a_nueva_prestacion">Nueva prestación</a>
    
    <h1><br><?php echo e($paciente->nombre); ?> <?php echo e($paciente->apellido); ?></h1>
    
    <!-- AVISO DE ELIMINADO -->
    <div class="col-md-8">
        <?php if( $paciente->deleted_at != null ): ?>
            <div class="alert alert-danger">
                    Paciente dado de baja (eliminado)
            </div>
        <?php endif; ?>

        <!-- DATOS PERSONALES -->
        <div class="card">
            <div class="card-header">Datos Personales</div>
            <div class="card-body">
                    <table id="datos_personales">
                    <tr><td><b>DNI:</b></td><td>  <?php echo e($paciente->dni); ?></td></tr>
                    <tr><td><b>Dirección:</b></td><td>  <?php echo e($paciente->direccion); ?></td></tr>
                    <tr><td><b>Teléfono:</b></td><td>  <?php echo e($paciente->telefono); ?></td></tr>
                    <tr><td><b>E-mail:</b></td><td>  <?php echo e($paciente->email); ?></td></tr>
                    <tr><td><b>Nacimiento:</b></td><td>  <?php if($paciente->fechanacimiento): ?> <?php echo e(\Carbon\Carbon::parse($paciente->fechanacimiento)->formatLocalized('%d/%m/%Y')); ?> <?php endif; ?></td></tr>
                    <tr><td><b>Edad:</b></td><td>   <?php if($paciente->fechanacimiento): ?> <?php echo e(\Carbon\Carbon::parse($paciente->fechanacimiento)->age); ?> <?php endif; ?></td></tr>
                    <tr><td><b>Ocupación:</b></td><td> <?php echo e($paciente->ocupacion); ?></td></tr>
                    <tr><td><b>Estado Cívil:</b></td><td> <?php echo e($paciente->estado_civil); ?></td></tr>
                    <tr><td><b>Género:</b></td><td> <?php echo e($paciente->genero); ?></td></tr>
                    <tr><td><b>Cobertura:</b></td><td> <?php echo e($paciente->cobertura); ?></td></tr>
                    <tr><td><b>Detalles:</b></td><td> <?php echo e($paciente->detalles); ?></td></tr>
                    <tr><td><b>Comentarios:</b></td><td> <?php echo e($paciente->comentarios); ?></td></tr>
                    </table>
                    <br><i><b>Creado:</b> <?php echo e($paciente->created_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($paciente->creado_por); ?></i>
                    <?php if( $paciente->eliminado_por != null ): ?>
                    <br><i><b>Eliminado:</b> <?php echo e($paciente->deleted_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($paciente->eliminado_por); ?></i>
                    <?php elseif( $paciente->editado_por != null ): ?>
                    <br><i><b>Actualizado:</b> <?php echo e($paciente->updated_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($paciente->editado_por); ?></i>
                    <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- FICHA ORTODONCIA -->
    <?php if($ortodoncia != null): ?>
    <br>
        <div class="col-md-8" id="ficha_ortodoncia">
            <div class="card">
                <div class="card-header">Ficha Ortodoncia</div>
                <div class="card-body">
                    <table id="ficha_ortod">        
                        <tr><td><b> Motivo:        </b></td>  <td> <?php echo e($ortodoncia->motivo); ?>       </td></tr>
                        <tr><td><b> Diagnóstico:   </b></td>  <td> <?php echo e($ortodoncia->diagnostico); ?>  </td></tr>
                        <tr><td><b> Objetivos:     </b></td>  <td> <?php echo e($ortodoncia->objetivos); ?>    </td></tr>
                        <tr><td><b> Tratamiento:   </b></td>  <td> <?php echo e($ortodoncia->tratamiento); ?>  </td></tr>
                        <tr><td><b> Aparatología:  </b></td>  <td> <?php echo e($ortodoncia->aparatologia); ?> </td></tr>
                        <tr><td><b> Presupuesto:   </b></td>  <td> $ <?php echo e($ortodoncia->presupuesto); ?></td></tr>
                        <tr><td><b> Monto inicial: </b></td>  <td> $ <?php echo e($ortodoncia->inicial); ?>    </td></tr>
                        <tr><td><b> Cuota mensual: </b></td>  <td style="color: green"><b>$ <?php echo e($ortodoncia->cuota); ?></b></td></tr>
                    </table>
                    <br><i><b>Creado:</b> <?php echo e($ortodoncia->created_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($ortodoncia->creado_por); ?></i>
                    <?php if( $ortodoncia->editado_por != null ): ?>
                    <br><i><b>Actualizado:</b> <?php echo e($ortodoncia->updated_at->formatLocalized('%d/%m/%Y %H:%M')); ?> por <?php echo e($ortodoncia->editado_por); ?></i>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
        
    <!-- HISTORIA CLÍNICA -->
    <div class="col-md-12">
    <br>
    <h4>Historia clínica</h4>
    <table id="historia_clinica" border=1>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Profesional</th>
                    <th>Arcada Superior</th>
                    <th>Arcada Inferior</th>
                    <th>Operación Prevista</th>
                    <th>Importe $</th>
                    <th>Pago $</th>
                    <th>Detalle</th>
                    <th>Saldo $</th>
                    <th>Fecha de atención</th>
                    <th>Próximo Turno</th>
                </tr>
            </thead>
            <tbody>           
                <?php $__currentLoopData = $atenciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atencion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($atencion->id); ?></th>
                                <th><?php echo e(App\User::empleado($atencion->user_id)->nombre); ?> <?php echo e(App\User::empleado($atencion->user_id)->apellido); ?></th>
                                <th><?php echo e($atencion->arcada_superior); ?></th>
                                <th><?php echo e($atencion->arcada_inferior); ?></th>
                                <th><?php echo e($atencion->operacion_prevista); ?></th>
                                <th><?php echo e($atencion->importe); ?></th>
                                <th><?php echo e($atencion->pago); ?></th>
                                <th><?php echo e($atencion->detalle); ?></th>
                                <th><?php echo e($atencion->importe - $atencion->pago); ?></th>
                                <th><?php echo e($atencion->fecha->formatLocalized('%d/%m/%Y')); ?> <?php echo e($atencion->hora); ?></th>
                                <th><?php echo e($atencion->proximo_turno); ?></th>
                            </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
    </table>
    Saldo actual: <b> $<?php echo e(App\Paciente::deuda($paciente->id)); ?> </b>
    <br>
    </div>
</div>

<div id="div_nuevaprestacion"></div>

<!-- SCRIPTS -->
<script>
        $(document).ready(function() //en el select de paciente, selecciona automáticamente el paciente actual
        {
            var selectPaciente = document.getElementById('paciente_id');         
            selectPaciente.value = <?php echo e($paciente->id); ?>;
            //document.getElementById('form_crear_atencion').style = "display:none";
        });
</script>

<script>
        $(document).ready( function ()
        {
            $('#historia_clinica').DataTable
            ({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json" }
            });
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('atenciones.crear', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\odonto\resources\views/pacientes/detalles.blade.php ENDPATH**/ ?>