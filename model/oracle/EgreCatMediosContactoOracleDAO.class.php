<?php
/**
 * Class that operate on table 'egre_cat_medios_contacto'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreCatMediosContactoOracleDAO implements EgreCatMediosContactoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatMediosContactoOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_cat_medios_contacto WHERE ID_MEDIO_CONTACTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_cat_medios_contacto';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_cat_medios_contacto ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreCatMediosContacto primary key
 	 */
	public function delete($ID_MEDIO_CONTACTO){
		$sql = 'DELETE FROM egre_cat_medios_contacto WHERE ID_MEDIO_CONTACTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_MEDIO_CONTACTO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatMediosContactoOracle egreCatMediosContacto
 	 */
	public function insert($egreCatMediosContacto){
		$sql = 'INSERT INTO egre_cat_medios_contacto (MEDIO_CONTACTO) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMediosContacto->medioContacto);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatMediosContacto->idMedioContacto = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatMediosContactoOracle egreCatMediosContacto
 	 */
	public function update($egreCatMediosContacto){
		$sql = 'UPDATE egre_cat_medios_contacto SET MEDIO_CONTACTO = ? WHERE ID_MEDIO_CONTACTO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMediosContacto->medioContacto);

		$sqlQuery->setNumber($egreCatMediosContacto->idMedioContacto);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_cat_medios_contacto';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMEDIOCONTACTO($value){
		$sql = 'SELECT * FROM egre_cat_medios_contacto WHERE MEDIO_CONTACTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMEDIOCONTACTO($value){
		$sql = 'DELETE FROM egre_cat_medios_contacto WHERE MEDIO_CONTACTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreCatMediosContactoOracle 
	 */
	protected function readRow($row){
		$egreCatMediosContacto = new EgreCatMediosContacto();
		
		$egreCatMediosContacto->idMedioContacto = $row['ID_MEDIO_CONTACTO'];
		$egreCatMediosContacto->medioContacto = $row['MEDIO_CONTACTO'];

		return $egreCatMediosContacto;
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
	 * @return EgreCatMediosContactoOracle 
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