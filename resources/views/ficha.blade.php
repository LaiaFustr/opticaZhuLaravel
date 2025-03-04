@extends('layouts.prueba')
@extends('app')

@section('content')


<div class="container-flex containerPagina">

    <div class="row mb-4">
        <div class="col-auto">

            <h1 class="tituloPagina">Ficha para {{$cita->cliente->nombre}} {{$cita->cliente->apellido}}</h1>
            <h5>{{$cita->descripcion}}</h5>
        </div>
        <!-- <div class="col d-flex justify-content-center align-items-center">
            <h2>idCita: {{$cita->id}}</h2>
        </div> -->
        <div class="col-auto d-flex justify-content-end ms-auto">
            <a href=""><i class="fa-solid fa-x fa-lg"></i></a>
        </div>
    </div>

    <form class="" action="{{route('creaFicha')}}" method="post">
        @csrf

        <div class="row">
            <input type="hidden" name="idCita" value="{{ $cita->id }}">
            <?php  /*  dd($cita->id ) */ ?>
            <input type="hidden" name="idCliente" value="{{ $cita->idCliente}}">
            <?php /*   dd($cita->cliente->id) */ ?>
            <?php /*   dd($cita->idCliente) */ ?>

            <input type="hidden" name="idOptometrista" value="{{ $cita->idOptometrista}}">
            <?php  /* dd($cita->idOptometrista)  */ ?>
            <?php /*  dd($cita->optometrista->id)  */ ?>
            <input type="hidden" name="fecha" value="{{ $cita->fecha }}">
            <input type="hidden" name="hora" value="{{ $cita->hora }}">
            <input type="hidden" name="descripcion" value="{{ $cita->descripcion }}">
            <!-- <input type="hidden" name="idCita" value="{{ $cita->cliente->nombre }}"> -->
            <?php  /* dd($cita)  */ ?>


            <div class="dropdown col" id="apartadosFichaDrodown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Apartados
                </button>
                <ul class="dropdown-menu unstyled-list p-2" id="checksFicha">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="anamnesisCheck" id="anamnesisCheck">
                            <label class="form-check-label" for="anamnesisCheck">Anamnesis</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="graduacionAntCheck" id="graduacionAntCheck">
                            <label class="form-check-label" for="graduacionAntCheck">Graduación Anterior</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="AVSinCorrCheck" id="AVSinCorrCheck">
                            <label class="form-check-label" for="AVSinCorrCheck">A.V. Sin Corrección</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="reflejoPupilarCheck" id="reflejoPupilarCheck">
                            <label class="form-check-label" for="reflejoPupilarCheck">Reflejo Pupilar</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ishiharaCheck" id="ishiharaCheck">
                            <label class="form-check-label" for="ishiharaCheck">Ishihara</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="AVMonocularCheck" id="AVMonocularCheck">
                            <label class="form-check-label" for="AVMonocularCheck">A.V. Monocular</label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="AVBinocularCheck" id="AVBinocularCheck">
                            <label class="form-check-label" for="AVBinocularCheck">A.V. Binocular</label>
                        </div>
                    </li>
                </ul>
            </div>


            <div class="col col-1 d-flex ms-5 d-flex align-items-center">
                <a href="">Historial</a>
            </div>
        </div>

        <div class="row card p-1 my-1 cardFicha" id="anamnesis" style="display:none">
            <div class="col">
                <div class="row">
                    <h4>Anamnesis</h4>
                </div>
                <div class="row my-1">
                    <div class="col-auto d-flex border-end align-items-center">
                        <div class="row">
                            <div class="col-auto form-check">
                                <input type="hidden" name="anamnesis[idFicha]">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Utiliza compensación
                                </label>
                                <input class="form-check-input" name="anamnesis[compensacion]" type="checkbox" id="comp_v">
                            </div>

                        </div>
                    </div>

                    <div class="col-auto border-end">
                        <div class="row d-flex  justify-content-center align-items-center">
                            <div class="col col-auto justify-content-center align-items-center">
                                <label for="">Última revisión:</label>
                            </div>

                            <div class="col col-auto">
                                <input class="form-control form-control-sm" name="anamnesis[ultimarevision]" type="date" id="ultima_revision">
                            </div>

                        </div>
                    </div>

                    <div class="col-auto border-end">
                        <div class="row d-flex  justify-content-center align-items-center">
                            <div class="col col-auto">
                                <label for="">Edad:</label>
                            </div>

                            <div class="col col-4">
                                <input class="form-control form-control-sm w-100" name="anamnesis[edad]" type="text" id="usr_edad">
                            </div>

                        </div>
                    </div>

                    <div class="col">
                        <div class="row d-flex  justify-content-center align-items-center">
                            <div class="col col-auto">
                                <label for="">Profesión:</label>
                            </div>

                            <div class="col">
                                <input class="form-control form-control-sm" name="anamnesis[profesion]" type="text" id="usr_profesion">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-1">
                    <div class="col-auto">
                        <div class="row">
                            <div class="col-auto border-end">
                                <div class="row d-flex  justify-content-center align-items-center">
                                    <div class="col col-auto">
                                        <label for="">Horas diarias dedicadas a pantallas:</label>
                                    </div>

                                    <div class="col col-4">
                                        <input class="form-control form-control-sm w-100" name="anamnesis[horas_pantalla]" type="text" id="usr_horas_pantalla">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row card p-1 my-1 cardFicha" id="graduacionAnt" style="display:none">
            <div class="col">
                <div class="row">
                    <h4>Graduación Anterior</h4>
                </div>

                <div class="row my-1">
                    <div class="col col-9 border-end">
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO DERECHO</label></div>
                            <div class="col-1">
                                <!-- <input class="form-control form-control-sm" name="graduacionAnt[ga_od]" type="text" id="ga_od"> -->
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" name="graduacionAnt[esf_od]" id="esf_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="graduacionAnt[cil_od]" type="text" id="cil_od">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="graduacionAnt[av_od]" type="text" id="av_od">
                            </div>
                        </div>
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO IZQUIERDO</label></div>
                            <div class="col-1">
                                <!--  <input class="form-control form-control-sm" type="text" name="graduacionAnt[ga_oi]" id="ga_oi"> -->
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="graduacionAnt[esf_oi]" type="text" id="esf_oi">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" name="graduacionAnt[cil_oi]" id="cil_oi">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="graduacionAnt[av_oi]" type="text" id="av_oi">
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="row">
                            <div class="col col-2"> <label for="">A.V:</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" type="text" name="graduacionAnt[ga_av]" id="ga_av">
                            </div>
                            <div class="col col-2"> <label for="">Ad.</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" name="graduacionAnt[ga_ad]" type="text" id="ga_ad">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row card p-1 my-1 cardFicha" id="AVSinCorr" style="display:none">
            <div class="col">
                <div class="row">
                    <h4>A.V. Sin Corrección</h4>
                </div>

                <div class="row my-1">
                    <div class="col col-9 border-end">
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO DERECHO</label></div>
                            <div class="col-1">
                                <!-- <input class="form-control form-control-sm" name="avSinCorr[av_od]" type="text" id="avsc_od"> -->
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avSinCorr[esf_od]" type="text" id="avscesf_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avSinCorr[cil_od]" type="text" id="avsccil_od">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avSinCorr[av_od]" type="text" id="avscav_od">
                            </div>
                        </div>
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO IZQUIERDO</label></div>
                            <div class="col-1">
                                <!-- <input class="form-control form-control-sm" name="avSinCorr[avsc_oi]" type="text" id="ga_od"> -->
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" name="avSinCorr[esf_oi]" id="avscesf_oi">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" name="avSinCorr[cil_oi]" id="avsccil_oi">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" name="avSinCorr[av_oi]" id="avscav_oi">
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="row">
                            <div class="col col-2"> <label for="">A.V:</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" name="avSinCorr[ga_av]" type="text" id="ga_od">
                            </div>
                            <div class="col col-2"> <label for="">Ad.</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" name="avSinCorr[ga_ad]" type="text" id="ga_od">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


        <div class="row  my-1 row-auto">
            <div class="col card p-1 cardFicha col-auto me-auto" id="reflejoPupilar" style="display:none">
                <div class="row">
                    <h4>Reflejo Pupilar</h4>
                </div>

                <div class="row m-1">

                    <div class="col-auto form-check">
                        <input class="form-check-input" name="reflejoPupilar[pr]" type="checkbox" id="si_comp_v">
                        <label class="form-check-label" for="flexCheckDefault">
                            P. Redondas
                        </label>
                    </div>
                    <div class="col-auto form-check">
                        <input class="form-check-input" name="reflejoPupilar[pi]" type="checkbox" id="si_comp_v">
                        <label class="form-check-label" for="flexCheckDefault">
                            P. Iguales
                        </label>
                    </div>
                    <div class="col-auto form-check">
                        <input class="form-check-input" name="reflejoPupilar[preacc]" type="checkbox" id="si_comp_v">
                        <label class="form-check-label" for="flexCheckDefault">
                            Reaccionan
                        </label>
                    </div>
                    <div class="col-auto form-check">
                        <input class="form-check-input" name="reflejoPupilar[pl]" type="checkbox" id="si_comp_v">
                        <label class="form-check-label" for="flexCheckDefault">
                            Reaccionan a luz
                        </label>
                    </div>
                    <div class="col-auto form-check">
                        <input class="form-check-input" name="reflejoPupilar[pa]" type="checkbox" id="si_comp_v">
                        <label class="form-check-label" for="flexCheckDefault">
                            Se acomodan
                        </label>
                    </div>

                </div>
            </div>

            <div class="col card p-1 cardFicha col-auto col-5" id="ishihara" style="display:none">
                <div class="row">
                    <h4>Ishihara</h4>
                </div>

                <div class="row my-1">
                    <div class="col col-12">
                        <textarea class="form-control" name="ishihara[ishiharaTest]"></textarea>
                    </div>
                </div>
            </div>
        </div>






        <div class="row card p-1 my-1 cardFicha" id="AVMonocular" style="display:none">
            <div class="col">
                <div class="row">
                    <h4>A.V. Monocular</h4>
                </div>

                <div class="row my-1">
                    <div class="col col-9 border-end">
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO DERECHO</label></div>
                            <div class="col-1">
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" name="avmonoc[esf_od]" id="esf_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avmonoc[cil_od]" type="text" id="cil_od">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avmonoc[av_od]" type="text" id="av_od">
                            </div>
                        </div>
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO IZQUIERDO</label></div>
                            <div class="col-1">
                                <!--  <input class="form-control form-control-sm" type="text" name="graduacionAnt[ga_oi]" id="ga_oi"> -->
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avmonoc[esf_oi]" type="text" id="esf_oi">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" name="avmonoc[cil_oi]" id="cil_oi">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avmonoc[av_oi]" type="text" id="av_oi">
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="row">
                            <div class="col col-2"> <label for="">A.V:</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" type="text" name="avmonoc[ga_av]" id="ga_av">
                            </div>
                            <div class="col col-2"> <label for="">Ad.</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" name="avmonoc[ga_ad]" type="text" id="ga_ad">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="row card p-1 my-1 cardFicha" id="AVBinocular" style="display:none">
            <div class="col">
                <div class="row">
                    <h4>A.V. Binocular</h4>
                </div>

                <div class="row my-1">
                    <div class="col col-9 border-end">
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO DERECHO</label></div>
                            <div class="col-1">
                                <!-- <input class="form-control form-control-sm" type="text" id="ga_od"> -->
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avbinoc[esf_od]" type="text" id="binesf_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avbinoc[cil_od]" type="text" id="bincil_od">
                            </div>
                            <div class="col col-auto"> <label for="">Corr. :</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avbinoc[corr_od]" type="text" id="bncorr_od">
                            </div>
                        </div>
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO IZQUIERDO</label></div>
                            <div class="col-1">
                                <!-- <input class="form-control form-control-sm" type="text" id="ga_od"> -->
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avbinoc[esf_oi]" type="text" id="binesf_oi">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avbinoc[cil_oi]" type="text" id="bincil_oi">
                            </div>
                            <div class="col col-auto"> <label for="">Corr. :</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" name="avbinoc[corr_oi]" type="text" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="row">
                            <div class="col col-5"> <label for="">A.V Binoc. :</label></div>
                            <div class="col col-5">
                                <input class="form-control form-control-sm" name="avbinoc[av_binoc]" type="text" id="">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


<div class="row">
    <div class="col me-auto"></div>
    <div class="col-auto"><button type="submit" id="creaFicha" class="btn botonNuevaCita" style="display:none">CreaFicha</button></div>
</div>


</div>


</form>


</div>

<script src="{{ asset('/js/ficha.js') }}"></script>
@endsection
