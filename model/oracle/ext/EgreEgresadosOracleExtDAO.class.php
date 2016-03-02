<?php
/**
 * Class that operate on table 'egre_egresados'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreEgresadosOracleExtDAO extends EgreEgresadosOracleDAO{

    public function __construct() {
//        print 'Se creó EgreEgresadosOracleExtDAO';
    }
    
    public function getCurpEgre ($idUr){
                $sql = "SELECT * FROM EGRE_EGRESADOS A WHERE UPPER(A.CURP) LIKE UPPER('?') ";
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($idUr);
		return $this->getList($sqlQuery);
    }
}
?>