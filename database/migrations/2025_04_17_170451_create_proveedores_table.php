<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('contacto')->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('direccion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // Elimina la tabla en caso de rollback
        Schema::dropIfExists('proveedores');
    }
};
