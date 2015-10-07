<?php

class UnidadController extends _BaseController {

    public function defaultAction() {
        $this->esUsuarioLoggeado();
        $_SESSION[VISTA] = 'view/unidad/index.php';
        include ('templates/unidad.php');
    }
    
    public function validar ($status = 0){        
        $this->esUsuarioLoggeado();
        $dao = DAOFactory::getEgreDatosAcadsIpnDAO();
        $responsable = unserialize($_SESSION[RESPONSABLE]);
        $registros = $dao->queryNoValidados($responsable->idUnidadResponsable, $status);
        $_SESSION[VISTA] = 'view/unidad/verEgresadosStatus.php';
        include_once 'templates/unidad.php';
    }
    
    public function cambiaStatus (){
        $this->esUsuarioLoggeado();
        $dao = DAOFactory::getEgreDatosAcadsIpnDAO();
        $datosAcad = $dao->load($_POST['id']);
        $datosAcad->validadoEcu = $_POST['status'];
        print $dao->update($datosAcad); 
        
        //TODO Agregar a bitacora
    }
    
    public function detalleEgresado ($id){
        /*@var responsable EgreResponsablesUr*/
        $responsable = unserialize($_SESSION[RESPONSABLE]);
        $egresado = DAOFactory::getEgreEgresadosDAO()->load($id);
        $datosAcad = DAOFactory::getEgreDatosAcadsIpnDAO()->queryByIDEGRESADO($egresado->idEgresado);
        $datoEscuela = '';
        foreach ($datosAcad as $dato){
            if ($dato->idUnidadResponsable == $responsable->idUnidadResponsable)
                $datoEscuela = $dato;
        }                
        $_SESSION[VISTA] = 'view/unidad/verDetalleEgresado.php';
        include_once 'templates/unidad.php';
    }
    
    private function esUsuarioLoggeado (){
        if (!isset($_SESSION[RESPONSABLE])){
            header (header("Location: http://" . SERVER_URL));
            die();
        }        
    }
    
}