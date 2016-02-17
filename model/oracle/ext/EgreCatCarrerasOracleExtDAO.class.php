<?php
/**
 * Class that operate on table 'egre_cat_carreras'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreCatCarrerasOracleExtDAO extends EgreCatCarrerasOracleDAO{

	public function getCarrerasByUR ($idUr){
                $sql = 'SELECT * FROM VM_UR_NOMBRES  U, EGRE_ASO_CARRERAS_UR R, EGRE_CAT_CARRERAS C 
                        WHERE U.ID_UNIDAD_RESPONSABLE = R.ID_UNIDAD_RESPONSABLE
                        AND R.ID_CARRERA = C.ID_CARRERA
                        AND U.ID_UNIDAD_RESPONSABLE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($idUr);
		return $this->getList($sqlQuery);
        }
}
?>