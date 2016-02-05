<?php
/**
 * Class that operate on table 'egre_usuarios'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreUsuariosOracleDAO implements EgreUsuariosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return EgreUsuariosOracle 
	 */
	public function load($id){
		$sql = 'SELECT * FROM egre_usuarios WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM egre_usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM egre_usuarios ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param egreUsuario primary key
 	 */
	public function delete($ID_USUARIO){
		$sql = 'DELETE FROM egre_usuarios WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ID_USUARIO);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param EgreUsuariosOracle egreUsuario
 	 */
	public function insert($egreUsuario){
		$sql = 'INSERT INTO egre_usuarios (ID_ROL, USUARIO, CONTRASENIA, FOTO) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreUsuario->idRol);
		$sqlQuery->set($egreUsuario->usuario);
		$sqlQuery->set($egreUsuario->contrasenia);
		$sqlQuery->set($egreUsuario->foto);

		$id = $this->executeInsert($sqlQuery);	
		$egreUsuario->idUsuario = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param EgreUsuariosOracle egreUsuario
 	 */
	public function update($egreUsuario){
		$sql = 'UPDATE egre_usuarios SET ID_ROL = ?, USUARIO = ?, CONTRASENIA = ?, FOTO = ? WHERE ID_USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($egreUsuario->idRol);
		$sqlQuery->set($egreUsuario->usuario);
		$sqlQuery->set($egreUsuario->contrasenia);
		$sqlQuery->set($egreUsuario->foto);

		$sqlQuery->setNumber($egreUsuario->idUsuario);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM egre_usuarios';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByIDROL($value){
		$sql = 'SELECT * FROM egre_usuarios WHERE ID_ROL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUSUARIO($value){
            
		$sql = 'SELECT * FROM egre_usuarios WHERE USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
            
		return $this->getList($sqlQuery);
	}

	public function queryByCONTRASENIA($value){
		$sql = 'SELECT * FROM egre_usuarios WHERE CONTRASENIA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFOTO($value){
		$sql = 'SELECT * FROM egre_usuarios WHERE FOTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIDROL($value){
		$sql = 'DELETE FROM egre_usuarios WHERE ID_ROL = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUSUARIO($value){
		$sql = 'DELETE FROM egre_usuarios WHERE USUARIO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCONTRASENIA($value){
		$sql = 'DELETE FROM egre_usuarios WHERE CONTRASENIA = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFOTO($value){
		$sql = 'DELETE FROM egre_usuarios WHERE FOTO = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return EgreUsuariosOracle 
	 */
	protected function readRow($row){
		$egreUsuario = new EgreUsuario();
		
		$egreUsuario->idUsuario = $row['ID_USUARIO'];
		$egreUsuario->idRol = $row['ID_ROL'];
		$egreUsuario->usuario = $row['USUARIO'];
		$egreUsuario->contrasenia = $row['CONTRASENIA'];
		$egreUsuario->foto = $row['FOTO'];

		return $egreUsuario;
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
	 * @return EgreUsuariosOracle 
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