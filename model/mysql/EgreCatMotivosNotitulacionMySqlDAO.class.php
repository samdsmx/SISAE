<?php
/**
 * Class that operate on table 'egre_cat_motivos_notitulacion'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreCatMotivosNotitulacionMySqlDAO implements EgreCatMotivosNotitulacionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatMotivosNotitulacionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_cat_motivos_notitulacion WHERE ID_MOTIVO_NOTITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_cat_motivos_notitulacion';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_cat_motivos_notitulacion ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreCatMotivosNotitulacion primary key
 	 */
	public function delete($ID_MOTIVO_NOTITULACION){
		$sql = 'DELETE FROM egre_cat_motivos_notitulacion WHERE ID_MOTIVO_NOTITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_MOTIVO_NOTITULACION);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatMotivosNotitulacionMySql egreCatMotivosNotitulacion
 	 */
	public function insert($egreCatMotivosNotitulacion){
		$sql = 'INSERT INTO egre_cat_motivos_notitulacion (MOTIVO_NOTITULACION) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMotivosNotitulacion->mOTIVONOTITULACION);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatMotivosNotitulacion->iDMOTIVONOTITULACION = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatMotivosNotitulacionMySql egreCatMotivosNotitulacion
 	 */
	public function update($egreCatMotivosNotitulacion){
		$sql = 'UPDATE egre_cat_motivos_notitulacion SET MOTIVO_NOTITULACION = ? WHERE ID_MOTIVO_NOTITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMotivosNotitulacion->mOTIVONOTITULACION);

		$sqlQuery->setNumber($egreCatMotivosNotitulacion->iDMOTIVONOTITULACION);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_cat_motivos_notitulacion';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMOTIVONOTITULACION($value){
		$sql = 'SELECT * FROM egre_cat_motivos_notitulacion WHERE MOTIVO_NOTITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMOTIVONOTITULACION($value){
		$sql = 'DELETE FROM egre_cat_motivos_notitulacion WHERE MOTIVO_NOTITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreCatMotivosNotitulacionMySql 
	 */
	protected function readRow($row){
		$egreCatMotivosNotitulacion = new EgreCatMotivosNotitulacion();
		
		$egreCatMotivosNotitulacion->iDMOTIVONOTITULACION = $row['ID_MOTIVO_NOTITULACION'];
		$egreCatMotivosNotitulacion->mOTIVONOTITULACION = $row['MOTIVO_NOTITULACION'];

		return $egreCatMotivosNotitulacion;
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
	 * @return EgreCatMotivosNotitulacionMySql 
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