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

    public function mostrarID(Request $request, $id){
        $horario = Horario::find($id);
        return response()->json($horario);
    }

    public function mostrarIDAdmin(Request $request, $adminID){
        $horario = Horario::where('idAdmin', $adminID)->get();
        return response()->json($horario);

    }


    /*public function mostrar(Request $request)
    {
        $opticas = Horario::all();

        return view('opticas', compact('opticas'));
    }*/

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

    public function guardarSesion(Request $request){
        $datos= $request->validate([
             'nombreH' => 'required|string|max:255',
             'horaApertura' => 'required|date_format:H:i',
             'horaCierre' => 'required|date_format:H:i|max:255',
         ]);

         // Guardar los datos en la sesión
         session([
             'nombreH' => $datos['nombreH'],
             'horaApertura' => $request->input('horaApertura'),
             'horaCierre' => $request->input('horaCierre'),
            //  'idAdmin'=>1,
         ]);

         return redirect()->route('configEmpleado');
         //dd($datos);
     }

}