<?php

// app/Models/Orden.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $fillable = [
        'oficio',
        'numero_empleado',
        'solucion',
        'estatus',
    ];

    protected $table = 'ordenes'; // Especifica el nombre de la tabla
}
