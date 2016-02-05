<?php
/**
 * Class that operate on table 'egre_aso_hashtags_noticias'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreAsoHashtagsNoticiasOracleDAO implements EgreAsoHashtagsNoticiasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreAsoHashtagsNoticiasOracle 
	 */
	public function load($idHashtag, $idNoticia){
		$sql = 'SELECT * FROM egre_aso_hashtags_noticias WHERE ID_HASHTAG = ?  AND ID_NOTICIA = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idHashtag);
		$sqlQuery->setNumber($idNoticia);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_aso_hashtags_noticias';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_aso_hashtags_noticias ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreAsoHashtagsNoticia primary key
 	 */
	public function delete($idHashtag, $idNoticia){
		$sql = 'DELETE FROM egre_aso_hashtags_noticias WHERE ID_HASHTAG = ?  AND ID_NOTICIA = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idHashtag);
		$sqlQuery->setNumber($idNoticia);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsoHashtagsNoticiasOracle egreAsoHashtagsNoticia
 	 */
	public function insert($egreAsoHashtagsNoticia){
		$sql = 'INSERT INTO egre_aso_hashtags_noticias ( ID_HASHTAG, ID_NOTICIA) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoHashtagsNoticia->idHashtag);

		$sqlQuery->setNumber($egreAsoHashtagsNoticia->idNoticia);

		$this->executeInsert($sqlQuery);	
		//$egreAsoHashtagsNoticia->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsoHashtagsNoticiasOracle egreAsoHashtagsNoticia
 	 */
	public function update($egreAsoHashtagsNoticia){
		$sql = 'UPDATE egre_aso_hashtags_noticias SET  WHERE ID_HASHTAG = ?  AND ID_NOTICIA = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoHashtagsNoticia->idHashtag);

		$sqlQuery->setNumber($egreAsoHashtagsNoticia->idNoticia);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_aso_hashtags_noticias';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return EgreAsoHashtagsNoticiasOracle 
	 */
	protected function readRow($row){
		$egreAsoHashtagsNoticia = new EgreAsoHashtagsNoticia();
		
		$egreAsoHashtagsNoticia->idHashtag = $row['ID_HASHTAG'];
		$egreAsoHashtagsNoticia->idNoticia = $row['ID_NOTICIA'];

		return $egreAsoHashtagsNoticia;
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
	 * @return EgreAsoHashtagsNoticiasOracle 
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