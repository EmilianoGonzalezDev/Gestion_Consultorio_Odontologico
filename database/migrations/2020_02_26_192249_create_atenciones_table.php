<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atenciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned();
            $table->biginteger('paciente_id')->unsigned();
            $table->float('importe');
            $table->float('pago');
            $table->date('fecha');
            $table->time('hora');
            $table->date('proximo_turno')->nullable();
            $table->string('creado_por');
            $table->string('editado_por')->nullable();
            $table->string('eliminado_por')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('paciente_id')->references('id')->on('pacientes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atenciones');
    }
}
