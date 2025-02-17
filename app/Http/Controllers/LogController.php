<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
{
    /**
     * Display a listing of the logs.
     */
    public function index()
    {
        // Obtener el contenido del archivo de logs
        $logContent = Storage::get(storage_path('logs/laravel.log'));

        // Devolver la vista con el contenido del log
        return view('logs.index', compact('logContent'));
    }
}
