<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index(Request $request)
    {
        $citas = Cita::select('hora', 'descripcion');

        return response()->json($citas);
    }
}