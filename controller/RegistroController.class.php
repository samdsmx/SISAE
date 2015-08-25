<?php

class RegistroController extends _BaseController {
    
    public function alumno (){
        $_SESSION[CONTENIDO] = 'Registrando alumno';
        include_once 'templates/main.php';
    }
}