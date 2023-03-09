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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',30);
            $table->string('historia',500);
            $table->string('estatura',10);
            $table->integer('edad');
            $table->string('comportamiento',100);
            $table->string('genero',10);
            $table->string('esterilizado',2);
            $table->string('foto',80);
            $table->string('estado',20);
            $table->foreignId('tipo_mascota_id');
            $table->foreignId('casa_id');
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
        Schema::dropIfExists('mascotas');
    }
};
