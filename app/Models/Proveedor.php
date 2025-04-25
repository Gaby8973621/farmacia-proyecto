<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable = ['nombre', 'contacto', 'telefono', 'email', 'direccion'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'proveedor_producto')
                    ->withPivot('precio_compra', 'cantidad_disponible')
                    ->withTimestamps();
    }
}
