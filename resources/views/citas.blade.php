<head>
<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/bootstrap.min.css') }}">
<script language="javascript" type="text/javascript" src="{{asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
<link href="{{ asset('Font-Awesome/css/all.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}"> -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}"> -->
</head>
@extends('app')

@section('content')
<div class="container-flex containerPagina">
    <div class="row w-100 mb-4">
        <div class="col-auto me-auto">
            <h1 class="tituloPagina">Citas</h1>
        </div>

        <!-- <div class="col d-flex justify-content-end">
            <a href="{{url('propietario/opticas')}}"><i class="fa-solid fa-x fa-lg"></i></a>
        </div> -->

        <!-- {{-- <div class="col-auto ms-auto d-flex ">
            <button class="botonNuevaCita" data-bs-toggle="modal" data-bs-target="#buscarCliModal2">Nueva Cita</button>
        </div> --}} -->


    </div>


    <table class="table table-striped " id="citasTable">
        <thead>
            <tr>
                <th hidden>hola</th>
                <th class="tableDate">Fecha</th>
                <th class="tableInfo">Hora</th>
                <th class="tableInfo">Datos del cliente</th>
                <th class="tableInfo ">Descripcion</th>
                <th class="tableInfo" style="border-top-right-radius: 5px">Atendida</th>
            </tr>
        </thead>
        <tbody>
            @forelse($citas as $cit)
            <tr>
                <td hidden>{{ $cit->id }}</td>
                <td class="tableDateContent">
                    <a class="nav-link" onclick="modalFicha({{ $cit->id }})">
                        {{ $cit->fecha }}</a>
                </td>
                <td class="tableContent">
                    <a class="nav-link" onclick="modalFicha({{ $cit->id }})">
                        {{ $cit->hora }}</a>
                </td>
                <td class="tableContent">
                    <a class="nav-link" onclick="modalFicha({{ $cit->id }})">
                        {{ $cit->cliente->nombre }}&nbsp;{{ $cit->cliente->apellido }}</a>
                </td>
                <td class="tableContent">
                    <a class="nav-link" onclick="modalFicha({{ $cit->id }})">
                        {{ $cit->descripcion }}</a>
                </td>
                <td class="tableContent">
                    <a class="nav-link" onclick="modalFicha({{ $cit->id }})">
                        {{ $cit->atendida }}</a> 
                </td>
            </tr>
            @empty
            <tr>
                <td>No hay</td><td> citas para</td><td> esta</td><td> optica.</td>
            </tr>
            @endforelse
        </tbody>
    </table>



</div>


<!-- Modal para preguntar el tipo de ficha que se quiere -->
<div class="modal  fade" id="elejirficha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="crearArtiModalLabel">Elije el tipo de ficha</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form id="form-arti row" method="POST" action="{{url('eleccionFicha')}}">
                        @csrf
                        <input type="hidden" id="idCita" name="id" value="">
                        <div class="col px-2">
                        </div>
                        <div class="modal-footer d-flex justify-content-between border-0">

                                <button type="submit" id="fichaGafas" name="tipo" value="gafa" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Gafas</button>
                                <button type="submit" id="fichaLentillas" name="tipo" value="lentilla" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Lentillas</button>
                        
                        </div>

                    </form>
                </div>
            </div>
        </div>
</div> 


@endsection


<script>
    $(document).ready(function(){
        $('#citasTable').DataTable({
            processing: true,

            lengthChange: false, 
            pageLength: 10,
            language: {
                    url: '/js/es-ES.json'
            },
            info: false,
            searchable: true,
            stripeClasses: [],
       })
    });

    function modalFicha(id){
        $("#idCita").val(id);
        $("#elejirficha").modal("show");
    }

</script>