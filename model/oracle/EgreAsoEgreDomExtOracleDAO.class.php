<?php
/**
 * Class that operate on table 'egre_aso_egre_dom_ext'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreAsoEgreDomExtOracleDAO implements EgreAsoEgreDomExtDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreAsoEgreDomExtOracle 
	 */
	public function load($idDomicilioExt, $idEgresado){
		$sql = 'SELECT * FROM egre_aso_egre_dom_ext WHERE ID_DOMICILIO_EXT = ?  AND ID_EGRESADO = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idDomicilioExt);
		$sqlQuery->setNumber($idEgresado);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_aso_egre_dom_ext';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_aso_egre_dom_ext ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreAsoEgreDomExt primary key
 	 */
	public function delete($idDomicilioExt, $idEgresado){
		$sql = 'DELETE FROM egre_aso_egre_dom_ext WHERE ID_DOMICILIO_EXT = ?  AND ID_EGRESADO = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idDomicilioExt);
		$sqlQuery->setNumber($idEgresado);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsoEgreDomExtOracle egreAsoEgreDomExt
 	 */
	public function insert($egreAsoEgreDomExt){
		$sql = 'INSERT INTO egre_aso_egre_dom_ext ( ID_DOMICILIO_EXT, ID_EGRESADO) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoEgreDomExt->idDomicilioExt);

		$sqlQuery->setNumber($egreAsoEgreDomExt->idEgresado);

		$this->executeInsert($sqlQuery);	
		//$egreAsoEgreDomExt->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsoEgreDomExtOracle egreAsoEgreDomExt
 	 */
	public function update($egreAsoEgreDomExt){
		$sql = 'UPDATE egre_aso_egre_dom_ext SET  WHERE ID_DOMICILIO_EXT = ?  AND ID_EGRESADO = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoEgreDomExt->idDomicilioExt);

		$sqlQuery->setNumber($egreAsoEgreDomExt->idEgresado);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_aso_egre_dom_ext';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return EgreAsoEgreDomExtOracle 
	 */
	protected function readRow($row){
		$egreAsoEgreDomExt = new EgreAsoEgreDomExt();
		
		$egreAsoEgreDomExt->idDomicilioExt = $row['ID_DOMICILIO_EXT'];
		$egreAsoEgreDomExt->idEgresado = $row['ID_EGRESADO'];

		return $egreAsoEgreDomExt;
	}
	
	protected function getList($sqlQuery){
		$tab = OracleQueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return EgreAsoEgreDomExtOracle 
	 */
	protected function getRow($sqlQuery){
		$tab = OracleQueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return OracleQueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return OracleQueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return OracleQueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return OracleQueryExecutor::executeInsert($sqlQuery);
	}
}
?>