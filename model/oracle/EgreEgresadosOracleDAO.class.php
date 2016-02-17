<?php
/**
 * Class that operate on table 'egre_egresados'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreEgresadosOracleDAO implements EgreEgresadosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreEgresadosOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_egresados WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){            
                
		$sql = 'SELECT * FROM egre_egresados';                
		$sqlQuery = new SqlQuery($sql);                
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_egresados ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreEgresado primary key
 	 */
	public function delete($ID_EGRESADO){
		$sql = 'DELETE FROM egre_egresados WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_EGRESADO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreEgresadosOracle egreEgresado
 	 */
	public function insert($egreEgresado){
		$sql = 'INSERT INTO egre_egresados (AP_PATERNO, AP_MATERNO, NOMBRE, CURP, ID_GENERO, ID_ESTADO_CIVIL, ID_GENTILICIO, RESIDE_MEXICO, ID_ESTADO_NAC, ID_USUARIO, FECHA_REGISTRO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreEgresado->apPaterno);
		$sqlQuery->set($egreEgresado->apMaterno);
		$sqlQuery->set($egreEgresado->nombre);
		$sqlQuery->set($egreEgresado->curp);
		$sqlQuery->setNumber($egreEgresado->idGenero);
		$sqlQuery->setNumber($egreEgresado->idEstadoCivil);
		$sqlQuery->setNumber($egreEgresado->idGentilicio);
		$sqlQuery->setNumber($egreEgresado->resideMexico);
		$sqlQuery->setNumber($egreEgresado->idEstadoNac);
		$sqlQuery->setNumber($egreEgresado->idUsuario);
		$sqlQuery->set($egreEgresado->fechaRegistro);

                var_dump($sqlQuery);
		$id = $this->executeInsert($sqlQuery);	
		$egreEgresado->idEgresado = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreEgresadosOracle egreEgresado
 	 */
	public function update($egreEgresado){
		$sql = 'UPDATE egre_egresados SET AP_PATERNO = ?, AP_MATERNO = ?, NOMBRE = ?, CURP = ?, ID_GENERO = ?, ID_ESTADO_CIVIL = ?, ID_GENTILICIO = ?, RESIDE_MEXICO = ?, ID_ESTADO_NAC = ?, ID_USUARIO = ?, FECHA_REGISTRO = ? WHERE ID_EGRESADO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($egreEgresado->apPaterno);
		$sqlQuery->set($egreEgresado->apMaterno);
		$sqlQuery->set($egreEgresado->nombre);
		$sqlQuery->set($egreEgresado->curp);
		$sqlQuery->setNumber($egreEgresado->idGenero);
		$sqlQuery->setNumber($egreEgresado->idEstadoCivil);
		$sqlQuery->setNumber($egreEgresado->idGentilicio);
		$sqlQuery->setNumber($egreEgresado->resideMexico);
		$sqlQuery->setNumber($egreEgresado->idEstadoNac);
		$sqlQuery->setNumber($egreEgresado->idUsuario);
		$sqlQuery->set($egreEgresado->fechaRegistro);

		$sqlQuery->setNumber($egreEgresado->idEgresado);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_egresados';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAPPATERNO($value){
		$sql = 'SELECT * FROM egre_egresados WHERE AP_PATERNO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAPMATERNO($value){
		$sql = 'SELECT * FROM egre_egresados WHERE AP_MATERNO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNOMBRE($value){
		$sql = 'SELECT * FROM egre_egresados WHERE NOMBRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCURP($value){
		$sql = 'SELECT * FROM egre_egresados WHERE CURP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDGENERO($value){
		$sql = 'SELECT * FROM egre_egresados WHERE ID_GENERO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDESTADOCIVIL($value){
		$sql = 'SELECT * FROM egre_egresados WHERE ID_ESTADO_CIVIL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDGENTILICIO($value){
		$sql = 'SELECT * FROM egre_egresados WHERE ID_GENTILICIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRESIDEMEXICO($value){
		$sql = 'SELECT * FROM egre_egresados WHERE RESIDE_MEXICO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDESTADONAC($value){
		$sql = 'SELECT * FROM egre_egresados WHERE ID_ESTADO_NAC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByIDUSUARIO($value){
		$sql = 'SELECT * FROM egre_egresados WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFECHAREGISTRO($value){
		$sql = 'SELECT * FROM egre_egresados WHERE FECHA_REGISTRO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAPPATERNO($value){
		$sql = 'DELETE FROM egre_egresados WHERE AP_PATERNO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAPMATERNO($value){
		$sql = 'DELETE FROM egre_egresados WHERE AP_MATERNO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNOMBRE($value){
		$sql = 'DELETE FROM egre_egresados WHERE NOMBRE = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCURP($value){
		$sql = 'DELETE FROM egre_egresados WHERE CURP = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDGENERO($value){
		$sql = 'DELETE FROM egre_egresados WHERE ID_GENERO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDESTADOCIVIL($value){
		$sql = 'DELETE FROM egre_egresados WHERE ID_ESTADO_CIVIL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDGENTILICIO($value){
		$sql = 'DELETE FROM egre_egresados WHERE ID_GENTILICIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRESIDEMEXICO($value){
		$sql = 'DELETE FROM egre_egresados WHERE RESIDE_MEXICO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDESTADONAC($value){
		$sql = 'DELETE FROM egre_egresados WHERE ID_ESTADO_NAC = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByIDUSUARIO($value){
		$sql = 'DELETE FROM egre_egresados WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFECHAREGISTRO($value){
		$sql = 'DELETE FROM egre_egresados WHERE FECHA_REGISTRO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreEgresadosOracle 
	 */
	protected function readRow($row){
		$egreEgresado = new EgreEgresado();
		
		$egreEgresado->idEgresado = $row['ID_EGRESADO'];
		$egreEgresado->apPaterno = $row['AP_PATERNO'];
		$egreEgresado->apMaterno = $row['AP_MATERNO'];
		$egreEgresado->nombre = $row['NOMBRE'];
		$egreEgresado->curp = $row['CURP'];
		$egreEgresado->idGenero = $row['ID_GENERO'];
		$egreEgresado->idEstadoCivil = $row['ID_ESTADO_CIVIL'];
		$egreEgresado->idGentilicio = $row['ID_GENTILICIO'];
		$egreEgresado->resideMexico = $row['RESIDE_MEXICO'];
		$egreEgresado->idEstadoNac = $row['ID_ESTADO_NAC'];
		$egreEgresado->idUsuario = $row['ID_USUARIO'];
		$egreEgresado->fechaRegistro = $row['FECHA_REGISTRO'];

		return $egreEgresado;
	}
	
	protected function getList($sqlQuery){
            
		$tab = OracleQueryExecutor::execute($sqlQuery);                
                var_dump ($tab);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return EgreEgresadosOracle 
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