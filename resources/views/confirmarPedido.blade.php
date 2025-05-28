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
            <h1 class="tituloPagina">Confirmar Pedido</h1>
        </div>

    </div>

    <form method="POST" action="{{url('propietario/crearPedido')}}">
    @csrf
        <div class="col-auto ms-auto d-flex ">
            <button class="botonNuevaCita">Aceptar Pedido</button>
        </div>
        <div class="container ">
            <div class="row">
                <div class="col-sm">
                    <div class="d-flex">
                        <p class="tituloPagina "><strong>Optica destinataria: </strong></p>&nbsp; <p> {{$optica->nombre}} </p>
                    </div>
                    <div class="d-flex">
                        <p class="tituloPagina "><strong>Proveedor: </strong></p>&nbsp;<p>{{$proveedor->nombre}}</p>
                    </div>    
                    <input type="hidden" name="idOptica" value="{{$optica->id}}">
                    <input type="hidden" name="idProveedor" value="{{$proveedor->id}}">
                </div>
            </div>
            <hr>
            @forelse ($articulos as $arti)
            <div class="mb-3">
                <p><strong>Articulo: </strong> {{$arti['nombre'] }}</p>
                    <div style="display: flex; gap: 30px; align-items:center">
                        <div>    
                            <p><strong>Cantidad:</strong> {{ $arti['cantidad'] }}</p>
                            <input type="hidden" name="cantidad_{{$arti['id']}}" value="{{ $arti['cantidad'] }}">
                        </div>
                        <div>
                            <p><strong>Precio Unitario:</strong> {{$arti['precio']}}</p>
                            <input type="hidden" name="precio_{{$arti['id']}}" value="{{$arti['precio']}}">
                        </div>
                        <div>
                            <p><strong>Subtotal:</strong> {{$arti['subtotal']}}</p>
                            <input type="hidden" name="subtotal_{{$arti['id']}}" value="{{$arti['subtotal']}}">

                        </div>
                    </div>        
                <hr>
            </div>
            @empty
            <div>
                <p>No has seleccionado nada</p>
            </div>
            @endforelse
            <div class="d-flex">
                <p><strong>TOTAL:</strong> {{$TOTAL}}</p>
            </div>
        </div>
    </form>
</div>



@endsection
