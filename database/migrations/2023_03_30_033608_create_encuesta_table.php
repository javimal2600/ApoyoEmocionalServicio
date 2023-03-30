<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('mascota_id');
            $table->string('colonia');
            $table->string('delegacion');
            $table->string('ciudad');
            $table->Integer('codigoPostal');
            $table->string('tipocasa');
            $table->Integer('edad');
            $table->string('edades');
            $table->string('profesion');
            $table->string('animales');
            $table->string('mascotasAntes');
            $table->string('gasto');
            $table->string('tiempo');
            $table->string('dormir');
            $table->string('paseo');
            $table->string('dejarMascota');
            $table->string('cambioCasa');
            $table->string('compromiso');
            $table->string('economia');
            $table->string('porqueAdopcion');
            $table->string('otraMascota');
            $table->string('celular');
            $table->string('email');
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
        Schema::dropIfExists('encuesta');
    }
};
