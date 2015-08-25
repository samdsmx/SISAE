<?php
/**
 * Class that operate on table 'egre_cat_carreras'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreCatCarrerasMySqlDAO implements EgreCatCarrerasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatCarrerasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_cat_carreras WHERE ID_CARRERA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_cat_carreras';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_cat_carreras ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreCatCarrera primary key
 	 */
	public function delete($ID_CARRERA){
		$sql = 'DELETE FROM egre_cat_carreras WHERE ID_CARRERA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_CARRERA);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatCarrerasMySql egreCatCarrera
 	 */
	public function insert($egreCatCarrera){
		$sql = 'INSERT INTO egre_cat_carreras (ID_OFERTA_EDUCATIVA, ID_NIVEL_EDUCATIVO, CARRERA) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreCatCarrera->iDOFERTAEDUCATIVA);
		$sqlQuery->setNumber($egreCatCarrera->iDNIVELEDUCATIVO);
		$sqlQuery->set($egreCatCarrera->cARRERA);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatCarrera->iDCARRERA = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatCarrerasMySql egreCatCarrera
 	 */
	public function update($egreCatCarrera){
		$sql = 'UPDATE egre_cat_carreras SET ID_OFERTA_EDUCATIVA = ?, ID_NIVEL_EDUCATIVO = ?, CARRERA = ? WHERE ID_CARRERA = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreCatCarrera->iDOFERTAEDUCATIVA);
		$sqlQuery->setNumber($egreCatCarrera->iDNIVELEDUCATIVO);
		$sqlQuery->set($egreCatCarrera->cARRERA);

		$sqlQuery->setNumber($egreCatCarrera->iDCARRERA);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_cat_carreras';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDOFERTAEDUCATIVA($value){
		$sql = 'SELECT * FROM egre_cat_carreras WHERE ID_OFERTA_EDUCATIVA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDNIVELEDUCATIVO($value){
		$sql = 'SELECT * FROM egre_cat_carreras WHERE ID_NIVEL_EDUCATIVO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCARRERA($value){
		$sql = 'SELECT * FROM egre_cat_carreras WHERE CARRERA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDOFERTAEDUCATIVA($value){
		$sql = 'DELETE FROM egre_cat_carreras WHERE ID_OFERTA_EDUCATIVA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDNIVELEDUCATIVO($value){
		$sql = 'DELETE FROM egre_cat_carreras WHERE ID_NIVEL_EDUCATIVO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCARRERA($value){
		$sql = 'DELETE FROM egre_cat_carreras WHERE CARRERA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreCatCarrerasMySql 
	 */
	protected function readRow($row){
		$egreCatCarrera = new EgreCatCarrera();
		
		$egreCatCarrera->iDCARRERA = $row['ID_CARRERA'];
		$egreCatCarrera->iDOFERTAEDUCATIVA = $row['ID_OFERTA_EDUCATIVA'];
		$egreCatCarrera->iDNIVELEDUCATIVO = $row['ID_NIVEL_EDUCATIVO'];
		$egreCatCarrera->cARRERA = $row['CARRERA'];

		return $egreCatCarrera;
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
	 * @return EgreCatCarrerasMySql 
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