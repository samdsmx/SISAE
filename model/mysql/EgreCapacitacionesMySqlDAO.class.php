<?php
/**
 * Class that operate on table 'egre_capacitaciones'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreCapacitacionesMySqlDAO implements EgreCapacitacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCapacitacionesMySql 
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
 	 * @param EgreCapacitacionesMySql egreCapacitacione
 	 */
	public function insert($egreCapacitacione){
		$sql = 'INSERT INTO egre_capacitaciones (ID_TIPO_CAPACITACION, ID_EGRESADO, NOMBRE_CURSO, INSTITUCION, HORAS, FECHA_INICIO, FECHA_FIN) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreCapacitacione->iDTIPOCAPACITACION);
		$sqlQuery->setNumber($egreCapacitacione->iDEGRESADO);
		$sqlQuery->set($egreCapacitacione->nOMBRECURSO);
		$sqlQuery->set($egreCapacitacione->iNSTITUCION);
		$sqlQuery->setNumber($egreCapacitacione->hORAS);
		$sqlQuery->set($egreCapacitacione->fECHAINICIO);
		$sqlQuery->set($egreCapacitacione->fECHAFIN);

		$id = $this->executeInsert($sqlQuery);	
		$egreCapacitacione->iDCAPACITACION = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCapacitacionesMySql egreCapacitacione
 	 */
	public function update($egreCapacitacione){
		$sql = 'UPDATE egre_capacitaciones SET ID_TIPO_CAPACITACION = ?, ID_EGRESADO = ?, NOMBRE_CURSO = ?, INSTITUCION = ?, HORAS = ?, FECHA_INICIO = ?, FECHA_FIN = ? WHERE ID_CAPACITACION = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreCapacitacione->iDTIPOCAPACITACION);
		$sqlQuery->setNumber($egreCapacitacione->iDEGRESADO);
		$sqlQuery->set($egreCapacitacione->nOMBRECURSO);
		$sqlQuery->set($egreCapacitacione->iNSTITUCION);
		$sqlQuery->setNumber($egreCapacitacione->hORAS);
		$sqlQuery->set($egreCapacitacione->fECHAINICIO);
		$sqlQuery->set($egreCapacitacione->fECHAFIN);

		$sqlQuery->setNumber($egreCapacitacione->iDCAPACITACION);
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
	 * @return EgreCapacitacionesMySql 
	 */
	protected function readRow($row){
		$egreCapacitacione = new EgreCapacitacione();
		
		$egreCapacitacione->iDCAPACITACION = $row['ID_CAPACITACION'];
		$egreCapacitacione->iDTIPOCAPACITACION = $row['ID_TIPO_CAPACITACION'];
		$egreCapacitacione->iDEGRESADO = $row['ID_EGRESADO'];
		$egreCapacitacione->nOMBRECURSO = $row['NOMBRE_CURSO'];
		$egreCapacitacione->iNSTITUCION = $row['INSTITUCION'];
		$egreCapacitacione->hORAS = $row['HORAS'];
		$egreCapacitacione->fECHAINICIO = $row['FECHA_INICIO'];
		$egreCapacitacione->fECHAFIN = $row['FECHA_FIN'];

		return $egreCapacitacione;
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
	 * @return EgreCapacitacionesMySql 
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