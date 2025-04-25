<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProveedorProducto extends Model
{
    protected $table = 'proveedor_producto';

    protected $fillable = ['proveedor_id', 'producto_id', 'precio_compra', 'cantidad_disponible'];
}
