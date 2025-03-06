
<div class="menu" id="menu">
        <div class="logo"><img src="./assets/img/mininaranjiverdeTrayecto.svg" class="logo"></div>
        <div class="containerUser"><img src="./assets/img/user.svg" class="userLogo">Usuario
        </div>
        <ul class="sidebarUl">
            <li class="nav-item sidebarLi">
                <div class="optionText">
                    <a class="sidebar-optionA" href="{{url('home/citas')}}">Citas</a>
                </div>
                <ul class="dropdown-menu">
                </ul>
            </li>
            <li class="nav-item sidebarLi">
                <div class="optionText">
                    <a class="dropdown-toggle sidebar-optionA" data-bs-toggle="collapse" href="#clienteSublist"  role="button" aria-expanded="false" aria-controls="clienteSublist">Clientes</a>
                </div>
                <ul class="collapse list-unstyled" id="clienteSublist">
                    <div class="submenu">
                        <li><a  data-bs-toggle="modal" data-bs-target="#buscarCliModal">Buscar Cliente</a></li>
                        <li><a  data-bs-toggle="modal" data-bs-target="#crearCliModal">Crear Cliente</a></li>
                        <li><a>Ver Todo Cliente</a></li>
                    </div>
                </ul>
            </li>
            <!-- <li class="nav-item sidebarLi">
                <div class="optionText">
                    <a class="dropdown-toggle sidebar-optionA" data-bs-toggle="collapse" href="#empleadoSublist" role="button" aria-expanded="false" aria-controls="empleadoSublist">Empleados</a>
                </div>
                <ul class="collapse list-unstyled" id="empleadoSublist">
                    <div class="submenu">
                        <li><a  data-bs-toggle="modal" data-bs-target="#buscarEmpModal">Buscar Empleado</a></li>
                        <li><a  data-bs-toggle="modal" data-bs-target="#crearEmpModal">Crear Empleado</a></li>
                        <li><a>Ver todos</a></li>
                    </div>
                </ul>
            </li> -->
        </ul>
    </div>


    <!-- modal buscar cliente -->
    <div class="modal  fade" id="buscarCliModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="exampleModalLabel">Busqueda de Cliente</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form class="form-cli row">
                        <div class="col px-2">
                            <div class="row my-2">
                                <div class="col">
                                    <div class="input-group px-3">
                                        <input class="form-control" type="text" placeholder="Búsqueda por Nombre, Apellidos o DNI">
                                        <button class="btn btn-primary botonInputModal"><i class="fa-solid fa-angle-right fa-2x"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- modal crear cliente -->
    <div class="modal modal-lg fade" id="crearCliModal" tabindex="-1" aria-labelledby="crearCliModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="crearCliModalLabel">Creación de Cliente</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form id="form-cli row">
                        <div class="col px-2">
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="nombre">Nombre</label>
                                    <input class="form-control" type="text" id="nombre" max="20">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="" apellido>Apellidos</label>
                                    <input class="form-control" type="text" id="apellido" max="30">
                                </div>

                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="telf">Num. Telf</label>
                                    <input class="form-control" type="number" id="telf" max="9">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="dni">DNI</label>
                                    <input class="form-control" type="text" id="dni" max="9">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="cp">Cód.Postal</label>

                                    <input class="form-control" type="number" id="cp">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Crear</button>
                    <!--         <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>


    <!-- modal buscar empleados -->
    <div class="modal fade" id="buscarEmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="exampleModalLabel">Busqueda de Empleados</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form class="form-cli row">
                        <div class="col px-2">
                            <div class="row my-2">
                                <div class="col">
                                    <div class="input-group px-3">
                                        <input class="form-control" type="text" placeholder="Búsqueda por Nombre, Apellidos o DNI">
                                        <button class="btn btn-primary botonInputModal"><i class="fa-solid fa-angle-right fa-2x"></i></button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Buscar</button>
                    <!--         <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>



    <!-- Modal crear empleados -->
    <div class="modal modal-lg fade" id="crearEmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="exampleModalLabel">Creación de Empleados</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form id="form-cli row">
                        <div class="col px-2">
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="nombre">Nombre</label>
                                    <input class="form-control" type="text" id="nombre" max="20">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="" apellido>Apellidos</label>
                                    <input class="form-control" type="text" id="apellido" max="30">
                                </div>

                                <div class="col">
                                    <label class="col-form-label" for="dni">DNI</label>
                                    <input class="form-control" type="text" id="dni" max="30">
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="dir">Dirección</label>
                                    <input class="form-control" type="number" id="dir" max="50">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="telf">Num.Telf</label>
                                    <input class="form-control" type="number" id="telf">
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="email">Correo Electrónico</label>
                                    <input class="form-control" type="email" id="email">
                                </div>

                                <div class="col">
                                    <label class="col-form-label" for="usuario">Nombre Usuario</label>
                                    <input class="form-control" type="text">
                                </div>

                                <div class="col">
                                    <label class="col-form-label" for="rol">Rol</label>
                                    <select class="form-select" id="rol">
                    <option value="aux">Auxiliar</option>
                    <option value="opt">Optometrista</option>
                  </select>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="pass">Contraseña</label>
                                    <input class="form-control" type="password" id="pass" max="20">
                                </div>

                                <div class="col">
                                    <label class="col-form-label" for="cpass">Confirmar Contraseña</label>
                                    <input class="form-control" type="password" id="cpass">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Crear</button>
                    <!--         <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>


    <div id="login" style="display: none;">
        <div class="card">
            <form class="formStart">
                <div class="row">
                    <div class="col-auto">
                        <label class="form-label" for="nombre">Nombre</label>
                    </div>
                    <div class="col">
                        <input class="form-control" type="text" id="nombre">
                    </div>
                </div>

                <div>
                    <div class="col-auto">
                        <label class="" for="password">Contraseña</label>
                    </div>
                    <input type="password" id="password">
                </div>
                <button routerLink="propietario">Propietario</button>
                <button routerLink="auxiliar">Auxiliar</button>
                <button routerLink="/citas">Iniciar Sesion</button>
            </form>
        </div>
    </div>



    <div class="content">
        <router-outlet></router-outlet>
    </div>


<!--     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if(session('fichaCreada')!=null){
<script>
    $(window).on('load', function() {
       
        Swal.fire({
            icon: "success",
            width: 400,
            iconColor:'#176E63',
            color: '#176E63',
            background: '#9FF0DA',
            titleText: "{{session('fichaCreada')}}",
            showConfirmButton: false,
            timer: 1500,
        });
    });
</script>
}
@else

@endif -->