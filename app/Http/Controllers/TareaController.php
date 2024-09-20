<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\TareaService;
use Illuminate\Support\Facades\Validator;
use App\Models\Tareas;
use App\Notifications\TareaNotification;

class TareaController extends Controller
{
    //INYECTAR EL SERVICE PARA HACER USO DE LAS CONSULTAS
    protected $tareaService;
    public function __construct(TareaService $tareaService)
    {
        $this->tareaService = $tareaService;
    }
    

    //LISTAR TODAS LAS TAREAS
    public function index() {
        $tareas = $this->tareaService->getTareasAll(auth()->id());
        return view('tareas.index', compact('tareas'));
    }

    //LISTAR TAREAS PENDIENTES
    public function tareaspendientes() {
        $tareas = $this->tareaService->getTareasPendientes(auth()->id());
        return view('tareas.pendientes', compact('tareas'));
    }



    //  VISTA Y CREAR TAREA
    public function create(){
        return view('tareas.create');
    }
    public function store(Request $request) {

        //validar datos por laravel
        $respuesta = $this->tareaService->validarDatos($request);
        if($respuesta){
            return response()->json(['status' => 'error', 'message' => $respuesta], 404);
        }

        //Guardar Tarea
        $tarea = $this->tareaService->GuardarTarea($request);
        if(!$tarea){
            return response()->json(['status' => 'error', 'message' => 'Error al crear la Tarea'], 500);
        }
        
        // Enviar notificación por correo
        auth()->user()->notify(new TareaNotification($tarea,'crear'));
        
        return response()->json(['status' => 'success', 'message' => 'La Tarea ah Sido Creada con Exito '], 200);
    }
    
    //  COMPLETAR TAREA
    public function completar(Tarea $tarea) {
        $tarea->update(['completado' => true]);
    
        // Notificar al usuario que la tarea se ha completado
        auth()->user()->notify(new TareaCompletadaNotification());
    
        return back();
    }

    public function show($id)
    {
        $tareas = Tareas::find($id);

        if (!$tareas) {
            session()->flash('error', '¡error al encontrar la tarea!');
            return redirect()->route('tareas.create');
        }
        return view('tareas.show', ['tarea' => $tareas]);
    }
    
}
