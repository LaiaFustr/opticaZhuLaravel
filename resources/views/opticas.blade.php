
<head>
<link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- todos los links locales (para quefuncione sin internet) -->
     <!-- coreui -->
    <link href="/coreui/coreui.min.css" rel="stylesheet" >

    <!-- Bootstrap -->

    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="/bootstrap/bootstrap.bundle.min.js"></script> 

    <!-- font awesome -->
    <link href="{{asset('font-awesome/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/colordefault.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    
</head>

<script>
    ocultar();
</script>

    <div class="container-flex containerPagina">
        <div class="row w-100 mb-4">
            <div class="col-auto me-auto">
                <h1 class="tituloPagina">Ópticas</h1>
            </div>
            <div class="col-auto ms-auto d-flex "><button class="botonNuevaCita" onclick="location.href='{{ url('propietario/configInfo') }}'">Nueva Óptica</button></div>
        </div>
        <form action="">
            <div class="row">
                <div class="col-auto col-2">
                    <select class="form-select form-select-sm" name="Cambiar vista" id="cambiar" onchange="cambiarVista()">
                        <option value="" selected>Seleccionar opción</option>
                        <option value="{{url('propietario/opticasC')}}" >Cambiar vista</option>
                    </select>

                    <script>
                        function cambiarVista() {
                            const select = document.getElementById('cambiar');
                            const url = select.value;

                            if (url) {
                                window.location.href = url; // Redirige a la URL seleccionada
                            }
                        }

                        function ocultar(){
                            document.getElementById("menu").style.display = "none";
                        }
                    </script>
                </div>
            </div>
        </form>
        <div class="my-2">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($opticas as $op)
                    <tr>
                        <td onclick="window.location='{{route('opticaSelec', $op->id )}}'">{{$op->id}}</td>
                        <td onclick="window.location='{{route('opticaSelec', $op->id )}}'">{{$op->nombre}}</td>
                        <td onclick="window.location='{{route('opticaSelec', $op->id )}}'">{{$op->direccion}}</td>
                        <td>
                            <div>
                            <button type="button" class="btn dropdown" id="opcionesOptica" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{asset('assets/img/dots.png')}}" width="15px" height="15px" class="mt-1">
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="opcionesOptica">
                                <a class="dropdown-item" href="{{route('editarOptica', ['id' =>$op->id]) }}">Editar</a>
                                <a class="dropdown-item" href="#">Borrar</a>
                            </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>


    <!--Modal para la confirmacion de eliminacion de optica-->
    <div class="modal fade" id="borrarOpt" tabindex="-1" aria-labelledby=""
