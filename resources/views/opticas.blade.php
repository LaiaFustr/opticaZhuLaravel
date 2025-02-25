@extends('app')

@section('content')
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($opticas as $op)
                    <tr onclick="window.location='{{route('opticaSelec', $op->id )}}'">
                        <td>{{$op->id}}</td>
                        <td>{{$op->nombre}}</td>
                        <td>{{$op->direccion}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
