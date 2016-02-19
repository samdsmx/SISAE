<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-12 01:37
 */
interface CipnCatCodigoPostalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CipnCatCodigoPostal 
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
	
	public function queryByIDCODIGOPOSTAL($value);
        
        public function queryByCODIGOPOSTAL($value);
        
        public function queryByIDMUNICIPIO($value);

        public function queryByIDUSUARIOTRAN($value);

	public function queryByFECHATRAN($value);

	public function queryByESTATUS($value);

}
?>