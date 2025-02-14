<?php

namespace App\Http\Controllers;
use App\Models\AsignaOptica;
use App\Models\Optometrista;
use App\Models\Empleado;
use Illuminate\Http\Request;

class OptometristaController extends Controller
{
    public function listado(){
        $optometristas = Empleado::join('optometristas', 'empleados.id', '=', 'optometristas.idEmpleado')->get();
        return response()->json($optometristas);
    }

    public function listadoOptica($id){
        $optometristas = AsignaOptica::join('optometristas','asignaropticas.idEmpleado', '=', 'optometristas.idEmpleado')
        ->where('asignaropticas.idOptica', $id)
        ->join('empleados', 'empleados.id', '=', 'optometristas.idEmpleado')
        ->select('empleados.*')->get();
        return response()->json($optometristas);

    }
}
