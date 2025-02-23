<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Optica;
use App\Http\Resources\CitasResource;

class CitaController extends Controller
{
    public function index(Request $request)
    {
        $citas = Cita::all();

        return response()->json($citas);
    }


    public function citasOcupadas(){
 // Consulta para agrupar las citas por fecha y hora y contar el número de citas en cada grupo
        $citas = Cita::selectRaw('fecha, hora, COUNT(*) as total')
            ->groupBy('fecha', 'hora')
            ->get();
       
        return response()->json($citas);
    }

    public function indexCitas()
    {
        //$citas = Cita::all();//consulta
        $citas = Cita::with(['cliente', 'optometrista'])->get();

        return view('/citas', ['citas'=> CitasResource::collection($citas)]);

    }

    public function ficha($idCita){
        $cita = Cita::findOrFail($idCita);

        return view('ficha', ['cita'=>$cita]);
    }

    public function citaOptica($optica){
        $citas = Cita::where('idOptica', $optica)->get();
        return response()->json($citas);
    }

    public function guardar(Request $request){

        $datos= $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|time',
            'descripcion' => 'required|string',
        ]);

        Cita::create($datos);

    }

    public function citaCliente($clientes){
        $clientes = Cita::where('idCliente', $clientes)->get();
        return response()->json($clientes);
    }


}
