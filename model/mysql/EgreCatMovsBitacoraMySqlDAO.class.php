<?php
/**
 * Class that operate on table 'egre_cat_movs_bitacora'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreCatMovsBitacoraMySqlDAO implements EgreCatMovsBitacoraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatMovsBitacoraMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_cat_movs_bitacora WHERE ID_MOV_BITACORA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_cat_movs_bitacora';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_cat_movs_bitacora ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreCatMovsBitacora primary key
 	 */
	public function delete($ID_MOV_BITACORA){
		$sql = 'DELETE FROM egre_cat_movs_bitacora WHERE ID_MOV_BITACORA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_MOV_BITACORA);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatMovsBitacoraMySql egreCatMovsBitacora
 	 */
	public function insert($egreCatMovsBitacora){
		$sql = 'INSERT INTO egre_cat_movs_bitacora (MOVIMIENTO) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMovsBitacora->mOVIMIENTO);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatMovsBitacora->iDMOVBITACORA = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatMovsBitacoraMySql egreCatMovsBitacora
 	 */
	public function update($egreCatMovsBitacora){
		$sql = 'UPDATE egre_cat_movs_bitacora SET MOVIMIENTO = ? WHERE ID_MOV_BITACORA = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMovsBitacora->mOVIMIENTO);

		$sqlQuery->setNumber($egreCatMovsBitacora->iDMOVBITACORA);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_cat_movs_bitacora';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMOVIMIENTO($value){
		$sql = 'SELECT * FROM egre_cat_movs_bitacora WHERE MOVIMIENTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMOVIMIENTO($value){
		$sql = 'DELETE FROM egre_cat_movs_bitacora WHERE MOVIMIENTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreCatMovsBitacoraMySql 
	 */
	protected function readRow($row){
		$egreCatMovsBitacora = new EgreCatMovsBitacora();
		
		$egreCatMovsBitacora->iDMOVBITACORA = $row['ID_MOV_BITACORA'];
		$egreCatMovsBitacora->mOVIMIENTO = $row['MOVIMIENTO'];

		return $egreCatMovsBitacora;
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
	 * @return EgreCatMovsBitacoraMySql 
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