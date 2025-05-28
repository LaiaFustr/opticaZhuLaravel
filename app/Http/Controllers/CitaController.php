<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Optica;
use App\Http\Resources\CitasResource;
use DataTables;

class CitaController extends Controller
{
    public function index(Request $request)
    {
        $citas = Cita::all();

        return response()->json($citas);
    }


    public function citasOcupadas(Request $request)
    {

        $validatedData = $request->validate([
            'fecha' => 'required|date',
        ]);

        $fecha = $request->query('fecha');

        //$fechaDate=new DateTime($fecha);

        // Consulta para agrupar las citas por fecha y hora y contar el número de citas en cada grupo
        $citas = DB::table('citas')
            ->selectRaw('fecha, hora, COUNT(*) as total')
            ->where('fecha',$fecha)
            ->groupBy('fecha', 'hora')
            ->get();

            if($citas ==null){
                return response()->json(['message' => 'No hay citas ocupadas'])
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
            }

            return response()->json($citas)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
    
    public function getCitas(){
        $citas = Citas::query();

        return DataTables::eloquent($citas)
        ->addColumn('fecha', function($cit){
            return '<a class="nav-link" href="' . route('ficha', $cit->id). '">' . $cit->fecha . '</a>';
        })
        ->addColumn('hora', function($cit){
            return '<a class="nav-link" href="' . route('ficha', $cit->id). '">' . $cit->hora . '</a>';
        })
        ->addColumn('cliente', function($cit){
            return '<a class="nav-link" href="' . route('ficha', $cit->id). '">' . $cit->cliente->nombre . '</a>';
        })
        ->addColumn('descripcion', function($cit){
            return '<a class="nav-link" href="' . route('ficha', $cit->id). '">' . $cit->descripcion . '</a>';
        })
        ->toJson();
    }

    public function eleccionFicha(Request $request){
        $idCita = $request->input("id");
        $tipo = $request->input("tipo");

        if($tipo == 'gafa'){
            return redirect()->route("ficha",['idCita' => $idCita]);            
        }else if($tipo == 'lentilla'){
            return redirect()->route("fichalentilla",['idCita' => $idCita]);     
        }
    }

    public function ficha($idCita){
        $cita = Cita::findOrFail($idCita);

        return view('ficha', ['cita'=>$cita]);
    }
    
    public function fichalentilla($idCita){
        $cita = Cita::findOrFail($idCita);

        return view('fichalentilla', ['cita'=>$cita]);
    }

    public function indexCitas(){

        Log::info('COLOR DESDE SESSION EN CITAS: ' , session()->all());
        //dd(session('opticaColor'));
        //Al llegar aqui la opticaColor se vuelve null.
        //$citas = Cita::all();//consulta
        $citas = Cita::with(['cliente', 'optometrista'])->get();
        

        return view('citas', ['citas'=> CitasResource::collection($citas)]);

    }



    public function citaOptica(Request $request){

        $request->validate([
            'idOptica' => 'required|integer',
        ]);

        $idOptica=$request->query('idOptica');

        $citas = Cita::with('cliente')->where('idOptica', $idOptica)->get();

        if($citas->isEmpty()){
            return response()->json(['message' => 'Citas no encontradas'])
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        }

        return response()->json($citas)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

  /*   public function citaOptica($optica){

        $optica = session('idOptica');

        $citas = Cita::where('idOptica', $optica)->get();
        //dd($citas);
        //return view('citas', compact('citas'));
        return response()->json($citas);
    } */

    public function citaOpticaApi(){
        $optica = session('idOptica');

        $citas = Cita::where('idOptica', $optica)->get();

        return response()->json($citas);
    }

    public function guardar(Request $request){

        $datos= $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'descripcion' => 'required|string',
            'idCliente' => 'required|integer',
            'idOptica' => 'required|integer',
        ]);
        Cita::create($datos);
    }

    public function citaCliente($clientes){
        $clientes = Cita::where('idCliente', $clientes)->get();
        return response()->json($clientes);
    }

    public function borrarCita(Request $request){
        $request->validate([
            'id' => 'required|string',
        ]);

        $id= $request->query('id');

        $cita= Cita::find($id);
        
        if (!$cita) {
            return response()->json(['error' => 'Cita no encontrada'], 404);
        }
    
        $cita->delete();
    
        return response()->json(['mensaje' => 'Cita eliminada correctamente']);
    }

}
