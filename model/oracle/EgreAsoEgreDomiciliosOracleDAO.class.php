<?php

/**
 * Class that operate on table 'egre_aso_egre_domicilios'. Database Oracle.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreAsoEgreDomiciliosOracleDAO implements EgreAsoEgreDomiciliosDAO {

    /**
     * Get Domain object by primry key
     *
     * @param String $id primary key
     * @return EgreAsoEgreDomiciliosOracle 
     */
    public function load($idEgresado, $idDomicilio) {
        $sql = 'SELECT * FROM egre_aso_egre_domicilios WHERE ID_EGRESADO = ?  AND ID_DOMICILIO = ? ';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idEgresado);
        $sqlQuery->setNumber($idDomicilio);

        return $this->getRow($sqlQuery);
    }

    /**
     * Get all records from table
     */
    public function queryAll() {
        $sql = 'SELECT * FROM egre_aso_egre_domicilios';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    /**
     * Get all records from table ordered by field
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = 'SELECT * FROM egre_aso_egre_domicilios ORDER BY ' . $orderColumn;
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);
    }

    public function queryByIdEgresado($idEgresado) {
        $sql = 'SELECT * FROM egre_aso_egre_domicilios WHERE ID_EGRESADO = ? ';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idEgresado);
        return $this->getList($sqlQuery);
    }

    /**
     * Delete record from table
     * @param egreAsoEgreDomicilio primary key
     */
    public function delete($idEgresado, $idDomicilio) {
        $sql = 'DELETE FROM egre_aso_egre_domicilios WHERE ID_EGRESADO = ?  AND ID_DOMICILIO = ? ';
        $sqlQuery = new SqlQuery($sql);
        $sqlQuery->setNumber($idEgresado);
        $sqlQuery->setNumber($idDomicilio);

        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Insert record to table
     *
     * @param EgreAsoEgreDomiciliosOracle egreAsoEgreDomicilio
     */
    public function insert($egreAsoEgreDomicilio) {
        $sql = 'INSERT INTO egre_aso_egre_domicilios ( ID_EGRESADO, ID_DOMICILIO) VALUES ( ?, ?)';
        $sqlQuery = new SqlQuery($sql);



        $sqlQuery->setNumber($egreAsoEgreDomicilio->idEgresado);

        $sqlQuery->setNumber($egreAsoEgreDomicilio->idDomicilio);

        $this->executeInsert($sqlQuery);
        //$egreAsoEgreDomicilio->id = $id;
        //return $id;
    }

    /**
     * Update record in table
     *
     * @param EgreAsoEgreDomiciliosOracle egreAsoEgreDomicilio
     */
    public function update($egreAsoEgreDomicilio) {
        $sql = 'UPDATE egre_aso_egre_domicilios SET  WHERE ID_EGRESADO = ?  AND ID_DOMICILIO = ? ';
        $sqlQuery = new SqlQuery($sql);



        $sqlQuery->setNumber($egreAsoEgreDomicilio->idEgresado);

        $sqlQuery->setNumber($egreAsoEgreDomicilio->idDomicilio);

        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM egre_aso_egre_domicilios';
        $sqlQuery = new SqlQuery($sql);
        return $this->executeUpdate($sqlQuery);
    }

    /**
     * Read row
     *
     * @return EgreAsoEgreDomiciliosOracle 
     */
    protected function readRow($row) {
        $egreAsoEgreDomicilio = new EgreAsoEgreDomicilio();

        $egreAsoEgreDomicilio->idEgresado = $row['ID_EGRESADO'];
        $egreAsoEgreDomicilio->idDomicilio = $row['ID_DOMICILIO'];

        return $egreAsoEgreDomicilio;
    }

    protected function getList($sqlQuery) {
        $tab = OracleQueryExecutor::execute($sqlQuery);
        $ret = array();
        for ($i = 0; $i < count($tab); $i++) {
            $ret[$i] = $this->readRow($tab[$i]);
        }
        return $ret;
    }

    /**
     * Get row
     *
     * @return EgreAsoEgreDomiciliosOracle 
     */
    protected function getRow($sqlQuery) {
        $tab = OracleQueryExecutor::execute($sqlQuery);
        if (count($tab) == 0) {
            return null;
        }
        return $this->readRow($tab[0]);
    }

    /**
     * Execute sql query
     */
    protected function execute($sqlQuery) {
        return OracleQueryExecutor::execute($sqlQuery);
    }

    /**
     * Execute sql query
     */
    protected function executeUpdate($sqlQuery) {
        return OracleQueryExecutor::executeUpdate($sqlQuery);
    }

    /**
     * Query for one row and one column
     */
    protected function querySingleResult($sqlQuery) {
        return OracleQueryExecutor::queryForString($sqlQuery);
    }

    /**
     * Insert row to table
     */
    protected function executeInsert($sqlQuery) {
        return OracleQueryExecutor::executeInsert($sqlQuery);
    }

}

?>