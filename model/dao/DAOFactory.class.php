<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return CipnCatEstadosDAO
	 */
	public static function getCipnCatEstadosDAO(){
		return new CipnCatEstadosMySqlExtDAO();
	}

	/**
	 * @return CipnCatEstadosCivilesDAO
	 */
	public static function getCipnCatEstadosCivilesDAO(){
		return new CipnCatEstadosCivilesMySqlExtDAO();
	}

	/**
	 * @return CipnCatGenerosDAO
	 */
	public static function getCipnCatGenerosDAO(){
		return new CipnCatGenerosMySqlExtDAO();
	}

	/**
	 * @return CipnCatGentiliciosDAO
	 */
	public static function getCipnCatGentiliciosDAO(){
		return new CipnCatGentiliciosMySqlExtDAO();
	}

	/**
	 * @return CipnCatUnidadesResponsablesDAO
	 */
	public static function getCipnCatUnidadesResponsablesDAO(){
		return new CipnCatUnidadesResponsablesMySqlExtDAO();
	}

	/**
	 * @return EgreAsoCarrerasUrDAO
	 */
	public static function getEgreAsoCarrerasUrDAO(){
		return new EgreAsoCarrerasUrMySqlExtDAO();
	}

	/**
	 * @return EgreAsoEgreDomExtDAO
	 */
	public static function getEgreAsoEgreDomExtDAO(){
		return new EgreAsoEgreDomExtMySqlExtDAO();
	}

	/**
	 * @return EgreAsoEgreDomiciliosDAO
	 */
	public static function getEgreAsoEgreDomiciliosDAO(){
		return new EgreAsoEgreDomiciliosMySqlExtDAO();
	}

	/**
	 * @return EgreAsoHashtagsNoticiasDAO
	 */
	public static function getEgreAsoHashtagsNoticiasDAO(){
		return new EgreAsoHashtagsNoticiasMySqlExtDAO();
	}

	/**
	 * @return EgreAsociacionesDAO
	 */
	public static function getEgreAsociacionesDAO(){
		return new EgreAsociacionesMySqlExtDAO();
	}

	/**
	 * @return EgreBitacoraDAO
	 */
	public static function getEgreBitacoraDAO(){
		return new EgreBitacoraMySqlExtDAO();
	}

	/**
	 * @return EgreBitacoraValidacionesDAO
	 */
	public static function getEgreBitacoraValidacionesDAO(){
		return new EgreBitacoraValidacionesMySqlExtDAO();
	}

	/**
	 * @return EgreCapacitacionesDAO
	 */
	public static function getEgreCapacitacionesDAO(){
		return new EgreCapacitacionesMySqlExtDAO();
	}

	/**
	 * @return EgreCatCarrerasDAO
	 */
	public static function getEgreCatCarrerasDAO(){
		return new EgreCatCarrerasMySqlExtDAO();
	}

	/**
	 * @return EgreCatEstatusEgreDAO
	 */
	public static function getEgreCatEstatusEgreDAO(){
		return new EgreCatEstatusEgreMySqlExtDAO();
	}

	/**
	 * @return EgreCatFormasTitulacionDAO
	 */
	public static function getEgreCatFormasTitulacionDAO(){
		return new EgreCatFormasTitulacionMySqlExtDAO();
	}

	/**
	 * @return EgreCatMediosContactoDAO
	 */
	public static function getEgreCatMediosContactoDAO(){
		return new EgreCatMediosContactoMySqlExtDAO();
	}

	/**
	 * @return EgreCatMotivosInterrupcionDAO
	 */
	public static function getEgreCatMotivosInterrupcionDAO(){
		return new EgreCatMotivosInterrupcionMySqlExtDAO();
	}

	/**
	 * @return EgreCatMotivosNotitulacionDAO
	 */
	public static function getEgreCatMotivosNotitulacionDAO(){
		return new EgreCatMotivosNotitulacionMySqlExtDAO();
	}

	/**
	 * @return EgreCatMovsBitacoraDAO
	 */
	public static function getEgreCatMovsBitacoraDAO(){
		return new EgreCatMovsBitacoraMySqlExtDAO();
	}

	/**
	 * @return EgreCatRolesDAO
	 */
	public static function getEgreCatRolesDAO(){
		return new EgreCatRolesMySqlExtDAO();
	}

	/**
	 * @return EgreCatTipoCapacitacionesDAO
	 */
	public static function getEgreCatTipoCapacitacionesDAO(){
		return new EgreCatTipoCapacitacionesMySqlExtDAO();
	}

	/**
	 * @return EgreContactosEgresadosDAO
	 */
	public static function getEgreContactosEgresadosDAO(){
		return new EgreContactosEgresadosMySqlExtDAO();
	}

	/**
	 * @return EgreDatosAcadsExternosDAO
	 */
	public static function getEgreDatosAcadsExternosDAO(){
		return new EgreDatosAcadsExternosMySqlExtDAO();
	}

	/**
	 * @return EgreDatosAcadsIpnDAO
	 */
	public static function getEgreDatosAcadsIpnDAO(){
		return new EgreDatosAcadsIpnMySqlExtDAO();
	}

	/**
	 * @return EgreDomiciliosDAO
	 */
	public static function getEgreDomiciliosDAO(){
		return new EgreDomiciliosMySqlExtDAO();
	}

	/**
	 * @return EgreDomiciliosExtranjerosDAO
	 */
	public static function getEgreDomiciliosExtranjerosDAO(){
		return new EgreDomiciliosExtranjerosMySqlExtDAO();
	}

	/**
	 * @return EgreEgresadosDAO
	 */
	public static function getEgreEgresadosDAO(){
		return new EgreEgresadosMySqlExtDAO();
	}

	/**
	 * @return EgreExpLaboralesDAO
	 */
	public static function getEgreExpLaboralesDAO(){
		return new EgreExpLaboralesMySqlExtDAO();
	}

	/**
	 * @return EgreHabilidadesDAO
	 */
	public static function getEgreHabilidadesDAO(){
		return new EgreHabilidadesMySqlExtDAO();
	}

	/**
	 * @return EgreHashtagsDAO
	 */
	public static function getEgreHashtagsDAO(){
		return new EgreHashtagsMySqlExtDAO();
	}

	/**
	 * @return EgreIdiomasEgresadosDAO
	 */
	public static function getEgreIdiomasEgresadosDAO(){
		return new EgreIdiomasEgresadosMySqlExtDAO();
	}

	/**
	 * @return EgreNoticiasDAO
	 */
	public static function getEgreNoticiasDAO(){
		return new EgreNoticiasMySqlExtDAO();
	}

	/**
	 * @return EgrePublicacionesDAO
	 */
	public static function getEgrePublicacionesDAO(){
		return new EgrePublicacionesMySqlExtDAO();
	}

	/**
	 * @return EgreResponsablesUrDAO
	 */
	public static function getEgreResponsablesUrDAO(){
		return new EgreResponsablesUrMySqlExtDAO();
	}

	/**
	 * @return EgreUsuariosDAO
	 */
	public static function getEgreUsuariosDAO(){
		return new EgreUsuariosMySqlExtDAO();
	}


}
?>