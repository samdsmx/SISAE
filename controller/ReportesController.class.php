<?php

class ReportesController extends _BaseController {
    
    public function genero (){
        $_SESSION[NOMBRE_VISTA] = 'Reportes';
        $_SESSION[VISTA] = 'view/reportes/reportes.php';
        include 'templates/unidad.php';
    }
}