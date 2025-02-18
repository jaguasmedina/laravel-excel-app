<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InformacionImport;

class ImportController extends Controller
{
    public function showForm()
    {
        return view('import'); // Vista de carga
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        
        Excel::import(new InformacionImport, $request->file('file'));

        return back()->with('success', 'Archivo importado correctamente.');
    }
}

