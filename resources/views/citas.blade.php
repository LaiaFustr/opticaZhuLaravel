@extends('app')

@section('content')
    <div class="container-flex containerPagina">
        <div class="row w-100 mb-4">
            <div class="col-auto me-auto">
                <h1 class="tituloPagina">Citas</h1>
            </div>
            <div class="col-auto ms-auto d-flex "><button class="botonNuevaCita">Nueva Cita</button></div>
        </div>
        <form action="">
            <div class="row">
                <div class="col-auto col-2">
                    <select class="form-select form-select-sm" name="Cambiar vista" id="">
                        <option value=""selected  disabled>Cambiar vista</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="my-3">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Hora</th>
                        <th>Nombre y Apellidos</th>
                        <th>Motivo de la cita</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>08:00</td>
                        <td>Juan Pérez</td>
                        <td>Cambio de graduación</td>
                    </tr>
                    <tr>
                        <td>09:00</td>
                        <td>María García</td>
                        <td>Revisión</td>
                    </tr>
                    <tr>
                        <td>10:00</td>
                        <td>Carlos López</td>
                        <td>Revisión</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
