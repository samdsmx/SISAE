<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreDomiciliosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreDomicilios 
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
 	 * @param egreDomicilio primary key
 	 */
	public function delete($ID_DOMICILIO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreDomicilios egreDomicilio
 	 */
	public function insert($egreDomicilio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreDomicilios egreDomicilio
 	 */
	public function update($egreDomicilio);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDASENTAMIENTO($value);

	public function queryByCALLE($value);

	public function queryByNUMEXT($value);

	public function queryByNUMINT($value);


	public function deleteByIDASENTAMIENTO($value);

	public function deleteByCALLE($value);

	public function deleteByNUMEXT($value);

	public function deleteByNUMINT($value);


}
?>