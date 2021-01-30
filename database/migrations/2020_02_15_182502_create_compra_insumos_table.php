<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_insumos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned();
            $table->biginteger('insumo_id')->unsigned();
            $table->date('fecha_compra');
            $table->integer('cantidad_adquirida')->unsigned();
            $table->float('precio_compra')->unsigned();
            $table->string('creado_por');
            $table->string('eliminado_por')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('insumo_id')->references('id')->on('insumos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('compra_insumos');
    }
}
