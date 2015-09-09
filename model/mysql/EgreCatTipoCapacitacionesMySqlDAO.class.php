<?php
/**
 * Class that operate on table 'egre_cat_tipo_capacitaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreCatTipoCapacitacionesMySqlDAO implements EgreCatTipoCapacitacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatTipoCapacitacionesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_cat_tipo_capacitaciones WHERE ID_TIPO_CAPACITACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_cat_tipo_capacitaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_cat_tipo_capacitaciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreCatTipoCapacitacione primary key
 	 */
	public function delete($ID_TIPO_CAPACITACION){
		$sql = 'DELETE FROM egre_cat_tipo_capacitaciones WHERE ID_TIPO_CAPACITACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_TIPO_CAPACITACION);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatTipoCapacitacionesMySql egreCatTipoCapacitacione
 	 */
	public function insert($egreCatTipoCapacitacione){
		$sql = 'INSERT INTO egre_cat_tipo_capacitaciones (DESCRIPCION) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatTipoCapacitacione->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatTipoCapacitacione->idTipoCapacitacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatTipoCapacitacionesMySql egreCatTipoCapacitacione
 	 */
	public function update($egreCatTipoCapacitacione){
		$sql = 'UPDATE egre_cat_tipo_capacitaciones SET DESCRIPCION = ? WHERE ID_TIPO_CAPACITACION = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatTipoCapacitacione->descripcion);

		$sqlQuery->setNumber($egreCatTipoCapacitacione->idTipoCapacitacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_cat_tipo_capacitaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDESCRIPCION($value){
		$sql = 'SELECT * FROM egre_cat_tipo_capacitaciones WHERE DESCRIPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDESCRIPCION($value){
		$sql = 'DELETE FROM egre_cat_tipo_capacitaciones WHERE DESCRIPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreCatTipoCapacitacionesMySql 
	 */
	protected function readRow($row){
		$egreCatTipoCapacitacione = new EgreCatTipoCapacitacione();
		
		$egreCatTipoCapacitacione->idTipoCapacitacion = $row['ID_TIPO_CAPACITACION'];
		$egreCatTipoCapacitacione->descripcion = $row['DESCRIPCION'];

		return $egreCatTipoCapacitacione;
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
	 * @return EgreCatTipoCapacitacionesMySql 
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