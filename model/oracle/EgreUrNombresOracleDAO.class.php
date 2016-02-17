<?php
/**
 * Class that operate on view 'vm_ur_nombres'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreUrNombresOracleDAO implements EgreUrNombresDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreUrNombresOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM vm_ur_nombres WHERE id_unidad_responsable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM vm_ur_nombres';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM vm_ur_nombres ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function queryByIDUNIDADRESPONSABLE($value){
		$sql = 'SELECT * FROM vm_ur_nombres WHERE ID_UNIDAD_RESPONSABLE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDNOMBREUR($value){
		$sql = 'SELECT * FROM vm_ur_nombres WHERE ID_NOMBRE_UR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNOMBRELARGO($value){
		$sql = 'SELECT * FROM vm_ur_nombres WHERE NOMBRE_LARGO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNOMBRECORTO($value){
		$sql = 'SELECT * FROM vm_ur_nombres WHERE NOMBRE_CORTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	/**
	 * Read row
	 *
	 * @return EgreResponsablesUrOracle 
	 */
	protected function readRow($row){
		$egreUrNombre = new EgreUrNombres();
		
		$egreUrNombre->idUnidadResponsable = $row['ID_UNIDAD_RESPONSABLE'];
		$egreUrNombre->idNombreUR = $row['ID_NOMBRE_UR'];
		$egreUrNombre->nombreLargo = $row['NOMBRE_LARGO'];
		$egreUrNombre->nombreCorto = $row['NOMBRE_CORTO'];

		return $egreUrNombre;
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
	 * @return EgreResponsablesUrOracle 
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