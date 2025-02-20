<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Ficha;
use App\Models\Anamnesis;
use Illuminate\Http\Request;
use App\Http\Resources\FichasResource;

class FichaController extends Controller
{


    public function creaFicha(Request $request)
    {
        //dd($request);
        $datosFicha =
            $request->validate([
                'idCita' => 'required|integer',
            ]);

        //dd($datosFicha);

        Ficha::create($datosFicha);
/* 
        try {
            Ficha::create($datosFicha);
        } catch (\Exception $e) {
            dd($e->getMessage());
        } */



        /* $datosFicha = new Ficha();
        $datosFicha->idCita = $request->idCita;
        $datosFicha->save(); */



        /* if ($request->has('')) {// campos de anamnesis 

            //validate Campos Anamnesis


            $anamnesisData = $request->input('anamnesis');
            $anamnesisData['idFicha'] = $ficha->id;

            Anamnesis::create($anamnesisData);
        } */

        $redirige = redirect()->route('home'); //de esta vista, llevará a la de 'storeFicha'

        session()->flash('success', 'Ficha creada correctamente');
        return $redirige; //Falta crear la sesion flash para que funcione la sweet alert

    }

    public function guardaFicha() {}


    /*  public function creaFicha($id){

        $cita = Cita::find($id);
        $datosFicha = request()->validate(['']);
    } */
}
