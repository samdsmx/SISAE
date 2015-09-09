<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
interface EgreHashtagsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return EgreHashtags 
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
 	 * @param egreHashtag primary key
 	 */
	public function delete($ID_HASHTAG);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreHashtags egreHashtag
 	 */
	public function insert($egreHashtag);
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreHashtags egreHashtag
 	 */
	public function update($egreHashtag);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByHASHTAG($value);


	public function deleteByHASHTAG($value);


}
?>