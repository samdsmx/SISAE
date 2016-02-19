<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:55
 */
interface EgreCPAsentamientoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreCPAsentamiento 
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

        public function queryByIDASENTAMIENTO($value);

        public function queryByASENTAMIENTO($value);

        public function queryByIDMUNICIPIO($value);

        public function queryByMUNICIPIO($value);

        public function queryByIDESTADO($value);

        public function queryByESTADO($value);
}

?>