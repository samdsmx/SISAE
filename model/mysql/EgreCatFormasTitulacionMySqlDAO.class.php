<?php
/**
 * Class that operate on table 'egre_cat_formas_titulacion'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreCatFormasTitulacionMySqlDAO implements EgreCatFormasTitulacionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatFormasTitulacionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_cat_formas_titulacion WHERE ID_FORMA_TITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_cat_formas_titulacion';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_cat_formas_titulacion ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreCatFormasTitulacion primary key
 	 */
	public function delete($ID_FORMA_TITULACION){
		$sql = 'DELETE FROM egre_cat_formas_titulacion WHERE ID_FORMA_TITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_FORMA_TITULACION);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatFormasTitulacionMySql egreCatFormasTitulacion
 	 */
	public function insert($egreCatFormasTitulacion){
		$sql = 'INSERT INTO egre_cat_formas_titulacion (FORMA_TITULACION) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatFormasTitulacion->formaTitulacion);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatFormasTitulacion->idFormaTitulacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatFormasTitulacionMySql egreCatFormasTitulacion
 	 */
	public function update($egreCatFormasTitulacion){
		$sql = 'UPDATE egre_cat_formas_titulacion SET FORMA_TITULACION = ? WHERE ID_FORMA_TITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatFormasTitulacion->formaTitulacion);

		$sqlQuery->setNumber($egreCatFormasTitulacion->idFormaTitulacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_cat_formas_titulacion';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByFORMATITULACION($value){
		$sql = 'SELECT * FROM egre_cat_formas_titulacion WHERE FORMA_TITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByFORMATITULACION($value){
		$sql = 'DELETE FROM egre_cat_formas_titulacion WHERE FORMA_TITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreCatFormasTitulacionMySql 
	 */
	protected function readRow($row){
		$egreCatFormasTitulacion = new EgreCatFormasTitulacion();
		
		$egreCatFormasTitulacion->idFormaTitulacion = $row['ID_FORMA_TITULACION'];
		$egreCatFormasTitulacion->formaTitulacion = $row['FORMA_TITULACION'];

		return $egreCatFormasTitulacion;
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
	 * @return EgreCatFormasTitulacionMySql 
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