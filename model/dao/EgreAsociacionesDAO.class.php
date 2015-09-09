<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreAsociacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreAsociaciones 
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
 	 * @param egreAsociacione primary key
 	 */
	public function delete($ID_ASOCIACION);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsociaciones egreAsociacione
 	 */
	public function insert($egreAsociacione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsociaciones egreAsociacione
 	 */
	public function update($egreAsociacione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDEGRESADO($value);

	public function queryByNOMBREASOCIACION($value);

	public function queryByFECHAAFILIACION($value);

	public function queryBySIGLAS($value);


	public function deleteByIDEGRESADO($value);

	public function deleteByNOMBREASOCIACION($value);

	public function deleteByFECHAAFILIACION($value);

	public function deleteBySIGLAS($value);


}
?>