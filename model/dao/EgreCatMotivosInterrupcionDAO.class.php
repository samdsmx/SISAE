<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreCatMotivosInterrupcionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCatMotivosInterrupcion 
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
 	 * @param egreCatMotivosInterrupcion primary key
 	 */
	public function delete($ID_MOTIVO_INTERRUPCION);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatMotivosInterrupcion egreCatMotivosInterrupcion
 	 */
	public function insert($egreCatMotivosInterrupcion);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatMotivosInterrupcion egreCatMotivosInterrupcion
 	 */
	public function update($egreCatMotivosInterrupcion);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMOTIVOINTERRUPCION($value);


	public function deleteByMOTIVOINTERRUPCION($value);


}
?>