<?php
/**
 * Class that operate on table 'cipn_cat_niveles_educativos'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
class CipnCatNivelEducativoOracleDAO implements CipnCatNivelEducativoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CipnCatNivelEducativoOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_niveles_educativos WHERE ID_NIVEL_EDUCATIVO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_niveles_educativos';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_niveles_educativos where estatus = 1 ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function queryByIDNIVELEDUCATIVO($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_niveles_educativos WHERE ID_NIVEL_EDUCATIVO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByACRONIMO($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_niveles_educativos WHERE ACRONIMO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        public function queryByNIVELEDUCATIVO($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_niveles_educativos WHERE NIVEL_EDUCATIVO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
        
        public function queryByIDUSUARIOTRAN($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_niveles_educativos WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHATRAN($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_niveles_educativos WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByESTATUS($value){
		$sql = 'SELECT * FROM SC_CIPN.cipn_cat_niveles_educativos WHERE ESTATUS = ?';
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
		$cipnCatNivelEducativo = new CipnCatNivelEducativo();
		
		$cipnCatNivelEducativo->idNivelEducativo = $row['ID_NIVEL_EDUCATIVO'];
		$cipnCatNivelEducativo->acronimo = $row['ACRONIMO'];
                $cipnCatNivelEducativo->nivelEducativo = $row['NIVEL_EDUCATIVO'];
                $cipnCatNivelEducativo->idUsuarioTran = $row['ID_USUARIO_TRAN'];
                $cipnCatNivelEducativo->fechaTran = $row['FECHA_TRAN'];
                $cipnCatNivelEducativo->estatus = $row['ESTATUS'];

		return $cipnCatNivelEducativo;
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
	 * @return CipnCatNivelEducativoOracle 
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