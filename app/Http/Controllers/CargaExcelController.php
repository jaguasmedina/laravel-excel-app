<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\InformacionImport;
use Maatwebsite\Excel\Facades\Excel;

class CargaExcelController extends Controller
{
    // Muestra el formulario para subir el archivo Excel
    public function showForm()
    {
        return view('carga_excel.form');
    }

    // Procesa la carga del archivo Excel
    public function upload(Request $request)
    {
        // Valida que se haya subido un archivo Excel
        $request->validate([
            'archivo' => 'required|mimes:xlsx,xls',
        ]);

        // Importa los datos del archivo Excel
        Excel::import(new InformacionImport, $request->file('archivo'));

        // Redirige con un mensaje de éxito
        return redirect()->route('carga.excel.form')->with('success', 'Datos cargados correctamente.');
    }
}
