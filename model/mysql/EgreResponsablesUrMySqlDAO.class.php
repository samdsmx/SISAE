<?php
/**
 * Class that operate on table 'egre_responsables_ur'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreResponsablesUrMySqlDAO implements EgreResponsablesUrDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreResponsablesUrMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_responsables_ur WHERE ID_RESPONSABLE_UR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_responsables_ur';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_responsables_ur ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreResponsablesUr primary key
 	 */
	public function delete($ID_RESPONSABLE_UR){
		$sql = 'DELETE FROM egre_responsables_ur WHERE ID_RESPONSABLE_UR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_RESPONSABLE_UR);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreResponsablesUrMySql egreResponsablesUr
 	 */
	public function insert($egreResponsablesUr){
		$sql = 'INSERT INTO egre_responsables_ur (ID_USUARIO, NOMBRE, CORREO, EXTENSION) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreResponsablesUr->iDUSUARIO);
		$sqlQuery->set($egreResponsablesUr->nOMBRE);
		$sqlQuery->set($egreResponsablesUr->cORREO);
		$sqlQuery->set($egreResponsablesUr->eXTENSION);

		$id = $this->executeInsert($sqlQuery);	
		$egreResponsablesUr->iDRESPONSABLEUR = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreResponsablesUrMySql egreResponsablesUr
 	 */
	public function update($egreResponsablesUr){
		$sql = 'UPDATE egre_responsables_ur SET ID_USUARIO = ?, NOMBRE = ?, CORREO = ?, EXTENSION = ? WHERE ID_RESPONSABLE_UR = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreResponsablesUr->iDUSUARIO);
		$sqlQuery->set($egreResponsablesUr->nOMBRE);
		$sqlQuery->set($egreResponsablesUr->cORREO);
		$sqlQuery->set($egreResponsablesUr->eXTENSION);

		$sqlQuery->setNumber($egreResponsablesUr->iDRESPONSABLEUR);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_responsables_ur';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDUSUARIO($value){
		$sql = 'SELECT * FROM egre_responsables_ur WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNOMBRE($value){
		$sql = 'SELECT * FROM egre_responsables_ur WHERE NOMBRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCORREO($value){
		$sql = 'SELECT * FROM egre_responsables_ur WHERE CORREO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEXTENSION($value){
		$sql = 'SELECT * FROM egre_responsables_ur WHERE EXTENSION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDUSUARIO($value){
		$sql = 'DELETE FROM egre_responsables_ur WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNOMBRE($value){
		$sql = 'DELETE FROM egre_responsables_ur WHERE NOMBRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCORREO($value){
		$sql = 'DELETE FROM egre_responsables_ur WHERE CORREO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEXTENSION($value){
		$sql = 'DELETE FROM egre_responsables_ur WHERE EXTENSION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreResponsablesUrMySql 
	 */
	protected function readRow($row){
		$egreResponsablesUr = new EgreResponsablesUr();
		
		$egreResponsablesUr->iDRESPONSABLEUR = $row['ID_RESPONSABLE_UR'];
		$egreResponsablesUr->iDUSUARIO = $row['ID_USUARIO'];
		$egreResponsablesUr->nOMBRE = $row['NOMBRE'];
		$egreResponsablesUr->cORREO = $row['CORREO'];
		$egreResponsablesUr->eXTENSION = $row['EXTENSION'];

		return $egreResponsablesUr;
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
	 * @return EgreResponsablesUrMySql 
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