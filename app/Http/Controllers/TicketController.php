<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Orden;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Asegura que el usuario esté autenticado
    }

    public function create()
    {
        if (auth()->user()->id != 2) {
            return redirect('/home')->with('error', 'No tienes acceso a esta ruta.');
        }

        $users = User::all(); // Obtén todos los usuarios, ajusta según tus necesidades

        return view('tickets.create', compact('users'));
    }
    

    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'oficio' => 'required|string|max:255',
            'numero_empleado' => 'required|string|max:255',
            'dependencia' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:255',
            'responsable' => 'required|array',
            'responsable.*' => 'exists:users,id',
            'prioridad' => 'required|string',
            'nombre_solicitante' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        // Crear un nuevo ticket
        $ticket = new Ticket();
        $ticket->oficio = $validatedData['oficio'];
        $ticket->numero_empleado = $validatedData['numero_empleado'];
        $ticket->dependencia = $validatedData['dependencia'];
        $ticket->departamento = $validatedData['departamento'];
        $ticket->puesto = $validatedData['puesto'];
        $ticket->correo = $validatedData['correo'];
        $ticket->telefono = $validatedData['telefono'];
        $ticket->responsable = implode(',', $validatedData['responsable']); // Guardar los IDs de los responsables como una cadena separada por comas
        $ticket->prioridad = $validatedData['prioridad'];
        $ticket->nombre_solicitante = $validatedData['nombre_solicitante'];
        $ticket->descripcion = $validatedData['descripcion'];
        $ticket->user_id = auth()->id();
        $ticket->save();

        // Redirigir a la lista de tickets o a una página de éxito
        return redirect()->route('tickets.index')->with('success', 'Orden creada con éxito');
    }

    public function index()
    {
        // Obtener todos los tickets del usuario autenticado
        $userId = Auth::id();

        $tickets = Ticket::where('responsable', $userId)->get();
        
        return view('tickets.index', compact('tickets'));
    }

    public function addSolution($id)
    {
        // Aquí podrías recuperar el ticket por su ID y pasar cualquier información necesaria a la vista
        $ticket = Ticket::findOrFail($id);

        return view('tickets.add-solution', compact('ticket'));
    }

    public function storeSolution(Request $request, $id)
    {
        // Valida la entrada
        $request->validate([
            'solucion' => 'required|string',
        ]);
        //recupera el ticket por ID
        $ticket = Ticket::findOrFail($id);
        // Crea una nueva entrada en la tabla 'ordenes'
        Orden::create([
            'oficio' => $ticket->oficio,
            'numero_empleado' => $ticket->numero_empleado,
            'solucion' => $request->input('solucion'),
            'estatus' => 'F', 

        ]);
        // Redirige de vuelta a la página de detalles del ticket o a donde prefieras
        return redirect()->route('tickets.index')->with('success', 'Solución agregada correctamente.');
    }

    public function finalize($id)
    {
        $ticket = Ticket::findOrFail($id);
        $orden = Orden::where('oficio', $ticket->oficio)->first();

        if ($orden) {
            $orden->estatus = 'Finalizada';
            $orden->save();
        } else {
            Orden::create([
                'oficio' => $ticket->oficio,
                'numero_empleado' => $ticket->numero_empleado,
                'solucion' => 'Orden finalizada sin solución específica.',
                'estatus' => 'Finalizada'
            ]);
        }

        return response()->json(['success' => true]);
    }



}

