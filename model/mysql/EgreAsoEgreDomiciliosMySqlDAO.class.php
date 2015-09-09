<?php
/**
 * Class that operate on table 'egre_aso_egre_domicilios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreAsoEgreDomiciliosMySqlDAO implements EgreAsoEgreDomiciliosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreAsoEgreDomiciliosMySql 
	 */
	public function load($idEgresado, $idDomicilio){
		$sql = 'SELECT * FROM egre_aso_egre_domicilios WHERE ID_EGRESADO = ?  AND ID_DOMICILIO = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idEgresado);
		$sqlQuery->setNumber($idDomicilio);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_aso_egre_domicilios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_aso_egre_domicilios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreAsoEgreDomicilio primary key
 	 */
	public function delete($idEgresado, $idDomicilio){
		$sql = 'DELETE FROM egre_aso_egre_domicilios WHERE ID_EGRESADO = ?  AND ID_DOMICILIO = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idEgresado);
		$sqlQuery->setNumber($idDomicilio);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsoEgreDomiciliosMySql egreAsoEgreDomicilio
 	 */
	public function insert($egreAsoEgreDomicilio){
		$sql = 'INSERT INTO egre_aso_egre_domicilios ( ID_EGRESADO, ID_DOMICILIO) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoEgreDomicilio->idEgresado);

		$sqlQuery->setNumber($egreAsoEgreDomicilio->idDomicilio);

		$this->executeInsert($sqlQuery);	
		//$egreAsoEgreDomicilio->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsoEgreDomiciliosMySql egreAsoEgreDomicilio
 	 */
	public function update($egreAsoEgreDomicilio){
		$sql = 'UPDATE egre_aso_egre_domicilios SET  WHERE ID_EGRESADO = ?  AND ID_DOMICILIO = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoEgreDomicilio->idEgresado);

		$sqlQuery->setNumber($egreAsoEgreDomicilio->idDomicilio);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_aso_egre_domicilios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return EgreAsoEgreDomiciliosMySql 
	 */
	protected function readRow($row){
		$egreAsoEgreDomicilio = new EgreAsoEgreDomicilio();
		
		$egreAsoEgreDomicilio->idEgresado = $row['ID_EGRESADO'];
		$egreAsoEgreDomicilio->idDomicilio = $row['ID_DOMICILIO'];

		return $egreAsoEgreDomicilio;
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
	 * @return EgreAsoEgreDomiciliosMySql 
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