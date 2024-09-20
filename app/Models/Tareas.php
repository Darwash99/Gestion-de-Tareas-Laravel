<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'titulo', 'descripcion','fecha_vencimiento','completado','codigo_confirmacion'];
    public function user() {
        return $this->belongsTo(User::class);  // Usa 'usuario_id'
    }
}
