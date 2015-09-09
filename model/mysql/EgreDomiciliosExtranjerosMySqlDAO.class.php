<?php
/**
 * Class that operate on table 'egre_domicilios_extranjeros'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreDomiciliosExtranjerosMySqlDAO implements EgreDomiciliosExtranjerosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreDomiciliosExtranjerosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_domicilios_extranjeros WHERE ID_DOMICILIO_EXT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_domicilios_extranjeros';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_domicilios_extranjeros ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreDomiciliosExtranjero primary key
 	 */
	public function delete($ID_DOMICILIO_EXT){
		$sql = 'DELETE FROM egre_domicilios_extranjeros WHERE ID_DOMICILIO_EXT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_DOMICILIO_EXT);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreDomiciliosExtranjerosMySql egreDomiciliosExtranjero
 	 */
	public function insert($egreDomiciliosExtranjero){
		$sql = 'INSERT INTO egre_domicilios_extranjeros (ID_PAIS, DOMICILIO) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreDomiciliosExtranjero->idPais);
		$sqlQuery->set($egreDomiciliosExtranjero->domicilio);

		$id = $this->executeInsert($sqlQuery);	
		$egreDomiciliosExtranjero->idDomicilioExt = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreDomiciliosExtranjerosMySql egreDomiciliosExtranjero
 	 */
	public function update($egreDomiciliosExtranjero){
		$sql = 'UPDATE egre_domicilios_extranjeros SET ID_PAIS = ?, DOMICILIO = ? WHERE ID_DOMICILIO_EXT = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreDomiciliosExtranjero->idPais);
		$sqlQuery->set($egreDomiciliosExtranjero->domicilio);

		$sqlQuery->setNumber($egreDomiciliosExtranjero->idDomicilioExt);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_domicilios_extranjeros';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDPAIS($value){
		$sql = 'SELECT * FROM egre_domicilios_extranjeros WHERE ID_PAIS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDOMICILIO($value){
		$sql = 'SELECT * FROM egre_domicilios_extranjeros WHERE DOMICILIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDPAIS($value){
		$sql = 'DELETE FROM egre_domicilios_extranjeros WHERE ID_PAIS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDOMICILIO($value){
		$sql = 'DELETE FROM egre_domicilios_extranjeros WHERE DOMICILIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreDomiciliosExtranjerosMySql 
	 */
	protected function readRow($row){
		$egreDomiciliosExtranjero = new EgreDomiciliosExtranjero();
		
		$egreDomiciliosExtranjero->idDomicilioExt = $row['ID_DOMICILIO_EXT'];
		$egreDomiciliosExtranjero->idPais = $row['ID_PAIS'];
		$egreDomiciliosExtranjero->domicilio = $row['DOMICILIO'];

		return $egreDomiciliosExtranjero;
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
	 * @return EgreDomiciliosExtranjerosMySql 
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