<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReduccionStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reduccion_stock', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('insumo_id')->unsigned();
            $table->dateTime('fecha');
            $table->integer('cantidad')->nullable();
            $table->string('creado_por');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('insumo_id')->references('id')->on('insumos')
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
        Schema::dropIfExists('reduccion_stock');
    }
}
