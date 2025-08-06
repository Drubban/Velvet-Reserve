<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    protected $fillable = [
        'nombre_cliente',
        'ap_paterno_cliente',
        'ap_materno_cliente',
        'email',
    ];

    public function telefonos()
    {
        return $this->hasMany(Telefono::class, 'id_cliente');
    }

    public function reservaciones()
    {
        return $this->hasMany(Reservation::class, 'id_cliente');
    }
}
