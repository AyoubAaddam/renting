<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicialController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



//Route::get('/', [InicialController::class, 'home'])->name('home');

Route::get('/', function() {
    return view('home');
})->name('home');


Route::get('/confirmacion', function() {
    return view('confirmacion');
})->name('confirmacion');


Route::get('/dashboard', [InicialController::class, 'coches'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/coches', [InicialController::class, 'coches'])->name('page.coches');
    Route::get('/suscripcion/{coche_id}', [InicialController::class, 'suscripcion'])->name('page.suscripcion');

    Route::get('/rentings', [InicialController::class, 'rentings'])->name('rentings');
    Route::post('/suscripcion', [InicialController::class, 'createsuscripcion'])->name('create.suscripcion');
    Route::delete('/suscripcion/{suscripcion}', [InicialController::class, 'destroysuscripcion'])->name('destroy.suscripcion');

});

require __DIR__.'/auth.php';
