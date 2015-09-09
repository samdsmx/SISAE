<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgrePublicacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgrePublicaciones 
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
 	 * @param egrePublicacione primary key
 	 */
	public function delete($ID_PUBLICACION);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgrePublicaciones egrePublicacione
 	 */
	public function insert($egrePublicacione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgrePublicaciones egrePublicacione
 	 */
	public function update($egrePublicacione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDEGRESADO($value);

	public function queryByPUBLICACION($value);

	public function queryByFECHA($value);


	public function deleteByIDEGRESADO($value);

	public function deleteByPUBLICACION($value);

	public function deleteByFECHA($value);


}
?>