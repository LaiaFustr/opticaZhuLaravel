<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\Cliente;


class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $clientes = Cliente::all();

        return response()->json($clientes);
    }



    public function guardar(Request $request)
    {
        $validateData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string',
            'dni' => 'required|string|max:255',
            'codPostal' => 'required|integer',
            'telefono' => 'required|string|max:255',
            'idAdmin' => 'required|integer',
        ]);
        Cliente::create($validateData);

        return redirect()->route('opticas');

    }

    public function buscarCli(Request $request)
    {

        $request->validate([
            'dni' => 'required|string|max:255',
        ]);

        $dni= $request->query('dni');

        $cliente= DB::table('clientes')->where('dni', $dni)->first();

        if($cliente==null){
            return response()->json(['message' => 'Cliente no encontrado']);
        }

        //dd($cliente);
        return response()->json($cliente);
    }

}
