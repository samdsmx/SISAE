<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreCatEstatusEgreDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCatEstatusEgre 
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
 	 * @param egreCatEstatusEgre primary key
 	 */
	public function delete($ID_ESTATUS_EGRE);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatEstatusEgre egreCatEstatusEgre
 	 */
	public function insert($egreCatEstatusEgre);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatEstatusEgre egreCatEstatusEgre
 	 */
	public function update($egreCatEstatusEgre);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByESTATUS($value);


	public function deleteByESTATUS($value);


}
?>