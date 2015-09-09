<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:55
 */
interface EgreResponsablesUrDAO{

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
	
	/**
 	 * Delete record from table
 	 * @param egreResponsablesUr primary key
 	 */
	public function delete($ID_RESPONSABLE_UR);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreResponsablesUr egreResponsablesUr
 	 */
	public function insert($egreResponsablesUr);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreResponsablesUr egreResponsablesUr
 	 */
	public function update($egreResponsablesUr);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDUSUARIO($value);

	public function queryByNOMBRE($value);

	public function queryByCORREO($value);

	public function queryByEXTENSION($value);


	public function deleteByIDUSUARIO($value);

	public function deleteByNOMBRE($value);

	public function deleteByCORREO($value);

	public function deleteByEXTENSION($value);


}
?>