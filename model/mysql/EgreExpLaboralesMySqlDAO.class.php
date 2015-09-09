<?php
/**
 * Class that operate on table 'egre_exp_laborales'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreExpLaboralesMySqlDAO implements EgreExpLaboralesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreExpLaboralesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE ID_EXP_LABORAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_exp_laborales';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_exp_laborales ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreExpLaborale primary key
 	 */
	public function delete($ID_EXP_LABORAL){
		$sql = 'DELETE FROM egre_exp_laborales WHERE ID_EXP_LABORAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_EXP_LABORAL);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreExpLaboralesMySql egreExpLaborale
 	 */
	public function insert($egreExpLaborale){
		$sql = 'INSERT INTO egre_exp_laborales (ID_EGRESADO, NOMBRE_EMPRESA, URL_EMPRESA, PUESTO, FECHA_INGRESO, FECHA_EGRESO, RESPONSABILIDADES, JEFE_INMEDIATO, TEL_REFERENCIA, CORREO_REFERENCIA) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreExpLaborale->idEgresado);
		$sqlQuery->set($egreExpLaborale->nombreEmpresa);
		$sqlQuery->set($egreExpLaborale->urlEmpresa);
		$sqlQuery->set($egreExpLaborale->puesto);
		$sqlQuery->set($egreExpLaborale->fechaIngreso);
		$sqlQuery->set($egreExpLaborale->fechaEgreso);
		$sqlQuery->set($egreExpLaborale->responsabilidades);
		$sqlQuery->set($egreExpLaborale->jefeInmediato);
		$sqlQuery->set($egreExpLaborale->telReferencia);
		$sqlQuery->set($egreExpLaborale->correoReferencia);

		$id = $this->executeInsert($sqlQuery);	
		$egreExpLaborale->idExpLaboral = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreExpLaboralesMySql egreExpLaborale
 	 */
	public function update($egreExpLaborale){
		$sql = 'UPDATE egre_exp_laborales SET ID_EGRESADO = ?, NOMBRE_EMPRESA = ?, URL_EMPRESA = ?, PUESTO = ?, FECHA_INGRESO = ?, FECHA_EGRESO = ?, RESPONSABILIDADES = ?, JEFE_INMEDIATO = ?, TEL_REFERENCIA = ?, CORREO_REFERENCIA = ? WHERE ID_EXP_LABORAL = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreExpLaborale->idEgresado);
		$sqlQuery->set($egreExpLaborale->nombreEmpresa);
		$sqlQuery->set($egreExpLaborale->urlEmpresa);
		$sqlQuery->set($egreExpLaborale->puesto);
		$sqlQuery->set($egreExpLaborale->fechaIngreso);
		$sqlQuery->set($egreExpLaborale->fechaEgreso);
		$sqlQuery->set($egreExpLaborale->responsabilidades);
		$sqlQuery->set($egreExpLaborale->jefeInmediato);
		$sqlQuery->set($egreExpLaborale->telReferencia);
		$sqlQuery->set($egreExpLaborale->correoReferencia);

		$sqlQuery->setNumber($egreExpLaborale->idExpLaboral);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_exp_laborales';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDEGRESADO($value){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNOMBREEMPRESA($value){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE NOMBRE_EMPRESA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByURLEMPRESA($value){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE URL_EMPRESA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPUESTO($value){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE PUESTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHAINGRESO($value){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE FECHA_INGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHAEGRESO($value){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE FECHA_EGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRESPONSABILIDADES($value){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE RESPONSABILIDADES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByJEFEINMEDIATO($value){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE JEFE_INMEDIATO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTELREFERENCIA($value){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE TEL_REFERENCIA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCORREOREFERENCIA($value){
		$sql = 'SELECT * FROM egre_exp_laborales WHERE CORREO_REFERENCIA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDEGRESADO($value){
		$sql = 'DELETE FROM egre_exp_laborales WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNOMBREEMPRESA($value){
		$sql = 'DELETE FROM egre_exp_laborales WHERE NOMBRE_EMPRESA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByURLEMPRESA($value){
		$sql = 'DELETE FROM egre_exp_laborales WHERE URL_EMPRESA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPUESTO($value){
		$sql = 'DELETE FROM egre_exp_laborales WHERE PUESTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHAINGRESO($value){
		$sql = 'DELETE FROM egre_exp_laborales WHERE FECHA_INGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHAEGRESO($value){
		$sql = 'DELETE FROM egre_exp_laborales WHERE FECHA_EGRESO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRESPONSABILIDADES($value){
		$sql = 'DELETE FROM egre_exp_laborales WHERE RESPONSABILIDADES = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByJEFEINMEDIATO($value){
		$sql = 'DELETE FROM egre_exp_laborales WHERE JEFE_INMEDIATO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTELREFERENCIA($value){
		$sql = 'DELETE FROM egre_exp_laborales WHERE TEL_REFERENCIA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCORREOREFERENCIA($value){
		$sql = 'DELETE FROM egre_exp_laborales WHERE CORREO_REFERENCIA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreExpLaboralesMySql 
	 */
	protected function readRow($row){
		$egreExpLaborale = new EgreExpLaborale();
		
		$egreExpLaborale->idExpLaboral = $row['ID_EXP_LABORAL'];
		$egreExpLaborale->idEgresado = $row['ID_EGRESADO'];
		$egreExpLaborale->nombreEmpresa = $row['NOMBRE_EMPRESA'];
		$egreExpLaborale->urlEmpresa = $row['URL_EMPRESA'];
		$egreExpLaborale->puesto = $row['PUESTO'];
		$egreExpLaborale->fechaIngreso = $row['FECHA_INGRESO'];
		$egreExpLaborale->fechaEgreso = $row['FECHA_EGRESO'];
		$egreExpLaborale->responsabilidades = $row['RESPONSABILIDADES'];
		$egreExpLaborale->jefeInmediato = $row['JEFE_INMEDIATO'];
		$egreExpLaborale->telReferencia = $row['TEL_REFERENCIA'];
		$egreExpLaborale->correoReferencia = $row['CORREO_REFERENCIA'];

		return $egreExpLaborale;
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
	 * @return EgreExpLaboralesMySql 
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