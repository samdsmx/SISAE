<?php

class OracleQueryExecutor {

    public static $conn;

    public static function getConnection() {
        self::$conn = oci_connect(
                ConnectionProperty::getUser(), 
                ConnectionProperty::getPassword(), 
                ConnectionProperty::getDatabase(), 
                'AL32UTF8'); // Regrese resultados en UTF 8
        return self::$conn;
    }

    private static function internalExecution($sqlQuery) {
        $conn = self::getConnection();        
        $query = $sqlQuery->getQuery();        
        $stid = oci_parse($conn, $query);
        $r = oci_execute($stid);
        if (!$r) {
            throw new Exception("SQL Error: -->" . $query . "<--" . oci_error($stid));
        }
        return $stid;
    }

    public static function execute($sqlQuery) {
        
        $stid = self::internalExecution($sqlQuery);
        
        $i = 0;
        $tab = array();
        while (($row = oci_fetch_array($stid, OCI_RETURN_NULLS)) != false) {
            $tab[$i++] = $row;
        }
        oci_free_statement($stid);
        oci_close(self::$conn);
        return $tab;
    }

    public static function executeUpdate($sqlQuery) {
        $stid = self::internalExecution($sqlQuery);
        $numRows = oci_num_rows($stid);
        oci_free_statement($stid);
        oci_close(self::$conn);
        return $numRows;
    }

    public static function executeInsert($sqlQuery) {
        return $self::executeUpdate($sqlQuery);        
    }
    
    public static function queryForString($sqlQuery){
        $stid = self::internalExecution($sqlQuery);        
        $row = oci_fetch_array($stid, OCI_RETURN_NULLS);        
        return $row[0];
    }

}
