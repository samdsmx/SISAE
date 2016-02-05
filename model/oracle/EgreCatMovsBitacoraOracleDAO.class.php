<?php
/**
 * Class that operate on table 'egre_cat_movs_bitacora'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreCatMovsBitacoraOracleDAO implements EgreCatMovsBitacoraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatMovsBitacoraOracle 
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
 	 * @param EgreCatMovsBitacoraOracle egreCatMovsBitacora
 	 */
	public function insert($egreCatMovsBitacora){
		$sql = 'INSERT INTO egre_cat_movs_bitacora (MOVIMIENTO) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMovsBitacora->movimiento);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatMovsBitacora->idMovBitacora = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatMovsBitacoraOracle egreCatMovsBitacora
 	 */
	public function update($egreCatMovsBitacora){
		$sql = 'UPDATE egre_cat_movs_bitacora SET MOVIMIENTO = ? WHERE ID_MOV_BITACORA = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMovsBitacora->movimiento);

		$sqlQuery->setNumber($egreCatMovsBitacora->idMovBitacora);
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
	 * @return EgreCatMovsBitacoraOracle 
	 */
	protected function readRow($row){
		$egreCatMovsBitacora = new EgreCatMovsBitacora();
		
		$egreCatMovsBitacora->idMovBitacora = $row['ID_MOV_BITACORA'];
		$egreCatMovsBitacora->movimiento = $row['MOVIMIENTO'];

		return $egreCatMovsBitacora;
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
	 * @return EgreCatMovsBitacoraOracle 
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