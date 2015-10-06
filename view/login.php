

<link href="css/login.css" rel="stylesheet">
<div class="col-md-5">
    <div class="modal-dialog"></div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="http://lorempixel.com/400/200" alt="Chania">
            </div>

            <div class="item">
                <img src="http://lorempixel.com/400/201" alt="Chania">
            </div>

            <div class="item">
                <img src="http://lorempixel.com/401/200" alt="Flower">
            </div>

            <div class="item">
                <img src="http://lorempixel.com/401/201" alt="Flower">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="col-md-7">
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