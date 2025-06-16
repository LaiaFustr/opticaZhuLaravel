<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/colorpuertocognac.css') }}">
    <style>
        body{
            font-family: Arial, sans-serif;
        }

        .tituloPagina{
            font-family: Arial, sans-serif;
            color: #DA3B00;
            font-weight: 600;
        }

        .filadatos{
            display:flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .columna{
            width: 100%;
        }

        .tableInfo{
            background-color: #176E63 !important;
            color: white !important;
            padding: 5px;
        }

        .tableContent{
            border-bottom: none;
            border-top: none;
            padding: 5px;
        }

        .tableDate{
            background-color: #DA3B00 !important;
            color: white !important;
            border-top-left-radius: 5px;
        }

        .tableDateContent{
            border-bottom: none;
            border-top: none;
            padding: 5px; }

        tbody tr:nth-of-type(even) .tableContent{ background-color: #ffffff !important; }

        tbody tr:nth-of-type(odd) .tableContent{ background-color: rgba(207, 248, 236, 0.6) !important; }

        tbody tr:nth-of-type(even) .tableDateContent{ background-color: #fef3e2  !important; }

        tbody tr:nth-of-type(odd) .tableDateContent{ background-color: rgba(255, 218, 159, 0.5) !important; }

    </style>
</head>
<div  style="padding: 15px; margin: 4px">
    <img src="{{ public_path('assets/img/verdinaranjaTrayecto.jpg') }}" style="width: 70px; height:30px; position: absolute; top: 0; left: 0; margin: 4px" >
</div>
<h2 class="tituloPagina">Nº FACTURA: {{$numFactura}}</h2>
    <table>
        <tr><td style="padding: 5px"><b>Fecha del pedido:</b> </td><td style="padding: 5px">{{ $pedido->fecha }}</td></tr>
        <tr><td style="padding: 5px"><b>Estado del pedido:</b> </td><td style="padding: 5px">{{ $pedido->estado}} </td></tr>
        @if($pedido->fechapago != null)
            <tr><td style="padding: 5px"><b>Fecha del pago:</b> </td><td style="padding: 5px">{{ $pedido->fechapago }}</td></tr>
        @endif
    </table>
</div>

<div class="filaDatos">
    <div class="columna">
        <h2>Optica Destinataria</h2>
        <p><b>Nombre: </b>{{$pedido->optica->nombre}}</p>
        <p><b>Direccion: </b>{{$pedido->optica->direccion}}</p>
        <p><b>Telefono: </b>{{$pedido->optica->telefono}}</p>
    </div>
    <hr>
    <h2>Proveedor</h2>
    <table>
        <tr><td style="padding: 5px"><b>CIF:</b> </td><td style="padding: 5px">{{ $pedido->proveedor->nif }}</td>
            <td style="padding: 5px"><b>Nombre:</b> </td><td style="padding: 5px">{{$pedido->proveedor->nombre}}</td></tr>
        <tr><td style="padding: 5px"><b>Direccion:</b> </td><td style="padding: 5px">{{$pedido->proveedor->direccion}}</td>
            <td style="padding: 5px"><b>Codigo Postal:</b></td><td style="padding: 5px">{{$pedido->proveedor->codPostal}}</td></tr>
        <tr><td style="padding: 5px"><b>Telefono:</b> </td><td style="padding: 5px">{{$pedido->proveedor->telefono}}</td>
            <td style="padding: 5px"><b>Correo:</b> </td><td style="padding: 5px">{{$pedido->proveedor->correo}}</td></tr>
    </table>
</div>
<hr>
<h2>Detalles del pedido</h2>
<table class="table">
<thead>
    <tr>
        <th class="tableDate">Nombre</th>
        <th class="tableInfo">Cantidad</th>
        <th class="tableInfo">Precio Unitario</th>
        <th class="tableInfo">Subtotal</th>

    </tr>
</thead>
<tbody>
    @forelse ($detalles as $det)
    <tr>
        <td class="tableDateContent">{{ $det->articulo->nombre}}</td>
        <td class="tableContent">{{ $det->cantidad }}</td>
        <td class="tableContent">{{ $det->precio }}</td>
        <td class="tableContent">{{ $det->subtotal}}</td>
    </tr>
    @empty
    <tr>
        <td>N/A</td>
        <td>N/A</td>
        <td>N/A</td>
        <td>N/A</td>
    </tr>
    @endforelse
</tbody>
</table>

<h3>Subtotal: {{ $datosTotal['total'] }}€</h3>
<h3>IVA (21%): {{ $datosTotal['iva'] }}€</h3>
<h3>Total CON IVA: {{ $datosTotal['totaliva'] }}€</h3>