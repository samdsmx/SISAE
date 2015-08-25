<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreCatCarrerasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCatCarreras 
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
 	 * @param egreCatCarrera primary key
 	 */
	public function delete($ID_CARRERA);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatCarreras egreCatCarrera
 	 */
	public function insert($egreCatCarrera);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatCarreras egreCatCarrera
 	 */
	public function update($egreCatCarrera);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDOFERTAEDUCATIVA($value);

	public function queryByIDNIVELEDUCATIVO($value);

	public function queryByCARRERA($value);


	public function deleteByIDOFERTAEDUCATIVA($value);

	public function deleteByIDNIVELEDUCATIVO($value);

	public function deleteByCARRERA($value);


}
?>