<?php

class EgresadoController extends _BaseController{
    public function show (){  
        
        $dao = DAOFactory::getEgreUsuariosDAO();
        $usuario = $dao->load(1);
        
        $_SESSION[CONTENIDO] = $usuario->uSUARIO;
//        $_SESSION[CONTENIDO] = file_get_contents('view/home.php');
        include ('templates/main.php');
    }
    
    public function add ($seccion){
//        if (!isset ($_SESSION[USUARIO]) ){
//            print 'error';
//            die();
//        }
        switch ($seccion){
            case 'personal':
                $_SESSION[VISTA] = 'view/registroEgresadoDatos.php';
                break;
            case 'academico':
                $_SESSION[VISTA] = 'view/registroEgresadoAcademico.php';
                break;
            case 'contacto':
                $_SESSION[VISTA] = 'view/registroEgresadoContacto.php';
                break;
            default:
                $_SESSION[VISTA] = 'view/registroEgresadoDatos.php';
                break;
        }
        
        include ('templates/formularios.php');
    }
}