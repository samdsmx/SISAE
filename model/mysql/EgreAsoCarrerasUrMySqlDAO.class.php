<?php
/**
 * Class that operate on table 'egre_aso_carreras_ur'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreAsoCarrerasUrMySqlDAO implements EgreAsoCarrerasUrDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreAsoCarrerasUrMySql 
	 */
	public function load($iDUNIDADRESPONSABLE, $iDCARRERA){
		$sql = 'SELECT * FROM egre_aso_carreras_ur WHERE ID_UNIDAD_RESPONSABLE = ?  AND ID_CARRERA = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iDUNIDADRESPONSABLE);
		$sqlQuery->setNumber($iDCARRERA);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_aso_carreras_ur';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_aso_carreras_ur ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreAsoCarrerasUr primary key
 	 */
	public function delete($iDUNIDADRESPONSABLE, $iDCARRERA){
		$sql = 'DELETE FROM egre_aso_carreras_ur WHERE ID_UNIDAD_RESPONSABLE = ?  AND ID_CARRERA = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iDUNIDADRESPONSABLE);
		$sqlQuery->setNumber($iDCARRERA);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsoCarrerasUrMySql egreAsoCarrerasUr
 	 */
	public function insert($egreAsoCarrerasUr){
		$sql = 'INSERT INTO egre_aso_carreras_ur ( ID_UNIDAD_RESPONSABLE, ID_CARRERA) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoCarrerasUr->iDUNIDADRESPONSABLE);

		$sqlQuery->setNumber($egreAsoCarrerasUr->iDCARRERA);

		$this->executeInsert($sqlQuery);	
		//$egreAsoCarrerasUr->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsoCarrerasUrMySql egreAsoCarrerasUr
 	 */
	public function update($egreAsoCarrerasUr){
		$sql = 'UPDATE egre_aso_carreras_ur SET  WHERE ID_UNIDAD_RESPONSABLE = ?  AND ID_CARRERA = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoCarrerasUr->iDUNIDADRESPONSABLE);

		$sqlQuery->setNumber($egreAsoCarrerasUr->iDCARRERA);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_aso_carreras_ur';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return EgreAsoCarrerasUrMySql 
	 */
	protected function readRow($row){
		$egreAsoCarrerasUr = new EgreAsoCarrerasUr();
		
		$egreAsoCarrerasUr->iDUNIDADRESPONSABLE = $row['ID_UNIDAD_RESPONSABLE'];
		$egreAsoCarrerasUr->iDCARRERA = $row['ID_CARRERA'];

		return $egreAsoCarrerasUr;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return EgreAsoCarrerasUrMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>