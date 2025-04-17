<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('proveedor_producto', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio_compra', 10, 2);
            $table->integer('cantidad_disponible');
            // llave foránea hacia proveedores, si el proveedor se elimina, sus productos también
            $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade');
            // llave foránea hacia productos, si el producto se elimina, se eliminan las relaciones
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedor_producto');
    }
};

