<?php
/**
 * Class that operate on table 'egre_capacitaciones'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreCapacitacionesOracleDAO implements EgreCapacitacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCapacitacionesOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_capacitaciones WHERE ID_CAPACITACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_capacitaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_capacitaciones ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreCapacitacione primary key
 	 */
	public function delete($ID_CAPACITACION){
		$sql = 'DELETE FROM egre_capacitaciones WHERE ID_CAPACITACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_CAPACITACION);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCapacitacionesOracle egreCapacitacione
 	 */
	public function insert($egreCapacitacione){
		$sql = 'INSERT INTO egre_capacitaciones (ID_TIPO_CAPACITACION, ID_EGRESADO, NOMBRE_CURSO, INSTITUCION, HORAS, FECHA_INICIO, FECHA_FIN) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreCapacitacione->idTipoCapacitacion);
		$sqlQuery->setNumber($egreCapacitacione->idEgresado);
		$sqlQuery->set($egreCapacitacione->nombreCurso);
		$sqlQuery->set($egreCapacitacione->institucion);
		$sqlQuery->setNumber($egreCapacitacione->horas);
		$sqlQuery->set($egreCapacitacione->fechaInicio);
		$sqlQuery->set($egreCapacitacione->fechaFin);

		$id = $this->executeInsert($sqlQuery);	
		$egreCapacitacione->idCapacitacion = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCapacitacionesOracle egreCapacitacione
 	 */
	public function update($egreCapacitacione){
		$sql = 'UPDATE egre_capacitaciones SET ID_TIPO_CAPACITACION = ?, ID_EGRESADO = ?, NOMBRE_CURSO = ?, INSTITUCION = ?, HORAS = ?, FECHA_INICIO = ?, FECHA_FIN = ? WHERE ID_CAPACITACION = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreCapacitacione->idTipoCapacitacion);
		$sqlQuery->setNumber($egreCapacitacione->idEgresado);
		$sqlQuery->set($egreCapacitacione->nombreCurso);
		$sqlQuery->set($egreCapacitacione->institucion);
		$sqlQuery->setNumber($egreCapacitacione->horas);
		$sqlQuery->set($egreCapacitacione->fechaInicio);
		$sqlQuery->set($egreCapacitacione->fechaFin);

		$sqlQuery->setNumber($egreCapacitacione->idCapacitacion);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_capacitaciones';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDTIPOCAPACITACION($value){
		$sql = 'SELECT * FROM egre_capacitaciones WHERE ID_TIPO_CAPACITACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDEGRESADO($value){
		$sql = 'SELECT * FROM egre_capacitaciones WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNOMBRECURSO($value){
		$sql = 'SELECT * FROM egre_capacitaciones WHERE NOMBRE_CURSO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByINSTITUCION($value){
		$sql = 'SELECT * FROM egre_capacitaciones WHERE INSTITUCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHORAS($value){
		$sql = 'SELECT * FROM egre_capacitaciones WHERE HORAS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHAINICIO($value){
		$sql = 'SELECT * FROM egre_capacitaciones WHERE FECHA_INICIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHAFIN($value){
		$sql = 'SELECT * FROM egre_capacitaciones WHERE FECHA_FIN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDTIPOCAPACITACION($value){
		$sql = 'DELETE FROM egre_capacitaciones WHERE ID_TIPO_CAPACITACION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDEGRESADO($value){
		$sql = 'DELETE FROM egre_capacitaciones WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNOMBRECURSO($value){
		$sql = 'DELETE FROM egre_capacitaciones WHERE NOMBRE_CURSO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByINSTITUCION($value){
		$sql = 'DELETE FROM egre_capacitaciones WHERE INSTITUCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHORAS($value){
		$sql = 'DELETE FROM egre_capacitaciones WHERE HORAS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHAINICIO($value){
		$sql = 'DELETE FROM egre_capacitaciones WHERE FECHA_INICIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHAFIN($value){
		$sql = 'DELETE FROM egre_capacitaciones WHERE FECHA_FIN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreCapacitacionesOracle 
	 */
	protected function readRow($row){
		$egreCapacitacione = new EgreCapacitacione();
		
		$egreCapacitacione->idCapacitacion = $row['ID_CAPACITACION'];
		$egreCapacitacione->idTipoCapacitacion = $row['ID_TIPO_CAPACITACION'];
		$egreCapacitacione->idEgresado = $row['ID_EGRESADO'];
		$egreCapacitacione->nombreCurso = $row['NOMBRE_CURSO'];
		$egreCapacitacione->institucion = $row['INSTITUCION'];
		$egreCapacitacione->horas = $row['HORAS'];
		$egreCapacitacione->fechaInicio = $row['FECHA_INICIO'];
		$egreCapacitacione->fechaFin = $row['FECHA_FIN'];

		return $egreCapacitacione;
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
	 * @return EgreCapacitacionesOracle 
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