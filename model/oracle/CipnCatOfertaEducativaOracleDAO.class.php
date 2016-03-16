<?php
/**
 * Class that operate on table 'cipn_cat_oferta_educativa'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
class CipnCatOfertaEducativaOracleDAO implements CipnCatOfertaEducativaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return CipnCatOfertaEducativaOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM SC_CIPN.CIPN_CAT_OFERTAS_EDUCATIVAS WHERE ID_OFERTA_EDUCATIVA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM SC_CIPN.CIPN_CAT_OFERTAS_EDUCATIVAS';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM SC_CIPN.CIPN_CAT_OFERTAS_EDUCATIVAS where estatus = 1 ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function queryByIDOFERTAEDUCATIVA($value){
		$sql = 'SELECT * FROM SC_CIPN.CIPN_CAT_OFERTAS_EDUCATIVAS WHERE ID_OFERTA_EDUCATIVA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOFERTAEDUCATIVA($value){
		$sql = 'SELECT * FROM SC_CIPN.CIPN_CAT_OFERTAS_EDUCATIVAS WHERE OFERTA_EDUCATIVA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
                
        public function queryByIDUSUARIOTRAN($value){
		$sql = 'SELECT * FROM SC_CIPN.CIPN_CAT_OFERTAS_EDUCATIVAS WHERE ID_USUARIO_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHATRAN($value){
		$sql = 'SELECT * FROM SC_CIPN.CIPN_CAT_OFERTAS_EDUCATIVAS WHERE FECHA_TRAN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByESTATUS($value){
		$sql = 'SELECT * FROM SC_CIPN.CIPN_CAT_OFERTAS_EDUCATIVAS WHERE ESTATUS = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Read row
	 *
	 * @return CipnCatOfertaEducativa 
	 */
	protected function readRow($row){
		$cipnCatOfertaEducativa = new CipnCatOfertaEducativa();
		
		$cipnCatOfertaEducativa->idOfertaEducativa = $row['ID_OFERTA_EDUCATIVA'];
                $cipnCatOfertaEducativa->ofertaEducativa = $row['OFERTA_EDUCATIVA'];
                $cipnCatOfertaEducativa->idUsuarioTran = $row['ID_USUARIO_TRAN'];
                $cipnCatOfertaEducativa->fechaTran = $row['FECHA_TRAN'];
                $cipnCatOfertaEducativa->estatus = $row['ESTATUS'];

		return $cipnCatOfertaEducativa;
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
	 * @return CipnCatOfertaEducativaOracle 
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