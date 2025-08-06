<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoReservacion extends Model
{
    protected $table = 'tipo_reservacion'; // o el nombre que tenga tu tabla

    protected $fillable = [
        'nombre',
        'concepto',
        'precio',
    ];
}
