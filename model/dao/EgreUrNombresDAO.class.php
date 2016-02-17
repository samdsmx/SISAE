<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:55
 */
interface EgreUrNombresDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreResponsablesUr 
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

	public function queryByIDUNIDADRESPONSABLE($value);

	public function queryByIDNOMBREUR($value);

	public function queryByNOMBRELARGO($value);

	public function queryByNOMBRECORTO($value);

}
?>