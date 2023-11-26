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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->double('subtotal', 9, 2);
            $table->double('iva', 9, 2);
            $table->double('total', 9, 2);
            $table->foreignId('id_user')->references('id')->on('users');
	        $table->foreignId('id_metodo_pago')->references('id')->on('metodos_pago');
	        $table->double('descuento', 9, 2);
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
