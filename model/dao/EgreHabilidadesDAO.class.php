<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreHabilidadesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreHabilidades 
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
 	 * @param egreHabilidade primary key
 	 */
	public function delete($ID_HABILIDAD);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreHabilidades egreHabilidade
 	 */
	public function insert($egreHabilidade);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreHabilidades egreHabilidade
 	 */
	public function update($egreHabilidade);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDEGRESADO($value);

	public function queryByHABILIDAD($value);

	public function queryByNIVEL($value);


	public function deleteByIDEGRESADO($value);

	public function deleteByHABILIDAD($value);

	public function deleteByNIVEL($value);


}
?>