@extends('app')

@section('content')
<div class="container-flex containerPagina">
    <div class="row w-100 mb-4">
        <div class="col-auto me-auto">
            <h1 class="tituloPagina">Ópticas</h1>
        </div>
        <div class="col-auto ms-auto d-flex">
            <button class="botonNuevaCita" onclick="location.href='{{ url('propietario/configInfo') }}'">Nueva Óptica</button>
        </div>
    </div>
    <form action="">
        <div class="row">
            <div class="col-auto col-2">
            <select class="form-select form-select-sm" name="Cambiar vista" id="cambiar" onchange="cambiarVista()">
                    <option value="" selected>Seleccionar opción</option>
                    <option value="{{url('propietario/opticas')}}" >Cambiar vista</option>
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

    <div class="row">
    @foreach ($opticas as $op)
        <div class="col-md-4">
            <div class="card my-3 carta" onclick="window.location='{{route('opticaSelec', $op->id )}}'">
                <div class="card-body">
                    <ul class="lista">
                        <li><strong>Nombre:</strong> {{ $op->nombre }}</li>
                        <li><strong>Dirección:</strong> {{ $op->direccion }}</li>
                    </ul>
                </div>
                <div class="card-footer cartaFooter">
                    <h5 style="text-align: center">{{ $op->nombre }}</h5>
                </div>
            </div>
        </div>
    @endforeach
    </div>


       {{--  <div class="col-md-4">
            <div class="card my-3 carta">
                <div class="card-body ">
                    <ul class="lista">
                        <li>Nombre: Óptica Zhu Colón</li>
                        <li>Dirección: Calle Colón</li>
                    </ul>
                </div>
                <div class="card-footer cartaFooter"><h5 style="text-align: center">Óptica Zhu Colon</h5></div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
