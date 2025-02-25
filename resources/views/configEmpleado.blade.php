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
                    <li class="subtituloPagina"><strong>Empleados</strong></li>
                </ul>
            </div>
        </div>

      <!--   <div class="row w-100">
            <div class="col-6">
                <h3>Datos guardados en la sesión:</h3>
                <ul>
                    <li><strong>Nombre:</strong> {{ session('nombreE') }}</li>
                    <li><strong>Apellido:</strong> {{ session('apellido') }}</li>
                    <li><strong>DNI:</strong> {{ session('dni') }}</li>
                    <li><strong>Dirección:</strong> {{ session('direccionE') }}</li>
                    <li><strong>Teléfono:</strong> {{ session('telefonoE') }}</li>
                    <li><strong>Correo:</strong> {{ session('correoE') }}</li>
                    <li><strong>Rol:</strong> {{ session('rol') }}</li>
                    <li><strong>Nombre Usuario:</strong> {{ session('nombreUsuario') }}</li>
                    <li><strong>Contraseña:</strong> {{ session('contrasenia') }}</li>
                </ul>
            </div>
        </div> -->

        <div class="row w-100">
            <div class="col-6">
                <form id="formOptica" class="row" method="POST" action="{{url('propietario/userSesion')}}">
                    @csrf
                    <div class="col px-2">
                        <div class="row my-3">
                            <div class="col mr-5">
                                <label class="col-form label" for="nombreO">Nombre</label>
                                <input class="form-control form-control-lg" type="text" name="nombreE" id="nombreO">
                            </div>

                            <div class="col">
                                <label class="col-form label" for="apellido">Apellido</label>
                                <input class="form-control form-control-lg" type="text" name="apellido" id="apellido">
                            </div>
                        </div>

                        <div class="row my-2 mt-5">
                            <div class="col">
                                <label class="col-form label" for="dni">DNI</label>
                                <input class="form-control form-control-lg" type="text" name="dni" id="dni">
                            </div>


                            <div class="col">
                                <label class="col-form label" for="direccion">Dirección</label>
                                <input class="form-control form-control-lg" type="text" name="direccionE" id="direccion">
                            </div>
                        </div>

                        <div class="row my-2 mt-5">
                            <div class="col">
                                <label class="col-form label" for="telefono">Teléfono</label>
                                <input class="form-control form-control-lg" type="tel" name="telefonoE" id="telefono">
                            </div>

                            <div class="col">
                                <label class="col-form label" for="email">Correo Electrónico</label>
                                <input class="form-control form-control-lg" type="email" name="correoE" id="email">
                            </div>
                        </div>

                        <div class="row my-2 mt-5">
                            <div class="col">
                                <label class="col-form-label" for="rol">Rol</label>
                                <select class="form-select" id="rol" name="rol">
                                    <option value="auxiliar">Auxiliar</option>
                                    <option value="optometrista">Optometrista</option>
                                </select>
                            </div>

                            <div class="col">
                                <label class="col-form label" for="nombreUsuario">Nombre de Usuario</label>
                                <input class="form-control form-control-lg" type="text" name="nombreUsuario" id="nombreUsuario">
                            </div>
                        </div>

                        <div class="row my-2 mt-5">
                            <div class="col">
                                <label class="col-form label" for="pass">Contraseña</label>
                                <input class="form-control form-control-lg" type="password" name="contrasenia" id="pass">
                            </div>

                            <div class="col">
                                <label class="col-form label" for="cpass">Confirmar Contraseña</label>
                                <input class="form-control form-control-lg" type="password" name="cpass" id="cpass">
                            </div>
                        </div>
                        </div>

                    </div>

                <!-- <div class="row justify-content-end my-5">
                    <div class="col-auto">
                        <button class="botonNuevaCita" onclick="ocultarTabla()">Añadir</button>
                    </div>
                </div>
            </div>



            <div class="col d-flex justify-content-end"  style="display: none">
                <table id="tablaEmp">
                    <tr>
                        <td>Nombre</td>
                        <td>DNI</td>
                    </tr>
                </table>
            </div>

            <script>
                function ocultarTabla() {
                    var tabla = document.getElementById("tablaEmp");
                    tabla.style.display = "none";
                }
            </script>
                -->

        <div class="col d-flex justify-content-end"  >
            <div class="card  mb-1 cardInfo" id="cardEmple" >
                <div><h5>Trabajadores de la Óptica</h5></div>
                <div class="card-body">
                    <p class="card-text">En esta página puedes añadir toda la información sobre la óptica y los profesionales que se encargarán de atenderte.</p>
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
                    <button class="botonNuevaCita" type="submit" onclick="location.href='{{url('propietario/opticas')}}'">Finalizar</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>


@endsection
