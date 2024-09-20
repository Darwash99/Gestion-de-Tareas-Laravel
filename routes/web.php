<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\PeticionesAjaxController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //RUTAS PARA TAREAS  
    //LISTAR
    Route::get('/tarea', [TareaController::class, 'index'])->name('tareas.index');
    Route::get('/tareaspendientes', [TareaController::class, 'tareaspendientes'])->name('tareas.pendientes');

    //MOSTRAR
    Route::get('/tareas/{id}', [TareaController::class, 'show'])->name('tareas.show');

    //CREAR
    Route::get('/tarea/crear', [TareaController::class, 'create'])->name('tareas.create');
    Route::post('/tarea', [TareaController::class, 'store'])->name('tareas.store');

    //COMPLETAR TAREA 
    Route::get('/completartarea', [PeticionesAjaxController::class, 'completartarea'])->name('peticionesajax.completartarea');
    Route::get('/tareas/confirmar/{code}', [PeticionesAjaxController::class, 'confirmar'])->name('peticionesajax.confirmar');
});

require __DIR__.'/auth.php';
