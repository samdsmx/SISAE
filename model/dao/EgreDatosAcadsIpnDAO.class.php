<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreDatosAcadsIpnDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreDatosAcadsIpn 
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
 	 * @param egreDatosAcadsIpn primary key
 	 */
	public function delete($ID_DATO_ACAD_IPN);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreDatosAcadsIpn egreDatosAcadsIpn
 	 */
	public function insert($egreDatosAcadsIpn);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreDatosAcadsIpn egreDatosAcadsIpn
 	 */
	public function update($egreDatosAcadsIpn);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIDMOTIVOINTERRUPCION($value);

	public function queryByIDESTATUSEGRE($value);

	public function queryByIDMOTIVONOTITULACION($value);

	public function queryByIDFORMATITULACION($value);

	public function queryByIDCARRERA($value);

	public function queryByIDEGRESADO($value);

	public function queryByIDUNIDADRESPONSABLE($value);

	public function queryByANIOINGRESO($value);

	public function queryByANIOEGRESO($value);

	public function queryByBOLETA($value);

	public function queryByPROMEDIO($value);

	public function queryByVALIDADOECU($value);

	public function queryByFECHAREGISTRO($value);


	public function deleteByIDMOTIVOINTERRUPCION($value);

	public function deleteByIDESTATUSEGRE($value);

	public function deleteByIDMOTIVONOTITULACION($value);

	public function deleteByIDFORMATITULACION($value);

	public function deleteByIDCARRERA($value);

	public function deleteByIDEGRESADO($value);

	public function deleteByIDUNIDADRESPONSABLE($value);

	public function deleteByANIOINGRESO($value);

	public function deleteByANIOEGRESO($value);

	public function deleteByBOLETA($value);

	public function deleteByPROMEDIO($value);

	public function deleteByVALIDADOECU($value);

	public function deleteByFECHAREGISTRO($value);


}
?>