<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://<?php print SERVER_URL; ?>" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>SISAE</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery-1.11.1.js"></script>
     <!--BOOTSTRAP SCRIPTS-->  
    <script src="js/bootstrap.js"></script>
</head>
<body>
    
    <!-- HEADER END-->
    <div class="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="http://www.sep.gob.mx/" target="_blank">
                     <img src="image/sep.png" />
                </a>
                <a class="navbar-brand" href="http://www.ipn.mx/" target="_blank">
                     <img src="image/ipn.png" />
                </a>
            </div>
            
        </div>
    </div>
    <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">
                        <li class="dropdown">
                        </li>
                    </ul>
                </div>
            </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="index.html">Menú</a></li>
                            <li><a href="ui.html">opción 1</a></li>
                            <li><a href="table.html">opción 2</a></li>
                            <li><a href="forms.html">opción 3</a></li>
                             <li><a href="login.html">opción 4</a></li>
                            <li><a href="blank.html">opción 5</a></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    
     <!-- Page Content -->
     <div class="content-wrapper">
        <div class="container">            
            <h2><?php print $_SESSION[NOMBRE_VISTA]; ?></h2>
            <?php
            if (isset($_SESSION[MENSAJE])){
                print '<div class="alert alert-success alert-dismissible" role="alert">';
                print $_SESSION[MENSAJE];
                print '</div>';
                unset($_SESSION[MENSAJE]);
            }
            ?>
            <?php
            if (isset($_SESSION[MENSAJE_ERROR])){
                print '<div class="alert alert-danger alert-dismissible" role="alert">';
                print $_SESSION[MENSAJE_ERROR];
                print '</div>';
                unset($_SESSION[MENSAJE_ERROR]);
            }
            ?>
    <!-- Content Row -->
        <div class="row">
            <?php
            include $_SESSION[VISTA];?>
        </div>
        <!-- /.row -->
        </div>
    </div>
    <!-- /.container -->
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="http://www.ipn.mx" target="_blank">INSTITUTO POLITÉCNICO NACIONAL</a><br>
                    Unidad Profesional “Adolfo López Mateos”, Edificio de la Secretaría de Extensión e Integración Social, Planta baja
                    Av. Juan de Dios Bátiz s/n Esq. Av. Luis Enrique Erro, Zacatenco c.p. 07738, México, D.F. 
                    <br>Tels.: 57296000, 56242000 ext. 51671
                    
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    
</body>
</html>
