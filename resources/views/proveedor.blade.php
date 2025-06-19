<head>
<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/bootstrap.min.css') }}">
<script language="javascript" type="text/javascript" src="{{asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
<link href="{{ asset('Font-Awesome/css/all.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}"> -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}"> -->
</head>
@if(session("artieditado"))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: 'success',
                background: '#ffffff',
                title: '¡Hecho!',
                text: "{{ session('artieditado') }}",
                timer: 2000,
                showConfirmButton: false
            });
        });
    </script>
@endif
@if(session("articreado"))
    <script>
        Swal.fire({
        icon: 'success',
        background: '#ffffff',
        title: '¡Hecho!',
        text: "{{ session('articreado') }}",
        timer: 2000,
        showConfirmButton: false
    });
    </script>
@endif
@if(session("eliminado"))
    <script>
        Swal.fire({
        icon: 'success',
        background: '#ffffff',
        title: '¡Hecho!',
        text: "{{ session('editado') }}",
        timer: 2000,
        showConfirmButton: false
    });
    </script>
@endif

@extends('app')

@section('content')


<div class="container-flex containerPagina">
    <div class="row mb-4">
        <div class="col-auto">
            <h1 class="tituloPagina">Proveedor {{ $proveedor->nombre}}</h1>            
        </div>
        <div class="col-auto ms-auto d-flex ">
            <button class="botonNuevaCita" data-bs-toggle="modal" data-bs-target="#crearArticulo">Nuevo Articulo</button>
        </div>
    </div>

    <table class="table table-striped" style="align: center" id="articulosTable">
        <thead>
            <tr>
            <th class="tableDate">Optica donde esta el articulo</th>
            <th class="tableDate" style="border-top-left-radius: 0px">Nombre del articulo</th>
            <th class="tableInfo">Stock</th>
            <th class="tableInfo">Precio</th>
            <th class="tableInfo">Descripcion</th>
            <th class="tableInfo" style="border-top-right-radius: 5px"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($articulos as $arti)        
            <tr>
                <td class="tableDateContent"><a class="nav-link" >{{ $arti->optica->nombre }}</a></td>
                <td class="tableDateContent"><a class="nav-link" >{{ $arti->nombre }}</a></td>
                <td class="tableContent"><a class="nav-link" >{{ $arti->stock }}</a></td>
                <td class="tableContent"><a class="nav-link" >{{ $arti->precio }}</a></td>
                <td class="tableContent"><a class="nav-link" >{{ $arti->descripcion }}</a></td>
                <td class="tableContent"><button type="button" class="btn dropdown" id="opcionesArticulo" data-bs-toggle="dropdown" aria-expanded="false">
                        ☰
                    </button>
                    <div class="dropdown-menu dropdown-menu-end p-3" aria-labelledby="opcionesArticulo">
                        <button class="btn btn-sm btn-primary btn-editar-articulo botonNuevaCita" 
                            data-id="{{$arti->id}}" data-nombre="{{$arti->nombre}}"data-stock="{{ $arti->stock }}" data-precio="{{ $arti->precio }}" 
                            data-descripcion="{{ $arti->descripcion }}" data-bs-toggle="modal"  data-bs-target="#editArticulo">Editar</button>
                        <button class="btn btn-sm btn-primary btn-borrar-articulo botonNuevaCita" data-id="{{$arti->id}}">Borrar</button>
                    </div>
                </td>
            </tr>
                @empty
                <tr><td>Vacio</td><td>Vacio</td><td>Vacio</td><td>Vacio</td><td>Vacio</td></tr>
                @endforelse

        </tbody>
    </table>

</div>

<!-- Modal para crear un nuevo articulo para ese proveedor -->
<div class="modal  fade" id="crearArticulo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="crearArtiModalLabel">Creación de un articulo de {{ $proveedor->nombre}}</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form id="form-arti row" method="POST" action="{{url('propietario/crearArticulo')}}">
                        @csrf
                        <input type="hidden" value="{{ $proveedor->id}}" name="idProveedor">
                        <div class="col px-2">
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="nombre">Nombre</label>
                                    <input class="form-control" type="text" id="nombre" max="20" name="nombre">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="stock">Stock Inicial</label>
                                    <input class="form-control" type="number" id="stock" name="stock">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="precio">Precio</label>
                                    <input class="form-control" type="text" id="precio" name="precio">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="descripcion">Descripcion</label>
                                    <input class="form-control" type="text" id="descripcion" name="descripcion">
                                </div>
                            </div>
                            <div class="row my-2">
                                <label class="col-form-label" for="optica">Optica</label>
                                <select class="form-control" name="idOptica">
                                    @forelse ($opticas as $op)
                                        <option value="{{$op->id}}">{{ $op->nombre}}</option>
                                    @empty
                                        <option>Vacio</option>
                                    @endforelse
                                </select>
                                <option>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" id="crearArticulo" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Crear</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
</div>

<!--Modal Editar Articulo -->
    <div class="modal fade" id="editArticulo" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="editArtiModalLabel">Editar articulo</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form id="form-arti row" method="POST" action="{{url('propietario/editarArticulo')}}">
                        @csrf
                        <input type="hidden" name="idProveedor" value="{{ $proveedor->id }}"> 
                        <input type="hidden" id="editId" name="editId" value="1">
                        <div class="col px-2">
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="nombre">Nombre</label>
                                    <input class="form-control" type="text" id="editNombre" max="20" name="nombre">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="stock">Stock Inicial</label>
                                    <input class="form-control" type="number" id="editStock" name="stock">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="precio">Precio</label>
                                    <input class="form-control" type="text" id="editPrecio" name="precio">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="descripcion">Descripcion</label>
                                    <input class="form-control" type="text" id="editDescripcion" name="descripcion">
                                </div>
                            </div>
                            <div class="row my-2">
                                <label class="col-form-label" for="optica">Optica</label>
                                <select class="form-control" name="idOptica">
                                    @forelse ($opticas as $op)
                                        <option value="{{$op->id}}">{{ $op->nombre}}</option>
                                    @empty
                                        <option>Vacio</option>
                                    @endforelse
                                </select>
                                <option>
                            </div>
                            <div class="modal-footer border-0">
                            <button type="submit" id="crearArticulo" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Editar</button>
                            </div>
                        </div>
                    </form>
                    @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as  $e)
                            <p style="color:red">{{ $e }}</p>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
<!-- Fin editar articulo -->


@endsection




<script>
    $(document).ready(function(){
        $('#articulosTable').DataTable({
            lengthMenu: [5, 10, 15, 20],

            language: {
                    url: '/js/es-ES.json'
            },
            stripeClasses: [],
            lengthChange: false, 
            pageLength: 7,
            searchable: true,
            info: false,
       })
    });
</script>
<script>
    $(document).on("click", ".btn-editar-articulo", function(){
        let id= $(this).data("id");   
        let nombre = $(this).data("nombre");
        let stock = $(this).data("stock");
        let precio = $(this).data("precio");
        let descripcion = $(this).data("descripcion");


        $("#editId").val(id);
        $("#editNombre").val(nombre);
        $("#editStock").val(stock);
        $("#editPrecio").val(precio);
        $("#editDescripcion").val(descripcion);
                
    });

    $(document).on("click", ".btn-borrar-articulo", function(){
let id = $(this).data("id");  
        let borrandourl = "{{route('borrarArticulo',  ['id' => ':id']) }}";
        console.log(id);
        Swal.fire({
        title: "¿Estas seguro?",
        text: "Esta articulo sera eliminado",
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

    })

</script>
