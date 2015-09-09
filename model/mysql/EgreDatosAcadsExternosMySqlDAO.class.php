<?php
/**
 * Class that operate on table 'egre_datos_acads_externos'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreDatosAcadsExternosMySqlDAO implements EgreDatosAcadsExternosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreDatosAcadsExternosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_datos_acads_externos WHERE ID_DATO_ACAD_EXTERNO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_datos_acads_externos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_datos_acads_externos ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreDatosAcadsExterno primary key
 	 */
	public function delete($ID_DATO_ACAD_EXTERNO){
		$sql = 'DELETE FROM egre_datos_acads_externos WHERE ID_DATO_ACAD_EXTERNO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_DATO_ACAD_EXTERNO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreDatosAcadsExternosMySql egreDatosAcadsExterno
 	 */
	public function insert($egreDatosAcadsExterno){
		$sql = 'INSERT INTO egre_datos_acads_externos (ESCUELA, ID_EGRESADO, CARRERA, ANIO_INGRESO, ANIO_EGRESO, PROMEDIO, NIVEL) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreDatosAcadsExterno->escuela);
		$sqlQuery->setNumber($egreDatosAcadsExterno->idEgresado);
		$sqlQuery->set($egreDatosAcadsExterno->carrera);
		$sqlQuery->set($egreDatosAcadsExterno->anioIngreso);
		$sqlQuery->set($egreDatosAcadsExterno->anioEgreso);
		$sqlQuery->set($egreDatosAcadsExterno->promedio);
		$sqlQuery->set($egreDatosAcadsExterno->nivel);

		$id = $this->executeInsert($sqlQuery);	
		$egreDatosAcadsExterno->idDatoAcadExterno = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreDatosAcadsExternosMySql egreDatosAcadsExterno
 	 */
	public function update($egreDatosAcadsExterno){
		$sql = 'UPDATE egre_datos_acads_externos SET ESCUELA = ?, ID_EGRESADO = ?, CARRERA = ?, ANIO_INGRESO = ?, ANIO_EGRESO = ?, PROMEDIO = ?, NIVEL = ? WHERE ID_DATO_ACAD_EXTERNO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreDatosAcadsExterno->escuela);
		$sqlQuery->setNumber($egreDatosAcadsExterno->idEgresado);
		$sqlQuery->set($egreDatosAcadsExterno->carrera);
		$sqlQuery->set($egreDatosAcadsExterno->anioIngreso);
		$sqlQuery->set($egreDatosAcadsExterno->anioEgreso);
		$sqlQuery->set($egreDatosAcadsExterno->promedio);
		$sqlQuery->set($egreDatosAcadsExterno->nivel);

		$sqlQuery->setNumber($egreDatosAcadsExterno->idDatoAcadExterno);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_datos_acads_externos';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByESCUELA($value){
		$sql = 'SELECT * FROM egre_datos_acads_externos WHERE ESCUELA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDEGRESADO($value){
		$sql = 'SELECT * FROM egre_datos_acads_externos WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCARRERA($value){
		$sql = 'SELECT * FROM egre_datos_acads_externos WHERE CARRERA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByANIOINGRESO($value){
		$sql = 'SELECT * FROM egre_datos_acads_externos WHERE ANIO_INGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByANIOEGRESO($value){
		$sql = 'SELECT * FROM egre_datos_acads_externos WHERE ANIO_EGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPROMEDIO($value){
		$sql = 'SELECT * FROM egre_datos_acads_externos WHERE PROMEDIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNIVEL($value){
		$sql = 'SELECT * FROM egre_datos_acads_externos WHERE NIVEL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByESCUELA($value){
		$sql = 'DELETE FROM egre_datos_acads_externos WHERE ESCUELA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDEGRESADO($value){
		$sql = 'DELETE FROM egre_datos_acads_externos WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCARRERA($value){
		$sql = 'DELETE FROM egre_datos_acads_externos WHERE CARRERA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByANIOINGRESO($value){
		$sql = 'DELETE FROM egre_datos_acads_externos WHERE ANIO_INGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByANIOEGRESO($value){
		$sql = 'DELETE FROM egre_datos_acads_externos WHERE ANIO_EGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPROMEDIO($value){
		$sql = 'DELETE FROM egre_datos_acads_externos WHERE PROMEDIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNIVEL($value){
		$sql = 'DELETE FROM egre_datos_acads_externos WHERE NIVEL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreDatosAcadsExternosMySql 
	 */
	protected function readRow($row){
		$egreDatosAcadsExterno = new EgreDatosAcadsExterno();
		
		$egreDatosAcadsExterno->idDatoAcadExterno = $row['ID_DATO_ACAD_EXTERNO'];
		$egreDatosAcadsExterno->escuela = $row['ESCUELA'];
		$egreDatosAcadsExterno->idEgresado = $row['ID_EGRESADO'];
		$egreDatosAcadsExterno->carrera = $row['CARRERA'];
		$egreDatosAcadsExterno->anioIngreso = $row['ANIO_INGRESO'];
		$egreDatosAcadsExterno->anioEgreso = $row['ANIO_EGRESO'];
		$egreDatosAcadsExterno->promedio = $row['PROMEDIO'];
		$egreDatosAcadsExterno->nivel = $row['NIVEL'];

		return $egreDatosAcadsExterno;
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
	 * @return EgreDatosAcadsExternosMySql 
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