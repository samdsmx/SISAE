<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
interface CipnCatOfertaEducativaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CipnCatOfertaEducativa 
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
	
	public function queryByIDOFERTAEDUCATIVA($value);
        
        public function queryByOFERTAEDUCATIVA($value);

        public function queryByIDUSUARIOTRAN($value);

	public function queryByFECHATRAN($value);

	public function queryByESTATUS($value);

}
?>