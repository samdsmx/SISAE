<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:55
 */
interface EgreUsuariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreUsuarios 
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
 	 * @param egreUsuario primary key
 	 */
	public function delete($ID_USUARIO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreUsuarios egreUsuario
 	 */
	public function insert($egreUsuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreUsuarios egreUsuario
 	 */
	public function update($egreUsuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDROL($value);

	public function queryByUSUARIO($value);

	public function queryByCONTRASENIA($value);

	public function queryByFOTO($value);


	public function deleteByIDROL($value);

	public function deleteByUSUARIO($value);

	public function deleteByCONTRASENIA($value);

	public function deleteByFOTO($value);


}
?>