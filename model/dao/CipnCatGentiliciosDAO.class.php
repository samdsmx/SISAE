<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
interface CipnCatGentiliciosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CipnCatGentilicios 
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
 	 * @param cipnCatGentilicio primary key
 	 */
	public function delete($ID_GENTILICIO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CipnCatGentilicios cipnCatGentilicio
 	 */
	public function insert($cipnCatGentilicio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CipnCatGentilicios cipnCatGentilicio
 	 */
	public function update($cipnCatGentilicio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByGENTILICIO($value);

	public function queryByIDUSUARIOTRAN($value);

	public function queryByFECHATRAN($value);

	public function queryByESTATUS($value);


	public function deleteByGENTILICIO($value);

	public function deleteByIDUSUARIOTRAN($value);

	public function deleteByFECHATRAN($value);

	public function deleteByESTATUS($value);


}
?>