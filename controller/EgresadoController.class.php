<?php

class EgresadoController extends _BaseController{
    public function show (){  
        
        $dao = DAOFactory::getEgreUsuariosDAO();
        $usuario = $dao->load(1);
        
        $_SESSION[CONTENIDO] = $usuario->uSUARIO;
//        $_SESSION[CONTENIDO] = file_get_contents('view/home.php');
        include ('templates/main.php');
    }
    
    public function ejemplo ($p1, $p2, $p3){
        if (!isset ($_SESSION[USUARIO]) ){
            print 'error';
            die();
        }
        print $p1 . $p2 . $p3;
        $_SESSION[CONTENIDO] = file_get_contents('view/ejemplo.php');
        include ('templates/main.php');
    }
}