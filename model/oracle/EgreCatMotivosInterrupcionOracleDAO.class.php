<?php
/**
 * Class that operate on table 'egre_cat_motivos_interrupcion'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreCatMotivosInterrupcionOracleDAO implements EgreCatMotivosInterrupcionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatMotivosInterrupcionOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_cat_motivos_interrupcion WHERE ID_MOTIVO_INTERRUPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_cat_motivos_interrupcion';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_cat_motivos_interrupcion ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreCatMotivosInterrupcion primary key
 	 */
	public function delete($ID_MOTIVO_INTERRUPCION){
		$sql = 'DELETE FROM egre_cat_motivos_interrupcion WHERE ID_MOTIVO_INTERRUPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_MOTIVO_INTERRUPCION);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatMotivosInterrupcionOracle egreCatMotivosInterrupcion
 	 */
	public function insert($egreCatMotivosInterrupcion){
		$sql = 'INSERT INTO egre_cat_motivos_interrupcion (MOTIVO_INTERRUPCION) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMotivosInterrupcion->motivoInterrupcion);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatMotivosInterrupcion->idMotivoInterrupcion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatMotivosInterrupcionOracle egreCatMotivosInterrupcion
 	 */
	public function update($egreCatMotivosInterrupcion){
		$sql = 'UPDATE egre_cat_motivos_interrupcion SET MOTIVO_INTERRUPCION = ? WHERE ID_MOTIVO_INTERRUPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMotivosInterrupcion->motivoInterrupcion);

		$sqlQuery->setNumber($egreCatMotivosInterrupcion->idMotivoInterrupcion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_cat_motivos_interrupcion';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMOTIVOINTERRUPCION($value){
		$sql = 'SELECT * FROM egre_cat_motivos_interrupcion WHERE MOTIVO_INTERRUPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMOTIVOINTERRUPCION($value){
		$sql = 'DELETE FROM egre_cat_motivos_interrupcion WHERE MOTIVO_INTERRUPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreCatMotivosInterrupcionOracle 
	 */
	protected function readRow($row){
		$egreCatMotivosInterrupcion = new EgreCatMotivosInterrupcion();
		
		$egreCatMotivosInterrupcion->idMotivoInterrupcion = $row['ID_MOTIVO_INTERRUPCION'];
		$egreCatMotivosInterrupcion->motivoInterrupcion = $row['MOTIVO_INTERRUPCION'];

		return $egreCatMotivosInterrupcion;
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
	 * @return EgreCatMotivosInterrupcionOracle 
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