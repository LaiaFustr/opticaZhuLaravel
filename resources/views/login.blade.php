@extends('layouts.prueba')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>#show-hide-passwordLog {
    background:none;
    border:none;
    font-size:1.2em;

}</style>
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
                            <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control p_input">
                        </div>
                        <div class="input-group my-2 p-2">
                            <label class="input-group-text text-center labelLogin">
                                <div class="col-1 mx-2"><button type="button" class="m-0 p-0" id="show-hide-passwordLog"><i class="fa-solid fa-lock"></i></button></div>
                                <div class="col mx-1">Contraseña</div>
                            </label>
                            <input type="password" name="contrasenia" id="contrasenia" class="form-control p_input">
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

<script>
    $('#show-hide-passwordLog').on('click', function() {
        event.preventDefault();
        $('#contrasenia').attr('type', $('#contrasenia').attr('type') == 'text' ? 'password' : 'text');

        if ($('#show-hide-passwordLog').html() == '<i class="fa-solid fa-lock"></i>') {
            //console.log('lock');
            $('#show-hide-passwordLog').html('');
            $('#show-hide-passwordLog').html('<i class="fa-solid fa-lock-open"></i>');
        } else {
            //console.log('unlock');
            $('#show-hide-passwordLog').html('');
            $('#show-hide-passwordLog').html('<i class="fa-solid fa-lock"></i>');
        }
        
    });
</script>