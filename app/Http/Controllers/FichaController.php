<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Ficha;
use App\Models\Anamnesis;
use App\Models\GraduacionAnterior;
use Illuminate\Http\Request;
use App\Http\Resources\FichasResource;
use App\Models\AgudezaVisualSinCorreccion;
use App\Models\ReflejoPupilar;
use App\Models\Ishihara;
use App\Models\AVMonocular;
use App\Models\AVBinocular;
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
            //dd($request['anamnesis']);
            /* $anamnesis = */
            $compensacion = $request->input('anamnesis.compensacion') === 'on' ? true : false;
            //dd($request['anamnesis']['compensacion'].'-'.$compensacion);
            $request->validate([
                'anamnesis.idFicha' => 'nullable|integer',
                'anamnesis.edad' => 'nullable|integer',
                /* 'anamnesis.compensacion' => 'nullable|boolean', */
                'anamnesis.ultimarevision' => 'nullable|date',
                'anamnesis.profesion' => 'nullable|string',
                'anamnesis.horas_pantalla' => 'nullable|string',
            ]);

            //dd($request['anamnesis']['compensacion'].'-'.$compensacion);
            Anamnesis::create([
                'idFicha' => $ultimo->id,
                'edad' => $request->input('anamnesis.edad'),
                'compensacion' => $compensacion,
                'ultimarevision' => $request->input('anamnesis.ultimarevision'),
                'profesion' => $request->input('anamnesis.profesion'),
                'horas_pantalla' => $request->input('anamnesis.horas_pantalla'),
            ]);
            $anamnesisId = Anamnesis::orderBy('id', 'desc')->first();
            // dd($anamnesisId);
        }

        if ($request->has('graduacionAntCheck')) { //campos graduiacion anterior

            /* $graduacionAnt = */
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

        if ($request->has('AVSinCorrCheck')) { //campos agudeza visual sin correccion

            $request->validate([
                'avSinCorr.idFicha' => 'nullable|integer',
                //'graduacionAnt.ga_od' => 'nullable|string',
                'avSinCorr.esf_od' => 'nullable|string',
                'avSinCorr.cil_od' => 'nullable|string',
                'avSinCorr.av_od' => 'nullable|string',

                //'graduacionAnt.ga_oi' => 'nullable|string',
                'avSinCorr.esf_oi' => 'nullable|string',
                'avSinCorr.cil_oi' => 'nullable|string',
                'avSinCorr.av_oi' => 'nullable|string',

                'avSinCorr.ga_av' => 'nullable|string',
                'avSinCorr.ga_ad' => 'nullable|string',
            ]);

            AgudezaVisualSinCorreccion::create([
                'idFicha' =>  $ultimo->id,

                'esfera_od' => $request->input('avSinCorr.esf_od'),

                'ejecilindro_od' => $request->input('avSinCorr.cil_od'),
                'agudezavisual_od' => $request->input('avSinCorr.av_od'),

                'esfera_oi' => $request->input('avSinCorr.esf_oi'),
                'ejecilindro_oi' => $request->input('avSinCorr.cil_oi'),
                'agudezavisual_oi' => $request->input('avSinCorr.av_oi'),

                'agudezavisual_general' => $request->input('avSinCorr.ga_av'),
                'adicional' => $request->input('avSinCorr.ga_ad'),

            ]);
        }

        if ($request->has('reflejoPupilarCheck')) { //campos reflejo pupilar
            $iguales = $request->input('reflejoPupilar.pi') === 'on' ? true : false;
            $redondas = $request->input('reflejoPupilar.pr') === 'on' ? true : false;
            $reaccionan = $request->input('reflejoPupilar.preacc') === 'on' ? true : false;
            $luz = $request->input('reflejoPupilar.pl') === 'on' ? true : false;
            $acomodan = $request->input('reflejoPupilar.pa') === 'on' ? true : false;

            ReflejoPupilar::create([
                'idFicha' =>  $ultimo->id,
                'iguales' => $iguales,
                'redondas' => $redondas,
                'reaccionan' => $reaccionan,
                'reaccLuz' => $luz,
                'acomodacion' => $acomodan,
            ]);
        }


        if ($request->has('ishiharaCheck')) { //campos ishihara

            $request->validate([
                'ishihara.ishiharaTest' => 'nullable|string',
                
            ]);

            Ishihara::create([
                'idFicha' =>  $ultimo->id,
                'ishihara' => $request->input('ishihara.ishiharaTest'),

            ]);
        }

        if ($request->has('AVMonocularCheck')) { //campos agudeza visual monocular

            /* $graduacionAnt = */
            $request->validate([
                'avmonoc.idFicha' => 'nullable|integer',
                'avmonoc.esf_od' => 'nullable|string',
                'avmonoc.cil_od' => 'nullable|string',
                'avmonoc.av_od' => 'nullable|string',
                'avmonoc.esf_oi' => 'nullable|string',
                'avmonoc.cil_oi' => 'nullable|string',
                'avmonoc.av_oi' => 'nullable|string',
                'avmonoc.ga_av' => 'nullable|string',
                'avmonoc.ga_ad' => 'nullable|string',
            ]);

            AVMonocular::create([
                'idFicha' =>  $ultimo->id,
                'esfera_od' => $request->input('avmonoc.esf_od'),
                'ejecilindro_od' => $request->input('avmonoc.cil_od'),
                'agudezavisual_od' => $request->input('avmonoc.av_od'),
                'esfera_oi' => $request->input('avmonoc.esf_oi'),
                'ejecilindro_oi' => $request->input('avmonoc.cil_oi'),
                'agudezavisual_oi' => $request->input('avmonoc.av_oi'),

                'agudezavisual_general' => $request->input('avmonoc.ga_av'),
                'adicional' => $request->input('avmonoc.ga_ad'),

            ]);
        }

        if ($request->has('AVBinocularCheck')) { //campos agudeza visualbinocular

            /* $graduacionAnt = */
            $request->validate([
                'avbinoc.idFicha' => 'nullable|integer',
                'avbinoc.esf_od' => 'nullable|string',
                'abinoc.cil_od' => 'nullable|string',
                'avbinoc.corr_od' => 'nullable|string',
                'avbinoc.esf_oi' => 'nullable|string',
                'avbinoc.cil_oi' => 'nullable|string',
                'avbinoc.corr_oi' => 'nullable|string',
                'avbinoc.av_binoc' => 'nullable|string',
               
            ]);

            AVBinocular::create([
                'idFicha' =>  $ultimo->id,
                'esfera_od' => $request->input('avbinoc.esf_od'),
                'ejecilindro_od' => $request->input('avbinoc.cil_od'),
                'correccion_od' => $request->input('avbinoc.corr_od'),

                'esfera_oi' => $request->input('avbinoc.esf_oi'),
                'ejecilindro_oi' => $request->input('avbinoc.cil_oi'),
                'correccion_oi' => $request->input('avbinoc.corr_oi'),

                'agudezavisual_binoc' => $request->input('avbinoc.av_binoc')

            ]);
        }



        $redirige = redirect()->route('home')->with(session()->flash('success', 'Ficha creada correctamente'));
        return $redirige; //Falta añadir la sweet alert que pille si existe esta session

    }

    public function guardaFicha() {}


    /*  public function creaFicha($id){

        $cita = Cita::find($id);
        $datosFicha = request()->validate(['']);
    } */
}
