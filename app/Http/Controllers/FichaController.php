<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Ficha;
use App\Models\Anamnesis;
use Illuminate\Http\Request;

class FichaController extends Controller
{


    public function creaFicha(Request $request)
    {
       
        $datosFicha = $request->validate([
            /* 'ficha.idOptometrista' => 'required|integer',
            'idCliente' => 'required|integer',
            'idCita' => 'required|integer',
            'fecha' => 'required|date',
            'hora' => 'required|time',
            'descripcion' => 'nullable|string', */

            'idOptometrista' => 'nullable|integer',
            'idCliente' => 'nullable|integer',
            'idCita' => 'nullable|integer',
            'fecha' => 'nullable|date',
            'hora' => 'nullable|date',
            'descripcion' => 'nullable|string',

        ]);
        
        
        /* dd($datosFicha); */
        /*  dump($datosFicha); */
        try{
            Ficha::create($datosFicha);
        }catch(\Exception $e){
            dd($e->getMessage());
        }
        
        dd($datosFicha);
        /* if ($request->has('')) {// campos de anamnesis 

            //validate Campos Anamnesis


            $anamnesisData = $request->input('anamnesis');
            $anamnesisData['idFicha'] = $ficha->id;

            Anamnesis::create($anamnesisData);
        } */

        $redirige = redirect()->route('citas');

        dd($redirige);
        return $redirige; //Falta crear la sesion flash para que funcione la sweet alert

    }
    /*  public function creaFicha($id){

        $cita = Cita::find($id);
        $datosFicha = request()->validate(['']);
    } */
}
