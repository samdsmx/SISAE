<?php
/**
 * Class that operate on table 'egre_bitacora'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreBitacoraMySqlDAO implements EgreBitacoraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreBitacoraMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_bitacora WHERE ID_BITACORA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_bitacora';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_bitacora ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreBitacora primary key
 	 */
	public function delete($ID_BITACORA){
		$sql = 'DELETE FROM egre_bitacora WHERE ID_BITACORA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_BITACORA);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreBitacoraMySql egreBitacora
 	 */
	public function insert($egreBitacora){
		$sql = 'INSERT INTO egre_bitacora (ID_MOV_BITACORA, ID_USUARIO, FECHA, OBSERVACIONES, IP) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreBitacora->iDMOVBITACORA);
		$sqlQuery->setNumber($egreBitacora->iDUSUARIO);
		$sqlQuery->set($egreBitacora->fECHA);
		$sqlQuery->set($egreBitacora->oBSERVACIONES);
		$sqlQuery->set($egreBitacora->iP);

		$id = $this->executeInsert($sqlQuery);	
		$egreBitacora->iDBITACORA = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreBitacoraMySql egreBitacora
 	 */
	public function update($egreBitacora){
		$sql = 'UPDATE egre_bitacora SET ID_MOV_BITACORA = ?, ID_USUARIO = ?, FECHA = ?, OBSERVACIONES = ?, IP = ? WHERE ID_BITACORA = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreBitacora->iDMOVBITACORA);
		$sqlQuery->setNumber($egreBitacora->iDUSUARIO);
		$sqlQuery->set($egreBitacora->fECHA);
		$sqlQuery->set($egreBitacora->oBSERVACIONES);
		$sqlQuery->set($egreBitacora->iP);

		$sqlQuery->setNumber($egreBitacora->iDBITACORA);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_bitacora';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDMOVBITACORA($value){
		$sql = 'SELECT * FROM egre_bitacora WHERE ID_MOV_BITACORA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDUSUARIO($value){
		$sql = 'SELECT * FROM egre_bitacora WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHA($value){
		$sql = 'SELECT * FROM egre_bitacora WHERE FECHA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOBSERVACIONES($value){
		$sql = 'SELECT * FROM egre_bitacora WHERE OBSERVACIONES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIP($value){
		$sql = 'SELECT * FROM egre_bitacora WHERE IP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDMOVBITACORA($value){
		$sql = 'DELETE FROM egre_bitacora WHERE ID_MOV_BITACORA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDUSUARIO($value){
		$sql = 'DELETE FROM egre_bitacora WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHA($value){
		$sql = 'DELETE FROM egre_bitacora WHERE FECHA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOBSERVACIONES($value){
		$sql = 'DELETE FROM egre_bitacora WHERE OBSERVACIONES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIP($value){
		$sql = 'DELETE FROM egre_bitacora WHERE IP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreBitacoraMySql 
	 */
	protected function readRow($row){
		$egreBitacora = new EgreBitacora();
		
		$egreBitacora->iDBITACORA = $row['ID_BITACORA'];
		$egreBitacora->iDMOVBITACORA = $row['ID_MOV_BITACORA'];
		$egreBitacora->iDUSUARIO = $row['ID_USUARIO'];
		$egreBitacora->fECHA = $row['FECHA'];
		$egreBitacora->oBSERVACIONES = $row['OBSERVACIONES'];
		$egreBitacora->iP = $row['IP'];

		return $egreBitacora;
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
	 * @return EgreBitacoraMySql 
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