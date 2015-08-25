<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreCatFormasTitulacionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCatFormasTitulacion 
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
 	 * @param egreCatFormasTitulacion primary key
 	 */
	public function delete($ID_FORMA_TITULACION);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatFormasTitulacion egreCatFormasTitulacion
 	 */
	public function insert($egreCatFormasTitulacion);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatFormasTitulacion egreCatFormasTitulacion
 	 */
	public function update($egreCatFormasTitulacion);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByFORMATITULACION($value);


	public function deleteByFORMATITULACION($value);


}
?>