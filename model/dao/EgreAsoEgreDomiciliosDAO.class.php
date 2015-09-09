<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreAsoEgreDomiciliosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreAsoEgreDomicilios 
	 */
	public function load($idEgresado, $idDomicilio);

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
 	 * @param egreAsoEgreDomicilio primary key
 	 */
	public function delete($idEgresado, $idDomicilio);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsoEgreDomicilios egreAsoEgreDomicilio
 	 */
	public function insert($egreAsoEgreDomicilio);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsoEgreDomicilios egreAsoEgreDomicilio
 	 */
	public function update($egreAsoEgreDomicilio);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>