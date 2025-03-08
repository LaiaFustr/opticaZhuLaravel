<div class="menu" id="menu">
    <div class="logo"><img src="./assets/img/mininaranjiverdeTrayecto.svg" class="logo"></div>
    <div class="containerUser"><img src="./assets/img/user.svg" class="userLogo">Usuario</div>
    <ul class="sidebarUl">
        
        <li class="nav-item sidebarLi">
            <div class="optionText">
                <a class="sidebar-optionA" href="{{url('propietario/citas')}}">Citas</a>
            </div>
            <ul class="dropdown-menu">
            </ul>
        </li>
        <div class="collapse perfilCollapse" id="perfilOpciones">
            <ul class="list-unstyled d-flex flex-column align-items-centers justify-content-center p-3 m-0">
                <a class="text-center" href="" routerLink="/perfil">
                    <li style="font-weight: bolder;">Acceso a perfil</li>
                </a>
                <hr>
                <a class="text-center" href="" (click)="cerrarSesion()">
                    <li class="" style="font-size: smaller;">
                        <i class="fa-solid fa-right-from-bracket"></i><span class="ms-2">Cerrar sesión</span></li>
                </a>
            </ul>
        </div>

        <li class="nav-item sidebarLi">
            <div class="optionText">
                <a class="dropdown-toggle sidebar-optionA" data-bs-toggle="collapse" href="#clienteSublist" role="button" aria-expanded="false" aria-controls="clienteSublist">Clientes</a>
            </div>
            <ul class="collapse list-unstyled" id="clienteSublist">
                <div class="submenu">
                    <li><a data-bs-toggle="modal" data-bs-target="#buscarCliModal">Buscar Cliente</a></li>
                    <li><a data-bs-toggle="modal" data-bs-target="#crearCliModal">Crear Cliente</a></li>
                    <li><a>Ver Todo Cliente</a></li>
                </div>
            </ul>
        </li>
        <li class="nav-item sidebarLi">
            <div class="optionText">
                <a class="dropdown-toggle sidebar-optionA" data-bs-toggle="collapse" href="#empleadoSublist" role="button" aria-expanded="false" aria-controls="empleadoSublist">Empleados</a>
            </div>
            <ul class="collapse list-unstyled" id="empleadoSublist">
                <div class="submenu">
                    <li><a data-bs-toggle="modal" data-bs-target="#buscarEmpModal">Buscar Empleado</a></li>
                    <li><a data-bs-toggle="modal" data-bs-target="#crearEmpModal">Crear Empleado</a></li>
                    <li><a>Ver todos</a></li>
                </div>
            </ul>
        </li>
        <li class="nav-item sidebarLi">
            <div class="optionText">
                <a class="sidebar-optionA" href="{{url('propietario/opticas')}}">Ópticas</a>
            </div>
            <ul class="dropdown-menu">
            </ul>
        </li>
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
                <form class="form-cli row" method="POST" action="{{url('')}}">
                    <div class="col px-2">
                        <div class="row my-2">
                            <div class="col">
                                <div class="input-group px-3">
                                    <input class="form-control" type="text" placeholder="Búsqueda por DNI">
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
                <form id="form-cli row" method="POST" action="{{route('insertarCliente')}}">
                    <div class="col px-2">
                        @csrf
                        <div class="row my-2">
                            <div class="col">
                                <label class="col-form-label" for="nombre">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" max="20">
                            </div>
                            <div class="col">
                                <label class="col-form-label" for="" apellido>Apellidos</label>
                                <input class="form-control" type="text" name="apellido" id="apellido" max="30">
                            </div>

                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label class="col-form-label" for="dni">DNI</label>
                                <input class="form-control" type="text" name="dni" id="dni" max="9">
                            </div>
                            <div class="col">
                                <label class="col-form-label" for="cp">Cód.Postal</label>

                                <input class="form-control" type="text" name="codPostal" pattern= /^\d{5}$/ id="cp">
                            </div>
                            <div class="col">
                                <label class="col-form-label" for="telf">Num. Telf</label>
                                <input class="form-control" type="text" name="telefono" id="telf" max="9">
                        </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer border-0">
                <button type="submit" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Crear</button>
                <!--         <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
            </form>
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
                <form class="form-cli row" method="GET" action="{{url('propietario/buscarEmp')}}">
                <div class="col px-2">
                        <div class="row my-2">
                            <div class="col">
                                <div class="input-group px-3">
                                    <input class="form-control" type="text" placeholder="Búsqueda por DNI" name="nombreUsuario">
                                    <button class="btn btn-primary botonInputModal" type="submit" ><i class="fa-solid fa-angle-right fa-2x"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0">
                <!-- <button type="button" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Buscar</button> -->
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
                <form id="form-cli row" method="POST" action="{{url('propietario/insertarEmpleado')}}" >
                    @csrf
                    <div class="col px-2">
                        <div class='row my-2'>
                        @if(isset($opticas) && count($opticas) > 0)
                            <label>Elige la Óptica:</label>
                                <select id="optica" name="idOptica" class="form-select w-auto">
                            @foreach($opticas as $op)
                            <option value="{{ $op->id }}">{{ $op->nombre }}</option>
                            @endforeach
                                </select>
                        @else
                            <p>No hay ópticas disponibles.</p>
                        @endif
                        </div>
                        <div class="row my-2">
                            <div class="col">
                                <label class="col-form-label" for="nombre">Nombre</label>
                                <input class="form-control" type="text" id="nombre" max="20" name="nombre">
                            </div>
                            <div class="col">
                                <label class="col-form-label" for="" apellido>Apellidos</label>
                                <input class="form-control" type="text" id="apellido" max="30" name="apellido">
                            </div>

                            <div class="col">
                                <label class="col-form-label" for="dni">DNI</label>
                                <input class="form-control" type="text" id="dni" max="30" name="dni">
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col">
                                <label class="col-form-label" for="dir">Dirección</label>
                                <input class="form-control" type="text" id="dir" max="50" name="direccion">
                            </div>
                            <div class="col">
                                <label class="col-form-label" for="telf">Num.Telf</label>
                                <input class="form-control" type="text" id="telf" name="telefono">
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col">
                                <label class="col-form-label" for="email">Correo Electrónico</label>
                                <input class="form-control" type="email" id="email" name="correo">
                            </div>

                            <div class="col">
                                <label class="col-form-label" for="usuario">Nombre Usuario</label>
                                <input class="form-control" type="text" name="nombreUsuario" id="usuario" max="20">
                            </div>

                            <div class="col">
                                <label class="col-form-label" for="rol">Rol</label>
                                <select class="form-select" id="rol" name="rol">
                                    <option value="auxiliar">Auxiliar</option>
                                    <option value="optometrista">Optometrista</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col">
                                <label class="col-form-label" for="pass">Contraseña</label>
                                <input class="form-control" type="password" id="pass" max="20" name="contrasenia">
                            </div>

                            <div class="col">
                                <label class="col-form-label" for="cpass">Confirmar Contraseña</label>
                                <input class="form-control" type="password" id="cpass">
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer border-0">
                <button type="submit" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Crear</button>
                <!--         <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
            </form>
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


