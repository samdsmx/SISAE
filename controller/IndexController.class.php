<?php

class IndexController {
    public function defaultAction (){
        $_SESSION[CONTENIDO] = file_get_contents("view/ejemplo.php");
        include "templates/main.php";
    }
    public function login (){
        $_SESSION[CONTENIDO] = file_get_contents("view/home.php");
        include "templates/main.php";
    }
}
