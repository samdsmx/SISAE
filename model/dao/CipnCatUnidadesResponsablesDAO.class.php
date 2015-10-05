<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-10-04 23:50
 */
interface CipnCatUnidadesResponsablesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CipnCatUnidadesResponsables 
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
 	 * @param cipnCatUnidadesResponsable primary key
 	 */
	public function delete($ID_UNIDAD_RESPONSABLE);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CipnCatUnidadesResponsables cipnCatUnidadesResponsable
 	 */
	public function insert($cipnCatUnidadesResponsable);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CipnCatUnidadesResponsables cipnCatUnidadesResponsable
 	 */
	public function update($cipnCatUnidadesResponsable);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDUNIDADRESPONSABLEPADRE($value);

	public function queryByCLAVE($value);

	public function queryByUNIDADRESPONSABLE($value);

	public function queryByIDNOMBREUR($value);

	public function queryByIDURCLASIFICACION($value);

	public function queryByIDURDOMICILIO($value);

	public function queryByESTATUS($value);

	public function queryByFECHABAJA($value);

	public function queryByOBSERVACIONES($value);

	public function queryByIDUSUARIOTRAN($value);

	public function queryByFECHATRAN($value);

	public function queryByIDUNIDADRESPONSABLEANT($value);

	public function queryByANIOALTA($value);


	public function deleteByIDUNIDADRESPONSABLEPADRE($value);

	public function deleteByCLAVE($value);

	public function deleteByUNIDADRESPONSABLE($value);

	public function deleteByIDNOMBREUR($value);

	public function deleteByIDURCLASIFICACION($value);

	public function deleteByIDURDOMICILIO($value);

	public function deleteByESTATUS($value);

	public function deleteByFECHABAJA($value);

	public function deleteByOBSERVACIONES($value);

	public function deleteByIDUSUARIOTRAN($value);

	public function deleteByFECHATRAN($value);

	public function deleteByIDUNIDADRESPONSABLEANT($value);

	public function deleteByANIOALTA($value);


}
?>