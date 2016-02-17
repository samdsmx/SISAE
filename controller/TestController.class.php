<?php

class TestController extends _BaseController {
    
    public function testOracleDao (){        
        $daoFactory = DAOFactory::getDAOFactory();                
        $dao = $daoFactory->getEgreEgresadosDAO();
        
        $egresados = $dao->queryAll();
        var_dump($egresados);
    }
}