<?php
/**
 * Class that operate on table 'egre_aso_hashtags_noticias'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreAsoHashtagsNoticiasMySqlDAO implements EgreAsoHashtagsNoticiasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreAsoHashtagsNoticiasMySql 
	 */
	public function load($iDHASHTAG, $iDNOTICIA){
		$sql = 'SELECT * FROM egre_aso_hashtags_noticias WHERE ID_HASHTAG = ?  AND ID_NOTICIA = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iDHASHTAG);
		$sqlQuery->setNumber($iDNOTICIA);

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
	public function delete($iDHASHTAG, $iDNOTICIA){
		$sql = 'DELETE FROM egre_aso_hashtags_noticias WHERE ID_HASHTAG = ?  AND ID_NOTICIA = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iDHASHTAG);
		$sqlQuery->setNumber($iDNOTICIA);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreAsoHashtagsNoticiasMySql egreAsoHashtagsNoticia
 	 */
	public function insert($egreAsoHashtagsNoticia){
		$sql = 'INSERT INTO egre_aso_hashtags_noticias ( ID_HASHTAG, ID_NOTICIA) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoHashtagsNoticia->iDHASHTAG);

		$sqlQuery->setNumber($egreAsoHashtagsNoticia->iDNOTICIA);

		$this->executeInsert($sqlQuery);	
		//$egreAsoHashtagsNoticia->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreAsoHashtagsNoticiasMySql egreAsoHashtagsNoticia
 	 */
	public function update($egreAsoHashtagsNoticia){
		$sql = 'UPDATE egre_aso_hashtags_noticias SET  WHERE ID_HASHTAG = ?  AND ID_NOTICIA = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($egreAsoHashtagsNoticia->iDHASHTAG);

		$sqlQuery->setNumber($egreAsoHashtagsNoticia->iDNOTICIA);

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
	 * @return EgreAsoHashtagsNoticiasMySql 
	 */
	protected function readRow($row){
		$egreAsoHashtagsNoticia = new EgreAsoHashtagsNoticia();
		
		$egreAsoHashtagsNoticia->iDHASHTAG = $row['ID_HASHTAG'];
		$egreAsoHashtagsNoticia->iDNOTICIA = $row['ID_NOTICIA'];

		return $egreAsoHashtagsNoticia;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return EgreAsoHashtagsNoticiasMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>