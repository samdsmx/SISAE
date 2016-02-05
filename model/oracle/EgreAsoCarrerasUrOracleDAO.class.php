<?php
/**
 * Class that operate on table 'egre_aso_carreras_ur'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreAsoCarrerasUrOracleDAO implements EgreAsoCarrerasUrDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreAsoCarrerasUrOracle 
	 */
	public function load($idUnidadResponsable, $idCarrera){
		$sql = 'SELECT * FROM egre_aso_carreras_ur WHERE ID_UNIDAD_RESPONSABLE = ?  AND ID_CARRERA = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idUnidadResponsable);
		$sqlQuery->setNumber($idCarrera);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_aso_carreras_ur';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_aso_carreras_ur ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreAsoCarrerasUr primary key
 	 */
	public function delete($idUnidadResponsable, $idCarrera){
		$sql = 'DELETE FROM egre_aso_carreras_ur WHERE ID_UNIDAD_RESPONSABLE = ?  AND ID_CARRERA = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idUnidadResponsable);
		$sqlQuery->setNumber($idCarrera);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsoCarrerasUrOracle egreAsoCarrerasUr
 	 */
	public function insert($egreAsoCarrerasUr){
		$sql = 'INSERT INTO egre_aso_carreras_ur ( ID_UNIDAD_RESPONSABLE, ID_CARRERA) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoCarrerasUr->idUnidadResponsable);

		$sqlQuery->setNumber($egreAsoCarrerasUr->idCarrera);

		$this->executeInsert($sqlQuery);	
		//$egreAsoCarrerasUr->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsoCarrerasUrOracle egreAsoCarrerasUr
 	 */
	public function update($egreAsoCarrerasUr){
		$sql = 'UPDATE egre_aso_carreras_ur SET  WHERE ID_UNIDAD_RESPONSABLE = ?  AND ID_CARRERA = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoCarrerasUr->idUnidadResponsable);

		$sqlQuery->setNumber($egreAsoCarrerasUr->idCarrera);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_aso_carreras_ur';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return EgreAsoCarrerasUrOracle 
	 */
	protected function readRow($row){
		$egreAsoCarrerasUr = new EgreAsoCarrerasUr();
		
		$egreAsoCarrerasUr->idUnidadResponsable = $row['ID_UNIDAD_RESPONSABLE'];
		$egreAsoCarrerasUr->idCarrera = $row['ID_CARRERA'];

		return $egreAsoCarrerasUr;
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
	 * @return EgreAsoCarrerasUrOracle 
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