<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class OracleDAOFactory extends DAOFactory{
	
	/**
	 * @return CipnCatEstadosDAO
	 */
	public  function getCipnCatEstadosDAO(){
		return new CipnCatEstadosOracleExtDAO();
	}

	/**
	 * @return CipnCatEstadosCivilesDAO
	 */
	public  function getCipnCatEstadosCivilesDAO(){
		return new CipnCatEstadosCivilesOracleExtDAO();
	}

	/**
	 * @return CipnCatGenerosDAO
	 */
	public  function getCipnCatGenerosDAO(){
		return new CipnCatGenerosOracleExtDAO();
	}

	/**
	 * @return CipnCatGentiliciosDAO
	 */
	public  function getCipnCatGentiliciosDAO(){
		return new CipnCatGentiliciosOracleExtDAO();
	}

	/**
	 * @return CipnCatUnidadesResponsablesDAO
	 */
	public  function getCipnCatUnidadesResponsablesDAO(){
		return new CipnCatUnidadesResponsablesOracleExtDAO();
	}

	/**
	 * @return EgreAsoCarrerasUrDAO
	 */
	public  function getEgreAsoCarrerasUrDAO(){
		return new EgreAsoCarrerasUrOracleExtDAO();
	}

	/**
	 * @return EgreAsoEgreDomExtDAO
	 */
	public  function getEgreAsoEgreDomExtDAO(){
		return new EgreAsoEgreDomExtOracleExtDAO();
	}

	/**
	 * @return EgreAsoEgreDomiciliosDAO
	 */
	public  function getEgreAsoEgreDomiciliosDAO(){
		return new EgreAsoEgreDomiciliosOracleExtDAO();
	}

	/**
	 * @return EgreAsoHashtagsNoticiasDAO
	 */
	public  function getEgreAsoHashtagsNoticiasDAO(){
		return new EgreAsoHashtagsNoticiasOracleExtDAO();
	}

	/**
	 * @return EgreAsociacionesDAO
	 */
	public  function getEgreAsociacionesDAO(){
		return new EgreAsociacionesOracleExtDAO();
	}

	/**
	 * @return EgreBitacoraDAO
	 */
	public  function getEgreBitacoraDAO(){
		return new EgreBitacoraOracleExtDAO();
	}

	/**
	 * @return EgreBitacoraValidacionesDAO
	 */
	public  function getEgreBitacoraValidacionesDAO(){
		return new EgreBitacoraValidacionesOracleExtDAO();
	}

	/**
	 * @return EgreCapacitacionesDAO
	 */
	public  function getEgreCapacitacionesDAO(){
		return new EgreCapacitacionesOracleExtDAO();
	}

	/**
	 * @return EgreCatCarrerasDAO
	 */
	public  function getEgreCatCarrerasDAO(){
		return new EgreCatCarrerasOracleExtDAO();
	}

	/**
	 * @return EgreCatEstatusEgreDAO
	 */
	public  function getEgreCatEstatusEgreDAO(){
		return new EgreCatEstatusEgreOracleExtDAO();
	}

	/**
	 * @return EgreCatFormasTitulacionDAO
	 */
	public  function getEgreCatFormasTitulacionDAO(){
		return new EgreCatFormasTitulacionOracleExtDAO();
	}

	/**
	 * @return EgreCatMediosContactoDAO
	 */
	public  function getEgreCatMediosContactoDAO(){
		return new EgreCatMediosContactoOracleExtDAO();
	}

	/**
	 * @return EgreCatMotivosInterrupcionDAO
	 */
	public  function getEgreCatMotivosInterrupcionDAO(){
		return new EgreCatMotivosInterrupcionOracleExtDAO();
	}

	/**
	 * @return EgreCatMotivosNotitulacionDAO
	 */
	public  function getEgreCatMotivosNotitulacionDAO(){
		return new EgreCatMotivosNotitulacionOracleExtDAO();
	}

	/**
	 * @return EgreCatMovsBitacoraDAO
	 */
	public  function getEgreCatMovsBitacoraDAO(){
		return new EgreCatMovsBitacoraOracleExtDAO();
	}

	/**
	 * @return EgreCatRolesDAO
	 */
	public  function getEgreCatRolesDAO(){
		return new EgreCatRolesOracleExtDAO();
	}

	/**
	 * @return EgreCatTipoCapacitacionesDAO
	 */
	public  function getEgreCatTipoCapacitacionesDAO(){
		return new EgreCatTipoCapacitacionesOracleExtDAO();
	}

	/**
	 * @return EgreContactosEgresadosDAO
	 */
	public  function getEgreContactosEgresadosDAO(){
		return new EgreContactosEgresadosOracleExtDAO();
	}

	/**
	 * @return EgreDatosAcadsExternosDAO
	 */
	public  function getEgreDatosAcadsExternosDAO(){
		return new EgreDatosAcadsExternosOracleExtDAO();
	}

	/**
	 * @return EgreDatosAcadsIpnDAO
	 */
	public  function getEgreDatosAcadsIpnDAO(){
		return new EgreDatosAcadsIpnOracleExtDAO();
	}

	/**
	 * @return EgreDomiciliosDAO
	 */
	public  function getEgreDomiciliosDAO(){
		return new EgreDomiciliosOracleExtDAO();
	}

	/**
	 * @return EgreDomiciliosExtranjerosDAO
	 */
	public  function getEgreDomiciliosExtranjerosDAO(){
		return new EgreDomiciliosExtranjerosOracleExtDAO();
	}

	/**
	 * @return EgreEgresadosDAO
	 */
	public  function getEgreEgresadosDAO(){
            
		return new EgreEgresadosOracleDAO();
	}

	/**
	 * @return EgreExpLaboralesDAO
	 */
	public  function getEgreExpLaboralesDAO(){
		return new EgreExpLaboralesOracleExtDAO();
	}

	/**
	 * @return EgreHabilidadesDAO
	 */
	public  function getEgreHabilidadesDAO(){
		return new EgreHabilidadesOracleExtDAO();
	}

	/**
	 * @return EgreHashtagsDAO
	 */
	public  function getEgreHashtagsDAO(){
		return new EgreHashtagsOracleExtDAO();
	}

	/**
	 * @return EgreIdiomasEgresadosDAO
	 */
	public  function getEgreIdiomasEgresadosDAO(){
		return new EgreIdiomasEgresadosOracleExtDAO();
	}

	/**
	 * @return EgreNoticiasDAO
	 */
	public  function getEgreNoticiasDAO(){
		return new EgreNoticiasOracleExtDAO();
	}

	/**
	 * @return EgrePublicacionesDAO
	 */
	public  function getEgrePublicacionesDAO(){
		return new EgrePublicacionesOracleExtDAO();
	}

	/**
	 * @return EgreResponsablesUrDAO
	 */
	public  function getEgreResponsablesUrDAO(){
		return new EgreResponsablesUrOracleExtDAO();
	}

	/**
	 * @return EgreUsuariosDAO
	 */
	public  function getEgreUsuariosDAO(){
		return new EgreUsuariosOracleExtDAO();
	}

        /**
	 * @return EgreUrNombreDAO
	 */
        public  function getEgreUrNombresDAO(){
		return new EgreUrNombresOracleExtDAO();
	}
}
?>