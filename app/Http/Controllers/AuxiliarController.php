<?php

namespace App\Http\Controllers;
use App\Models\AsignaOptica;
use App\Models\Auxiliar;
use App\Models\Empleado;

use Illuminate\Http\Request;

class AuxiliarController extends Controller
{

    public function listado(){
        $auxiliares = Empleado::join('auxiliares', 'empleados.id', '=', 'auxiliares.idEmpleado')->get();
        return response()->json($auxiliares);
    }

    public function listadoOptica(Request $request, $id){
        $empleado = AsignaOptica::join('auxiliares', 'asignaropticas.idEmpleado', '=', 'auxiliares.idEmpleado')
        ->where('asignaropticas.idOptica', $id)
        ->join('empleados','empleados.id','=','auxiliares.idEmpleado')
        ->select('empleados.*')
        ->get();

        return response()->json($empleado);
        
        /*Mini apunte jordi
        El primer join une a la tabla asignarOpticas con auxiliares
        Y relaciona el idEmpleado de ambas tablas
        El where es...un where, ya sabes como funciona. Y filtra el resultado
        AHora une la tabla empleados con auxiliares, con el id de una e idEmpleado de la otra
        POr ultimo, como estan unidas ambas tablas, usamos el select para conseguir solo
        la informacion de esos empleados. y ya. ale
        */
    }
}
