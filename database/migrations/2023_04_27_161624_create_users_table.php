<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('ap_paterno',100);
            $table->string('ap_materno',100);
            $table->string('correo',80);
            $table->string('telefono',20);
            $table->string('password',100);
            $table->foreignId('id_pais')->references('id')->on('paises');
            $table->foreignId('id_entidad')->references('id')->on('entidades');
            $table->foreignId('id_municipio')->references('id')->on('municipios');
	        $table->foreignId('id_tipo_usuario')->references('id')->on('tipos_usuario');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
