<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
interface CipnCatEstadosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CipnCatEstados 
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
 	 * @param cipnCatEstado primary key
 	 */
	public function delete($ID_ESTADO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CipnCatEstados cipnCatEstado
 	 */
	public function insert($cipnCatEstado);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CipnCatEstados cipnCatEstado
 	 */
	public function update($cipnCatEstado);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByESTADO($value);

	public function queryByACRONIMOESTADO($value);

	public function queryByCAPITAL($value);

	public function queryByCESTADO($value);

	public function queryByIDUSUARIOTRAN($value);

	public function queryByFECHATRAN($value);

	public function queryByESTATUS($value);


	public function deleteByESTADO($value);

	public function deleteByACRONIMOESTADO($value);

	public function deleteByCAPITAL($value);

	public function deleteByCESTADO($value);

	public function deleteByIDUSUARIOTRAN($value);

	public function deleteByFECHATRAN($value);

	public function deleteByESTATUS($value);


}
?>