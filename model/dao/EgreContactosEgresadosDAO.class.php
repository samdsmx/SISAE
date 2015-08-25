<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreContactosEgresadosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreContactosEgresados 
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
 	 * @param egreContactosEgresado primary key
 	 */
	public function delete($ID_CONTACTO_EGRESADO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreContactosEgresados egreContactosEgresado
 	 */
	public function insert($egreContactosEgresado);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreContactosEgresados egreContactosEgresado
 	 */
	public function update($egreContactosEgresado);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDMEDIOCONTACTO($value);

	public function queryByIDEGRESADO($value);

	public function queryByDESCRIPCION($value);


	public function deleteByIDMEDIOCONTACTO($value);

	public function deleteByIDEGRESADO($value);

	public function deleteByDESCRIPCION($value);


}
?>