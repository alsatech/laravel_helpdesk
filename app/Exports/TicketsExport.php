<?php

namespace App\Exports;

use App\Models\Orden;


class TicketsExport implements FromCollection
{
    public function collection()
    {
        return Orden::where('estatus', 'F')->get(['id', 'responsable', 'created_at']);
    }
}
