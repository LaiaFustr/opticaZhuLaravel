@extends('app')

@section('content')
<?php
$idEmpleado= $empleado->id;

?>

<div class="container-flex containerPagina">
    <div class="row w-100 mb-4">
        <div class="col-auto me-auto">
            <h1 class="tituloPagina">Perfil Empleado de {{ $empleado->nombre }}  {{ $empleado->apellido }}</h1>
        </div>
        <div class="col d-flex justify-content-end">
            <a href="{{url('propietario/opticas')}}"><i class="fa-solid fa-x fa-lg"></i></a>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-6">
            <p>Nombre Completo</p>
            <p><strong>{{ $empleado->nombre }} {{ $empleado->apellido }}</strong></p>
        </div>
        <div class="col-md-6">
            <p>DNI</p>
            <p><strong>{{ $empleado->dni }}</strong></p>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-6">
            <p>Dirección</p>
            <p><strong>{{ $empleado->direccion }}</strong></p>
        </div>
        <div class="col-md-6">
            <p>Teléfono</p>
            <p><strong>{{ $empleado->telefono }}</strong></p>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-6">
            <p>Correo</p>
            <p><strong>{{ $empleado->correo }}</strong></p>
        </div>
        <div class="col-md-6">
            <p>Rol</p>
            <p><strong>{{ $empleado->rol }}</strong></p>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-6">
            <p>Nombre de Usuario</p>
            <p><strong>{{ $empleado->nombreUsuario }}</strong></p>
        </div>
        <div class="col-md-6">
            <p>Contraseña</p>
            <p><strong>{{ $empleado->contrasenia }}</strong></p>
        </div>
    </div>

    <div class="row mt-4 ">
        <div class="col-md-11 my-5 d-flex ">
            <button class="botonOutline" data-bs-toggle="modal" data-bs-target="#">Modificar</button>
        </div>
    </div>
    

    <div class="row mt-4 ">
        <div class="col-md-11 my-5 d-flex justify-content-end">
            <button class="botonOutline" data-bs-toggle="modal" data-bs-target="#borrarEmpModal">Dar de Baja</button>
        </div>
    </div>
</div>

<div class="modal  fade" id="borrarEmpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="exampleModalLabel">¿Seguro que quieres borrar este Empleado?</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form class="form-cli row" method="post" action="{{route('desactivar', $idEmpleado)}}">
                        @csrf
                        @method('PATCH')
                        <div class="col px-2">
                            <div class="row my-2">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary botonOutline me-4"><i class="fa-solid fa-trash"></i> Borrar</button>
                                    <button class="btn btn-primary  botonNuevaCita justify-content-end "><i class="fa-solid fa-x"></i> Cancelar</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
