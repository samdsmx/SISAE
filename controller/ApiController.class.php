<?php

class ApiController extends _BaseController {
    
    function getCarreras ($idUnidadResponsable){
        
        $carreras = DAOFactory::getDAOFactory()->getEgreCatCarrerasDAO()->getCarrerasByUR($idUnidadResponsable);
        
        print json_encode($carreras);
    }
}