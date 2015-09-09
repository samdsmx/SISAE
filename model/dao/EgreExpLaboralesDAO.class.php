<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreExpLaboralesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreExpLaborales 
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
 	 * @param egreExpLaborale primary key
 	 */
	public function delete($ID_EXP_LABORAL);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreExpLaborales egreExpLaborale
 	 */
	public function insert($egreExpLaborale);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreExpLaborales egreExpLaborale
 	 */
	public function update($egreExpLaborale);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDEGRESADO($value);

	public function queryByNOMBREEMPRESA($value);

	public function queryByURLEMPRESA($value);

	public function queryByPUESTO($value);

	public function queryByFECHAINGRESO($value);

	public function queryByFECHAEGRESO($value);

	public function queryByRESPONSABILIDADES($value);

	public function queryByJEFEINMEDIATO($value);

	public function queryByTELREFERENCIA($value);

	public function queryByCORREOREFERENCIA($value);


	public function deleteByIDEGRESADO($value);

	public function deleteByNOMBREEMPRESA($value);

	public function deleteByURLEMPRESA($value);

	public function deleteByPUESTO($value);

	public function deleteByFECHAINGRESO($value);

	public function deleteByFECHAEGRESO($value);

	public function deleteByRESPONSABILIDADES($value);

	public function deleteByJEFEINMEDIATO($value);

	public function deleteByTELREFERENCIA($value);

	public function deleteByCORREOREFERENCIA($value);


}
?>