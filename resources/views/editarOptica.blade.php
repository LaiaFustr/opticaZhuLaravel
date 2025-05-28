<head>
<!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
    <!-- todos los links locales (para quefuncione sin internet) -->
     <!-- coreui -->
    <link href="/coreui/coreui.min.css" rel="stylesheet" >

    <!-- Bootstrap -->

    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap/bootstrap.bundle.min.js"></script> 

    <!-- font awesome -->
    <!-- <link href="{{asset('font-awesome/all.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('css/propOpti.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    
</head>
<div class="container-flex containerPagina">
    <div class="row w-100 mb-4">
        <div class="col-auto me-auto">
            <h1 class="tituloPagina">Edición de {{ $optica->nombre}}</h1>
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

            </ul>
        </div>
    </div>

    <div class="row w-100">
        <div class="col-6">
            <form id="formOptica" class="row" method="POST" action="{{url('/propietario/opticaSesionEdit/' .$optica->id )}}">
            @csrf
                <div class="col px-2">
                    <div class="row my-3">
                        <div class="col mr-5">
                            <label class="col-form label" for="nombreO">Nombre</label>
                            <input class="form-control form-control-lg" type="text" name="nombre" id="nombreO" required value="{{ $optica ->nombre }}">
                        </div>
                        <div class="col">
                            <label class="col-form label" for="telefonoO">Teléfono</label>
                            <input class="form-control form-control-lg" type="tel" name="telefono" id="telefonoO" required value="{{ $optica->telefono }}">
                        </div>
                    </div>
                    <div class="row my-2 mt-5">
                        <div class="col">
                            <label class="col-form label" for="direccionO">Dirección</label>
                            <input class="form-control form-control-lg" type="text" name="direccion" id="direccionO" required value="{{ $optica->direccion }}">
                        </div>
                        <div class="col">
                            <label class="col-form label" for="correoO">Correo Electrónico</label>
                            <input class="form-control form-control-lg" type="email" name="correo" id="correoO" required value="{{ $optica->correo }}">
                        </div>
                    </div>
                    <div class="row my-2 mt-5">
                        <div class="col-6">
                            <label class="col-form label" for="numMaquina">Número de Maquinas</label>
                            <input class="form-control form-control-lg" type="number" name="num_Maquinas" id="numMaquina" required value="{{ $optica->num_Maquinas }}">
                        </div>
                        <div class="col-6">
                            <label class="col-form label" for="horaAO">Hora Apertura</label>
                            <input class="form-control form-control-lg" type="time" name="horaApertura" id="horaAO" required value="{{ $optica->horaApertura }}">
                        </div>
                            <input type="hidden" name="idAdmin" value="1">
                    </div>
                    <div class="row my-2 mt-5">
                        <div class="col-6">
                            <label class="col-form label" for="horaCO">Hora Cierre</label>
                            <input class="form-control form-control-lg" type="time" name="horaCierre" id="horaCO" required value="{{ $optica->horaCierre }}">
                        </div>
                        <div class="col-6">
                            <label class="col-form label" for="color">Color</label>
                            <select class="form-control form-control-lg opcion" type="select" name="color" id="color" required>
                                    <option value='puertocognac' >Verde + Naranja</option>
                                    <option value='aftergold'>Azul + Dorado</option>
                                    <option value='eminencechelsea'>Morado + Verde</option>
                                    <option value='bluedune'>Azul + Marron</option>
                                    <option value='escalagrises'>Escala de grises</option>
                            </select>
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
</div>


