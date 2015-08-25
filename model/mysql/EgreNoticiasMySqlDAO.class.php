<?php
/**
 * Class that operate on table 'egre_noticias'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-27 23:14
 */
class EgreNoticiasMySqlDAO implements EgreNoticiasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreNoticiasMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_noticias WHERE ID_NOTICIA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_noticias';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_noticias ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreNoticia primary key
 	 */
	public function delete($ID_NOTICIA){
		$sql = 'DELETE FROM egre_noticias WHERE ID_NOTICIA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_NOTICIA);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreNoticiasMySql egreNoticia
 	 */
	public function insert($egreNoticia){
		$sql = 'INSERT INTO egre_noticias (ID_RESPONSABLE_UR, NOTICIA, IMAGEN, FECHA, VISIBILIDAD) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreNoticia->iDRESPONSABLEUR);
		$sqlQuery->set($egreNoticia->nOTICIA);
		$sqlQuery->set($egreNoticia->iMAGEN);
		$sqlQuery->set($egreNoticia->fECHA);
		$sqlQuery->setNumber($egreNoticia->vISIBILIDAD);

		$id = $this->executeInsert($sqlQuery);	
		$egreNoticia->iDNOTICIA = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreNoticiasMySql egreNoticia
 	 */
	public function update($egreNoticia){
		$sql = 'UPDATE egre_noticias SET ID_RESPONSABLE_UR = ?, NOTICIA = ?, IMAGEN = ?, FECHA = ?, VISIBILIDAD = ? WHERE ID_NOTICIA = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreNoticia->iDRESPONSABLEUR);
		$sqlQuery->set($egreNoticia->nOTICIA);
		$sqlQuery->set($egreNoticia->iMAGEN);
		$sqlQuery->set($egreNoticia->fECHA);
		$sqlQuery->setNumber($egreNoticia->vISIBILIDAD);

		$sqlQuery->setNumber($egreNoticia->iDNOTICIA);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_noticias';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDRESPONSABLEUR($value){
		$sql = 'SELECT * FROM egre_noticias WHERE ID_RESPONSABLE_UR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNOTICIA($value){
		$sql = 'SELECT * FROM egre_noticias WHERE NOTICIA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIMAGEN($value){
		$sql = 'SELECT * FROM egre_noticias WHERE IMAGEN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHA($value){
		$sql = 'SELECT * FROM egre_noticias WHERE FECHA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByVISIBILIDAD($value){
		$sql = 'SELECT * FROM egre_noticias WHERE VISIBILIDAD = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDRESPONSABLEUR($value){
		$sql = 'DELETE FROM egre_noticias WHERE ID_RESPONSABLE_UR = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNOTICIA($value){
		$sql = 'DELETE FROM egre_noticias WHERE NOTICIA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIMAGEN($value){
		$sql = 'DELETE FROM egre_noticias WHERE IMAGEN = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHA($value){
		$sql = 'DELETE FROM egre_noticias WHERE FECHA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByVISIBILIDAD($value){
		$sql = 'DELETE FROM egre_noticias WHERE VISIBILIDAD = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreNoticiasMySql 
	 */
	protected function readRow($row){
		$egreNoticia = new EgreNoticia();
		
		$egreNoticia->iDNOTICIA = $row['ID_NOTICIA'];
		$egreNoticia->iDRESPONSABLEUR = $row['ID_RESPONSABLE_UR'];
		$egreNoticia->nOTICIA = $row['NOTICIA'];
		$egreNoticia->iMAGEN = $row['IMAGEN'];
		$egreNoticia->fECHA = $row['FECHA'];
		$egreNoticia->vISIBILIDAD = $row['VISIBILIDAD'];

		return $egreNoticia;
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
	 * @return EgreNoticiasMySql 
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