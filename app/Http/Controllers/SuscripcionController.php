<?php

namespace App\Http\Controllers;

use App\Models\Coches;
use App\Models\Cliente;
use App\Models\Suscripcion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SuscripcionController extends Controller
{

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


   /* public function createsuscripcion(Request $request)
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
        'nombre' => 'required',
        'apellido' => 'required',
        'dni' => 'required',
        'isbn' => 'required',
    ]);



     // Buscar si el cliente ya existe por su DNI
     $cliente = Cliente::where('dni', $request->dni)->first();

     // Si el cliente no existe, crear uno nuevo
     if (!$cliente) {
         $cliente = Cliente::create([
             'nombre' => $request->nombre,
             'apellido' => $request->apellido,
             'dni' => $request->dni,
             'isbn' => $request->isbn,
         ]);
     }

    // Crear una nueva suscripción
    $suscripcion = new Suscripcion;
    $suscripcion->subscripcion = $request->subscripcion;
    $suscripcion->user_id = auth()->id();
    $suscripcion->coche_id = $request->coche_id;

    // Guardar la relación con el cliente
    $suscripcion->cliente()->associate($cliente);
    $suscripcion->save();

    return redirect()->route('confirmacion')->with('success', 'Suscripción creada exitosamente.');
}
*/

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
        'nombre' => 'required',
        'apellido' => 'required',
        'dni' => 'required',
        'isbn' => 'required',
    ]);

    // Crear o encontrar al cliente por su DNI
    $cliente = Cliente::firstOrNew(['dni' => $request->dni], [
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'dni' => $request->dni,
        'isbn' => $request->isbn,
    ]);

    // Si el cliente no existía previamente, asignar el ID del usuario autenticado
    if (!$cliente->exists) {
        $cliente->id = auth()->id();
    }

    // Guardar el cliente
    $cliente->save();

    // Crear una nueva suscripción
    $suscripcion = new Suscripcion;
    $suscripcion->subscripcion = $request->subscripcion;
    $suscripcion->user_id = auth()->id();
    $suscripcion->coche_id = $request->coche_id;

    // Asociar la suscripción con el cliente
    $suscripcion->cliente()->associate($cliente);
    $suscripcion->save();

    return redirect()->route('confirmacion')->with('success', 'Suscripción creada exitosamente.');
}

public function destroysuscripcion($id)
{
    // Buscar la suscripción por su ID
    $subscription = Suscripcion::find($id);

    // Verificar si la suscripción existe
    if ($subscription) {
        // Verificar si el usuario autenticado es el propietario de la suscripción
        if (auth()->id() === $subscription->user_id) {
            $subscription->delete();
            return redirect()->route('confirmacion')->with('success', 'Suscripción eliminada exitosamente.');
        } else {
         // Acceso no autorizado
            return redirect()->route('confirmacion')->with('error', 'Acceso no autorizado.');

        }
    } else {
        // Suscripción no encontrada
        return redirect()->route('confirmacion')->with('error', 'Suscripción no encontrada.');

    }
}







}
