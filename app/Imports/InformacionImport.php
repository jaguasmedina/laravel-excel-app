<?php
namespace App\Imports;

use App\Models\Informacion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InformacionImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Informacion([
            'tipo_documento' => $row['tipo'],
            'id' => $row['id'],
            'nombre_completo' => $row['nombre_completo'],
            'empresa' => $row['empresa'],
            'fecha_registro' => $row['fecha_registro'],
            'fecha_vigente' => $row['fecha_vigencia'],
            'cargo' => $row['cargo'],
            'concepto' => $row['concepto'],
        ]);
    }
}