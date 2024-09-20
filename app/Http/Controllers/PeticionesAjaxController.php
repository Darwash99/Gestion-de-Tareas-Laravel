<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tareas;
use App\Notifications\TareaNotification;
use App\Models\Services\TareaService;

class PeticionesAjaxController extends Controller
{
    protected $tareaService;
    public function __construct(TareaService $tareaService)
    {
        $this->tareaService = $tareaService;
    }


    public function completartarea(Request $request)
    {
        $tarea = base64_decode($request->input('tarea'));
        $tareas = Tareas::find($tarea);
        
        if (!$tareas) {
            return response()->json(['status' => 'error', 'message' => 'Tarea no encontrada'], 200);
        }
        if($tareas->completado == 'COMPLETADO'){
            return response()->json(['status' => 'success','message' => 'La Tarea ya fue Completada.'], 200);
        }
        $confirmationCode = Str::random(32);
        $tareaedit = $tareas->update([
            'codigo_confirmacion' => $confirmationCode,
        ]);
        if(!$tareaedit){
            return response()->json(['status' => 'error', 'message' => 'error al actualizar el  ERSTADO de la tarea'], 200);
        }
        auth()->user()->notify(new TareaNotification($tareas,'completado'));
        return response()->json(['status' => 'success','message' => 'Por Favor Abra su bandeja de entrada y confirme la tarea.'], 200);
    }

    public function confirmar($code){
        $tareaencontrada = $this->tareaService->getBuscarTareaByCodigo($code);
        if (!$tareaencontrada) {
            session()->flash('errorconfirmar', '¡Código de confirmación inválido!');
            return redirect()->route('tareas.pendientes');
        }
        
        $tareaedit = $tareaencontrada->update([
            'completado' => 'COMPLETADO',
            'codigo_confirmacion' => null,
        ]);
        if(!$tareaedit){
            session()->flash('errorconfirmar', '¡Error al actualizar el  ESTADO de la Tarea!');
            return redirect()->route('tareas.pendientes');
        }
        session()->flash('successconfirmar', '¡Tarea confirmada con éxito!');
        return redirect()->route('tareas.pendientes');
    }
}
