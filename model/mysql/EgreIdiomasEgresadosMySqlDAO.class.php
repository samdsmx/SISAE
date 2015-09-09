<?php
/**
 * Class that operate on table 'egre_idiomas_egresados'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreIdiomasEgresadosMySqlDAO implements EgreIdiomasEgresadosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreIdiomasEgresadosMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_idiomas_egresados WHERE ID_IDIOMA_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_idiomas_egresados';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_idiomas_egresados ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreIdiomasEgresado primary key
 	 */
	public function delete($ID_IDIOMA_EGRESADO){
		$sql = 'DELETE FROM egre_idiomas_egresados WHERE ID_IDIOMA_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_IDIOMA_EGRESADO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreIdiomasEgresadosMySql egreIdiomasEgresado
 	 */
	public function insert($egreIdiomasEgresado){
		$sql = 'INSERT INTO egre_idiomas_egresados (ID_IDIOMA, ID_EGRESADO, PORCENTAJE, INSTITUCION) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreIdiomasEgresado->idIdioma);
		$sqlQuery->setNumber($egreIdiomasEgresado->idEgresado);
		$sqlQuery->setNumber($egreIdiomasEgresado->porcentaje);
		$sqlQuery->set($egreIdiomasEgresado->institucion);

		$id = $this->executeInsert($sqlQuery);	
		$egreIdiomasEgresado->idIdiomaEgresado = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreIdiomasEgresadosMySql egreIdiomasEgresado
 	 */
	public function update($egreIdiomasEgresado){
		$sql = 'UPDATE egre_idiomas_egresados SET ID_IDIOMA = ?, ID_EGRESADO = ?, PORCENTAJE = ?, INSTITUCION = ? WHERE ID_IDIOMA_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreIdiomasEgresado->idIdioma);
		$sqlQuery->setNumber($egreIdiomasEgresado->idEgresado);
		$sqlQuery->setNumber($egreIdiomasEgresado->porcentaje);
		$sqlQuery->set($egreIdiomasEgresado->institucion);

		$sqlQuery->setNumber($egreIdiomasEgresado->idIdiomaEgresado);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_idiomas_egresados';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDIDIOMA($value){
		$sql = 'SELECT * FROM egre_idiomas_egresados WHERE ID_IDIOMA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDEGRESADO($value){
		$sql = 'SELECT * FROM egre_idiomas_egresados WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPORCENTAJE($value){
		$sql = 'SELECT * FROM egre_idiomas_egresados WHERE PORCENTAJE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByINSTITUCION($value){
		$sql = 'SELECT * FROM egre_idiomas_egresados WHERE INSTITUCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDIDIOMA($value){
		$sql = 'DELETE FROM egre_idiomas_egresados WHERE ID_IDIOMA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDEGRESADO($value){
		$sql = 'DELETE FROM egre_idiomas_egresados WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPORCENTAJE($value){
		$sql = 'DELETE FROM egre_idiomas_egresados WHERE PORCENTAJE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByINSTITUCION($value){
		$sql = 'DELETE FROM egre_idiomas_egresados WHERE INSTITUCION = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreIdiomasEgresadosMySql 
	 */
	protected function readRow($row){
		$egreIdiomasEgresado = new EgreIdiomasEgresado();
		
		$egreIdiomasEgresado->idIdiomaEgresado = $row['ID_IDIOMA_EGRESADO'];
		$egreIdiomasEgresado->idIdioma = $row['ID_IDIOMA'];
		$egreIdiomasEgresado->idEgresado = $row['ID_EGRESADO'];
		$egreIdiomasEgresado->porcentaje = $row['PORCENTAJE'];
		$egreIdiomasEgresado->institucion = $row['INSTITUCION'];

		return $egreIdiomasEgresado;
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
	 * @return EgreIdiomasEgresadosMySql 
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