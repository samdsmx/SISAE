<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreEgresadosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreEgresados 
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
 	 * @param egreEgresado primary key
 	 */
	public function delete($ID_EGRESADO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreEgresados egreEgresado
 	 */
	public function insert($egreEgresado);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreEgresados egreEgresado
 	 */
	public function update($egreEgresado);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByAPPATERNO($value);

	public function queryByAPMATERNO($value);

	public function queryByNOMBRE($value);

	public function queryByCURP($value);

	public function queryByIDGENERO($value);

	public function queryByIDESTADOCIVIL($value);

	public function queryByIDGENTILICIO($value);

	public function queryByRESIDEMEXICO($value);

	public function queryByIDESTADONAC($value);

	public function queryByIDUSUARIO($value);

	public function queryByFECHAREGISTRO($value);


	public function deleteByAPPATERNO($value);

	public function deleteByAPMATERNO($value);

	public function deleteByNOMBRE($value);

	public function deleteByCURP($value);

	public function deleteByIDGENERO($value);

	public function deleteByIDESTADOCIVIL($value);

	public function deleteByIDGENTILICIO($value);

	public function deleteByRESIDEMEXICO($value);

	public function deleteByIDESTADONAC($value);

	public function deleteByIDUSUARIO($value);

	public function deleteByFECHAREGISTRO($value);


}
?>