<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
interface CipnCatEstadosCivilesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CipnCatEstadosCiviles 
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
 	 * @param cipnCatEstadosCivile primary key
 	 */
	public function delete($ID_ESTADO_CIVIL);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CipnCatEstadosCiviles cipnCatEstadosCivile
 	 */
	public function insert($cipnCatEstadosCivile);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CipnCatEstadosCiviles cipnCatEstadosCivile
 	 */
	public function update($cipnCatEstadosCivile);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByESTADOCIVIL($value);

	public function queryByIDUSUARIOTRAN($value);

	public function queryByFECHATRAN($value);

	public function queryByESTATUS($value);


	public function deleteByESTADOCIVIL($value);

	public function deleteByIDUSUARIOTRAN($value);

	public function deleteByFECHATRAN($value);

	public function deleteByESTATUS($value);


}
?>