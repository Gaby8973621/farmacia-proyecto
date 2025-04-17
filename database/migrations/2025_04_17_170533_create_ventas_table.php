<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 10, 2);
            $table->string('metodo_pago');
            $table->enum('estado', ['pendiente', 'pagado', 'cancelado'])->default('pendiente');
            // Relación con la tabla 'users', si el usuario se elimina, sus ventas también
            $table->foreignId('cliente_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        // Elimina la tabla en caso de rollback
        Schema::dropIfExists('ventas');
    }
};
