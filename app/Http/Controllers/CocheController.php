<?php

namespace App\Http\Controllers;

use App\Models\Coches;
use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CocheController extends Controller
{

    public function coches(){
        $coches= Coches::orderBy('id','DESC')->paginate();
        return view("dashboard", compact('coches'));

    }
}
