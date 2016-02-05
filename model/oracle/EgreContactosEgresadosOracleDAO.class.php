<?php
/**
 * Class that operate on table 'egre_contactos_egresados'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreContactosEgresadosOracleDAO implements EgreContactosEgresadosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreContactosEgresadosOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_contactos_egresados WHERE ID_CONTACTO_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_contactos_egresados';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_contactos_egresados ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreContactosEgresado primary key
 	 */
	public function delete($ID_CONTACTO_EGRESADO){
		$sql = 'DELETE FROM egre_contactos_egresados WHERE ID_CONTACTO_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_CONTACTO_EGRESADO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreContactosEgresadosOracle egreContactosEgresado
 	 */
	public function insert($egreContactosEgresado){
		$sql = 'INSERT INTO egre_contactos_egresados (ID_MEDIO_CONTACTO, ID_EGRESADO, DESCRIPCION) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreContactosEgresado->idMedioContacto);
		$sqlQuery->setNumber($egreContactosEgresado->idEgresado);
		$sqlQuery->set($egreContactosEgresado->descripcion);

		$id = $this->executeInsert($sqlQuery);	
		$egreContactosEgresado->idContactoEgresado = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreContactosEgresadosOracle egreContactosEgresado
 	 */
	public function update($egreContactosEgresado){
		$sql = 'UPDATE egre_contactos_egresados SET ID_MEDIO_CONTACTO = ?, ID_EGRESADO = ?, DESCRIPCION = ? WHERE ID_CONTACTO_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreContactosEgresado->idMedioContacto);
		$sqlQuery->setNumber($egreContactosEgresado->idEgresado);
		$sqlQuery->set($egreContactosEgresado->descripcion);

		$sqlQuery->setNumber($egreContactosEgresado->idContactoEgresado);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_contactos_egresados';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDMEDIOCONTACTO($value){
		$sql = 'SELECT * FROM egre_contactos_egresados WHERE ID_MEDIO_CONTACTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDEGRESADO($value){
		$sql = 'SELECT * FROM egre_contactos_egresados WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDESCRIPCION($value){
		$sql = 'SELECT * FROM egre_contactos_egresados WHERE DESCRIPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDMEDIOCONTACTO($value){
		$sql = 'DELETE FROM egre_contactos_egresados WHERE ID_MEDIO_CONTACTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDEGRESADO($value){
		$sql = 'DELETE FROM egre_contactos_egresados WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDESCRIPCION($value){
		$sql = 'DELETE FROM egre_contactos_egresados WHERE DESCRIPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreContactosEgresadosOracle 
	 */
	protected function readRow($row){
		$egreContactosEgresado = new EgreContactosEgresado();
		
		$egreContactosEgresado->idContactoEgresado = $row['ID_CONTACTO_EGRESADO'];
		$egreContactosEgresado->idMedioContacto = $row['ID_MEDIO_CONTACTO'];
		$egreContactosEgresado->idEgresado = $row['ID_EGRESADO'];
		$egreContactosEgresado->descripcion = $row['DESCRIPCION'];

		return $egreContactosEgresado;
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
	 * @return EgreContactosEgresadosOracle 
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