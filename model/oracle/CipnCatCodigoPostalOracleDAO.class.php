<?php
/**
 * Class that operate on table 'cipn_cat_codigos_postales'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
class CipnCatCodigoPostalOracleDAO implements CipnCatCodigoPostalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CipnCatCodigoPostalOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_codigos_postales WHERE ID_CODIGO_POSTAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_codigos_postales';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_codigos_postales ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function queryByIDCODIGOPOSTAL($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_codigos_postales WHERE ID_CODIGO_POSTAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCODIGOPOSTAL($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_codigos_postales WHERE CODIGO_POSTAL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        public function queryByIDMUNICIPIO($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_codigos_postales WHERE ID_MUNICIPIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        
        public function queryByIDUSUARIOTRAN($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_codigos_postales WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHATRAN($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_estados_civiles WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByESTATUS($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_estados_civiles WHERE ESTATUS = ?';
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
		$cipnCatCodigoPostal = new CipnCatCodigoPostal();
		
		$cipnCatCodigoPostal->idCodigoPostal = $row['ID_CODIGO_POSTAL'];
		$cipnCatCodigoPostal->codigoPostal = $row['CODIGO_POSTAL'];
                $cipnCatCodigoPostal->idMunicipio = $row['ID_MUNICIPIO'];
                $cipnCatCodigoPostal->idUsuarioTran = $row['ID_USUARIO_TRAN'];
                $cipnCatCodigoPostal->estatus = $row['ESTATUS'];

		return $cipnCatCodigoPostal;
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