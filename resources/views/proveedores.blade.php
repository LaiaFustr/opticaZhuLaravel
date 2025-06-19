<head>
<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/bootstrap.min.css') }}">
<script language="javascript" type="text/javascript" src="{{asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
<link href="{{ asset('Font-Awesome/css/all.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
@if(session("proveditado"))
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
@if(session("provcreado"))
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
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}"> -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/card.css') }}"> -->
</head>

@extends('app')

@section('content')
<div class="container-flex containerPagina">
    <div class="row w-100 mb-4">
        <div class="col-auto me-auto">
            <h1 class="tituloPagina">Proveedores</h1>
        </div>
        <div class="col-auto ms-auto d-flex ">
            <button class="botonNuevaCita" data-bs-toggle="modal" data-bs-target="#crearProveedor">Nuevo Proveedor</button>
        </div>

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
            <th class="tableDate">NIF</th>
            <th class="tableInfo">Nombre</th>
            <th class="tableInfo">Direccion</th>
            <th class="tableInfo">Correo</th>
            <th class="tableInfo">Telefono</th>
            <th class="tableInfo">Codigo Postal</th>
            <th class="tableInfo" style="border-top-right-radius: 5px"></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>


<!-- Modal para crear un nuevo proveedor -->
<div class="modal  fade" id="crearProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="crearProveeModalLabel">Creación de un proveedor</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form id="form-arti row" method="POST" action="{{url('propietario/crearProveedor')}}">
                        @csrf
                        <div class="col px-2">
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="nif">NIF</label>
                                    <input class="form-control" type="text" id="nif" max="9" name="nif">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="nombre">Nombre</label>
                                    <input class="form-control" type="text" id="nombre" max="30" name="nombre">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="direccion">Direccion</label>
                                    <input class="form-control" type="text" id="direccion" name="direccion">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="correo">Correo</label>
                                    <input class="form-control" type="text" id="correo" name="correo">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="telefono">Telefono</label>
                                    <input class="form-control" type="text" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="codPostal">Codigo Postal</label>
                                    <input class="form-control" type="text" id="codPostal" name="codPostal">
                                </div>    
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" id="crearProveedor" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Crear</button>
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

<!--Modal Editar Proveedor -->
    <div class="modal fade" id="editProveedor" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="w-100 row mx-1 border-bottom pt-2 pb-3">
                        <div class="col-auto d-flex align-items-center">
                            <h5 class="modal-title tituloModal" id="crearArtiModalLabel">Editar proveedor</h5>
                        </div>
                        <div class="col-auto ms-auto d-flex align-items-center"><button type="button" class="ms-auto btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div class="modal-body mt-2 mb-3">
                    <form id="form-arti row" method="POST" action="{{url('propietario/editarProveedor')}}">
                        @csrf
                        <input type="hidden" id="editid" name="id" value="1">
                        <div class="col px-2">
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="editnif">NIF</label>
                                    <input class="form-control" type="text" id="editnif" max="9" name="nif">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="editnombre">Nombre</label>
                                    <input class="form-control" type="text" id="editnombre" max="30" name="nombre">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="editdireccion">Direccion</label>
                                    <input class="form-control" type="text" id="editdireccion" name="direccion">
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="col-form-label" for="editcorreo">Correo</label>
                                    <input class="form-control" type="text" id="editcorreo" name="correo">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="edittelefono">Telefono</label>
                                    <input class="form-control" type="text" id="edittelefono" name="telefono">
                                </div>
                                <div class="col">
                                    <label class="col-form-label" for="editcodPostal">Codigo Postal</label>
                                    <input class="form-control" type="text" id="editcodPostal" name="codPostal">
                                </div>    
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="submit" id="editarProveedor" class="botonFooterModal mx-3 mb-2" data-bs-dismiss="modal">Enviar</button>
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
<!-- Fin editar proveedor -->


<script>
    $(document).ready(function(){
        $('#proveedoresTable').DataTable({
            processing: true,

            ajax: '{{ route("getProveedores") }}',
            columns: [
                { data: 'nif', name: 'nif', className: 'tableDateContent' },
                { data: 'nombre', name: 'nombre', className: 'tableContent' },
                { data: 'direccion', name: 'direccion', className: 'tableContent' },
                { data: 'correo', name: 'correo', className: 'tableContent' },
                { data: 'telefono', name: 'telefono', className: 'tableContent' },
                { data: 'codPostal', name: 'codPostal', className: 'tableContent' },
                { data: 'action', searchable: true, className: 'tableContent'}
            ],
            language: {
                    url: '/js/es-ES.json'
            },


            lengthChange: false, 
            pageLength: 7,
            info: false,    
            searchable: true,
            stripeClasses: [],
       })
    });


    $(document).on("click", ".btn-editar-proveedor", function(){
        let id= $(this).data("id"); 
        let nif = $(this).data("nif");  
        let nombre = $(this).data("nombre");
        let direccion = $(this).data("direccion");
        let correo = $(this).data("correo");
        let telefono = $(this).data("telefono");
        let codPostal = $(this).data("codpostal");

        $("#editid").val(id);
        $("#editnif").val(nif);
        $("#editnombre").val(nombre);
        $("#editdireccion").val(direccion);
        $("#editcorreo").val(correo);
        $("#edittelefono").val(telefono);
        $("#editcodPostal").val(codPostal);
                
    });

    $(document).on("click", ".btn-borrar-proveedor", function(){
        let id = $(this).data("id");  
        let borrandourl = "{{route('borrarProveedor',  ['id' => ':id']) }}";
        console.log(id);
        Swal.fire({
        title: "¿Estas seguro?",
        text: "Este proveedor junto con sus ARTICULOS y PEDIDOS seran ELIMINADOS",
        icon: "warning",
        background: '#ffffff',
        color: 'black',
        showCancelButton: true,
        confirmButtonText: "Confirmar",
        confirmButtonColor: "red",
        cancelButtonText: "Cancelar"
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = borrandourl.replace(":id", id);
        }
        });
    });

</script>

<script>
    document.addEventListener("DOMContentLoaded", function(){

    });

</script>

@endsection