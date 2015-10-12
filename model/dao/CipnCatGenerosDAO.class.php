<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
interface CipnCatGenerosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CipnCatGeneros 
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
 	 * @param cipnCatGenero primary key
 	 */
	public function delete($ID_GENERO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CipnCatGeneros cipnCatGenero
 	 */
	public function insert($cipnCatGenero);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CipnCatGeneros cipnCatGenero
 	 */
	public function update($cipnCatGenero);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByGENERO($value);

	public function queryByACRONIMO($value);

	public function queryByIDUSUARIOTRAN($value);

	public function queryByFECHATRAN($value);

	public function queryByESTATUS($value);


	public function deleteByGENERO($value);

	public function deleteByACRONIMO($value);

	public function deleteByIDUSUARIOTRAN($value);

	public function deleteByFECHATRAN($value);

	public function deleteByESTATUS($value);


}
?>