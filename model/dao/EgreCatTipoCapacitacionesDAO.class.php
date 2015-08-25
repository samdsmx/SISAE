<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreCatTipoCapacitacionesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCatTipoCapacitaciones 
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
 	 * @param egreCatTipoCapacitacione primary key
 	 */
	public function delete($ID_TIPO_CAPACITACION);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreCatTipoCapacitaciones egreCatTipoCapacitacione
 	 */
	public function insert($egreCatTipoCapacitacione);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreCatTipoCapacitaciones egreCatTipoCapacitacione
 	 */
	public function update($egreCatTipoCapacitacione);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDESCRIPCION($value);


	public function deleteByDESCRIPCION($value);


}
?>