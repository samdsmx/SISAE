<?php

class IndexController {
    public function defaultAction (){
        header("Location: http://" . SERVER_URL . "login");
    }    
    
    public function login (){
        $_SESSION[VISTA] = 'view/login.php';
        include 'templates/fullwidth.php';
    }
    
    public function cerrarSesion (){
        session_destroy();
        header("Location: http://" . SERVER_URL);
    }
}
