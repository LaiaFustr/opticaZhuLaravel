<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;


class HorarioController extends Controller
{
    public function index(Request $request)
    {
        $opticas = Horario::all();

        return response()->json($opticas);
    }


    public function mostrar(Request $request)
    {
        $opticas = Horario::all();

        return view('opticas', compact('opticas'));
    }

    public function guardar(Request $request)
    {

        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'horaApertura' => 'required|integer',
            'horaCierre' => 'required|string|max:255',
        ]);

        //dd($validateData);
        Horario::create($validateData);

        //dd($validateData);
        //return redirect()->route('configEmpleado');
    }

}
