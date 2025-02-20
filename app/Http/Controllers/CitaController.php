<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Optica;

class CitaController extends Controller
{
    public function index(Request $request)
    {
        $citas = Cita::all();

        return response()->json($citas);
    }
    

    public function indexVista()
    {
        $citas = Cita::all();//consulta

        return view('/citas', ['citas'=>$citas]);
    }
    
    public function ficha($idCita){
        $cita = Cita::findOrFail($idCita);

        return view('ficha', ['cita'=>$cita]);
    }

    public function citaOptica($optica){
        $citas = Cita::where('idOptica', $optica)->get();
        return response()->json($citas);
    }
}