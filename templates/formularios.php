<!DOCTYPE html>
<html lang="en">

    <head>

        <base href="http://<?php print SERVER_URL; ?>" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SISAE</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/modern-business.css" rel="stylesheet">
        <link href="css/sisae.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">SISAE</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="egresado/cerrar"><span class="glyphicon glyphicon-off red" aria-hidden="true"></span></a>
                        </li>
                </div>
                <!--            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <a href="about.html">Calendario</a>
                                    </li>
                                    <li>
                                        <a href="services.html">Servicios</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="portfolio-1-col.html">1 Column Portfolio</a>
                                            </li>
                                            <li>
                                                <a href="portfolio-2-col.html">2 Column Portfolio</a>
                                            </li>
                                            <li>
                                                <a href="portfolio-3-col.html">3 Column Portfolio</a>
                                            </li>
                                            <li>
                                                <a href="portfolio-4-col.html">4 Column Portfolio</a>
                                            </li>
                                            <li>
                                                <a href="portfolio-item.html">Single Portfolio Item</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="blog-home-1.html">Blog Home 1</a>
                                            </li>
                                            <li>
                                                <a href="blog-home-2.html">Blog Home 2</a>
                                            </li>
                                            <li>
                                                <a href="blog-post.html">Blog Post</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown active">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li class="active">
                                                <a href="full-width.html">Full Width Page</a>
                                            </li>
                                            <li>
                                                <a href="sidebar.html">Sidebar Page</a>
                                            </li>
                                            <li>
                                                <a href="faq.html">FAQ</a>
                                            </li>
                                            <li>
                                                <a href="404.html">404</a>
                                            </li>
                                            <li>
                                                <a href="pricing.html">Pricing Table</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>-->
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <!-- Page Heading/Breadcrumbs -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Registro de egresados
                        <small><?php print $_SESSION[NOMBRE_VISTA] ?></small>
                    </h1>

                    <ol class="breadcrumb">
                        <li><a href="<?php print 'http://' . SERVER_URL; ?>">Home</a>
                        </li>
                        <?php
//                    print $_SERVER['REQUEST_URI'];
                        $secciones = split('/', $_SERVER['REQUEST_URI']);
                        $url = '';
                        foreach ($secciones as $seccion) {
                            if (!$seccion)
                                continue; // Si está vacío no pongas nada
                            if ($seccion . '/' == BASE_PATH)
                                continue; // No poner el nombre del sistema en los breadcrumbs
                            $url .= $seccion . "/";
                            print '<li>';
                            print '<a href="' . $url . '">' . ucfirst($seccion) . "</a>";
                            print '</li>';
                        }
                        ?> 
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <?php
            if (isset($_SESSION[MENSAJE])) {
                print '<div class="alert alert-success alert-dismissible" role="alert">';
                print $_SESSION[MENSAJE];
                print '</div>';
                unset($_SESSION[MENSAJE]);
            }
            ?>
            <!-- Content Row -->
            <div class="row">

<?php include_once $_SESSION[VISTA];
; ?>    

            </div>

            <!-- /.row -->


            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; CENAC - IPN</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
