<?php
/**
 * Class that operate on table 'cipn_cat_gentilicios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
class CipnCatGentiliciosMySqlDAO implements CipnCatGentiliciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CipnCatGentiliciosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cipn_cat_gentilicios WHERE ID_GENTILICIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cipn_cat_gentilicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cipn_cat_gentilicios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cipnCatGentilicio primary key
 	 */
	public function delete($ID_GENTILICIO){
		$sql = 'DELETE FROM cipn_cat_gentilicios WHERE ID_GENTILICIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_GENTILICIO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CipnCatGentiliciosMySql cipnCatGentilicio
 	 */
	public function insert($cipnCatGentilicio){
		$sql = 'INSERT INTO cipn_cat_gentilicios (GENTILICIO, ID_USUARIO_TRAN, FECHA_TRAN, ESTATUS) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cipnCatGentilicio->gENTILICIO);
		$sqlQuery->setNumber($cipnCatGentilicio->iDUSUARIOTRAN);
		$sqlQuery->set($cipnCatGentilicio->fECHATRAN);
		$sqlQuery->setNumber($cipnCatGentilicio->eSTATUS);

		$id = $this->executeInsert($sqlQuery);	
		$cipnCatGentilicio->iDGENTILICIO = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CipnCatGentiliciosMySql cipnCatGentilicio
 	 */
	public function update($cipnCatGentilicio){
		$sql = 'UPDATE cipn_cat_gentilicios SET GENTILICIO = ?, ID_USUARIO_TRAN = ?, FECHA_TRAN = ?, ESTATUS = ? WHERE ID_GENTILICIO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cipnCatGentilicio->gENTILICIO);
		$sqlQuery->setNumber($cipnCatGentilicio->iDUSUARIOTRAN);
		$sqlQuery->set($cipnCatGentilicio->fECHATRAN);
		$sqlQuery->setNumber($cipnCatGentilicio->eSTATUS);

		$sqlQuery->setNumber($cipnCatGentilicio->iDGENTILICIO);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cipn_cat_gentilicios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGENTILICIO($value){
		$sql = 'SELECT * FROM cipn_cat_gentilicios WHERE GENTILICIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDUSUARIOTRAN($value){
		$sql = 'SELECT * FROM cipn_cat_gentilicios WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHATRAN($value){
		$sql = 'SELECT * FROM cipn_cat_gentilicios WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByESTATUS($value){
		$sql = 'SELECT * FROM cipn_cat_gentilicios WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGENTILICIO($value){
		$sql = 'DELETE FROM cipn_cat_gentilicios WHERE GENTILICIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDUSUARIOTRAN($value){
		$sql = 'DELETE FROM cipn_cat_gentilicios WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHATRAN($value){
		$sql = 'DELETE FROM cipn_cat_gentilicios WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByESTATUS($value){
		$sql = 'DELETE FROM cipn_cat_gentilicios WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CipnCatGentiliciosMySql 
	 */
	protected function readRow($row){
		$cipnCatGentilicio = new CipnCatGentilicio();
		
		$cipnCatGentilicio->iDGENTILICIO = $row['ID_GENTILICIO'];
		$cipnCatGentilicio->gENTILICIO = $row['GENTILICIO'];
		$cipnCatGentilicio->iDUSUARIOTRAN = $row['ID_USUARIO_TRAN'];
		$cipnCatGentilicio->fECHATRAN = $row['FECHA_TRAN'];
		$cipnCatGentilicio->eSTATUS = $row['ESTATUS'];

		return $cipnCatGentilicio;
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
	 * @return CipnCatGentiliciosMySql 
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