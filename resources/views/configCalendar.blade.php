@extends('app')


@section('content')
<div class="container-flex containerPagina">
    <div class="row w-100 mb-4">
        <div class="col-auto me-auto">
            <h1 class="tituloPagina">Configuración de Óptica</h1>
        </div>
        <div class="col d-flex justify-content-end">
            <a href="{{url('propietario/opticas')}}"><i class="fa-solid fa-x fa-lg"></i></a>
        </div>
    </div>


        <div class="row  my-4">
            <div class="col">
                <ul class="lista-horizontal">
                    <li class="subtituloPagina">Información</li>
                    <li><i class="fa-solid fa-angle-right breadcrumb-icono"></i></li>
                    <li class="subtituloPagina"><strong> Calendario</strong></li>
                    <li><i class="fa-solid fa-angle-right breadcrumb-icono"></i></li>
                    <li class="subtituloPagina">Empleados</li>
                </ul>
            </div>
        </div>

        <!-- @if ($errors->any())  //esto muestra todos los errores seguidos
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        <br/>
        @endif -->



        <div class="row w-100">
            <div class="col-6">
                <form id="formCalendario" class="row" method="POST" action="{{url('propietario/insertarHorario')}}">
                    <div class="col px-2">
                        <div class="row my-3">
                            @csrf
                           {{--  <div class="col mr-5 form-check form-check-inline">
                               <input type="checkbox" class="form-check-input" id="sabado" name="sabado" value="sab">
                               <label for="sabado" class="form-check-label">Sabado</label>


                            </div>

                            <div class="col">
                                <input type="checkbox" class="form-check-input" id="domingo" name="domingo" value="dom">
                                <label for="domingo" class="form-check-label">Domingo</label>
                            </div>


                            <div class="col">
                                <input type="checkbox" class="form-check-input" id="festivo" name="festivo" value="fes">
                                <label for="festivo" class="form-check-label">Festivos</label>
                            </div> --}}

                            <div class="row my-5">
                                <div class="col-6 mr-5">
                                    <label class="col-form label" for="nombre">Nombre Horario</label>
                                    <input class="form-control form-control-lg" type="text" name="nombre" id="nombre">
                                </div>
                            </div>


                            <div class="row my-5">
                                <div class="col mr-5">
                                    <label class="col-form label" for="horaAO">Hora Apertura</label>
                                    <input class="form-control form-control-lg" type="time" name="horaApertura" id="horaAO">
                                </div>

                                <div class="col">
                                    <label class="col-form label" for="horaCO">Hora Cierre</label>
                                    <input class="form-control form-control-lg" type="time" name="horaCierre" id="horaCO" max="9">
                                </div>
                            </div>
                        </div>
                    </div>


{{--<div id='calendar'></div>--}}

            </div>

        <div class="col d-flex justify-content-end">
            <div class="card  mb-1">
                <div class="card-header"><h5>Calendario de la Óptica</h5></div>
                <div class="card-body">
                    <p class="card-text">Selección de los horarios y festivos de la óptica.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row w-100 mt-5">
        <div class="col">
            <div class="row justify-content-end">
                <div class="col-auto">
                    <button class="botonNuevaCita" onclick="location.href='{{url('propietario/configInfo')}}'">Anterior</button>
                </div>
                <div class="col-auto">
                    <button class="botonNuevaCita" type="submit" onclick="location.href='{{ url('propietario/configEmpleado') }}'">Siguiente</button>
                </div>
            </div>
        </form>
        </div>
    </div>


</div>

@endsection
