<?php
/**
 * Class that operate on table 'egre_contactos_egresados'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreContactosEgresadosMySqlDAO implements EgreContactosEgresadosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreContactosEgresadosMySql 
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
 	 * @param EgreContactosEgresadosMySql egreContactosEgresado
 	 */
	public function insert($egreContactosEgresado){
		$sql = 'INSERT INTO egre_contactos_egresados (ID_MEDIO_CONTACTO, ID_EGRESADO, DESCRIPCION) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreContactosEgresado->iDMEDIOCONTACTO);
		$sqlQuery->setNumber($egreContactosEgresado->iDEGRESADO);
		$sqlQuery->set($egreContactosEgresado->dESCRIPCION);

		$id = $this->executeInsert($sqlQuery);	
		$egreContactosEgresado->iDCONTACTOEGRESADO = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreContactosEgresadosMySql egreContactosEgresado
 	 */
	public function update($egreContactosEgresado){
		$sql = 'UPDATE egre_contactos_egresados SET ID_MEDIO_CONTACTO = ?, ID_EGRESADO = ?, DESCRIPCION = ? WHERE ID_CONTACTO_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreContactosEgresado->iDMEDIOCONTACTO);
		$sqlQuery->setNumber($egreContactosEgresado->iDEGRESADO);
		$sqlQuery->set($egreContactosEgresado->dESCRIPCION);

		$sqlQuery->setNumber($egreContactosEgresado->iDCONTACTOEGRESADO);
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
	 * @return EgreContactosEgresadosMySql 
	 */
	protected function readRow($row){
		$egreContactosEgresado = new EgreContactosEgresado();
		
		$egreContactosEgresado->iDCONTACTOEGRESADO = $row['ID_CONTACTO_EGRESADO'];
		$egreContactosEgresado->iDMEDIOCONTACTO = $row['ID_MEDIO_CONTACTO'];
		$egreContactosEgresado->iDEGRESADO = $row['ID_EGRESADO'];
		$egreContactosEgresado->dESCRIPCION = $row['DESCRIPCION'];

		return $egreContactosEgresado;
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
	 * @return EgreContactosEgresadosMySql 
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