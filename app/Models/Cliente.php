<?php

namespace App\Models;

use App\Models\Suscripcion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', // Agrega aquí los campos que deseas permitir en la asignación masiva
        'apellido',
        'dni',
        'isbn',
    ];

    public function suscripcions()
    {
        return $this->hasMany(Suscripcion::class);
    }

}
