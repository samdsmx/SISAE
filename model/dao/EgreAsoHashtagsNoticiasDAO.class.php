<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreAsoHashtagsNoticiasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreAsoHashtagsNoticias 
	 */
	public function load($iDHASHTAG, $iDNOTICIA);

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
 	 * @param egreAsoHashtagsNoticia primary key
 	 */
	public function delete($iDHASHTAG, $iDNOTICIA);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsoHashtagsNoticias egreAsoHashtagsNoticia
 	 */
	public function insert($egreAsoHashtagsNoticia);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsoHashtagsNoticias egreAsoHashtagsNoticia
 	 */
	public function update($egreAsoHashtagsNoticia);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>