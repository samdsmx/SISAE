<?php
/**
 * Class that operate on table 'egre_datos_acads_ipn'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-09-09 23:54
 */
class EgreDatosAcadsIpnMySqlExtDAO extends EgreDatosAcadsIpnMySqlDAO{

	public function queryNoValidados($idUnidadResponsable = 0, $status = 0){
        
        // Es la llamada sin parámetros
        if ($idUnidadResponsable == 0){
            $sql = 'SELECT d.ID_DATO_ACAD_IPN, e.FECHA_REGISTRO, d.BOLETA, e.AP_PATERNO, e.AP_MATERNO, e.NOMBRE 
                    FROM egre_egresados e, egre_datos_acads_ipn d
                    WHERE e.ID_EGRESADO = d.ID_EGRESADO
                    AND d.VALIDADO_ECU IN (0, 1)';
            $sqlQuery = new SqlQuery($sql);
        }else{            
            $sql = 'SELECT d.ID_DATO_ACAD_IPN, e.FECHA_REGISTRO, d.BOLETA, e.AP_PATERNO, e.AP_MATERNO, e.NOMBRE 
                    FROM egre_egresados e, egre_datos_acads_ipn d
                    WHERE e.ID_EGRESADO = d.ID_EGRESADO
                    AND d.VALIDADO_ECU = ?
                    AND d.ID_UNIDAD_RESPONSABLE = ?';
            $sqlQuery = new SqlQuery($sql);        
            $sqlQuery->setNumber($status);
            $sqlQuery->setNumber($idUnidadResponsable);
        }
        return QueryExecutor::execute($sqlQuery);
    }
}
?>