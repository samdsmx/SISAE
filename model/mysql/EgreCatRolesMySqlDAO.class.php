<?php
/**
 * Class that operate on table 'egre_cat_roles'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreCatRolesMySqlDAO implements EgreCatRolesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreCatRolesMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_cat_roles WHERE ID_ROL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_cat_roles';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_cat_roles ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreCatRole primary key
 	 */
	public function delete($ID_ROL){
		$sql = 'DELETE FROM egre_cat_roles WHERE ID_ROL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_ROL);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatRolesMySql egreCatRole
 	 */
	public function insert($egreCatRole){
		$sql = 'INSERT INTO egre_cat_roles (ROL) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatRole->rol);

		$id = $this->executeInsert($sqlQuery);	
		$egreCatRole->idRol = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatRolesMySql egreCatRole
 	 */
	public function update($egreCatRole){
		$sql = 'UPDATE egre_cat_roles SET ROL = ? WHERE ID_ROL = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreCatRole->rol);

		$sqlQuery->setNumber($egreCatRole->idRol);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_cat_roles';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByROL($value){
		$sql = 'SELECT * FROM egre_cat_roles WHERE ROL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByROL($value){
		$sql = 'DELETE FROM egre_cat_roles WHERE ROL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreCatRolesMySql 
	 */
	protected function readRow($row){
		$egreCatRole = new EgreCatRole();
		
		$egreCatRole->idRol = $row['ID_ROL'];
		$egreCatRole->rol = $row['ROL'];

		return $egreCatRole;
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
	 * @return EgreCatRolesMySql 
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