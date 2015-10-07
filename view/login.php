

<link href="css/login.css" rel="stylesheet">


<div class="col-md-7">
    <div class="container main-container">
  
    <div id="carousel-example-generic" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <!-- First slide -->
        <div class="item active grey">
          <div class="carousel-caption"> 
              <h3 data-animation="animated flipInX">This is the caption for slide 3</h3>
              <img src="image/requisitos.jpg" alt="Chania" style="width: 100%">
          </div>
        </div> <!-- /.item -->       
        <!-- Second slide -->
        <div class="item grey">
          <div class="carousel-caption">
              <h3 data-animation="animated flipInX">Credencial de egresado</h3>
            <img src="image/Carrusel6.jpg" alt="Chania" style="width: 100%">
          </div>
        </div><!-- /.item -->
        <!-- Third slide -->
        <div class="item grey">
          <div class="carousel-caption">
             
            <h3 data-animation="animated flipInX">Bolsa de trabajo</h3>
            <img src="http://lorempixel.com/400/200" alt="Chania" style="width: 100%">
            <button class="btn btn-primary btn-lg" data-animation="animated lightSpeedIn">Button</button>
          </div>
        </div><!-- /.item -->
      </div><!-- /.carousel-inner -->

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div><!-- /.carousel -->

</div><!-- /.container -->
</div>
<div class="col-md-5">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Inicia sesión</h1><br>
            <form action="login/check" method="POST">
                <input type="text" name="user" placeholder="Username">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
            </form>

            <div class="login-help center-block center">
                <!--<a href="egresado/agregar">Registrate</a> <br>-->
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <a href="egresado/agregar">Registrate aquí</a>
        </div>
    </div>
    
</div>