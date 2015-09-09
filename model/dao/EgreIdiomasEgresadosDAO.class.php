<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreIdiomasEgresadosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreIdiomasEgresados 
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
 	 * @param egreIdiomasEgresado primary key
 	 */
	public function delete($ID_IDIOMA_EGRESADO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreIdiomasEgresados egreIdiomasEgresado
 	 */
	public function insert($egreIdiomasEgresado);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreIdiomasEgresados egreIdiomasEgresado
 	 */
	public function update($egreIdiomasEgresado);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDIDIOMA($value);

	public function queryByIDEGRESADO($value);

	public function queryByPORCENTAJE($value);

	public function queryByINSTITUCION($value);


	public function deleteByIDIDIOMA($value);

	public function deleteByIDEGRESADO($value);

	public function deleteByPORCENTAJE($value);

	public function deleteByINSTITUCION($value);


}
?>