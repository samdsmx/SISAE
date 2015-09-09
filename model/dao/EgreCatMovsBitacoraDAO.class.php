<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreCatMovsBitacoraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCatMovsBitacora 
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
 	 * @param egreCatMovsBitacora primary key
 	 */
	public function delete($ID_MOV_BITACORA);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatMovsBitacora egreCatMovsBitacora
 	 */
	public function insert($egreCatMovsBitacora);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatMovsBitacora egreCatMovsBitacora
 	 */
	public function update($egreCatMovsBitacora);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMOVIMIENTO($value);


	public function deleteByMOVIMIENTO($value);


}
?>