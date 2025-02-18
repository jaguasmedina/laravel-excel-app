<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LogsExport;

class ReporteController extends Controller
{
    public function showForm()
    {
        return view('reportes'); // Vista del formulario
    }

    public function generateReport(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);
        
        $logs = Log::whereBetween('created_at', [$request->fecha_inicio, $request->fecha_fin])->get();
        
        return view('reportes', compact('logs'));
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new LogsExport($request->fecha_inicio, $request->fecha_fin), 'logs.xlsx');
    }
}