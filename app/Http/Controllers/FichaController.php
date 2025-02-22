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


        /* $fecha = str_replace("-","", $request['fecha']);
        $hora = str_replace(":","", $request['hora']);
        $id =  $fecha.$hora.$request['idCita']; */
        //dd($fecha.$hora);
        //dd($request['fecha'].$request['hora'].$request['idCliente']);

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



        $datosFicha = new Ficha();
        //$datosFicha->id=1;
        $datosFicha->idCita = $request->idCita;
        $datosFicha->idCliente = $request->idCliente;
        $datosFicha->idOptometrista = $request->idOptometrista;
        $datosFicha->fecha = $request->fecha;
        $datosFicha->hora = $request->hora;
        $datosFicha->descripcion = $request->hora;
        $datosFicha->save();
        //dd($request);
        $ultimo = Ficha::orderBy('id', 'desc')->first();
        //dd($ultimo);



        //dd($request['anamnesis']);
        if ($request->has('anamnesisCheck')) { // campos de anamnesis 
            //dd('holi');

            $anamnesis = $request->validate([
                'anamnesis.idFicha' => 'nullable|integer',
                'anamnesis.edad' => 'nullable|integer',
                'anamnesis.compensacion' => 'nullable|string',
                'anamnesis.ultimarevision' => 'nullable|date',
                'anamnesis.profesion' => 'nullable|string',
                'anamnesis.horas_pantalla' => 'nullable|integer',
            ]);

            $anamnesis = new Anamnesis();
            $anamnesis->idFicha = $ultimo->id;
            $anamnesis->edad = $request->input('anamnesis.edad');
            $anamnesis->compensacion = $request->input('anamnesis.compensacion');
            $anamnesis->ultimarevision = $request->input('anamnesis.ultimarevision');
            $anamnesis->profesion = $request->input('anamnesis.profesion');
            $anamnesis->horas_pantalla = $request->input('anamnesis.horas_pantalla');
            $anamnesis->save();

            // Anamnesis::create($anamnesis);
        }

        if ($request->has('anamnesisCheck')) { // campos de anamnesis 
            //dd('holi');

            $anamnesis = $request->validate([
                'anamnesis.idFicha' => 'nullable|integer',
                'anamnesis.edad' => 'nullable|integer',
                'anamnesis.compensacion' => 'nullable|string',
                'anamnesis.ultimarevision' => 'nullable|date',
                'anamnesis.profesion' => 'nullable|string',
                'anamnesis.horas_pantalla' => 'nullable|integer',
            ]);

            $anamnesis = new Anamnesis();
            $anamnesis->idFicha = $ultimo->id;
            $anamnesis->edad = $request->input('anamnesis.edad');
            $anamnesis->compensacion = $request->input('anamnesis.compensacion');
            $anamnesis->ultimarevision = $request->input('anamnesis.ultimarevision');
            $anamnesis->profesion = $request->input('anamnesis.profesion');
            $anamnesis->horas_pantalla = $request->input('anamnesis.horas_pantalla');
            $anamnesis->save();
            
            // Anamnesis::create($anamnesis);
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
