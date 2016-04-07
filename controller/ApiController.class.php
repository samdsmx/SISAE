<?php

class ApiController extends _BaseController {
    
    function getCarreras ($idUnidadResponsable){
        
        $carreras = DAOFactory::getDAOFactory()->getEgreCatCarrerasDAO()->getCarrerasByUR($idUnidadResponsable);
        
        print json_encode($carreras);
    }
    
    function getCodigosPostales(){
        $codigosPostales = DAOFactory::getDAOFactory()->getCipnCatCodigoPostalDAO()->queryAll();
        print json_encode($codigosPostales);
    }
    
    function getAsentamientos($idCodigoPostal){
        
        $asentamientos = DAOFactory::getDAOFactory()->getEgreCPAsentamientoDAO()->queryByIDCODIGOPOSTAL($idCodigoPostal);
        
        print json_encode($asentamientos);
        
    }
    
    function verificaCurp($curp){
        $curp = DAOFactory::getDAOFactory()->getEgreEgresadosDAO()->getCurpEgre($idUr);
    }
    
    function userExist ($correo){
        $user = DAOFactory::getDAOFactory()->getEgreUsuariosDAO()->queryByUSUARIO($correo);        
        print  json_encode ($user[0]->idUsuario);
    }
}