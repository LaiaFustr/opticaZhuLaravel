<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Optica;

class OpticaController extends Controller
{
    //Para mostrar todas las opticas
     public function index(Request $request)
    {
        $opticas = Optica::all();

        return response()->json($opticas);
    }

    //Para mostrar la optica que tenga la ID que digas
    public function mostrarID(Request $request, $id){
        $optica = Optica::find($id);
        return response()->json($optica);
    }

    public function empleadosOptica($id){
        $optica = Optica::find($id);
        $empleados = $optica->empleados;
        return response()->json($empleados);
    }

    public function mostrar(Request $request)
    {
        $opticas = Optica::all();

        return view('opticas', compact('opticas'));
    }

    public function mostrarIDAdmin($idAdmin){
        $optica = Optica::where('idAdmin', $idAdmin)->get();
        return response()->json($optica);
    }

    public function mostrarIDHorario($idHorario){
        $optica = Optica::where('idHorario', $idHorario)->get();
        return response()->json($optica);
    }

    public function mostrarCard(Request $request)
    {
        $opticas = Optica::all();

        return view('opticasCard', compact('opticas'));
    }



    public function guardar(Request $request)
    {

        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|integer',
            'direccion' => 'required|string|max:255',
            'correo' => 'required|string|max:255',
            'num_Maquinas' => 'integer',
            'horaApertura' => 'required|date_format:H:i',
            'horaCierre' => 'required|date_format:H:i',
        ]);

        //dd($validateData);
        Optica::create($validateData);

        return redirect()->route('configCalendar');
    }

    public function guardarSesion(Request $request){
        $datos=$request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|integer',
            'direccion' => 'required|string|max:255',
            'correo' => 'required|string|max:255',
            'num_Maquinas' => 'integer',
            'horaApertura' => 'required|date_format:H:i',
            'horaCierre' => 'required|date_format:H:i',
            //'idAdmin'=>session(['idAdmin']),
        ]);

        // Guardar los datos en la sesión
        session([
            'nombre' => $datos['nombre'],
            'telefono' => $datos['telefono'],
            'direccion' => $datos['direccion'],
            'correo' => $datos['correo'],
            'num_Maquinas' => $datos['num_Maquinas'],
            'horaApertura' => $datos['horaApertura'],
            'horaCierre' => $datos['horaCierre'],
            'idAdmin'=>session('idAdmin'),
            // 'idHorario'=>1,
        ]);
        return redirect()->route('configEmpleado');
    }

}
