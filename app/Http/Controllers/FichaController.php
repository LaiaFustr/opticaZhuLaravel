<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    public function creaFicha($id){
        $cita = Cita::find($id);
        $datosFicha = request()->validate([''])
    }
}
