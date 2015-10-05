<?php
/**
 * Class that operate on table 'cipn_cat_unidades_responsables'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-04 23:50
 */
class CipnCatUnidadesResponsablesMySqlDAO implements CipnCatUnidadesResponsablesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CipnCatUnidadesResponsablesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE ID_UNIDAD_RESPONSABLE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param cipnCatUnidadesResponsable primary key
 	 */
	public function delete($ID_UNIDAD_RESPONSABLE){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE ID_UNIDAD_RESPONSABLE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_UNIDAD_RESPONSABLE);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CipnCatUnidadesResponsablesMySql cipnCatUnidadesResponsable
 	 */
	public function insert($cipnCatUnidadesResponsable){
		$sql = 'INSERT INTO cipn_cat_unidades_responsables (ID_UNIDAD_RESPONSABLE_PADRE, CLAVE, UNIDAD_RESPONSABLE, ID_NOMBRE_UR, ID_UR_CLASIFICACION, ID_UR_DOMICILIO, ESTATUS, FECHA_BAJA, OBSERVACIONES, ID_USUARIO_TRAN, FECHA_TRAN, ID_UNIDAD_RESPONSABLE_ANT, ANIO_ALTA) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDUNIDADRESPONSABLEPADRE);
		$sqlQuery->set($cipnCatUnidadesResponsable->cLAVE);
		$sqlQuery->set($cipnCatUnidadesResponsable->uNIDADRESPONSABLE);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDNOMBREUR);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDURCLASIFICACION);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDURDOMICILIO);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->eSTATUS);
		$sqlQuery->set($cipnCatUnidadesResponsable->fECHABAJA);
		$sqlQuery->set($cipnCatUnidadesResponsable->oBSERVACIONES);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDUSUARIOTRAN);
		$sqlQuery->set($cipnCatUnidadesResponsable->fECHATRAN);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDUNIDADRESPONSABLEANT);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->aNIOALTA);

		$id = $this->executeInsert($sqlQuery);	
		$cipnCatUnidadesResponsable->iDUNIDADRESPONSABLE = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param CipnCatUnidadesResponsablesMySql cipnCatUnidadesResponsable
 	 */
	public function update($cipnCatUnidadesResponsable){
		$sql = 'UPDATE cipn_cat_unidades_responsables SET ID_UNIDAD_RESPONSABLE_PADRE = ?, CLAVE = ?, UNIDAD_RESPONSABLE = ?, ID_NOMBRE_UR = ?, ID_UR_CLASIFICACION = ?, ID_UR_DOMICILIO = ?, ESTATUS = ?, FECHA_BAJA = ?, OBSERVACIONES = ?, ID_USUARIO_TRAN = ?, FECHA_TRAN = ?, ID_UNIDAD_RESPONSABLE_ANT = ?, ANIO_ALTA = ? WHERE ID_UNIDAD_RESPONSABLE = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDUNIDADRESPONSABLEPADRE);
		$sqlQuery->set($cipnCatUnidadesResponsable->cLAVE);
		$sqlQuery->set($cipnCatUnidadesResponsable->uNIDADRESPONSABLE);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDNOMBREUR);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDURCLASIFICACION);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDURDOMICILIO);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->eSTATUS);
		$sqlQuery->set($cipnCatUnidadesResponsable->fECHABAJA);
		$sqlQuery->set($cipnCatUnidadesResponsable->oBSERVACIONES);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDUSUARIOTRAN);
		$sqlQuery->set($cipnCatUnidadesResponsable->fECHATRAN);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDUNIDADRESPONSABLEANT);
		$sqlQuery->setNumber($cipnCatUnidadesResponsable->aNIOALTA);

		$sqlQuery->setNumber($cipnCatUnidadesResponsable->iDUNIDADRESPONSABLE);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDUNIDADRESPONSABLEPADRE($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE ID_UNIDAD_RESPONSABLE_PADRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCLAVE($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE CLAVE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUNIDADRESPONSABLE($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE UNIDAD_RESPONSABLE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDNOMBREUR($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE ID_NOMBRE_UR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDURCLASIFICACION($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE ID_UR_CLASIFICACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDURDOMICILIO($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE ID_UR_DOMICILIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByESTATUS($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHABAJA($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE FECHA_BAJA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOBSERVACIONES($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE OBSERVACIONES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDUSUARIOTRAN($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHATRAN($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDUNIDADRESPONSABLEANT($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE ID_UNIDAD_RESPONSABLE_ANT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByANIOALTA($value){
		$sql = 'SELECT * FROM cipn_cat_unidades_responsables WHERE ANIO_ALTA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDUNIDADRESPONSABLEPADRE($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE ID_UNIDAD_RESPONSABLE_PADRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCLAVE($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE CLAVE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUNIDADRESPONSABLE($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE UNIDAD_RESPONSABLE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDNOMBREUR($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE ID_NOMBRE_UR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDURCLASIFICACION($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE ID_UR_CLASIFICACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDURDOMICILIO($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE ID_UR_DOMICILIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByESTATUS($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHABAJA($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE FECHA_BAJA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOBSERVACIONES($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE OBSERVACIONES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDUSUARIOTRAN($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHATRAN($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDUNIDADRESPONSABLEANT($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE ID_UNIDAD_RESPONSABLE_ANT = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByANIOALTA($value){
		$sql = 'DELETE FROM cipn_cat_unidades_responsables WHERE ANIO_ALTA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return CipnCatUnidadesResponsablesMySql 
	 */
	protected function readRow($row){
		$cipnCatUnidadesResponsable = new CipnCatUnidadesResponsable();
		
		$cipnCatUnidadesResponsable->iDUNIDADRESPONSABLE = $row['ID_UNIDAD_RESPONSABLE'];
		$cipnCatUnidadesResponsable->iDUNIDADRESPONSABLEPADRE = $row['ID_UNIDAD_RESPONSABLE_PADRE'];
		$cipnCatUnidadesResponsable->cLAVE = $row['CLAVE'];
		$cipnCatUnidadesResponsable->uNIDADRESPONSABLE = $row['UNIDAD_RESPONSABLE'];
		$cipnCatUnidadesResponsable->iDNOMBREUR = $row['ID_NOMBRE_UR'];
		$cipnCatUnidadesResponsable->iDURCLASIFICACION = $row['ID_UR_CLASIFICACION'];
		$cipnCatUnidadesResponsable->iDURDOMICILIO = $row['ID_UR_DOMICILIO'];
		$cipnCatUnidadesResponsable->eSTATUS = $row['ESTATUS'];
		$cipnCatUnidadesResponsable->fECHABAJA = $row['FECHA_BAJA'];
		$cipnCatUnidadesResponsable->oBSERVACIONES = $row['OBSERVACIONES'];
		$cipnCatUnidadesResponsable->iDUSUARIOTRAN = $row['ID_USUARIO_TRAN'];
		$cipnCatUnidadesResponsable->fECHATRAN = $row['FECHA_TRAN'];
		$cipnCatUnidadesResponsable->iDUNIDADRESPONSABLEANT = $row['ID_UNIDAD_RESPONSABLE_ANT'];
		$cipnCatUnidadesResponsable->aNIOALTA = $row['ANIO_ALTA'];

		return $cipnCatUnidadesResponsable;
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
	 * @return CipnCatUnidadesResponsablesMySql 
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