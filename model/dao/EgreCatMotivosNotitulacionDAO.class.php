<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreCatMotivosNotitulacionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCatMotivosNotitulacion 
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
 	 * @param egreCatMotivosNotitulacion primary key
 	 */
	public function delete($ID_MOTIVO_NOTITULACION);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatMotivosNotitulacion egreCatMotivosNotitulacion
 	 */
	public function insert($egreCatMotivosNotitulacion);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatMotivosNotitulacion egreCatMotivosNotitulacion
 	 */
	public function update($egreCatMotivosNotitulacion);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMOTIVONOTITULACION($value);


	public function deleteByMOTIVONOTITULACION($value);


}
?>