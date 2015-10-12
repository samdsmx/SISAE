<?php
/**
 * Class that operate on table 'cipn_cat_generos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
class CipnCatGenerosMySqlDAO implements CipnCatGenerosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CipnCatGenerosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cipn_cat_generos WHERE ID_GENERO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cipn_cat_generos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cipn_cat_generos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cipnCatGenero primary key
 	 */
	public function delete($ID_GENERO){
		$sql = 'DELETE FROM cipn_cat_generos WHERE ID_GENERO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_GENERO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CipnCatGenerosMySql cipnCatGenero
 	 */
	public function insert($cipnCatGenero){
		$sql = 'INSERT INTO cipn_cat_generos (GENERO, ACRONIMO, ID_USUARIO_TRAN, FECHA_TRAN, ESTATUS) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cipnCatGenero->gENERO);
		$sqlQuery->set($cipnCatGenero->aCRONIMO);
		$sqlQuery->setNumber($cipnCatGenero->iDUSUARIOTRAN);
		$sqlQuery->set($cipnCatGenero->fECHATRAN);
		$sqlQuery->setNumber($cipnCatGenero->eSTATUS);

		$id = $this->executeInsert($sqlQuery);	
		$cipnCatGenero->iDGENERO = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CipnCatGenerosMySql cipnCatGenero
 	 */
	public function update($cipnCatGenero){
		$sql = 'UPDATE cipn_cat_generos SET GENERO = ?, ACRONIMO = ?, ID_USUARIO_TRAN = ?, FECHA_TRAN = ?, ESTATUS = ? WHERE ID_GENERO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cipnCatGenero->gENERO);
		$sqlQuery->set($cipnCatGenero->aCRONIMO);
		$sqlQuery->setNumber($cipnCatGenero->iDUSUARIOTRAN);
		$sqlQuery->set($cipnCatGenero->fECHATRAN);
		$sqlQuery->setNumber($cipnCatGenero->eSTATUS);

		$sqlQuery->setNumber($cipnCatGenero->iDGENERO);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cipn_cat_generos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByGENERO($value){
		$sql = 'SELECT * FROM cipn_cat_generos WHERE GENERO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByACRONIMO($value){
		$sql = 'SELECT * FROM cipn_cat_generos WHERE ACRONIMO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDUSUARIOTRAN($value){
		$sql = 'SELECT * FROM cipn_cat_generos WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHATRAN($value){
		$sql = 'SELECT * FROM cipn_cat_generos WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByESTATUS($value){
		$sql = 'SELECT * FROM cipn_cat_generos WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByGENERO($value){
		$sql = 'DELETE FROM cipn_cat_generos WHERE GENERO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByACRONIMO($value){
		$sql = 'DELETE FROM cipn_cat_generos WHERE ACRONIMO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDUSUARIOTRAN($value){
		$sql = 'DELETE FROM cipn_cat_generos WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHATRAN($value){
		$sql = 'DELETE FROM cipn_cat_generos WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByESTATUS($value){
		$sql = 'DELETE FROM cipn_cat_generos WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CipnCatGenerosMySql 
	 */
	protected function readRow($row){
		$cipnCatGenero = new CipnCatGenero();
		
		$cipnCatGenero->iDGENERO = $row['ID_GENERO'];
		$cipnCatGenero->gENERO = $row['GENERO'];
		$cipnCatGenero->aCRONIMO = $row['ACRONIMO'];
		$cipnCatGenero->iDUSUARIOTRAN = $row['ID_USUARIO_TRAN'];
		$cipnCatGenero->fECHATRAN = $row['FECHA_TRAN'];
		$cipnCatGenero->eSTATUS = $row['ESTATUS'];

		return $cipnCatGenero;
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
	 * @return CipnCatGenerosMySql 
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