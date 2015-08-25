<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreAsoEgreDomExtDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreAsoEgreDomExt 
	 */
	public function load($iDDOMICILIOEXT, $iDEGRESADO);

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
 	 * @param egreAsoEgreDomExt primary key
 	 */
	public function delete($iDDOMICILIOEXT, $iDEGRESADO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsoEgreDomExt egreAsoEgreDomExt
 	 */
	public function insert($egreAsoEgreDomExt);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsoEgreDomExt egreAsoEgreDomExt
 	 */
	public function update($egreAsoEgreDomExt);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>