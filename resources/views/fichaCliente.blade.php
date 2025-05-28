<style>
    .datos{
        padding: 5px; 
        border: 1px solid #D3D3D3;
        margin: 8px 0px;
        font-family: arial, sans-serif;
        font-size: 10px;
    }

    .titulo{
        font-size:16px;
        font-weight: bold;
    }

    .datosFicha{
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed;
    }

    .datosFicha td{
        border-right: 1px solid #D3D3D3;
        padding: 4px 7px ;
        vertical-align: top;
         
    }

</style>
<div>
    <!-- Datos del cliente/optica/ficha -->
    <div>
                <img src="{{ public_path('assets/img/verdinaranjaTrayecto.jpg') }}" style="width: 70px; height:30px; position: absolute; top: 0; left: 0;" >

        <h2 style="text-align:center; line-height: 60px; margin: 0px">Ficha Optometrica</h2>
        <p>{{ $ficha->cita->optica->nombre}}</p>
        <p><b>Fecha:</b> {{ $ficha->fecha }}</p>
        <p><b>Nombre:</b> {{ $ficha->cliente->nombre }} {{ $ficha->cliente->apellido}}</p>

    </div>
    <!--  Fin de los datos basicos -->

    <!-- Datos de la ficha -->

    <!-- Datos de anamnesis -->
    <div class="datos">
            <div class="titulo">
                <h3>Anamnesis</h3>
            </div>
        <table class="datosFicha">
            <tr>
                <td >
                    <p><b>Utiliza compensacion: </b></p><!-- nota: primero se debe verificar si existe el campo en la ficha, o en la tabla? me entiendes-->
                </td>   
                <td >
                    @if($ficha->anamnesis && $ficha->anamnesis->compensacion != null) <p> Si </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Ultima Revision: </b></p>
                </td>
                <td >
                    @if($ficha->anamnesis && $ficha->anamnesis->ultimarevision != null) <p> {{ $ficha->anamnesis->ultimarevision }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Edad: </b></p>
                </td>
                <td>
                    @if($ficha->anamnesis && $ficha->anamnesis->edad != null) <p> {{ $ficha->anamnesis->edad }} </p> @else <p>  </p>@endif
                </td>
            </tr>
            <tr>
                <td >
                    <p><b>Profesion: </b></p>
                </td>
                <td>
                    @if($ficha->anamnesis && $ficha->anamnesis->profesion != null) <p> {{ $ficha->anamnesis->profesion }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Horas diarias frente a las pantallas: </b></p>
                </td>
                <td>
                    @if($ficha->anamnesis && $ficha->anamnesis->horas_pantalla != null) <p> {{ $ficha->anamnesis->horas_pantalla }} </p> @else <p>  </p>@endif
                </td>
            </tr>
        </table>
    </div>
    <!-- Fin de datos añamnesis -->

    <!-- Datos de la graduacion anterior -->
    <div class="datos">
        <div class="titulo">
            <h3>Graduacion Anterior</h3>
        </div>
        <table class="datosFicha">
            <tr >
                <td>
                    <p>OJO DERECHO:</p>
                </td>
                <td >
                    <p><b>Esfera: </b></p><!-- nota: primero se debe verificar si existe el campo en la ficha, o en la tabla? me entiendes-->
                </td>   
                <td >
                    @if($ficha->graduacionanterior && $ficha->graduacionanterior->esfera_od != null) <p> {{ $ficha->graduacionanterior->esfera_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Cilindro: </b></p>
                </td>
                <td >
                    @if($ficha->graduacionanterior && $ficha->graduacionanterior->ejecilindro_od != null) <p> {{ $ficha->anamnesis->ejecilindro_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>AV: </b></p>
                </td>
                <td>
                    @if($ficha->graduacionanterior && $ficha->graduacionanterior->agudezavisual_od != null) <p> {{ $ficha->graduacionanterior->agudezavisual_od }} </p> @else <p>  </p>@endif
                </td>
            </tr>
            <tr>
                <td>
                    <p>OJO IZQUIERDO:</p>
                </td>
                <td >
                    <p><b>Esfera: </b></p>
                </td>
                <td>
                    @if($ficha->graduacionanterior && $ficha->graduacionanterior->esfera_oi != null) <p> {{ $ficha->graduacionanterior->esfera_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Cilindro: </b></p>
                </td>
                <td>
                    @if($ficha->graduacionanterior && $ficha->graduacionanterior->ejecilindro_oi != null) <p> {{ $ficha->graduacionanterior->ejecilindro_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>AV: </b></p>
                </td>
                <td>
                    @if($ficha->graduacionanterior && $ficha->graduacionanterior->agudezavisual_oi != null) <p> {{ $ficha->graduacionanterior->agudezavisual_oi }} </p> @else <p>  </p>@endif
                </td>
            </tr>
            <tr>
                <td><p><b>AV General:</b></p></td>
                <td>@if($ficha->graduacionanterior && $ficha->graduacionanterior->agudezavisual_general != null) <p> {{ $ficha->graduacionanterior->agudezavisualgeneral }} </p> @else <p>  </p>@endif
                <td><p><b>Adicional:</b></p></td>
                <td>@if($ficha->graduacionanterior && $ficha->graduacionanterior->adicional != null) <p> {{ $ficha->graduacionanterior->adicional }} </p> @else <p>  </p>@endif </td>
            </tr>
        </table>

    </div>
    <!-- Fin de datos de la graduacion anterior -->

        <!-- Datos de AV Sin correccion-->
    <div class="datos">
        <div class="titulo">
            <h3>AV Sin Correccion</h3>
        </div>
        <table class="datosFicha">
            <tr >
                <td>
                    <p>OJO DERECHO:</p>
                </td>
                <td>
                    <p><b>Esfera: </b></p><!-- nota: primero se debe verificar si existe el campo en la ficha, o en la tabla? me entiendes-->
                </td>   
                <td>
                    @if($ficha->avsincorreccion && $ficha->avsincorreccion->esfera_od != null) <p> {{ $ficha->avsincorreccion->esfera_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Cilindro: </b></p>
                </td>
                <td>
                    @if($ficha->avsincorreccion && $ficha->avsincorreccion->ejecilindro_od != null) <p> {{ $ficha->avsincorreccion->ejecilindro_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>AV: </b></p>
                </td>
                <td>
                    @if($ficha->avsincorreccion && $ficha->avsincorreccion->agudezavisual_od != null) <p> {{ $ficha->avsincorreccion->agudezavisual_od }} </p> @else <p>  </p>@endif
                </td>
            </tr>
            <tr>
                <td>
                    <p>OJO IZQUIERDO:</p>
                </td>
                <td>
                    <p><b>Esfera: </b></p>
                </td>   
                <td>
                    @if($ficha->avsincorreccion && $ficha->avsincorreccion->esfera_oi != null) <p> {{ $ficha->avsincorreccion->esfera_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Cilindro: </b></p>
                </td>
                <td>
                    @if($ficha->avsincorreccion && $ficha->avsincorreccion->ejecilindro_oi != null) <p> {{ $ficha->avsincorreccion->ejecilindro_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>AV: </b></p>
                </td>
                <td>
                    @if($ficha->avsincorreccion && $ficha->avsincorreccion->agudezavisual_oi != null) <p> {{ $ficha->avsincorreccion->agudezavisual_oi }} </p> @else <p>  </p>@endif
                </td>
            </tr>
            <tr>
                <td><p><b> General:</b></p></td>
                <td>@if($ficha->avsincorreccion && $ficha->avsincorreccion->agudezavisual_general != null) <p> {{ $ficha->avsincorreccion->agudezavisualgeneral }} </p> @else <p>  </p>@endif
                <td><p><b>Adicional:</b></p></td>
                <td>@if($ficha->avsincorreccion && $ficha->avsincorreccion->adicional != null) <p> {{ $ficha->avsincorreccion->adicional }} </p> @else <p>  </p>@endif </td>
            </tr>
        </table>
    </div>
    <!-- Fin de datos AV Sin correccion -->

        <!-- Datos de Reflejo Pupilar -->
    <div class="datos">
            <div class="titulo">
                <h3>Reflejo Pupilar</h3>
            </div>
        <table class="datosFicha">
            <tr>
                <td >
                    <p><b>Redondas: </b></p><!-- nota: primero se debe verificar si existe el campo en la ficha, o en la tabla? me entiendes-->
                </td>   
                <td >
                    @if($ficha->reflejopupilar && $ficha->reflejopupilar->redondas != null) <p> Si </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Iguales: </b></p>
                </td>
                <td >
                    @if($ficha->reflejopupilar && $ficha->reflejopupilar->iguales != null) <p> Si </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Reaccionan: </b></p>
                </td>
                <td >
                    @if($ficha->reflejopupilar && $ficha->reflejopupilar->reaccionan != null) <p> Si </p> @else <p>  </p>@endif
                </td>
                <td >
                <td>
                    <p><b>Reaccionan luz: </b></p>
                </td>
                    @if($ficha->reflejopupilar && $ficha->reflejopupilar->reaccLuz != null) <p> Si </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Se acomodan: </b></p>
                </td>
                <td >
                    @if($ficha->reflejopupilar && $ficha->reflejopupilar->acomodacion != null) <p> Si </p> @else <p>  </p>@endif
                </td>
            </tr>
        </table>
    </div>
    <!-- Fin de datos añamnesis -->

        <!-- Datos de Ishihara -->
    <div class="datos">
        <div class="titulo">
            <h3>Ishihara</h3>
        </div>
        <table class="datosFicha">
            <tr>
                <td >
                    @if($ficha->ishihara && $ficha->ishihara->ishihara != null) <p> {{ $ficha->ishihara->ishihara }} </p> @else <p>  </p>@endif
                </td>
            </tr>
        </table>
    </div>
    <!-- Fin de datos ishihara, es el test de daltonismo que te esperabas? -->

        <!-- Datos de AV Monocular -->
    <div class="datos">
        <div class="titulo">
            <h3>AV Monocular</h3>
        </div>
        <table class="datosFicha">
            <tr >
                <td>
                    <p>OJO DERECHO:</p>
                </td>
                <td>
                    <p><b>Esfera: </b></p>
                </td>   
                <td>
                    @if($ficha->avmonocular && $ficha->avmonocular->esfera_od != null) <p> {{ $ficha->avmonocular->esfera_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Cilindro: </b></p>
                </td>
                <td>
                    @if($ficha->avmonocular && $ficha->avmonocular->ejecilindro_od != null) <p> {{ $ficha->avmonocular->ejecilindro_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>AV: </b></p>
                </td>
                <td>
                    @if($ficha->avmonocular && $ficha->avmonocular->agudezavisual_od != null) <p> {{ $ficha->avmonocular->agudezavisual_od }} </p> @else <p>  </p>@endif
                </td>
            </tr>
             <tr >
                <td>
                    <p>OJO IZQUIERDO:</p>
                </td>
                <td>
                    <p><b>Esfera: </b></p>
                </td>   
                <td>
                    @if($ficha->avmonocular && $ficha->avmonocular->esfera_oi != null) <p> {{ $ficha->avmonocular->esfera_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Cilindro: </b></p>
                </td>
                <td>
                    @if($ficha->avmonocular && $ficha->avmonocular->ejecilindro_oi != null) <p> {{ $ficha->avmonocular->ejecilindro_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>AV: </b></p>
                </td>
                <td>
                    @if($ficha->avmonocular && $ficha->avmonocular->agudezavisual_oi != null) <p> {{ $ficha->avmonocular->agudezavisual_oi }} </p> @else <p>  </p>@endif
                </td>
            </tr>
            <tr>
                <td><p><b>AV General:</b></p></td>
                <td>@if($ficha->avmonocular && $ficha->avmonocular->agudezavisual_general != null) <p> {{ $ficha->avmonocular->agudezavisualgeneral }} </p> @else <p>  </p>@endif
                <td><p><b>Adicional:</b></p></td>
                <td>@if($ficha->avmonocular && $ficha->avmonocular->adicional != null) <p> {{ $ficha->avmonocular->adicional }} </p> @else <p>  </p>@endif </td>
            </tr>
        </table>
    </div>
    <!-- Fin de datos AV Monocular -->

        <!-- Datos de AV Binocular -->
    <div class="datos">
        <div class="titulo">
            <h3>AV Binocular</h3>
        </div>
        <table class="datosFicha">
            <tr >
                <td>
                    <p>OJO DERECHO:</p>
                </td>
                <td>
                    <p><b>Esfera: </b></p>
                </td>   
                <td>
                    @if($ficha->avbinocular && $ficha->avbinocular->esfera_od != null) <p> {{ $ficha->avbinocular->esfera_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Cilindro: </b></p>
                </td>
                <td>
                    @if($ficha->avbinocular && $ficha->avbinocular->ejecilindro_od != null) <p> {{ $ficha->avbinocular->ejecilindro_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>AV: </b></p>
                </td>
                <td>
                    @if($ficha->avbinocular && $ficha->avbinocular->correccion_od != null) <p> {{ $ficha->avbinocular->correccion_od }} </p> @else <p>  </p>@endif
                </td>
            </tr>
            <tr>
                <td>
                    <p>OJO IZQUIERDO:</p>
                </td>
                <td>
                    <p><b>Esfera: </b></p>
                </td>   
                <td>
                    @if($ficha->avbinocular && $ficha->avbinocular->esfera_oi != null) <p> {{ $ficha->avbinocular->esfera_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Cilindro: </b></p>
                </td>
                <td>
                    @if($ficha->avbinocular && $ficha->avbinocular->ejecilindro_oi != null) <p> {{ $ficha->avbinocular->ejecilindro_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>AV: </b></p>
                </td>
                <td>
                    @if($ficha->avbinocular && $ficha->avbinocular->correccion_oi != null) <p> {{ $ficha->avbinocular->correccion_oi }} </p> @else <p>  </p>@endif
                </td>
            </tr>
            <tr>
                <td><b>AV Binoc. :</b></td>
                <td>@if($ficha->avbinocular && $ficha->avbinocular->agudezavisual_binoc != null) <p> {{ $ficha->avbinocular->agudezavisual_binoc }} </p> @else <p>  </p>@endif
            </tr>
        </table>
    </div>
    <!-- Fin de datos AV Binocular -->

        <!-- Datos de Superficie Ocular -->
    <div class="datos">
        <div class="titulo">
            <h3>Superficie Ocular</h3>
        </div>
        <table class="datosFicha">
            <tr >
                <td>
                    <p>OJO DERECHO:</p>
                </td>
                <td>
                    <p><b>Cornea: </b></p>
                </td>   
                <td>
                    @if($ficha->superficieocular && $ficha->superficieocular->estadocornea_od != null) <p> {{ $ficha->superficieocular->estadocornea_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Parpados: </b></p>
                </td>
                <td>
                    @if($ficha->superficieocular && $ficha->superficieocular->peliculalagrimal_od != null) <p> {{ $ficha->superficieocular->peliculalagrimal_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Tincion: </b></p>
                </td>
                <td>
                    @if($ficha->superficieocular && $ficha->superficieocular->tincion_od != null) <p> {{ $ficha->superficieocular->tincion_od }} </p> @else <p>  </p>@endif
                </td>
            </tr>
            <tr>
                <td>
                    <p>OJO IZQUIERDO:</p>
                </td>
                <td>
                    <p><b>Cornea: </b></p>
                </td>   
                <td>
                    @if($ficha->superficieocular && $ficha->superficieocular->estadocornea_oi != null) <p> {{ $ficha->superficieocular->estadocornea_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Parpados: </b></p>
                </td>
                <td>
                    @if($ficha->superficieocular && $ficha->superficieocular->peliculalagrimal_oi != null) <p> {{ $ficha->superficieocular->peliculalagrimal_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Tincion: </b></p>
                </td>
                <td>
                    @if($ficha->superficieocular && $ficha->superficieocular->tincion_oi != null) <p> {{ $ficha->superficieocular->tincion_oi }} </p> @else <p>  </p>@endif
                </td>
            </tr>
        </table>
    </div>
    <!-- Fin de datos Superficie Ocular -->

        <!-- Datos de Parametros(osea, datos generales) -->
    <div class="datos">
        <div class="titulo">
            <h3>Parametros</h3>
        </div>
        <table class="datosFicha">
            <tr >
                <td>
                    <p>OJO DERECHO:</p>
                </td>
                <td>
                    <p><b>Curva Base: </b></p>
                </td>   
                <td>
                    @if($ficha->parametros && $ficha->parametros->curvabase_od != null) <p> {{ $ficha->parametros->curvabase_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Parpados: </b></p>
                </td>
                <td>
                    @if($ficha->parametros && $ficha->parametros->diametro_od != null) <p> {{ $ficha->parametros->diametro_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Tincion: </b></p>
                </td>
                <td>
                    @if($ficha->parametros && $ficha->parametros->tincion_od != null) <p> {{ $ficha->parametros->tincion_od }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Eje: </b></p>
                </td>
                <td>
                    @if($ficha->parametros && $ficha->parametros->eje_od != null) <p> {{ $ficha->parametros->eje_od }} </p> @else <p>  </p>@endif
                </td>
            </tr>
            <tr>
                <td>
                    <p>OJO IZQUIERDO:</p>
                </td>
                <td>
                    <p><b>Curva Base: </b></p>
                </td>   
                <td>
                    @if($ficha->parametros && $ficha->parametros->curvabase_oi != null) <p> {{ $ficha->parametros->curvabase_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Parpados: </b></p>
                </td>
                <td>
                    @if($ficha->parametros && $ficha->parametros->diametro_oi != null) <p> {{ $ficha->parametros->diametro_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Tincion: </b></p>
                </td>
                <td>
                    @if($ficha->parametros && $ficha->parametros->tincion_oi != null) <p> {{ $ficha->parametros->tincion_oi }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Eje: </b></p>
                </td>
                <td>
                    @if($ficha->parametros && $ficha->parametros->eje_oi != null) <p> {{ $ficha->parametros->eje_oi }} </p> @else <p>  </p>@endif
                </td>
            </tr>
        </table>
    </div>
    <!-- Fin de datos parametros -->

        <!-- Datos de uso previsto -->
    <div class="datos">
        <div class="titulo">
            <h3>Uso previsto</h3>
        </div>
        <table class="datosFicha">
            <tr>
                <td>
                    <p><b>Tiempo de uso</b></p>
                </td>
                <td >
                    @if($ficha->usoprevisto && $ficha->usoprevisto->tiempodeuso != null) <p> {{ $ficha->usoprevisto->tiempodeuso }} </p> @else <p>  </p>@endif
                </td>
                <td>
                    <p><b>Horas de uso diarias</b></p>
                </td>
                <td >
                    @if($ficha->usoprevisto && $ficha->usoprevisto->usodiarias != null) <p> {{ $ficha->usoprevisto->usodiarias }} </p> @else <p>  </p>@endif
                </td>

            </tr>
        </table>
    </div>
    <!-- Fin de datos uso previsto -->
</div>