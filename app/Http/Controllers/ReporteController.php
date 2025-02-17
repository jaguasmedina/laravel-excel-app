<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsuariosExport;

class ReporteController extends Controller
{
    public function descargar()
    {
        return Excel::download(new UsuariosExport, 'usuarios.xlsx');
    }
}