<!DOCTYPE html>
<html lang="en">

    <head>
        <base href="http://<?php print SERVER_URL; ?>" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> -- S I S A E -- </title>

        <!-- Bootstrap Core CSS -->
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        

        <!-- Custom Fonts -->
        <link href="font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    </head>

    <body>
        
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
                <div class="navbar-header">
                   <!--  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>-->
                    <a class="navbar-brand" >Super Admin SISAE v2.0</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="index/cerrarSesion"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="admin/"><i class="fa fa-home fa-fw"></i> Inicio </a>
                            </li>                            
                            <li>
                                <a href="admin/usuarios"><i class="fa fa-user-plus"></i> Agregar usuarios </a>
                            </li>
                            <li>
                                <a><i class="fa fa-book fa-fw"></i> Administrar carreras</a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="admin/carreras"><i class="fa fa-plus fa-fw"></i>Agregar Carrera</a>
                                    </li>
                                    <li>
                                        <a href="admin/asociaCarrera"> <i class="fa fa-object-group fa-fw"></i> Asociar Carrera a UR</a>
                                    </li>                                    
                                </ul>    
                            </li>
                            <!--                           
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                        </ul>
                                         /.nav-third-level 
                                    </li>
                                </ul>
                                 /.nav-second-level 
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="blank.html">Blank Page</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Login Page</a>
                                    </li>
                                </ul>
                                 /.nav-second-level 
                            </li>-->
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
            
                <h1> 
                <?=$_SESSION[NOMBRE_VISTA];?>
                </h1>
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
                <hr>
                <?php include $_SESSION[VISTA];?>
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        
        <!-- Metis Menu Plugin JavaScript -->
        <!--<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>-->

<!--         Morris Charts JavaScript 
        <script src="bower_components/raphael/raphael-min.js"></script>-->
        <!--<script src="bower_components/morrisjs/morris.min.js"></script>-->
        <!--<script src="js/morris-data.js"></script>-->

        <!-- Custom Theme JavaScript -->
        <!--<script src="js/sb-admin-2.js"></script>-->

    </body>

</html>
