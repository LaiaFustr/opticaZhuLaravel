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
            width: 50%;
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
<h2 class="tituloPagina">Nº FACTURA: {{$numFactura}}</h2>
<h3>Fecha del pedido: {{ $pedido->fecha }}</h3>

<div class="filaDatos">
    <div class="columna">
        <h2>Optica Destinataria</h2>
        <p>Nombre: {{$pedido->optica->nombre}}</p>
        <p>Direccion: {{$pedido->optica->direccion}}</p>
        <p>Telefono: {{$pedido->optica->telefono}}</p>
    </div>
    <div class="columna">
        <h2>Proveedor</h2>
        <p>Nombre: {{$pedido->proveedor->nombre}}</p>
        <p>Correo: {{$pedido->proveedor->correo}}</p>
    </div>
</div>
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

<h3>Total del pedido SIN IVA: {{ $datosTotal['total'] }}€</h3>
<h3>IVA (21%): {{ $datosTotal['iva'] }}€</h3>
<h3>Total CON IVA: {{ $datosTotal['totaliva'] }}€</h3>