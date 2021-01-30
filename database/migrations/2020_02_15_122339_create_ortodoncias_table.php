<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrtodonciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ortodoncias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paciente_id');
            $table->string('motivo')->nullable();
            $table->string('diagnostico')->nullable();
            $table->string('objetivos')->nullable();
            $table->string('plan_tratamiento')->nullable();
            $table->string('aparatologia')->nullable();
            $table->float('presupuesto');
            $table->float('inicial');
            $table->float('cuota');
            $table->string('creado_por');
            $table->string('editado_por')->nullable();
            $table->string('eliminado_por')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ortodoncias');
    }
}
