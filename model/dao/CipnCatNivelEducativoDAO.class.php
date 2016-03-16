<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
interface CipnCatNivelEducativoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CipnCatNivelEducativo 
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
	
	public function queryByIDNIVELEDUCATIVO($value);
        
        public function queryByACRONIMO($value);
        
        public function queryByNIVELEDUCATIVO($value);

        public function queryByIDUSUARIOTRAN($value);

	public function queryByFECHATRAN($value);

	public function queryByESTATUS($value);

}
?>