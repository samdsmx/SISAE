<?php

class LoginController {
    public function defaultAction (){
        if (!isset($_SESSION[INTENTOS])) {
            $_SESSION[INTENTOS] = 0;
        }

        //TODO verificar número de intentos
        $_SESSION[VISTA] = 'view/login.php';
        //include 'templates/fullwidth.php';
        include 'templates/base.php';
    }    
    
    public function check (){
        $user = filter_input(INPUT_POST, 'user');
        $pass = filter_input(INPUT_POST, 'pass');
        
        $dao = DAOFactory::getDAOFactory();
        $usuarios = $dao->getEgreUsuariosDAO()->queryByUSUARIO($user);
//        $usuarios = DAOFactory::getDAOFactory(DAOFactory::$ORACLE)->getEgreUsuariosDAO()->queryByUSUARIO($user);
        $usuario = $usuarios[0];        
        if ($usuario == null){
            $this->errorLogin();          
            return ;
        }
        
        if ($usuario->contrasenia == md5($pass)){
            $datosEgre = DAOFactory::getDAOFactory()->getEgreEgresadosDAO()->queryByIDUSUARIO($usuario->idUsuario);            
            $_SESSION[EGRESADO][DATOS] = serialize ($datosEgre[0]);
            $_SESSION[USUARIO] = serialize($usuario);
            //print_r($_SESSION[USUARIO]);
            if ($usuario->idRol == 2){ //ESCUELA
                $dao = DAOFactory::getDAOFactory();
                $responsable = $dao->getEgreResponsablesUrDAO()->queryByIDUSUARIO($usuario->idUsuario);
                $_SESSION[RESPONSABLE] = serialize($responsable[0]);
                $_SESSION[ID_UNIDAD_RESPONSABLE] = $responsable->idUnidadResponsable;
                header("Location: http://" . SERVER_URL . "unidad");                
                exit ();
            }
            if ($usuario->idRol == 3){ //Administrador                
                header("Location: http://" . SERVER_URL . "admin");     
                exit ();
            }
            header("Location: http://" . SERVER_URL . "egresado");
            
        }
        else{
            $this->errorLogin();
        }
    }
    
    private function errorLogin (){
        $_SESSION[MENSAJE_ERROR] = 'Usuario o contraseña incorrectos';
            $_SESSION[INTENTOS] ++;
            $_SESSION[VISTA] = 'view/login.php';
            include 'templates/base.php';
            return;
    }
}
