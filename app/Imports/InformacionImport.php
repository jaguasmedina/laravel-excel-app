<?php
namespace App\Imports;

use App\Models\Informacion;
use Maatwebsite\Excel\Concerns\ToModel;

class InformacionImport implements ToModel
{
    public function model(array $row)
    {
        return new Informacion([
            'tipo'           => $row[0], // Columna A en el Excel
            'identificador'  => $row[1], // Columna B en el Excel
            'nombre_completo' => $row[2], // Columna C en el Excel
            'empresa'        => $row[3], // Columna D en el Excel
            'fecha_registro' => $row[4], // Columna E en el Excel
            'fecha_vigencia' => $row[5], // Columna F en el Excel
            'cargo'          => $row[6], // Columna G en el Excel
            'estado'         => $row[7], // Columna H en el Excel
        ]);
    }
}