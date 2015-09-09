<?php
/**
 * Class that operate on table 'egre_cat_estatus_egre'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreCatEstatusEgreMySqlDAO implements EgreCatEstatusEgreDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatEstatusEgreMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_cat_estatus_egre WHERE ID_ESTATUS_EGRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_cat_estatus_egre';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_cat_estatus_egre ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreCatEstatusEgre primary key
 	 */
	public function delete($ID_ESTATUS_EGRE){
		$sql = 'DELETE FROM egre_cat_estatus_egre WHERE ID_ESTATUS_EGRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_ESTATUS_EGRE);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatEstatusEgreMySql egreCatEstatusEgre
 	 */
	public function insert($egreCatEstatusEgre){
		$sql = 'INSERT INTO egre_cat_estatus_egre (ESTATUS) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatEstatusEgre->estatus);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatEstatusEgre->idEstatusEgre = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatEstatusEgreMySql egreCatEstatusEgre
 	 */
	public function update($egreCatEstatusEgre){
		$sql = 'UPDATE egre_cat_estatus_egre SET ESTATUS = ? WHERE ID_ESTATUS_EGRE = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatEstatusEgre->estatus);

		$sqlQuery->setNumber($egreCatEstatusEgre->idEstatusEgre);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_cat_estatus_egre';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByESTATUS($value){
		$sql = 'SELECT * FROM egre_cat_estatus_egre WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByESTATUS($value){
		$sql = 'DELETE FROM egre_cat_estatus_egre WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreCatEstatusEgreMySql 
	 */
	protected function readRow($row){
		$egreCatEstatusEgre = new EgreCatEstatusEgre();
		
		$egreCatEstatusEgre->idEstatusEgre = $row['ID_ESTATUS_EGRE'];
		$egreCatEstatusEgre->estatus = $row['ESTATUS'];

		return $egreCatEstatusEgre;
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
	 * @return EgreCatEstatusEgreMySql 
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