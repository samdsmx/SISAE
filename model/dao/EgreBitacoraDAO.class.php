<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreBitacoraDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreBitacora 
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
 	 * @param egreBitacora primary key
 	 */
	public function delete($ID_BITACORA);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreBitacora egreBitacora
 	 */
	public function insert($egreBitacora);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreBitacora egreBitacora
 	 */
	public function update($egreBitacora);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDMOVBITACORA($value);

	public function queryByIDUSUARIO($value);

	public function queryByFECHA($value);

	public function queryByOBSERVACIONES($value);

	public function queryByIP($value);


	public function deleteByIDMOVBITACORA($value);

	public function deleteByIDUSUARIO($value);

	public function deleteByFECHA($value);

	public function deleteByOBSERVACIONES($value);

	public function deleteByIP($value);


}
?>