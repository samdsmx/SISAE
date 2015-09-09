<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreAsoCarrerasUrDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreAsoCarrerasUr 
	 */
	public function load($idUnidadResponsable, $idCarrera);

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
 	 * @param egreAsoCarrerasUr primary key
 	 */
	public function delete($idUnidadResponsable, $idCarrera);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsoCarrerasUr egreAsoCarrerasUr
 	 */
	public function insert($egreAsoCarrerasUr);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsoCarrerasUr egreAsoCarrerasUr
 	 */
	public function update($egreAsoCarrerasUr);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>