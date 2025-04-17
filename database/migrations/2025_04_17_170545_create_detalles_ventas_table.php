<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('detalles_ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);
            // Relación con la tabla ventas, si la venta se borra, también sus detalles
            $table->foreignId('venta_id')->constrained('ventas')->onDelete('cascade');
            // Relación con la tabla productos, si el producto se borra, se eliminan sus detalles
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalles_ventas');
    }
};
