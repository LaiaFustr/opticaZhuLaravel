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
            <h1 class="tituloPagina">Pedidos</h1>
        </div>
        <div class="col-auto ms-auto d-flex ">
            <button class="botonNuevaCita" data-bs-toggle="modal" data-bs-target="#crearPedido">Nuevo Pedido</button>
        </div>
        <!-- <div class="col d-flex justify-content-end">
            <a href="{{url('propietario/opticas')}}"><i class="fa-solid fa-x fa-lg"></i></a>
        </div> -->

        <!-- {{-- <div class="col-auto ms-auto d-flex ">
            <button class="botonNuevaCita" data-bs-toggle="modal" data-bs-target="#buscarCliModal2">Nueva Cita</button>
        </div> --}} -->


    </div>

    <table class="table table-striped " id="pedidosTable">
        <thead>
            <tr>
            <th class="tableDate">ID</th>
            <th class="tableDate" style="border-top-left-radius: 0px">Fecha</th>
            <th class="tableInfo">Estado</th>
            <th class="tableInfo">Total</th>
            <th class="tableInfo">Proveedor</th>
            <th class="tableInfo">Optica</th>
            <th class="tableInfo" style="border-top-right-radius: 5px" >Generar PDF</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>

<!-- Modal para crear un nuevo pedido -->
<div class="modal  fade" id="crearPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="crearArtiModalLabel">Creación de un pedido</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form id="form-arti row" method="POST" action="{{url('propietario/confirmarPedido')}}">
                        @csrf
                        <div class="col px-2">
                            <div class="row my-2">
                                <label class="col-form-label" for="optica">Optica</label>
                                <select class="form-control" id="optica" name="idOptica">
                                    <option value="">Selecciona la optica</option>
                                    @forelse ($opticas as $op)
                                        <option value="{{$op->id}}">{{ $op->nombre}}</option>
                                    @empty
                                        <option>Vacio</option>
                                    @endforelse
                                </select> 
                            </div>
                            <div class="row my-2">
                                <label class="col-form-label" for="proveedor">Proveedores</label>
                                <select class="form-control" id="proveedor" name="idProveedor">
                                        <option value="">Selecciona un proveedor</option>
                                    @forelse ($proveedores as $prov)
                                        <option value="{{$prov->id}}">{{ $prov->nombre}}</option>
                                    @empty
                                        <option>Vacio</option>
                                    @endforelse
                                </select> 
                            </div>
                            <div class="row my-2">
                                <div id="articulos-container" class="mt-3">

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" id="crearProveedor" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Crear</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
</div> 
<script>
    $(document).ready(function(){
        
        $('#pedidosTable').DataTable({
            lengthMenu: [5, 10, 15],
            ajax: {
                    url: "{{ route('getPedidos') }}",
            },
            language: {
                    url: '/js/es-ES.json'
            },
            columns: [
                { data: 'id', name: 'id', className: 'tableDateContent' },
                { data: 'fecha', name: 'fecha', className: 'tableDateContent' },
                { data: 'estado', name: 'estado', className: 'tableContent' },
                { data: 'total', name: 'total', className: 'tableContent' },
                { data: 'proveedor', name: 'proveedor.nombre', className: 'tableContent' },
                { data: 'optica', name: 'optica.nombre', className: 'tableContent' },
                { data: 'pdf', name: 'pdf', className: 'tableContent'}
            ],
            lengthChange: false, 
            pageLength: 10,
            searchable: true,
            info: false,
            stripeClasses: [],
       });

        let proveedorSelec= null;
        let opticaSelec= null;

        function cargarArticulos(){
            if(proveedorSelec && opticaSelec){
                const url= `/propietario/cargarArticulos/${opticaSelec}/${proveedorSelec}`
                fetch(url)
                    .then(response=> response.json())
                    .then(data=> {
                        const articulos = $('#articulos-container');
                        articulos.empty(); //Pa vaciarlo si es que ya habia algo
                        
                        console.log(data);

                        if(data.length > 0){
                            data.forEach(articulo =>{
                                articulos.append(`<div class="row my-2"><div class='form-control'>
                                                    <label class="col-form-label" for="arti${articulo.id}">${articulo.nombre}</label>
                                                    <input type="hidden" name="articulo_${articulo.id}" value="${articulo.id}" id="arti${articulo.id}">
                                                    <input type="number" name="cantidad_${articulo.id}"></input>
                                                </div></div>`
                                );
                            });
                        }else{
                            articulos.html("<p>no hay articulos disponibles</p>");
                        }
                    });
            }
        }

        $("#proveedor").on('change', function(){
            proveedorSelec = $(this).val();
            //console.log("Proveedor Seleccionado: " + proveedorSelec);
            cargarArticulos();
        });

        //lmao, solo funciona si se pone a optica asi, poniendolo como esta en proveedor no va
        $(document).on('change', "#optica", function(){
            opticaSelec = $(this).val();
           //console.log("Optica Seleccionada: " + opticaSelec);
            cargarArticulos();
        });

    });
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        background: '#ffffff'
        title: '¡Hecho!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false,
        customClass: {
            icon: "sweetConfirm"
        }
    });
</script>
@endif

@endsection
