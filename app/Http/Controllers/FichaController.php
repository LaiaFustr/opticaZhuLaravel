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
        /* dd($request->validate([
            'idCita' => 'required|integer',
            'idOptometrista' => 'integer',
            'idCliente' => 'integer',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i:s',
            'descripcion'=>'required|string',
        ])); */
        $datosFicha = $request->validate([
            'idCita' => 'required|integer',
            'idOptometrista' => 'integer',
            'idCliente' => 'integer',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i:s',
            'descripcion' => 'required|string',
        ]);



        //Ficha::create($datosFicha);

        /* try {
            Ficha::create($datosFicha);
        } catch (\Exception $e) {
            dd($e->getMessage());
        } */



        $datosFicha = new Ficha();
        $datosFicha->idCita = $request->idCita;
        $datosFicha->idCliente = $request->idCliente;
        $datosFicha->idOptometrista = $request->idOptometrista;
        $datosFicha->fecha = $request->fecha;
        $datosFicha->hora = $request->hora;
        $datosFicha->descripcion = $request->hora;
        $datosFicha->save();



        if ($request->has('anamnesisCheck')) { // campos de anamnesis 
            dd('holi');
            //validate Campos Anamnesis


            
            Anamnesis::create();
        }

        $redirige = redirect()->route('home'); //de esta vista, llevará a la de 'guardaFicha' o igual no. ns

        session()->flash('success', 'Ficha creada correctamente');
        return $redirige; //Falta añadir la sweet alert que pille si existe esta session

    }

    public function guardaFicha() {}


    /*  public function creaFicha($id){

        $cita = Cita::find($id);
        $datosFicha = request()->validate(['']);
    } */
}
