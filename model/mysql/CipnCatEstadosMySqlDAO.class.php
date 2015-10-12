<?php
/**
 * Class that operate on table 'cipn_cat_estados'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
class CipnCatEstadosMySqlDAO implements CipnCatEstadosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CipnCatEstadosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cipn_cat_estados WHERE ID_ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cipn_cat_estados';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cipn_cat_estados ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cipnCatEstado primary key
 	 */
	public function delete($ID_ESTADO){
		$sql = 'DELETE FROM cipn_cat_estados WHERE ID_ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_ESTADO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CipnCatEstadosMySql cipnCatEstado
 	 */
	public function insert($cipnCatEstado){
		$sql = 'INSERT INTO cipn_cat_estados (ESTADO, ACRONIMO_ESTADO, CAPITAL, C_ESTADO, ID_USUARIO_TRAN, FECHA_TRAN, ESTATUS) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cipnCatEstado->eSTADO);
		$sqlQuery->set($cipnCatEstado->aCRONIMOESTADO);
		$sqlQuery->set($cipnCatEstado->cAPITAL);
		$sqlQuery->set($cipnCatEstado->cESTADO);
		$sqlQuery->setNumber($cipnCatEstado->iDUSUARIOTRAN);
		$sqlQuery->set($cipnCatEstado->fECHATRAN);
		$sqlQuery->setNumber($cipnCatEstado->eSTATUS);

		$id = $this->executeInsert($sqlQuery);	
		$cipnCatEstado->iDESTADO = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CipnCatEstadosMySql cipnCatEstado
 	 */
	public function update($cipnCatEstado){
		$sql = 'UPDATE cipn_cat_estados SET ESTADO = ?, ACRONIMO_ESTADO = ?, CAPITAL = ?, C_ESTADO = ?, ID_USUARIO_TRAN = ?, FECHA_TRAN = ?, ESTATUS = ? WHERE ID_ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($cipnCatEstado->eSTADO);
		$sqlQuery->set($cipnCatEstado->aCRONIMOESTADO);
		$sqlQuery->set($cipnCatEstado->cAPITAL);
		$sqlQuery->set($cipnCatEstado->cESTADO);
		$sqlQuery->setNumber($cipnCatEstado->iDUSUARIOTRAN);
		$sqlQuery->set($cipnCatEstado->fECHATRAN);
		$sqlQuery->setNumber($cipnCatEstado->eSTATUS);

		$sqlQuery->setNumber($cipnCatEstado->iDESTADO);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cipn_cat_estados';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByESTADO($value){
		$sql = 'SELECT * FROM cipn_cat_estados WHERE ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByACRONIMOESTADO($value){
		$sql = 'SELECT * FROM cipn_cat_estados WHERE ACRONIMO_ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCAPITAL($value){
		$sql = 'SELECT * FROM cipn_cat_estados WHERE CAPITAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCESTADO($value){
		$sql = 'SELECT * FROM cipn_cat_estados WHERE C_ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDUSUARIOTRAN($value){
		$sql = 'SELECT * FROM cipn_cat_estados WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHATRAN($value){
		$sql = 'SELECT * FROM cipn_cat_estados WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByESTATUS($value){
		$sql = 'SELECT * FROM cipn_cat_estados WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByESTADO($value){
		$sql = 'DELETE FROM cipn_cat_estados WHERE ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByACRONIMOESTADO($value){
		$sql = 'DELETE FROM cipn_cat_estados WHERE ACRONIMO_ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCAPITAL($value){
		$sql = 'DELETE FROM cipn_cat_estados WHERE CAPITAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCESTADO($value){
		$sql = 'DELETE FROM cipn_cat_estados WHERE C_ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDUSUARIOTRAN($value){
		$sql = 'DELETE FROM cipn_cat_estados WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHATRAN($value){
		$sql = 'DELETE FROM cipn_cat_estados WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByESTATUS($value){
		$sql = 'DELETE FROM cipn_cat_estados WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CipnCatEstadosMySql 
	 */
	protected function readRow($row){
		$cipnCatEstado = new CipnCatEstado();
		
		$cipnCatEstado->iDESTADO = $row['ID_ESTADO'];
		$cipnCatEstado->eSTADO = $row['ESTADO'];
		$cipnCatEstado->aCRONIMOESTADO = $row['ACRONIMO_ESTADO'];
		$cipnCatEstado->cAPITAL = $row['CAPITAL'];
		$cipnCatEstado->cESTADO = $row['C_ESTADO'];
		$cipnCatEstado->iDUSUARIOTRAN = $row['ID_USUARIO_TRAN'];
		$cipnCatEstado->fECHATRAN = $row['FECHA_TRAN'];
		$cipnCatEstado->eSTATUS = $row['ESTATUS'];

		return $cipnCatEstado;
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
	 * @return CipnCatEstadosMySql 
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