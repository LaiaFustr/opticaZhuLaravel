@extends('app')

@section('content')
    <div class="container-flex containerPagina">
        <div class="row w-100 mb-4">
            <div class="col-auto me-auto">
                <h1 class="tituloPagina">Citas</h1>
            </div>
            <div class="col-auto ms-auto d-flex ">
                <button class="botonNuevaCita" data-bs-toggle="modal" data-bs-target="#buscarCliModal2">Nueva Cita</button>
            </div>
        </div>
        <form action="">
            <div class="row">
                <div class="col-auto col-2">
                    <select class="form-select form-select-sm" name="Cambiar vista" id="">
                        <option value=""selected  disabled>Cambiar vista</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="my-3">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Nombre y Apellidos</th>
                        <th>Motivo de la cita</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($citas as $cita)
                    <tr>
                        <td>{{$cita->hora}}</td>
                        <td>{{$cita->idCliente}}</td>
                        <td>{{$cita->descripcion}}</td>
                    </tr>
                    
                    <!-- <tr>
                        <td>08:00</td>
                        <td>Juan Pérez</td>
                        <td>Cambio de graduación</td>
                    </tr>
                    <tr>
                        <td>09:00</td>
                        <td>María García</td>
                        <td>Revisión</td>
                    </tr>
                    <tr>
                        <td>10:00</td>
                        <td>Carlos López</td>
                        <td>Revisión</td>
                    </tr> -->
                </tbody>
            </table>
        </div>

    </div>


    <!-- modal buscar cliente -->
<div class="modal  fade" id="buscarCliModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                    <div class="col-auto d-flex align-items-center">
                        <h5 class="modal-title tituloModal" id="exampleModalLabel">Seleccione el cliente para asignar la cita</h5>
                    </div>
                    <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                </div>
            </div>
            <div class="modal-body mt-2 mb-3">
                <form class="form-cli row" method="GET" action="{{url('propietario/buscarCli')}}">
                    <div class="col px-2">
                        <div class="row my-2">
                            <div class="col">
                                
                                <div class="input-group px-3">
                                    <input class="form-control" type="text" placeholder="Búsqueda por Nombre, Apellidos o DNI" id="dni" name="dni">
                                    <button class="btn btn-primary botonInputModal" type="submit"><i class="fa-solid fa-angle-right fa-2x"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
@endsection
