<?php
/**
 * Class that operate on table 'egre_cat_medios_contacto'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreCatMediosContactoMySqlDAO implements EgreCatMediosContactoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatMediosContactoMySql 
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
 	 * @param EgreCatMediosContactoMySql egreCatMediosContacto
 	 */
	public function insert($egreCatMediosContacto){
		$sql = 'INSERT INTO egre_cat_medios_contacto (MEDIO_CONTACTO) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMediosContacto->mEDIOCONTACTO);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatMediosContacto->iDMEDIOCONTACTO = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatMediosContactoMySql egreCatMediosContacto
 	 */
	public function update($egreCatMediosContacto){
		$sql = 'UPDATE egre_cat_medios_contacto SET MEDIO_CONTACTO = ? WHERE ID_MEDIO_CONTACTO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatMediosContacto->mEDIOCONTACTO);

		$sqlQuery->setNumber($egreCatMediosContacto->iDMEDIOCONTACTO);
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
	 * @return EgreCatMediosContactoMySql 
	 */
	protected function readRow($row){
		$egreCatMediosContacto = new EgreCatMediosContacto();
		
		$egreCatMediosContacto->iDMEDIOCONTACTO = $row['ID_MEDIO_CONTACTO'];
		$egreCatMediosContacto->mEDIOCONTACTO = $row['MEDIO_CONTACTO'];

		return $egreCatMediosContacto;
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
	 * @return EgreCatMediosContactoMySql 
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