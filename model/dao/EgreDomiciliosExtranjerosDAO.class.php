<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreDomiciliosExtranjerosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreDomiciliosExtranjeros 
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
 	 * @param egreDomiciliosExtranjero primary key
 	 */
	public function delete($ID_DOMICILIO_EXT);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreDomiciliosExtranjeros egreDomiciliosExtranjero
 	 */
	public function insert($egreDomiciliosExtranjero);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreDomiciliosExtranjeros egreDomiciliosExtranjero
 	 */
	public function update($egreDomiciliosExtranjero);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDPAIS($value);

	public function queryByDOMICILIO($value);


	public function deleteByIDPAIS($value);

	public function deleteByDOMICILIO($value);


}
?>