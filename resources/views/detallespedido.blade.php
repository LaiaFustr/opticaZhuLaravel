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
            <h1 class="tituloPagina">Detalles del pedido {{$pedido->id}}</h1>
        </div>
        @if($pedido->estado != "pagado" && $pedido->estado != "cancelado")
            <div class="col-auto ms-auto d-flex ">
            <button class="botonNuevaCita" data-bs-toggle="modal" data-bs-target="#pagarPedido">Pagar Pedido</button>
            </div>
            <div class="col-auto ms-auto d-flex ">
            <button class="botonInputModal btn-cancelar-pedido" data-id="{{$pedido->id}}" data-bs-toggle="modal" data-bs-target="#cancelarPedido">Cancelar Pedido</button>
            </div>
            
        @endif
        <!-- <div class="col d-flex justify-content-end">
            <a href="{{url('propietario/opticas')}}"><i class="fa-solid fa-x fa-lg"></i></a>
        </div> -->

        <!-- {{-- <div class="col-auto ms-auto d-flex ">
            <button class="botonNuevaCita" data-bs-toggle="modal" data-bs-target="#buscarCliModal2">Nueva Cita</button>
        </div> --}} -->


    </div>

    <table class="table table-striped " id="proveedoresTable">
        <thead>
            <tr>
            <th class="tableDate">Articulo</th>
            <th class="tableInfo">Cantidad</th>
            <th class="tableInfo">Precio Unidad</th>
            <th class="tableInfo">Precio Total</th>
            <th class="tableInfo"style="border-top-right-radius: 5px" >Proveedor</th>
            </tr>
        </thead>
        <tbody>
            @forelse($detalles as $det)
            <tr>
                <td class="tableDateContent">
                    <a class="nav-link">
                        {{ $det->articulo->nombre }}</a>
                </td>
                <td class="tableContent">
                    <a class="nav-link" >
                        {{ $det->cantidad }}</a>
                </td>
                <td class="tableContent">
                    <a class="nav-link" >
                        {{ $det->precio }}</a>
                </td>
                <td class="tableContent">
                    <a class="nav-link" >
                        {{ $det->subtotal }}</a>
                </td>
                <td class="tableContent">
                    <a class="nav-link" >
                        {{ $det->pedido->proveedor->nombre}}</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No hay detalles.</td><td></td><td></td><td></td><td></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<!-- Modal para pagar el pedido seleccionado-->
<div class="modal  fade" id="pagarPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="crearArtiModalLabel">Pagar pedido</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form id="form-arti row" method="POST" action="{{url('propietario/pagarPedido')}}">
                        @csrf
                        <input type="hidden" name="pedido" value="{{$pedido->id}}">
                        <div class="col px-2">
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="titularNom">Nombre y Apellidos del titular</label>
                                    <input class="form-control" type="text" id="titularNom" name="datos">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="titularNom">Direccion de Facturacion</label>
                                    <input class="form-control" type="text" id="titularNom" name="direccion">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="correo">Correo Electronico</label>
                                    <input class="form-control" type="text" id="correo" name="correo">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="numTelef">Numero de Telefono</label>
                                    <input class="form-control" type="text" id="numTelef" name="telefono">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="numTarjeta">Numero de tarjeta</label>
                                    <input class="form-control" type="text" id="numTarjeta" name="tarjeta">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="fechaCaduci">Fecha de caducidad</label>
                                    <input class="form-control" type="text" id="fechaCaduci" name="caducidad">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="cvv">CVV</label>
                                    <input class="form-control" type="text" id="cvv" name="cvv">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" id="crearProveedor" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Pagar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
</div> 

<script>
    $(document).on("click", ".btn-cancelar-pedido", function(){
        let id = $(this).data("id");  
        let borrandourl = "{{route('cancelarPedido',  ['id' => ':id']) }}";
        console.log(id);
        Swal.fire({
        title: "¿Estas seguro?",
        text: "Este pedido sera cancelado",
        icon: "warning",
        background: '#ffffff',
        color: 'black',
        showCancelButton: true,
        confirmButtonText: "Confirmar",

        cancelButtonText: "Cancelar",
        customClass: {
            confirmButton: "botonFooterModal",
        },
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = borrandourl.replace(":id", id);
        }
        });
    });
</script>

@endsection