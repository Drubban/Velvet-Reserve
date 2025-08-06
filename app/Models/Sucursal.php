<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursal';  // Indica el nombre real de la tabla

    protected $primaryKey = 'id_sucursal'; // Clave primaria no es 'id' sino 'id_sucursal'

    public $incrementing = true; // Por defecto true, pero lo confirmamos

    protected $fillable = ['nombre', 'id_direccion', 'capacidad'];

    // Si quieres, agrega relación con direccion (opcional)
    public function direccion()
    {
        return $this->belongsTo(DireccionSucursal::class, 'id_direccion', 'id_direccion');
    }
}
