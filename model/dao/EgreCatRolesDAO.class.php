<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreCatRolesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCatRoles 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param egreCatRole primary key
 	 */
	public function delete($ID_ROL);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatRoles egreCatRole
 	 */
	public function insert($egreCatRole);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatRoles egreCatRole
 	 */
	public function update($egreCatRole);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByROL($value);


	public function deleteByROL($value);


}
?>