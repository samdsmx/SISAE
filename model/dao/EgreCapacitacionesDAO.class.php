<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreCapacitacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCapacitaciones 
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
 	 * @param egreCapacitacione primary key
 	 */
	public function delete($ID_CAPACITACION);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCapacitaciones egreCapacitacione
 	 */
	public function insert($egreCapacitacione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCapacitaciones egreCapacitacione
 	 */
	public function update($egreCapacitacione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDTIPOCAPACITACION($value);

	public function queryByIDEGRESADO($value);

	public function queryByNOMBRECURSO($value);

	public function queryByINSTITUCION($value);

	public function queryByHORAS($value);

	public function queryByFECHAINICIO($value);

	public function queryByFECHAFIN($value);


	public function deleteByIDTIPOCAPACITACION($value);

	public function deleteByIDEGRESADO($value);

	public function deleteByNOMBRECURSO($value);

	public function deleteByINSTITUCION($value);

	public function deleteByHORAS($value);

	public function deleteByFECHAINICIO($value);

	public function deleteByFECHAFIN($value);


}
?>