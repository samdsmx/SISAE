<?php
/**
 * Class that operate on table 'egre_publicaciones'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgrePublicacionesOracleDAO implements EgrePublicacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgrePublicacionesOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_publicaciones WHERE ID_PUBLICACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_publicaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_publicaciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egrePublicacione primary key
 	 */
	public function delete($ID_PUBLICACION){
		$sql = 'DELETE FROM egre_publicaciones WHERE ID_PUBLICACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_PUBLICACION);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgrePublicacionesOracle egrePublicacione
 	 */
	public function insert($egrePublicacione){
		$sql = 'INSERT INTO egre_publicaciones (ID_EGRESADO, PUBLICACION, FECHA) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egrePublicacione->idEgresado);
		$sqlQuery->set($egrePublicacione->publicacion);
		$sqlQuery->set($egrePublicacione->fecha);

		$id = $this->executeInsert($sqlQuery);	
		$egrePublicacione->idPublicacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgrePublicacionesOracle egrePublicacione
 	 */
	public function update($egrePublicacione){
		$sql = 'UPDATE egre_publicaciones SET ID_EGRESADO = ?, PUBLICACION = ?, FECHA = ? WHERE ID_PUBLICACION = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egrePublicacione->idEgresado);
		$sqlQuery->set($egrePublicacione->publicacion);
		$sqlQuery->set($egrePublicacione->fecha);

		$sqlQuery->setNumber($egrePublicacione->idPublicacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_publicaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDEGRESADO($value){
		$sql = 'SELECT * FROM egre_publicaciones WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPUBLICACION($value){
		$sql = 'SELECT * FROM egre_publicaciones WHERE PUBLICACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHA($value){
		$sql = 'SELECT * FROM egre_publicaciones WHERE FECHA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDEGRESADO($value){
		$sql = 'DELETE FROM egre_publicaciones WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPUBLICACION($value){
		$sql = 'DELETE FROM egre_publicaciones WHERE PUBLICACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHA($value){
		$sql = 'DELETE FROM egre_publicaciones WHERE FECHA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgrePublicacionesOracle 
	 */
	protected function readRow($row){
		$egrePublicacione = new EgrePublicacione();
		
		$egrePublicacione->idPublicacion = $row['ID_PUBLICACION'];
		$egrePublicacione->idEgresado = $row['ID_EGRESADO'];
		$egrePublicacione->publicacion = $row['PUBLICACION'];
		$egrePublicacione->fecha = $row['FECHA'];

		return $egrePublicacione;
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
	 * @return EgrePublicacionesOracle 
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