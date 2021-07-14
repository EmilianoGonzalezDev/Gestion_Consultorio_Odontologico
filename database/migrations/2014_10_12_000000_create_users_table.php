<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->biginteger('dni')->unique()->unsigned();
            $table->boolean('odontologo');
            $table->string('direccion')->nullable();
            $table->date('fechanacimiento')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('comentarios')->nullable();
            $table->integer('rol')->nullable();
            $table->boolean('ocultar_montos');
            $table->string('creado_por');
            $table->string('editado_por')->nullable();
            $table->string('eliminado_por')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
            //$table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
