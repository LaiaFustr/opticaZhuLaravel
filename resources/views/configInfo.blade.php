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
                    <li class="subtituloPagina"><strong>Información</strong></li>
                    <li><i class="fa-solid fa-angle-right breadcrumb-icono"></i></li>
                    <li class="subtituloPagina">Empleados</li>
                </ul>
            </div>
        </div>

    <!--     @if ($errors->any())  //esto muestra todos los errores seguidos
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        <br/>
        @endif

        <div class="row w-100">
            <div class="col-6">
                <h3>Datos guardados en la sesión:</h3>
                <ul>
                    <li><strong>Nombre:</strong> {{ session('nombre') }}</li>
                    <li><strong>Teléfono:</strong> {{ session('telefono') }}</li>
                    <li><strong>Dirección:</strong> {{ session('direccion') }}</li>
                    <li><strong>Correo:</strong> {{ session('correo') }}</li>
                    <li><strong>Número de Máquinas:</strong> {{ session('num_Maquinas') }}</li>
                    <li><strong>Hora Apertura:</strong> {{ session('horaApertura') }}</li>
                    <li><strong>Hora Cierre:</strong> {{ session('horaCierre') }}</li>

                    <li><strong>Admin:</strong> {{ session('idAdmin') }}</li>
                </ul>
            </div>
        </div> -->

        <div class="row w-100">
            <div class="col-6">
                <form id="formOptica" class="row" method="POST" action="{{url('/propietario/opticaSesion')}}">

                        @csrf
                    <div class="col px-2">
                        <div class="row my-3">
                            <div class="col mr-5">
                                <label class="col-form label" for="nombreO">Nombre</label>
                                <input class="form-control form-control-lg" type="text" name="nombre" id="nombreO" required>
                            </div>

                            <div class="col">
                                <label class="col-form label" for="telefonoO">Teléfono</label>
                                <input class="form-control form-control-lg" type="tel" name="telefono" id="telefonoO" required>
                            </div>

                        </div>

                        <div class="row my-2 mt-5">
                            <div class="col">
                                <label class="col-form label" for="direccionO">Dirección</label>
                                <input class="form-control form-control-lg" type="text" name="direccion" id="direccionO" required>
                            </div>


                            <div class="col">
                                <label class="col-form label" for="correoO">Correo Electrónico</label>
                                <input class="form-control form-control-lg" type="email" name="correo" id="correoO" required>
                            </div>

                        </div>

                        <div class="row my-2 mt-5">
                            <div class="col-6">
                                <label class="col-form label" for="numMaquina">Número de Maquinas</label>
                                <input class="form-control form-control-lg" type="number" name="num_Maquinas" id="numMaquina" required>
                            </div>

                            <div class="col-6">
                                <label class="col-form label" for="horaAO">Hora Apertura</label>
                                <input class="form-control form-control-lg" type="time" name="horaApertura" id="horaAO" required>
                            </div>
                            <input type="hidden" name="idAdmin" value="1">
                        </div>

                        <div class="row my-2 mt-5">
                            <div class="col-6">
                                <label class="col-form label" for="horaCO">Hora Cierre</label>
                                <input class="form-control form-control-lg" type="time" name="horaCierre" id="horaCO" required>
                            </div>
                        </div>
            </div>
        </div>

        <div class="col d-flex justify-content-end ">
                <div class="card  mb-1 cardInfo" >
                    <div><h5>Información de la Óptica</h5></div>
                    <div class="card-body">
                        <p class="card-text">Aquí añades la información esencial sobre la óptica, incluyendo sus datos de identificación, dirección y horario.</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row w-100 mt-5">
            <div class="col">
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <button class="botonNuevaCita" type="submit">Siguiente</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@endsection
