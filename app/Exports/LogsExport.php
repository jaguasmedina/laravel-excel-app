<?php

namespace App\Exports;

use App\Models\Log;
use Maatwebsite\Excel\Concerns\FromCollection;

class LogsExport implements FromCollection
{
    protected $fecha_inicio, $fecha_fin;
    
    public function __construct($fecha_inicio, $fecha_fin)
    {
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }

    public function collection()
    {
        return Log::whereBetween('created_at', [$this->fecha_inicio, $this->fecha_fin])->get();
    }
}

