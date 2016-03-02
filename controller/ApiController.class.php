<?php

class ApiController extends _BaseController {
    
    function getCarreras ($idUnidadResponsable){
        
        $carreras = DAOFactory::getDAOFactory()->getEgreCatCarrerasDAO()->getCarrerasByUR($idUnidadResponsable);
        
        print json_encode($carreras);
    }
    
    function getAsentamientos($idCodigoPostal){
        
        $asentamientos = DAOFactory::getDAOFactory()->getEgreCPAsentamientoDAO()->queryByIDCODIGOPOSTAL($idCodigoPostal);
        
        print json_encode($asentamientos);
        
    }
    
    function verificaCurp($curp){
        $curp = DAOFactory::getDAOFactory()->getEgreEgresadosDAO()->getCurpEgre($idUr);
    }
    
}