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
        
        $usuarios = DAOFactory::getEgreUsuariosDAO()->queryByUSUARIO($user);
        $usuario = $usuarios[0];
        if ($usuario == null){
            $_SESSION[MENSAJE_ERROR] = 'Usuario o contraseña incorrectos';
            $_SESSION[INTENTOS] ++;
            $_SESSION[VISTA] = 'view/login.php';
            include 'templates/fullwidth.php';
            return;
        }
        
        if ($usuario->contrasenia == md5($pass)){
            $_SESSION[USUARIO] = serialize($usuario);
            if ($usuario->idRol == 2){ //ESCUELA
                $responsable = DAOFactory::getEgreResponsablesUrDAO()->queryByIDUSUARIO($usuario->idUsuario);
                $_SESSION[RESPONSABLE] = serialize($responsable[0]);
                $_SESSION[ID_UNIDAD_RESPONSABLE] = $responsable->idUnidadResponsable;
                header("Location: http://" . SERVER_URL . "unidad");
                return;
            }
            header("Location: http://" . SERVER_URL . "egresado");
            
        }
    }
}
