<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('marca');
            $table->integer('contenido_cantidad')->unsigned(); //100; 250; ....
            $table->string('contenido_unidad')->nullable(); //mg; kg; gr; ...
            $table->integer('stock')->unsigned(); //stock restante
            $table->integer('stock_bajo')->unsigned(); //stock mínimo
            $table->string('detalles')->nullable();
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
        Schema::dropIfExists('insumos');
    }
}
