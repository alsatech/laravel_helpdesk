<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF; // Asegúrate de tener esta línea
use App\Models\Orden;

class ReporteController extends Controller
{
    public function exportPDF()
    {
        $ordenes = Orden::where('estatus', 'F')->get();
        $pdf = PDF::loadView('report.reporte', compact('ordenes'));
        return $pdf->download('reporte_ordenes.pdf');
    }
}
