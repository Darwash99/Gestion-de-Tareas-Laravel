<?php

namespace App\Models\Services;

use App\Models\Tareas;
use Illuminate\Support\Facades\Validator;

class TareaService
{
    public function getTareasAll($userId)
    {
        return Tareas::where('user_id', $userId)
            ->orderBy('fecha_vencimiento')
            ->paginate(6);
    }

    public function getTareasPendientes($userId)
    {
        return Tareas::where('user_id', $userId)
            ->where('completado','PENDIENTE')
            ->orderBy('fecha_vencimiento')
            ->paginate(6);
    }

    public function GuardarTarea($request)
    {
        return Tareas::create([
            'user_id' => auth()->id(),
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'completado' => 'PENDIENTE'
        ]);
    }

    public function getBuscarTareaByCodigo($codigo)
    {
        return Tareas::where('codigo_confirmacion', $codigo)
            ->first();
    }




    
    //funcion para validar datos tareas
    public function validarDatos($request)
    {
        $validator = Validator::make($request->all(),[
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'fecha_vencimiento' => 'required|date',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->messages()['descripcion'][0];
        }else{
            return false;
        }
    }
}