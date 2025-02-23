<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Ficha;
use App\Models\Anamnesis;
use App\Models\GraduacionAnterior;
use Illuminate\Http\Request;
use App\Http\Resources\FichasResource;
use Exception;
use PhpParser\Node\Stmt\Catch_;

class FichaController extends Controller
{


    public function creaFicha(Request $request)
    {



        $request->validate([
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

        Ficha::create([
            'idCita' =>  $request->idCita,
            'idOptometrista' => $request->idOptometrista,
            'idCliente' => $request->idCliente,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'descripcion' =>  $request->hora,
        ]);

        /* $datosFicha = new Ficha();
        //$datosFicha->id=1;
        $datosFicha->idCita = $request->idCita;
        $datosFicha->idCliente = $request->idCliente;
        $datosFicha->idOptometrista = $request->idOptometrista;
        $datosFicha->fecha = $request->fecha;
        $datosFicha->hora = $request->hora;
        $datosFicha->descripcion = $request->hora;
        $datosFicha->save();
        //dd($request); */
        $ultimo = Ficha::orderBy('id', 'desc')->first();
        //dd($ultimo);

        $anamnesisId = 0;

        //dd($request['anamnesis']);
        if ($request->has('anamnesisCheck')) { // campos de anamnesis 

            /* $anamnesis = */ $request->validate([
                'anamnesis.idFicha' => 'nullable|integer',
                'anamnesis.edad' => 'nullable|integer',
                'anamnesis.compensacion' => 'nullable|string',
                'anamnesis.ultimarevision' => 'nullable|date',
                'anamnesis.profesion' => 'nullable|string',
                'anamnesis.horas_pantalla' => 'nullable|string',
            ]);
            /* 
            $anamnesis = new Anamnesis();
            $anamnesis->idFicha = $ultimo->id;
            $anamnesis->edad = $request->input('anamnesis.edad');
            $anamnesis->compensacion = $request->input('anamnesis.compensacion');
            $anamnesis->ultimarevision = $request->input('anamnesis.ultimarevision');
            $anamnesis->profesion = $request->input('anamnesis.profesion');
            $anamnesis->horas_pantalla = $request->input('anamnesis.horas_pantalla');
            $anamnesis->save(); */

            Anamnesis::create([
                'idFicha' => $ultimo->id,
                'edad' => $request->input('anamnesis.edad'),
                'compensacion' => $request->input('anamnesis.compensacion'),
                'ultimarevision' => $request->input('anamnesis.ultimarevision'),
                'profesion' => $request->input('anamnesis.profesion'),
                'horas_pantalla' => $request->input('anamnesis.horas_pantalla'),
            ]);
            $anamnesisId = Anamnesis::orderBy('id', 'desc')->first();
            // dd($anamnesisId);
        }

        if ($request->has('graduacionAntCheck')) { //campos graduiacion anterior

            /* $graduacionAnt = */ $request->validate([
                'graduacionAnt.idFicha' => 'nullable|integer',
                //'graduacionAnt.ga_od' => 'nullable|string',
                'graduacionAnt.esf_od' => 'nullable|string',
                'graduacionAnt.cil_od' => 'nullable|string',
                'graduacionAnt.av_od' => 'nullable|string',

                //'graduacionAnt.ga_oi' => 'nullable|string',
                'graduacionAnt.esf_oi' => 'nullable|string',
                'graduacionAnt.cil_oi' => 'nullable|string',
                'graduacionAnt.av_oi' => 'nullable|string',

                'graduacionAnt.ga_av' => 'nullable|string',
                'graduacionAnt.ga_ad' => 'nullable|string',
            ]);

            GraduacionAnterior::create([
                'idFicha' =>  $ultimo->id,
                
                'esfera_od' => $request->input('graduacionAnt.esf_od'),
               
                'ejecilindro_od' => $request->input('graduacionAnt.cil_od'),
                'agudezavisual_od' => $request->input('graduacionAnt.av_od'),

                'esfera_oi' => $request->input('graduacionAnt.esf_oi'),
                'ejecilindro_oi' => $request->input('graduacionAnt.cil_oi'),
                'agudezavisual_oi' => $request->input('graduacionAnt.av_oi'),

                'agudezavisual_general' => $request->input('graduacionAnt.ga_av'),
                'adicional' => $request->input('graduacionAnt.ga_ad'),
                
            ]);
        }

        if ($request->has('AVSinCorrCheck')) { //campos graduiacion anterior

            $request->validate([
                'graduacionAnt.idFicha' => 'nullable|integer',
                //'graduacionAnt.ga_od' => 'nullable|string',
                'graduacionAnt.esf_od' => 'nullable|string',
                'graduacionAnt.cil_od' => 'nullable|string',
                'graduacionAnt.av_od' => 'nullable|string',

                //'graduacionAnt.ga_oi' => 'nullable|string',
                'graduacionAnt.esf_oi' => 'nullable|string',
                'graduacionAnt.cil_oi' => 'nullable|string',
                'graduacionAnt.av_oi' => 'nullable|string',

                'graduacionAnt.ga_av' => 'nullable|string',
                'graduacionAnt.ga_ad' => 'nullable|string',
            ]);

            GraduacionAnterior::create([
                'idFicha' =>  $ultimo->id,
                
                'esfera_od' => $request->input('graduacionAnt.esf_od'),
               
                'ejecilindro_od' => $request->input('graduacionAnt.cil_od'),
                'agudezavisual_od' => $request->input('graduacionAnt.av_od'),

                'esfera_oi' => $request->input('graduacionAnt.esf_oi'),
                'ejecilindro_oi' => $request->input('graduacionAnt.cil_oi'),
                'agudezavisual_oi' => $request->input('graduacionAnt.av_oi'),

                'agudezavisual_general' => $request->input('graduacionAnt.ga_av'),
                'adicional' => $request->input('graduacionAnt.ga_ad'),
                
            ]);
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
