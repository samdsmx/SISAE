<?php
/**
 * Class that operate on table 'egre_hashtags'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreHashtagsOracleDAO implements EgreHashtagsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreHashtagsOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_hashtags WHERE ID_HASHTAG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_hashtags';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_hashtags ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreHashtag primary key
 	 */
	public function delete($ID_HASHTAG){
		$sql = 'DELETE FROM egre_hashtags WHERE ID_HASHTAG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_HASHTAG);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreHashtagsOracle egreHashtag
 	 */
	public function insert($egreHashtag){
		$sql = 'INSERT INTO egre_hashtags (HASHTAG) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreHashtag->hashtag);

		$id = $this->executeInsert($sqlQuery);	
		$egreHashtag->idHashtag = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreHashtagsOracle egreHashtag
 	 */
	public function update($egreHashtag){
		$sql = 'UPDATE egre_hashtags SET HASHTAG = ? WHERE ID_HASHTAG = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreHashtag->hashtag);

		$sqlQuery->setNumber($egreHashtag->idHashtag);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_hashtags';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByHASHTAG($value){
		$sql = 'SELECT * FROM egre_hashtags WHERE HASHTAG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByHASHTAG($value){
		$sql = 'DELETE FROM egre_hashtags WHERE HASHTAG = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreHashtagsOracle 
	 */
	protected function readRow($row){
		$egreHashtag = new EgreHashtag();
		
		$egreHashtag->idHashtag = $row['ID_HASHTAG'];
		$egreHashtag->hashtag = $row['HASHTAG'];

		return $egreHashtag;
	}
	
	protected function getList($sqlQuery){
		$tab = OracleQueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return EgreHashtagsOracle 
	 */
	protected function getRow($sqlQuery){
		$tab = OracleQueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return OracleQueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return OracleQueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return OracleQueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return OracleQueryExecutor::executeInsert($sqlQuery);
	}
}
?>