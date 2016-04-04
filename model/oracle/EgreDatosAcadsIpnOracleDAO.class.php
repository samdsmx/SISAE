<?php
/**
 * Class that operate on table 'egre_datos_acads_ipn'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreDatosAcadsIpnOracleDAO implements EgreDatosAcadsIpnDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreDatosAcadsIpnOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE ID_DATO_ACAD_IPN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_datos_acads_ipn';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_datos_acads_ipn ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreDatosAcadsIpn primary key
 	 */
	public function delete($ID_DATO_ACAD_IPN){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE ID_DATO_ACAD_IPN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_DATO_ACAD_IPN);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreDatosAcadsIpnOracle egreDatosAcadsIpn
 	 */
	public function insert($egreDatosAcadsIpn){
	// Se ocupa la secuencia SEQ_DTSACADIPN_IDDTSACADIPN para el autoincremento de Datos_acad_ipn	
                $sql = 'INSERT INTO egre_datos_acads_ipn ('
                        . 'ID_DATO_ACAD_IPN, ID_MOTIVO_INTERRUPCION, ID_ESTATUS_EGRE, '
                        . 'ID_MOTIVO_NOTITULACION, ID_FORMA_TITULACION, ID_CARRERA, '
                        . 'ID_EGRESADO, ID_UNIDAD_RESPONSABLE, ANIO_INGRESO, '
                        . 'ANIO_EGRESO, BOLETA, PROMEDIO, '
                        . 'VALIDADO_ECU, FECHA_REGISTRO) VALUES (SEQ_DTSACADIPN_IDDTSACADIPN.NextVal, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  SYSTIMESTAMP)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreDatosAcadsIpn->idMotivoInterrupcion);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idEstatusEgre);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idMotivoNotitulacion);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idFormaTitulacion);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idCarrera);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idEgresado);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idUnidadResponsable);
		$sqlQuery->setYear($egreDatosAcadsIpn->anioIngreso);
		$sqlQuery->setYear($egreDatosAcadsIpn->anioEgreso);
		$sqlQuery->set($egreDatosAcadsIpn->boleta);
		$sqlQuery->set($egreDatosAcadsIpn->promedio);
		$sqlQuery->setNumber($egreDatosAcadsIpn->validadoEcu);		

		$id = $this->executeInsert($sqlQuery);	
		$egreDatosAcadsIpn->idDatoAcadIpn = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreDatosAcadsIpnOracle egreDatosAcadsIpn
 	 */
	public function update($egreDatosAcadsIpn){
		$sql = 'UPDATE egre_datos_acads_ipn SET '
                        . 'ID_MOTIVO_INTERRUPCION = ?, '
                        . 'ID_ESTATUS_EGRE = ?, '
                        . 'ID_MOTIVO_NOTITULACION = ?, '
                        . 'ID_FORMA_TITULACION = ?, '
                        . 'ID_CARRERA = ?, '
                        . 'ID_EGRESADO = ?, '
                        . 'ID_UNIDAD_RESPONSABLE = ?, '
                        . 'ANIO_INGRESO = ?, '
                        . 'ANIO_EGRESO = ?, '
                        . 'BOLETA = ?, '
                        . 'PROMEDIO = ?, '
                        . 'VALIDADO_ECU = ?, '
                        . 'FECHA_REGISTRO = ? '
                        . 'WHERE ID_DATO_ACAD_IPN = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreDatosAcadsIpn->idMotivoInterrupcion);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idEstatusEgre);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idMotivoNotitulacion);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idFormaTitulacion);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idCarrera);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idEgresado);
		$sqlQuery->setNumber($egreDatosAcadsIpn->idUnidadResponsable);
		$sqlQuery->setYear($egreDatosAcadsIpn->anioIngreso);
		$sqlQuery->setYear($egreDatosAcadsIpn->anioEgreso);
		$sqlQuery->set($egreDatosAcadsIpn->boleta);
		$sqlQuery->set($egreDatosAcadsIpn->promedio);
		$sqlQuery->setNumber($egreDatosAcadsIpn->validadoEcu);
		$sqlQuery->set($egreDatosAcadsIpn->fechaRegistro);

		$sqlQuery->setNumber($egreDatosAcadsIpn->idDatoAcadIpn);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_datos_acads_ipn';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDMOTIVOINTERRUPCION($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE ID_MOTIVO_INTERRUPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDESTATUSEGRE($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE ID_ESTATUS_EGRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDMOTIVONOTITULACION($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE ID_MOTIVO_NOTITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDFORMATITULACION($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE ID_FORMA_TITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDCARRERA($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE ID_CARRERA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDEGRESADO($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDUNIDADRESPONSABLE($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE ID_UNIDAD_RESPONSABLE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByANIOINGRESO($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE ANIO_INGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByANIOEGRESO($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE ANIO_EGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByBOLETA($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE BOLETA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPROMEDIO($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE PROMEDIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVALIDADOECU($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE VALIDADO_ECU = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHAREGISTRO($value){
		$sql = 'SELECT * FROM egre_datos_acads_ipn WHERE FECHA_REGISTRO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDMOTIVOINTERRUPCION($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE ID_MOTIVO_INTERRUPCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDESTATUSEGRE($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE ID_ESTATUS_EGRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDMOTIVONOTITULACION($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE ID_MOTIVO_NOTITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDFORMATITULACION($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE ID_FORMA_TITULACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDCARRERA($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE ID_CARRERA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDEGRESADO($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDUNIDADRESPONSABLE($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE ID_UNIDAD_RESPONSABLE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByANIOINGRESO($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE ANIO_INGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByANIOEGRESO($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE ANIO_EGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByBOLETA($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE BOLETA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPROMEDIO($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE PROMEDIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVALIDADOECU($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE VALIDADO_ECU = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHAREGISTRO($value){
		$sql = 'DELETE FROM egre_datos_acads_ipn WHERE FECHA_REGISTRO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreDatosAcadsIpnOracle 
	 */
	protected function readRow($row){
		$egreDatosAcadsIpn = new EgreDatosAcadsIpn();
		
		$egreDatosAcadsIpn->idDatoAcadIpn = $row['ID_DATO_ACAD_IPN'];
		$egreDatosAcadsIpn->idMotivoInterrupcion = $row['ID_MOTIVO_INTERRUPCION'];
		$egreDatosAcadsIpn->idEstatusEgre = $row['ID_ESTATUS_EGRE'];
		$egreDatosAcadsIpn->idMotivoNotitulacion = $row['ID_MOTIVO_NOTITULACION'];
		$egreDatosAcadsIpn->idFormaTitulacion = $row['ID_FORMA_TITULACION'];
		$egreDatosAcadsIpn->idCarrera = $row['ID_CARRERA'];
		$egreDatosAcadsIpn->idEgresado = $row['ID_EGRESADO'];
		$egreDatosAcadsIpn->idUnidadResponsable = $row['ID_UNIDAD_RESPONSABLE'];
		$egreDatosAcadsIpn->anioIngreso = substr($row['ANIO_INGRESO'], 6, 4);
		$egreDatosAcadsIpn->anioEgreso = substr($row['ANIO_EGRESO'], 6, 4);
		$egreDatosAcadsIpn->boleta = $row['BOLETA'];
		$egreDatosAcadsIpn->promedio = $row['PROMEDIO'];
		$egreDatosAcadsIpn->validadoEcu = $row['VALIDADO_ECU'];
		$egreDatosAcadsIpn->fechaRegistro = $row['FECHA_REGISTRO'];

		return $egreDatosAcadsIpn;
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
	 * @return EgreDatosAcadsIpnOracle 
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