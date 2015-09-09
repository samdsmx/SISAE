<?php
/**
 * Class that operate on table 'egre_habilidades'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreHabilidadesMySqlDAO implements EgreHabilidadesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreHabilidadesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_habilidades WHERE ID_HABILIDAD = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_habilidades';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_habilidades ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreHabilidade primary key
 	 */
	public function delete($ID_HABILIDAD){
		$sql = 'DELETE FROM egre_habilidades WHERE ID_HABILIDAD = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_HABILIDAD);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreHabilidadesMySql egreHabilidade
 	 */
	public function insert($egreHabilidade){
		$sql = 'INSERT INTO egre_habilidades (ID_EGRESADO, HABILIDAD, NIVEL) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreHabilidade->idEgresado);
		$sqlQuery->set($egreHabilidade->habilidad);
		$sqlQuery->setNumber($egreHabilidade->nivel);

		$id = $this->executeInsert($sqlQuery);	
		$egreHabilidade->idHabilidad = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreHabilidadesMySql egreHabilidade
 	 */
	public function update($egreHabilidade){
		$sql = 'UPDATE egre_habilidades SET ID_EGRESADO = ?, HABILIDAD = ?, NIVEL = ? WHERE ID_HABILIDAD = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreHabilidade->idEgresado);
		$sqlQuery->set($egreHabilidade->habilidad);
		$sqlQuery->setNumber($egreHabilidade->nivel);

		$sqlQuery->setNumber($egreHabilidade->idHabilidad);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_habilidades';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDEGRESADO($value){
		$sql = 'SELECT * FROM egre_habilidades WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHABILIDAD($value){
		$sql = 'SELECT * FROM egre_habilidades WHERE HABILIDAD = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNIVEL($value){
		$sql = 'SELECT * FROM egre_habilidades WHERE NIVEL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDEGRESADO($value){
		$sql = 'DELETE FROM egre_habilidades WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHABILIDAD($value){
		$sql = 'DELETE FROM egre_habilidades WHERE HABILIDAD = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNIVEL($value){
		$sql = 'DELETE FROM egre_habilidades WHERE NIVEL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreHabilidadesMySql 
	 */
	protected function readRow($row){
		$egreHabilidade = new EgreHabilidade();
		
		$egreHabilidade->idHabilidad = $row['ID_HABILIDAD'];
		$egreHabilidade->idEgresado = $row['ID_EGRESADO'];
		$egreHabilidade->habilidad = $row['HABILIDAD'];
		$egreHabilidade->nivel = $row['NIVEL'];

		return $egreHabilidade;
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
	 * @return EgreHabilidadesMySql 
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