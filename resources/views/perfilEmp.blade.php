@extends('app')

@section('content')
<div class="container-flex containerPagina">
    <div class="row w-100 mb-4">
        <div class="col-auto me-auto">
            <h1 class="tituloPagina">Perfil Empleado de {{ $empleado->nombre }}  {{ $empleado->apellido }}</h1>
        </div>
        <div class="col d-flex justify-content-end">
            <a href="{{url('propietario/opticas')}}"><i class="fa-solid fa-x fa-lg"></i></a>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-6">
            <p>Nombre Completo</p>
            <p><strong> {{ $empleado->nombre }}  {{ $empleado->apellido }}</strong></p>
        </div>
        <div class="col-md-6">
            <p>DNI</p>
            <p><strong> {{ $empleado->dni }}</strong></p>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-6">
            <p>Dirección</p>
            <p><strong> {{ $empleado->direccion }}</strong></p>
        </div>
        <div class="col-md-6">
            <p>Teléfono</p>
            <p><strong>{{ $empleado->telefono }}</strong></p>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-6">
            <p>Correo</p>
            <p><strong> {{ $empleado->correo }}</strong></p>
        </div>
        <div class="col-md-6">
            <p>Rol</p>
            <p><strong>{{ $empleado->rol }}</strong></p>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-6">
            <p>Nombre de Usuario:</p>
            <p><strong> {{ $empleado->nombreUsuario }}</strong></p>
        </div>
        <div class="col-md-6">
            <p>Contraseña:</p>
            <p><strong> {{ $empleado->contrasenia }}</strong></p>
        </div>
    </div>
    
</div>
@endsection