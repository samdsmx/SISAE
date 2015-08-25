<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreCatMediosContactoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCatMediosContacto 
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
 	 * @param egreCatMediosContacto primary key
 	 */
	public function delete($ID_MEDIO_CONTACTO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatMediosContacto egreCatMediosContacto
 	 */
	public function insert($egreCatMediosContacto);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatMediosContacto egreCatMediosContacto
 	 */
	public function update($egreCatMediosContacto);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMEDIOCONTACTO($value);


	public function deleteByMEDIOCONTACTO($value);


}
?>