<?php
/**
 * Class that operate on table 'egre_cat_carreras'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreCatCarrerasOracleDAO implements EgreCatCarrerasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatCarrerasOracle 
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
 	 * @param EgreCatCarrerasOracle egreCatCarrera
 	 */
	public function insert($egreCatCarrera){
		$sql = 'INSERT INTO egre_cat_carreras (ID_CARRERA, ID_OFERTA_EDUCATIVA, ID_NIVEL_EDUCATIVO, CARRERA) VALUES (SEQ_CARRE_IDCARRE.NextVal,?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreCatCarrera->idOfertaEducativa);
		$sqlQuery->setNumber($egreCatCarrera->idNivelEducativo);
		$sqlQuery->set($egreCatCarrera->carrera);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatCarrera->idCarrera = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatCarrerasOracle egreCatCarrera
 	 */
	public function update($egreCatCarrera){
		$sql = 'UPDATE egre_cat_carreras SET ID_OFERTA_EDUCATIVA = ?, ID_NIVEL_EDUCATIVO = ?, CARRERA = ? WHERE ID_CARRERA = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreCatCarrera->idOfertaEducativa);
		$sqlQuery->setNumber($egreCatCarrera->idNivelEducativo);
		$sqlQuery->set($egreCatCarrera->carrera);

		$sqlQuery->setNumber($egreCatCarrera->idCarrera);
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
	 * @return EgreCatCarrerasOracle 
	 */
	protected function readRow($row){
		$egreCatCarrera = new EgreCatCarrera();
		
		$egreCatCarrera->idCarrera = $row['ID_CARRERA'];
		$egreCatCarrera->idOfertaEducativa = $row['ID_OFERTA_EDUCATIVA'];
		$egreCatCarrera->idNivelEducativo = $row['ID_NIVEL_EDUCATIVO'];
		$egreCatCarrera->carrera = $row['CARRERA'];

		return $egreCatCarrera;
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
	 * @return EgreCatCarrerasOracle 
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