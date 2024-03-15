<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;
    protected $fillable = ['subscripcion'];

   


public function coche()
{
    return $this->belongsTo(Coche::class);
}

public function cliente()
{
    return $this->belongsTo(Cliente::class, 'user_id');
}



}
