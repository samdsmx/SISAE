<?php
/**
 * Class that operate on table 'egre_bitacora_validaciones'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreBitacoraValidacionesOracleDAO implements EgreBitacoraValidacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreBitacoraValidacionesOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_bitacora_validaciones WHERE ID_BITACORA_VALIDACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_bitacora_validaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_bitacora_validaciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreBitacoraValidacione primary key
 	 */
	public function delete($ID_BITACORA_VALIDACION){
		$sql = 'DELETE FROM egre_bitacora_validaciones WHERE ID_BITACORA_VALIDACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_BITACORA_VALIDACION);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreBitacoraValidacionesOracle egreBitacoraValidacione
 	 */
	public function insert($egreBitacoraValidacione){
		$sql = 'INSERT INTO egre_bitacora_validaciones (ID_DATOS_ACAD_IPN, ID_USUARIO, FECHA) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreBitacoraValidacione->idDatosAcadIpn);
		$sqlQuery->setNumber($egreBitacoraValidacione->idUsuario);
		$sqlQuery->set($egreBitacoraValidacione->fecha);

		$id = $this->executeInsert($sqlQuery);	
		$egreBitacoraValidacione->idBitacoraValidacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreBitacoraValidacionesOracle egreBitacoraValidacione
 	 */
	public function update($egreBitacoraValidacione){
		$sql = 'UPDATE egre_bitacora_validaciones SET ID_DATOS_ACAD_IPN = ?, ID_USUARIO = ?, FECHA = ? WHERE ID_BITACORA_VALIDACION = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreBitacoraValidacione->idDatosAcadIpn);
		$sqlQuery->setNumber($egreBitacoraValidacione->idUsuario);
		$sqlQuery->set($egreBitacoraValidacione->fecha);

		$sqlQuery->setNumber($egreBitacoraValidacione->idBitacoraValidacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_bitacora_validaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDDATOSACADIPN($value){
		$sql = 'SELECT * FROM egre_bitacora_validaciones WHERE ID_DATOS_ACAD_IPN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDUSUARIO($value){
		$sql = 'SELECT * FROM egre_bitacora_validaciones WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHA($value){
		$sql = 'SELECT * FROM egre_bitacora_validaciones WHERE FECHA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDDATOSACADIPN($value){
		$sql = 'DELETE FROM egre_bitacora_validaciones WHERE ID_DATOS_ACAD_IPN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDUSUARIO($value){
		$sql = 'DELETE FROM egre_bitacora_validaciones WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHA($value){
		$sql = 'DELETE FROM egre_bitacora_validaciones WHERE FECHA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreBitacoraValidacionesOracle 
	 */
	protected function readRow($row){
		$egreBitacoraValidacione = new EgreBitacoraValidacione();
		
		$egreBitacoraValidacione->idBitacoraValidacion = $row['ID_BITACORA_VALIDACION'];
		$egreBitacoraValidacione->idDatosAcadIpn = $row['ID_DATOS_ACAD_IPN'];
		$egreBitacoraValidacione->idUsuario = $row['ID_USUARIO'];
		$egreBitacoraValidacione->fecha = $row['FECHA'];

		return $egreBitacoraValidacione;
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
	 * @return EgreBitacoraValidacionesOracle 
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