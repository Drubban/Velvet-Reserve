<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservacion';
    protected $primaryKey = 'id_reservacion';
    protected $fillable = [
        'id_cliente',
        'id_salon',
        'id_sucursal',
        'id_tipo_reservacion',
        'fecha_reserva',
        'hora_inicio',
        'hora_fin',
        'cantidad_personas',
        'estado',
        'observaciones',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // public function salon()
    // {
    //     return $this->belongsTo(Salon::class, 'id_salon');
    // }

    // public function sucursal()
    // {
    //     return $this->belongsTo(Sucursal::class, 'id_sucursal');
    // }

    // public function tipoReservacion()
    // {
    //     return $this->belongsTo(TipoReservacion::class, 'id_tipo_reservacion');
    // }
}
