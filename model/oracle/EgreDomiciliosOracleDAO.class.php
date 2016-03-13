<?php
/**
 * Class that operate on table 'egre_domicilios'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreDomiciliosOracleDAO implements EgreDomiciliosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreDomiciliosOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_domicilios WHERE ID_DOMICILIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_domicilios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_domicilios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreDomicilio primary key
 	 */
	public function delete($ID_DOMICILIO){
		$sql = 'DELETE FROM egre_domicilios WHERE ID_DOMICILIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_DOMICILIO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreDomiciliosOracle egreDomicilio
 	 */
	public function insert($egreDomicilio){
	// Se utiliza la secuencia SEQ_DOM_IDDOM para el autoincrement de domicilio
                $sql = 'INSERT INTO egre_domicilios (ID_DOMICILIO, ID_ASENTAMIENTO, CALLE, NUM_EXT, NUM_INT) VALUES (SEQ_DOM_IDDOM.NextVal, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreDomicilio->idAsentamiento);
		$sqlQuery->set($egreDomicilio->calle);
		$sqlQuery->setNumber($egreDomicilio->numExt);
		$sqlQuery->setNumber($egreDomicilio->numInt);

		$this->executeInsert($sqlQuery);	
                
		$sqlQuery = new SqlQuery ('SELECT MAX(ID_DOMICILIO) as ID from EGRE_DOMICILIOS');                
                $result = $this->execute($sqlQuery);
		$egreDomicilio->idDomicilio = $result[0]['ID'];                
		return $egreDomicilio->idDomicilio;
                
        }
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreDomiciliosOracle egreDomicilio
 	 */
	public function update($egreDomicilio){
		$sql = 'UPDATE egre_domicilios SET ID_ASENTAMIENTO = ?, CALLE = ?, NUM_EXT = ?, NUM_INT = ? WHERE ID_DOMICILIO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreDomicilio->idAsentamiento);
		$sqlQuery->set($egreDomicilio->calle);
		$sqlQuery->setNumber($egreDomicilio->numExt);
		$sqlQuery->setNumber($egreDomicilio->numInt);

		$sqlQuery->setNumber($egreDomicilio->idDomicilio);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_domicilios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDASENTAMIENTO($value){
		$sql = 'SELECT * FROM egre_domicilios WHERE ID_ASENTAMIENTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCALLE($value){
		$sql = 'SELECT * FROM egre_domicilios WHERE CALLE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNUMEXT($value){
		$sql = 'SELECT * FROM egre_domicilios WHERE NUM_EXT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNUMINT($value){
		$sql = 'SELECT * FROM egre_domicilios WHERE NUM_INT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDASENTAMIENTO($value){
		$sql = 'DELETE FROM egre_domicilios WHERE ID_ASENTAMIENTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCALLE($value){
		$sql = 'DELETE FROM egre_domicilios WHERE CALLE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNUMEXT($value){
		$sql = 'DELETE FROM egre_domicilios WHERE NUM_EXT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNUMINT($value){
		$sql = 'DELETE FROM egre_domicilios WHERE NUM_INT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreDomiciliosOracle 
	 */
	protected function readRow($row){
		$egreDomicilio = new EgreDomicilio();
		
		$egreDomicilio->idDomicilio = $row['ID_DOMICILIO'];
		$egreDomicilio->idAsentamiento = $row['ID_ASENTAMIENTO'];
		$egreDomicilio->calle = $row['CALLE'];
		$egreDomicilio->numExt = $row['NUM_EXT'];
		$egreDomicilio->numInt = $row['NUM_INT'];

		return $egreDomicilio;
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
	 * @return EgreDomiciliosOracle 
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