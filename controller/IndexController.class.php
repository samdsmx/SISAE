<?php

class IndexController {
    public function defaultAction (){
        header("Location: http://" . SERVER_URL . "egresado/agregar/");
    }    
}
