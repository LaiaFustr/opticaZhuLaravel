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

    public function mostrar(Request $request)
    {
        $opticas = Optica::all();

        return view('opticas', compact('opticas'));
    }

    public function mostrarIDAdmin(Request $request, $idAdmin){
        $optica = Optica::where('idAdmin', $idAdmin)->get();
        return response()->json($optica);
    }

    public function mostrarIDHorario(Request $request, $idHorario){
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
        ]);

        // Guardar los datos en la sesión
        session([
            'nombre' => $datos['nombre'],
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'correo' => $request->input('correo'),
            'num_Maquinas' => $request->input('num_Maquinas'),
            // 'idAdmin'=>1,
            // 'idHorario'=>1,
        ]);
        return redirect()->route('configCalendar');
    }

}