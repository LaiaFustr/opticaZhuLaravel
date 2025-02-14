@extends('app')

@section('content')

<div class="container-flex containerPagina">

    <div class="row mb-4">
        <div class="col-auto">
            <h1 class="tituloPagina">Ficha para NOMBRE</h1>
        </div>
        
        <div class="col d-flex justify-content-end ms-auto">
            <a href=""><i class="fa-solid fa-x fa-lg"></i></a>
        </div>
    </div>
    <form action="">
        <div class="row p-1 my-1">
            <select class="form-select w-50 form-select-sm">
                <option value="anamnesis">Anamnesis</option>
                <option value="graduacion_anterior">Graduacion Anterior</option>
            </select>
            <div class="col col-1 d-flex ms-5 d-flex align-items-center">
            <a href="">Historial</a>
        </div>
        </div>
        <div class="row card p-1 my-1 cardFicha">
            <div class="col">
                <div class="row">
                    <h4>Anamnesis</h4>
                </div>
                <div class="row my-1">
                    <div class="col-auto d-flex border-end align-items-center">
                        <div class="row">
                            <div class="col col-auto"> <label for="">Utiliza Compensación:</label></div>

                            <div class="col-auto form-check">
                                <input class="form-check-input" type="checkbox" id="si_comp_v">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Sí
                                </label>
                            </div>
                            <div class="col-auto form-check">
                                <input class="form-check-input" type="checkbox" id="no_comp_v">
                                <label class="form-check-label" for="flexCheckDefault">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto border-end">
                        <div class="row d-flex  justify-content-center align-items-center">
                            <div class="col col-auto justify-content-center align-items-center">
                                <label for="">Última revisión:</label>
                            </div>

                            <div class="col col-auto">
                                <input class="form-control form-control-sm" type="date" id="ultima_revision">
                            </div>

                        </div>
                    </div>

                    <div class="col-auto border-end">
                        <div class="row d-flex  justify-content-center align-items-center">
                            <div class="col col-auto">
                                <label for="">Edad:</label>
                            </div>

                            <div class="col col-4">
                                <input class="form-control form-control-sm w-100" type="text" id="usr_edad">
                            </div>

                        </div>
                    </div>

                    <div class="col">
                        <div class="row d-flex  justify-content-center align-items-center">
                            <div class="col col-auto">
                                <label for="">Profesión:</label>
                            </div>

                            <div class="col">
                                <input class="form-control form-control-sm" type="text" id="usr_profesion">
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
                                        <input class="form-control form-control-sm w-100" type="text" id="usr_h_dedicadadas">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <div class="row card p-1 my-1 cardFicha">
            <div class="col">
                <div class="row">
                    <h4>Graduación Anterior</h4>
                </div>

                <div class="row my-1">
                    <div class="col col-9 border-end">
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO DERECHO</label></div>
                            <div class="col-1">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO IZQUIERDO</label></div>
                            <div class="col-1">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="row">
                            <div class="col col-2"> <label for="">A.V:</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-2"> <label for="">Ad.</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <div class="row card p-1 my-1 cardFicha">
            <div class="col">
                <div class="row">
                    <h4>A.V. Sin Corrección</h4>
                </div>

                <div class="row my-1">
                    <div class="col col-9 border-end">
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO DERECHO</label></div>
                            <div class="col-1">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO IZQUIERDO</label></div>
                            <div class="col-1">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="row">
                            <div class="col col-2"> <label for="">A.V:</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-2"> <label for="">Ad.</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="row  my-1 row-auto">
            <div class="col card p-1 cardFicha col-auto me-auto">
                <div class="row">
                    <h4>Reflejo Pupilar</h4>
                </div>

                <div class="row m-1">

                    <div class="col-auto form-check">
                        <input class="form-check-input" type="checkbox" id="si_comp_v">
                        <label class="form-check-label" for="flexCheckDefault">
                            P. Redondas
                        </label>
                    </div>
                    <div class="col-auto form-check">
                        <input class="form-check-input" type="checkbox" id="si_comp_v">
                        <label class="form-check-label" for="flexCheckDefault">
                            P. Iguales
                        </label>
                    </div>
                    <div class="col-auto form-check">
                        <input class="form-check-input" type="checkbox" id="si_comp_v">
                        <label class="form-check-label" for="flexCheckDefault">
                           Reaccionan
                        </label>
                    </div>
                    <div class="col-auto form-check">
                        <input class="form-check-input" type="checkbox" id="si_comp_v">
                        <label class="form-check-label" for="flexCheckDefault">
                           Reaccionan a luz
                        </label>
                    </div>
                    <div class="col-auto form-check">
                        <input class="form-check-input" type="checkbox" id="si_comp_v">
                        <label class="form-check-label" for="flexCheckDefault">
                           Se acomodan
                        </label>
                    </div>

                </div>
            </div>

            <div class="col card p-1 cardFicha col-auto col-5">
                <div class="row">
                    <h4>Ishihara</h4>
                </div>

                <div class="row my-1">
                    <div class="col col-12">
                        <textarea class="form-control" id=""></textarea>
                    </div>
                </div>
            </div>
        </div>

        




        <div class="row card p-1 my-1 cardFicha">
            <div class="col">
                <div class="row">
                    <h4>A.V. Monocular</h4>
                </div>

                <div class="row my-1">
                    <div class="col col-9 border-end">
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO DERECHO</label></div>
                            <div class="col-1">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO IZQUIERDO</label></div>
                            <div class="col-1">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">A.V:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="row">
                            <div class="col col-2"> <label for="">A.V:</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-2"> <label for="">Ad.</label></div>
                            <div class="col col-4">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <div class="row card p-1 my-1 cardFicha">
            <div class="col">
                <div class="row">
                    <h4>A.V. Binocular</h4>
                </div>

                <div class="row my-1">
                    <div class="col col-9 border-end">
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO DERECHO</label></div>
                            <div class="col-1">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Corr. :</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                        <div class="row d-flex align-items-center my-1">
                            <div class="col col-2"> <label for="">OJO IZQUIERDO</label></div>
                            <div class="col-1">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Esfera:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Cilindro:</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                            <div class="col col-auto"> <label for="">Corr. :</label></div>
                            <div class="col col-2">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex align-items-center">
                        <div class="row">
                            <div class="col col-5"> <label for="">A.V Binoc. :</label></div>
                            <div class="col col-5">
                                <input class="form-control form-control-sm" type="text" id="ga_od">
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>





</div>


</form>


</div>


@endsection