<?php
/**
 * Class that operate on table 'cipn_cat_estados_civiles'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
class CipnCatEstadosCivilesOracleDAO implements CipnCatEstadosCivilesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CipnCatEstadosCivilesOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_estados_civiles WHERE ID_ESTADO_CIVIL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_estados_civiles';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_estados_civiles ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cipnCatEstadosCivile primary key
 	 */
	public function delete($ID_ESTADO_CIVIL){
		$sql = 'DELETE FROM SC_CIPN.cipn_cat_estados_civiles WHERE ID_ESTADO_CIVIL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_ESTADO_CIVIL);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CipnCatEstadosCivilesOracle cipnCatEstadosCivile
 	 */
	public function insert($cipnCatEstadosCivile){
		$sql = 'INSERT INTO SC_CIPN.cipn_cat_estados_civiles (ESTADO_CIVIL, ID_USUARIO_TRAN, FECHA_TRAN, ESTATUS) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cipnCatEstadosCivile->eSTADOCIVIL);
		$sqlQuery->setNumber($cipnCatEstadosCivile->iDUSUARIOTRAN);
		$sqlQuery->set($cipnCatEstadosCivile->fECHATRAN);
		$sqlQuery->setNumber($cipnCatEstadosCivile->eSTATUS);

		$id = $this->executeInsert($sqlQuery);	
		$cipnCatEstadosCivile->iDESTADOCIVIL = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CipnCatEstadosCivilesOracle cipnCatEstadosCivile
 	 */
	public function update($cipnCatEstadosCivile){
		$sql = 'UPDATE SC_CIPN.cipn_cat_estados_civiles SET ESTADO_CIVIL = ?, ID_USUARIO_TRAN = ?, FECHA_TRAN = ?, ESTATUS = ? WHERE ID_ESTADO_CIVIL = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cipnCatEstadosCivile->eSTADOCIVIL);
		$sqlQuery->setNumber($cipnCatEstadosCivile->iDUSUARIOTRAN);
		$sqlQuery->set($cipnCatEstadosCivile->fECHATRAN);
		$sqlQuery->setNumber($cipnCatEstadosCivile->eSTATUS);

		$sqlQuery->setNumber($cipnCatEstadosCivile->iDESTADOCIVIL);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM SC_CIPN.cipn_cat_estados_civiles';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByESTADOCIVIL($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_estados_civiles WHERE ESTADO_CIVIL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDUSUARIOTRAN($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_estados_civiles WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHATRAN($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_estados_civiles WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByESTATUS($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_estados_civiles WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByESTADOCIVIL($value){
		$sql = 'DELETE FROM SC_CIPN.cipn_cat_estados_civiles WHERE ESTADO_CIVIL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDUSUARIOTRAN($value){
		$sql = 'DELETE FROM SC_CIPN.cipn_cat_estados_civiles WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHATRAN($value){
		$sql = 'DELETE FROM SC_CIPN.cipn_cat_estados_civiles WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByESTATUS($value){
		$sql = 'DELETE FROM SC_CIPN.cipn_cat_estados_civiles WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CipnCatEstadosCivilesOracle 
	 */
	protected function readRow($row){
		$cipnCatEstadosCivile = new CipnCatEstadosCivile();
		
		$cipnCatEstadosCivile->iDESTADOCIVIL = $row['ID_ESTADO_CIVIL'];
		$cipnCatEstadosCivile->eSTADOCIVIL = $row['ESTADO_CIVIL'];
		$cipnCatEstadosCivile->iDUSUARIOTRAN = $row['ID_USUARIO_TRAN'];
		$cipnCatEstadosCivile->fECHATRAN = $row['FECHA_TRAN'];
		$cipnCatEstadosCivile->eSTATUS = $row['ESTATUS'];

		return $cipnCatEstadosCivile;
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
	 * @return CipnCatEstadosCivilesOracle 
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