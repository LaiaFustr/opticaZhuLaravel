<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Optica;

class OpticaController extends Controller
{
     public function index(Request $request)
    {
        $opticas = Optica::all();

        return response()->json($opticas);
    }


    public function mostrar(Request $request)
    {
        $opticas = Optica::all();

        return view('opticas', compact('opticas'));
    }

    public function mostrarCard(Request $request)
    {
        $opticas = Optica::all();

        return view('opticasCard', compact('opticas'));
    }

   /*  public function index()
    {
        // Lógica para manejar la solicitud
        return response()->json(['message' => 'Opticas index']);
    } */


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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|integer',
            'direccion' => 'required|string|max:255',
            'correo' => 'required|string|max:255',
            'num_Maquinas' => 'integer',
        ]);

        // Guardar los datos en la sesión
        session([
            'nombre' => $request->input('nombre'),
            'telefono' => $request->input('telefono'),
            'direccion' => $request->input('direccion'),
            'correo' => $request->input('correo'),
            'num_Maquinas' => $request->input('num_Maquinas'),
            'idAdmin'=> $request->input('idAdmin'),
        ]);

        return redirect()->route('configCalendar');
    }

}
