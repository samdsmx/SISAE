<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreNoticiasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreNoticias 
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
 	 * @param egreNoticia primary key
 	 */
	public function delete($ID_NOTICIA);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreNoticias egreNoticia
 	 */
	public function insert($egreNoticia);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreNoticias egreNoticia
 	 */
	public function update($egreNoticia);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDRESPONSABLEUR($value);

	public function queryByNOTICIA($value);

	public function queryByIMAGEN($value);

	public function queryByFECHA($value);

	public function queryByVISIBILIDAD($value);


	public function deleteByIDRESPONSABLEUR($value);

	public function deleteByNOTICIA($value);

	public function deleteByIMAGEN($value);

	public function deleteByFECHA($value);

	public function deleteByVISIBILIDAD($value);


}
?>