<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Optica;
use App\Models\Cita;
use App\Models\User;
use App\Models\Empleado;


class OpticaController extends Controller
{
    //Para mostrar todas las opticas
     public function index(Request $request)
    {
        $opticas = Optica::all();

        return response()->json($opticas);
        //return view('navbarPro', compact('opticas'));
    }

    public function indexSelect(Request $request)
    {
        $opticas = Optica::all();

        //return response()->json($opticas);
        return view('navbarPro', compact('opticas'));
    }

    //Para mostrar la optica que tenga la ID que digas
    public function mostrarID(Request $request, $id){
        $optica = Optica::find($id);
        return response()->json($optica);
    }

    public function opticaSelect($id){
        session(['idOptica' => $id]);

        $citas=Cita::where('idOptica', $id)->with('cliente')->get();
        
        $optica=Optica::find($id);

        //dump(session('idOptica'));
        session(['opticaColor' => $optica->color]);

        return view('citas', compact('citas', 'optica'));
    }

    public function cargarEdicion($id){
        $optica =Optica::find($id);
        $allOptica=Optica::all();
        return view('editarOptica', compact('optica', 'allOptica'));
    }

    public function guardarCambios(){
        
    }

    public function empleadosOptica($id){
        session(['idOptica' => $id]);

        $empleados=User::where('idOptica', $id)->get();

        return response()->json($empleados);
    }

    public function mostrar(Request $request)
    {
        $opticas = Optica::all();

        return view('opticas', compact('opticas'));
    }

    public function borrarOptica($id){
        $optica = Optica::find($id);
        if(!$optica){
            return redirect()->back()->with('Error al borrar optica');
        }

        $optica->delete();
        return redirect()->back()->with('success', 'Optica borrada con exito');

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
        //aja
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

    public function guardarSesionEdit(Request $request, $id){

        $datos=$request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|integer',
            'direccion' => 'required|string|max:255',
            'correo' => 'required|string|max:255',
            'num_Maquinas' => 'integer',
            'horaApertura' => 'required|date_format:H:i',
            'horaCierre' => 'required|date_format:H:i',
            'color' => 'required',
            //'idAdmin'=>session(['idAdmin']),
        ]);
        //dd($datos);
        //dd($id);
        try{
            $opt = Optica::findOrFail($id);
            $opt->update($datos);

            return redirect()->route('opticas');
        }catch(\Exception $e){
            return redirect()->back();
        }



        }

}
