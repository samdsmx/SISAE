<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreBitacoraValidacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreBitacoraValidaciones 
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
 	 * @param egreBitacoraValidacione primary key
 	 */
	public function delete($ID_BITACORA_VALIDACION);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreBitacoraValidaciones egreBitacoraValidacione
 	 */
	public function insert($egreBitacoraValidacione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreBitacoraValidaciones egreBitacoraValidacione
 	 */
	public function update($egreBitacoraValidacione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDDATOSACADIPN($value);

	public function queryByIDUSUARIO($value);

	public function queryByFECHA($value);


	public function deleteByIDDATOSACADIPN($value);

	public function deleteByIDUSUARIO($value);

	public function deleteByFECHA($value);


}
?>