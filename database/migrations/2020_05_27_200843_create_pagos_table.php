<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('atencion_id')->unsigned();
            $table->float('monto');
            $table->boolean('cubierto_obra_social');
            $table->date('fecha');
            $table->string('detalle')->nullable();
            $table->string('creado_por');
            $table->string('eliminado_por')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('atencion_id')->references('id')->on('atenciones')
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
        Schema::dropIfExists('pagos');
    }
}
