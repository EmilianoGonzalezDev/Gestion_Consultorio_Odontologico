<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioPrestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio_prestados', function (Blueprint $table) {
            $table->unsignedBigInteger('atencion_id');
            $table->unsignedBigInteger('nomeclatura_id');
            $table->timestamps();

            $table->foreign('atencion_id')->references('id')->on('atenciones');
            $table->foreign('nomeclatura_id')->references('id')->on('nomeclaturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio_prestados');
    }
}
