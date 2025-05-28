<style>
    .datos{
        padding: 10px; 
        border: 1px solid #D3D3D3;
        margin: 8px 0px;
        font-family: arial, sans-serif;
        font-size: 12px;
    }

    .titulo{
        font-size:16px;
        font-weight: bold;
    }

    .datosFila{
        display:flex;
        flex-direction: row;

    }

    .datosColumna{
        flex: 1;
        
    }

</style>
<div>
    <!-- Datos del cliente/optica/ficha -->
    <div>
        <p>{{ $ficha->cita->optica->nombre}}</p>
        <p>{{ $ficha->cliente->nombre }}
        <p>{{ $ficha->fecha }}</p>
    </div>
    <!--  Fin de los datos basicos -->

    <!-- Datos de la ficha -->

    <!-- Datos de anamnesis -->
    <div class="datos">
            <div class="titulo">
                <h3>Anamnesis</h3>
            </div>
            <div class="datosFila">
                <div class="datosColumna">
                    <p>Utiliza compensacion: </p><!-- nota: primero se debe verificar si existe el campo en la ficha, o en la tabla? me entiendes-->
                    @if($ficha->anamnesis && $ficha->anamnesis->compensacion != null) <p> Si </p> @else <p></p>@endif
                </div>

                <div class="datosColumna">
                    <p>Ultima Revision: </p>
                    @if($ficha->anamnesis && $ficha->anamnesis->ultimarevision != null) <p> {{ $ficha->anamnesis->ultimarevision }} </p> @else <p></p>@endif
                </div>
                <div class="datosColumna">
                    <p>Edad: </p>
                    @if($ficha->anamnesis && $ficha->anamnesis->edad != null) <p> {{ $ficha->anamnesis->edad }} </p> @else <p></p>@endif
                </div>
                <div class="datosColumna">
                    <p>Profesion: </p>
                    @if($ficha->anamnesis && $ficha->anamnesis->profesion != null) <p> {{ $ficha->anamnesis->profesion }} </p> @else <p></p>@endif
                </div>
            </div>
            <div class="datosFila">
                <div class="datosColumna">
                    <p>Horas diarias frente a las pantallas: </p>
                    @if($ficha->anamnesis && $ficha->anamnesis->horas_pantalla != null) <p> {{ $ficha->anamnesis->horas_pantalla }} </p> @else <p></p>@endif
                </div>
            </div>
    </div>
    <!-- Fin de datos añamnesis -->

    <!-- Datos de anamnesis -->
    <div>

        @if(  $ficha->anamnesis == null  )
        <p>Ta vacio</p>
        @endif

        @if(  $ficha->usoprevisto != null  )
            <div>
                <p>{{ $ficha->usoprevisto->tiempodeuso }}</p>
            </div>
        @endif
    </div>
    <!-- Fin de datos añamnesis -->

        <!-- Datos de anamnesis -->
    <div>

        @if(  $ficha->anamnesis == null  )
        <p>Ta vacio</p>
        @endif

        @if(  $ficha->usoprevisto != null  )
            <div>
                <p>{{ $ficha->usoprevisto->tiempodeuso }}</p>
            </div>
        @endif
    </div>
    <!-- Fin de datos añamnesis -->

        <!-- Datos de anamnesis -->
    <div>

        @if(  $ficha->anamnesis == null  )
        <p>Ta vacio</p>
        @endif

        @if(  $ficha->usoprevisto != null  )
            <div>
                <p>{{ $ficha->usoprevisto->tiempodeuso }}</p>
            </div>
        @endif
    </div>
    <!-- Fin de datos añamnesis -->

        <!-- Datos de anamnesis -->
    <div>

        @if(  $ficha->anamnesis == null  )
        <p>Ta vacio</p>
        @endif

        @if(  $ficha->usoprevisto != null  )
            <div>
                <p>{{ $ficha->usoprevisto->tiempodeuso }}</p>
            </div>
        @endif
    </div>
    <!-- Fin de datos añamnesis -->

        <!-- Datos de anamnesis -->
    <div>

        @if(  $ficha->anamnesis == null  )
        <p>Ta vacio</p>
        @endif

        @if(  $ficha->usoprevisto != null  )
            <div>
                <p>{{ $ficha->usoprevisto->tiempodeuso }}</p>
            </div>
        @endif
    </div>
    <!-- Fin de datos añamnesis -->

        <!-- Datos de anamnesis -->
    <div>

        @if(  $ficha->anamnesis == null  )
        <p>Ta vacio</p>
        @endif

        @if(  $ficha->usoprevisto != null  )
            <div>
                <p>{{ $ficha->usoprevisto->tiempodeuso }}</p>
            </div>
        @endif
    </div>
    <!-- Fin de datos añamnesis -->

        <!-- Datos de anamnesis -->
    <div>

        @if(  $ficha->anamnesis == null  )
        <p>Ta vacio</p>
        @endif

        @if(  $ficha->usoprevisto != null  )
            <div>
                <p>{{ $ficha->usoprevisto->tiempodeuso }}</p>
            </div>
        @endif
    </div>
    <!-- Fin de datos añamnesis -->

        <!-- Datos de anamnesis -->
    <div>

        @if(  $ficha->anamnesis == null  )
        <p>Ta vacio</p>
        @endif

        @if(  $ficha->usoprevisto != null  )
            <div>
                <p>{{ $ficha->usoprevisto->tiempodeuso }}</p>
            </div>
        @endif
    </div>
    <!-- Fin de datos añamnesis -->

        <!-- Datos de anamnesis -->
    <div>

        @if(  $ficha->anamnesis == null  )
        <p>Ta vacio</p>
        @endif

        @if(  $ficha->usoprevisto != null  )
            <div>
                <p>{{ $ficha->usoprevisto->tiempodeuso }}</p>
            </div>
        @endif
    </div>
    <!-- Fin de datos añamnesis -->


<h1>HIJUETUMALDITA ÑEMA FUNCIONAAAAAAAAAAAAAA</h1>
</div>