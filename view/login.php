

<link href="css/login.css" rel="stylesheet">

<div id="login-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Inicia sesión</h1><br>
            <form action="login/check" method="POST">
                <input type="text" name="user" placeholder="Username">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
            </form>

            <div class="login-help center-block center">
                <a href="egresado/agregar">Registrate</a> <br>
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>
</div>