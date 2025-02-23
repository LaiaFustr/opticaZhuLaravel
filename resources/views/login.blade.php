<form method="post" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label>Nombre de usuario</label>
        <input type="text" name="nombreUsuario" class="form-control p_input">
    </div>
    <div class="form-group">
        <label>Contrasenia</label>
        <input type="password" name="contrasenia" class="form-control p_input">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block enter-btn">Iniciar Sesion</button>
    </div>

    
</form>