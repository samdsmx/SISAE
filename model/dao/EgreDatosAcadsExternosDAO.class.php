<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:15
 */
interface EgreDatosAcadsExternosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreDatosAcadsExternos 
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
 	 * @param egreDatosAcadsExterno primary key
 	 */
	public function delete($ID_DATO_ACAD_EXTERNO);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreDatosAcadsExternos egreDatosAcadsExterno
 	 */
	public function insert($egreDatosAcadsExterno);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreDatosAcadsExternos egreDatosAcadsExterno
 	 */
	public function update($egreDatosAcadsExterno);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByESCUELA($value);

	public function queryByIDEGRESADO($value);

	public function queryByCARRERA($value);

	public function queryByANIOINGRESO($value);

	public function queryByANIOEGRESO($value);

	public function queryByPROMEDIO($value);

	public function queryByNIVEL($value);


	public function deleteByESCUELA($value);

	public function deleteByIDEGRESADO($value);

	public function deleteByCARRERA($value);

	public function deleteByANIOINGRESO($value);

	public function deleteByANIOEGRESO($value);

	public function deleteByPROMEDIO($value);

	public function deleteByNIVEL($value);


}
?>