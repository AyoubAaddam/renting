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

    public function rentings(){
        $suscripciones = Suscripcion::orderBy('id','ASC')->paginate();
        return view("rentings", compact('suscripciones'));
    }





    public function coches(){
        $coches= Coches::orderBy('id','DESC')->paginate();
        return view("dashboard", compact('coches'));

    }


    public function suscripcion($coche_id){
        $coches = Coches::findOrFail($coche_id);
        return view("suscripcion", compact('coches'));
    }

    /*public function createsuscripcion(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'subscripcion' => 'required',
            'coche_id' => [
                'required',
                'exists:coches,id',
                Rule::unique('suscripcions')->where(function ($query) use ($request) {
                    return $query->where('user_id', auth()->id())
                                 ->where('coche_id', $request->coche_id);
                }),
            ],
            // Puedes agregar más reglas de validación según sea necesario
        ]);

        // Crear una nueva suscripción
        $suscripcion = new Suscripcion;
        $suscripcion->subscripcion = $request->subscripcion;
        $suscripcion->user_id = auth()->id();
        $suscripcion->coche_id = $request->coche_id;
        $suscripcion->save();

        return redirect()->back()->with('success', 'Suscripción creada exitosamente.');
    }*/


    public function createsuscripcion(Request $request)
    {
        // Verificar si ya existe una suscripción para este usuario y coche
        $existingSubscription = Suscripcion::where('user_id', auth()->id())
                                            ->where('coche_id', $request->coche_id)
                                            ->exists();

        if ($existingSubscription) {
            return redirect()->route('confirmacion')->with('error', 'Ya tienes una suscripción para este coche.');
        }

        // Validar la solicitud
        $request->validate([
            'subscripcion' => 'required',
            'coche_id' => 'required|exists:coches,id',
            // Puedes agregar más reglas de validación según sea necesario
        ]);

        // Crear una nueva suscripción
        $suscripcion = new Suscripcion;
        $suscripcion->subscripcion = $request->subscripcion;
        $suscripcion->user_id = auth()->id();
        $suscripcion->coche_id = $request->coche_id;
        $suscripcion->save();

        return redirect()->route('suscripcion')->with('success', 'Suscripción creada exitosamente.');
    }


    public function destroysuscripcion(Suscripcion $subscription)
    {
        // Verificar si el usuario autenticado es el propietario de la suscripción
        if (auth()->id() !== $subscription->user_id) {
            abort(403); // Acceso no autorizado
        }

        // Eliminar la suscripción
        $subscription->delete();

        return redirect()->back()->with('success', 'Suscripción eliminada exitosamente.');
    }




}
