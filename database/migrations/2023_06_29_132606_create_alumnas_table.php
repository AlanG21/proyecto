<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnasTable extends Migration
{
    public function up()
    {
        Schema::create('alumnas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('grupo_id');
            $table->timestamps();

            $table->foreign('grupo_id')->references('id')->on('grupos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumnas');
    }
}
