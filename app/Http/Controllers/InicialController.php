<?php

namespace App\Http\Controllers;

use App\Models\Coches;
use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InicialController extends Controller
{
    public function home(){
        $coches= Coches::orderBy('id','DESC')->paginate();
        return view("home", compact('coches'));

    }

    public function rentings()
{
    // Obtener todas las suscripciones
    $suscripciones = Suscripcion::orderBy('id', 'DESC')->get();

    // Inicializar un array para almacenar los IDs de coches únicos
    $cochesIds = [];

    // Recorrer todas las suscripciones y agregar los IDs de coches al array
    foreach ($suscripciones as $suscripcion) {
        $cochesIds[] = $suscripcion->coche_id;
    }

    // Obtener coches únicos
    $coches = Coches::whereIn('id', array_unique($cochesIds))->get();

    // Pasar los coches y las suscripciones a la vista
    return view("rentings", compact('coches', 'suscripciones'));
}






}
