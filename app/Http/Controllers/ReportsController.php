<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orden; // Asegúrate de importar el modelo Orden si no lo has hecho
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Ticket;
use App\Exports\TicketsExport;


class ReportsController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function create()
    {
        // Obtener todas las órdenes con estado F agrupadas por número de empleado
        $ordenesF = Orden::where('estatus', 'F')
                         ->select('numero_empleado', DB::raw('count(*) as total'))
                         ->groupBy('numero_empleado')
                         ->get();

        // Preparar datos para la gráfica
        $empleados = [];
        $cantidades = [];

        foreach ($ordenesF as $orden) {
            $empleados[] = $orden->numero_empleado;
            $cantidades[] = $orden->total;
        }

        return view('reports.create', compact('empleados', 'cantidades'));
    }


}
