<?php
/**
 * Class that operate on table 'egre_asociaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreAsociacionesMySqlDAO implements EgreAsociacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreAsociacionesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_asociaciones WHERE ID_ASOCIACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_asociaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_asociaciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreAsociacione primary key
 	 */
	public function delete($ID_ASOCIACION){
		$sql = 'DELETE FROM egre_asociaciones WHERE ID_ASOCIACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_ASOCIACION);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsociacionesMySql egreAsociacione
 	 */
	public function insert($egreAsociacione){
		$sql = 'INSERT INTO egre_asociaciones (ID_EGRESADO, NOMBRE_ASOCIACION, FECHA_AFILIACION, SIGLAS) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreAsociacione->idEgresado);
		$sqlQuery->set($egreAsociacione->nombreAsociacion);
		$sqlQuery->set($egreAsociacione->fechaAfiliacion);
		$sqlQuery->set($egreAsociacione->siglas);

		$id = $this->executeInsert($sqlQuery);	
		$egreAsociacione->idAsociacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsociacionesMySql egreAsociacione
 	 */
	public function update($egreAsociacione){
		$sql = 'UPDATE egre_asociaciones SET ID_EGRESADO = ?, NOMBRE_ASOCIACION = ?, FECHA_AFILIACION = ?, SIGLAS = ? WHERE ID_ASOCIACION = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreAsociacione->idEgresado);
		$sqlQuery->set($egreAsociacione->nombreAsociacion);
		$sqlQuery->set($egreAsociacione->fechaAfiliacion);
		$sqlQuery->set($egreAsociacione->siglas);

		$sqlQuery->setNumber($egreAsociacione->idAsociacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_asociaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDEGRESADO($value){
		$sql = 'SELECT * FROM egre_asociaciones WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNOMBREASOCIACION($value){
		$sql = 'SELECT * FROM egre_asociaciones WHERE NOMBRE_ASOCIACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHAAFILIACION($value){
		$sql = 'SELECT * FROM egre_asociaciones WHERE FECHA_AFILIACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySIGLAS($value){
		$sql = 'SELECT * FROM egre_asociaciones WHERE SIGLAS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDEGRESADO($value){
		$sql = 'DELETE FROM egre_asociaciones WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNOMBREASOCIACION($value){
		$sql = 'DELETE FROM egre_asociaciones WHERE NOMBRE_ASOCIACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHAAFILIACION($value){
		$sql = 'DELETE FROM egre_asociaciones WHERE FECHA_AFILIACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySIGLAS($value){
		$sql = 'DELETE FROM egre_asociaciones WHERE SIGLAS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreAsociacionesMySql 
	 */
	protected function readRow($row){
		$egreAsociacione = new EgreAsociacione();
		
		$egreAsociacione->idAsociacion = $row['ID_ASOCIACION'];
		$egreAsociacione->idEgresado = $row['ID_EGRESADO'];
		$egreAsociacione->nombreAsociacion = $row['NOMBRE_ASOCIACION'];
		$egreAsociacione->fechaAfiliacion = $row['FECHA_AFILIACION'];
		$egreAsociacione->siglas = $row['SIGLAS'];

		return $egreAsociacione;
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
	 * @return EgreAsociacionesMySql 
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