<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'logs'; // Asegurar que coincide con la base de datos
    protected $fillable = ['usuario_id', 'actividad', 'detalles', 'created_at', 'updated_at'];
}
