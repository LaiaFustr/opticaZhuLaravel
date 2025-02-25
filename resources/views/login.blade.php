@extends('layouts.prueba')
<?php use Illuminate\Support\Facades\Log;?>
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-6">
            <div class="row p-3">
                <img src="/assets/img/verdinaranjaTrayecto.svg" class="logo" alt="OpticasZhu">
            </div>
            <div class="row p-3">
                <div class="card cardLogin">

                    <form class="login" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group my-2 p-2">
                            <label class="input-group-text text-center labelLogin">
                                <div class="col-1 mx-2"><i class="fa-solid fa-id-card"></i></div>
                                <div class="col mx-1">Nombre de usuario</div>
                            </label>
                            <input type="text" name="nombreUsuario" class="form-control p_input">
                        </div>
                        <div class="input-group my-2 p-2">
                            <label class="input-group-text text-center labelLogin">
                                <div class="col-1 mx-2"><button class="btn m-0 p-0"><i class="fa-solid fa-lock"></i></button></div>
                                <div class="col mx-1">Contraseña</div>
                            </label>
                            <input type="password" name="contrasenia" class="form-control p_input">
                        </div>

                        <div class="text-center my-2 p-2">
                            <button type="submit" class="btn btn-warning botonNaranja btn-block enter-btn W-100">Iniciar Sesion</button>
                        </div>

                    </form>

                </div> 
            </div>
        </div>
    </div>
</div>