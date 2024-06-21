<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Orden;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $ordenes = Orden::where('estatus', 'F')->get();

        // Inicializa DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(view('reports.reporte', compact('ordenes'))->render());
        $dompdf->setPaper('A4', 'landscape');

        // Renderiza el PDF
        $dompdf->render();

        // Descarga el PDF
        return $dompdf->stream('reporte_ordenes.pdf');
    }
}
