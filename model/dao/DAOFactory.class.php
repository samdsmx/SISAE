<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: $;date}
 */
abstract class DAOFactory{
	
    public static $MYSQL = 'mysql';
    public static $ORACLE = 'oracle';
    
    public static function getDAOFactory () {
        
        $whichFactory = self::$ORACLE;
        
        if ($whichFactory == self::$MYSQL){
            return new MySQLDAOFactory();
        }
        if ($whichFactory == self::$ORACLE){            
            return new OracleDAOFactory();
        }
        return null;
    }
    

        public abstract function getCipnCatCodigoPostalDAO();	
	public abstract function getCipnCatEstadosDAO();		
	public abstract function getCipnCatEstadosCivilesDAO();		
	public abstract function getCipnCatGenerosDAO();
	public abstract function getCipnCatGentiliciosDAO();
	public abstract function getCipnCatUnidadesResponsablesDAO();
	public abstract function getEgreAsoCarrerasUrDAO();
	public abstract function getEgreAsoEgreDomExtDAO();
	public abstract function getEgreAsoEgreDomiciliosDAO();
	public abstract function getEgreAsoHashtagsNoticiasDAO();
	public abstract function getEgreAsociacionesDAO();
	public abstract function getEgreBitacoraDAO();
	public abstract function getEgreBitacoraValidacionesDAO();
	public abstract function getEgreCapacitacionesDAO();
	public abstract function getEgreCatCarrerasDAO();
	public abstract function getEgreCatEstatusEgreDAO();
	public abstract function getEgreCatFormasTitulacionDAO();
	public abstract function getEgreCatMediosContactoDAO();
	public abstract function getEgreCatMotivosInterrupcionDAO();
	public abstract function getEgreCatMotivosNotitulacionDAO();
	public abstract function getEgreCatMovsBitacoraDAO();
	public abstract function getEgreCatRolesDAO();
	public abstract function getEgreCatTipoCapacitacionesDAO();
	public abstract function getEgreContactosEgresadosDAO();
	public abstract function getEgreDatosAcadsExternosDAO();
	public abstract function getEgreDatosAcadsIpnDAO();
	public abstract function getEgreDomiciliosDAO();
	public abstract function getEgreDomiciliosExtranjerosDAO();
	public abstract function getEgreEgresadosDAO();
	public abstract function getEgreExpLaboralesDAO();
	public abstract function getEgreHabilidadesDAO();
	public abstract function getEgreHashtagsDAO();
	public abstract function getEgreIdiomasEgresadosDAO();
	public abstract function getEgreNoticiasDAO();
	public abstract function getEgrePublicacionesDAO();
	public abstract function getEgreResponsablesUrDAO();
	public abstract function getEgreUsuariosDAO();
        public abstract function getEgreUrNombresDAO();
}
?>