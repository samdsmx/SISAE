<?php
/**
 * Class that operate on view 'VM_CP_AS_MUN_EDO'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
class EgreCPAsentamientoOracleDAO implements EgreCPAsentamientoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCPAsentamientoOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO WHERE ID_CODIGO_POSTAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function queryByIDCODIGOPOSTAL($value){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO WHERE ID_CODIGO_POSTAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCODIGOPOSTAL($value){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO WHERE CODIGO_POSTAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        
         public function queryByIDASENTAMIENTO($value){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO WHERE ID_ASENTAMIENTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        
         public function queryByASENTAMIENTO($value){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO WHERE ASENTAMIENTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        
         public function queryByIDMUNICIPIO($value){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO WHERE ID_MUNICIPIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        
        public function queryByMUNICIPIO($value){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO WHERE MUNICIPIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        
         public function queryByIDESTADO($value){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO WHERE ID_ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        
         public function queryByESTADO($value){
		$sql = 'SELECT * FROM VM_CP_AS_MUN_EDO WHERE ESTADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        
	/**
	 * Read row
	 *
	 * @return CipnCatCodigoPostalOracle 
	 */
	protected function readRow($row){
		$EgreCPAsentamiento = new EgreCPAsentamiento();
		
		$EgreCPAsentamiento->idCodigoPostal = $row['ID_CODIGO_POSTAL'];
		$EgreCPAsentamiento->codigoPostal = $row['CODIGO_POSTAL'];
                $EgreCPAsentamiento->idAsentamiento = $row['ID_ASENTAMIENTO'];
                $EgreCPAsentamiento->asentamiento = $row['ASENTAMIENTO'];
                $EgreCPAsentamiento->idMunicipio = $row['ID_MUNICIPIO'];
                $EgreCPAsentamiento->Municipio = $row['MUNICIPIO'];
                $EgreCPAsentamiento->idEstado = $row['ID_ESTADO'];
                $EgreCPAsentamiento->estado = $row['ESTADO'];
                
		return $EgreCPAsentamiento;
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
	 * @return CipnCatEstadosCivilesOracle 
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