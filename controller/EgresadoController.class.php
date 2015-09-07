<?php

class EgresadoController extends _BaseController{
    public function defaultAction (){  
        
        $_SESSION[VISTA] = 'view/egresado/index.php';
        include ('templates/index.php');
    }
        
    
    public function agregar ($seccion = 'personal'){
//        if (!isset ($_SESSION[USUARIO]) ){
//            print 'error';
//            die();
//        }
        switch ($seccion){
            case 'personal':
                $_SESSION[FORMULARIO] = $this->formularioDatos();
                $_SESSION[VISTA] = 'view/egresado/registroEgresadoDatos.php';
                break;
            case 'academico':
                $_SESSION[FORMULARIO] = $this->formularioAcademico();
                $_SESSION[VISTA] = 'view/egresado/registroEgresadoAcademico.php';
                break;
            case 'contacto':
                $_SESSION[FORMULARIO] = $this->formularioContacto();
                $_SESSION[VISTA] = 'view/egresado/registroEgresadoContacto.php';
                break;
            default:
                $_SESSION[FORMULARIO] = $this->formularioDatos();
                $_SESSION[VISTA] = 'view/egresado/registroEgresadoDatos.php';
                break;
        }
        
        include ('templates/formularios.php');
    }
    
    public function guardar ($seccion){
        
        switch ($seccion){
            case 'personal':
                $this->guardarPersonal ();
                $_SESSION[VISTA] = 'view/egresado/registroEgresadoAcademico.php';
                include ('templates/formularios.php');
                break;
            case 'academico':
                $this->guardarAcademico ();
                $_SESSION[VISTA] = 'view/egresado/registroEgresadoContacto.php';
                include ('templates/formularios.php');
                break;
            case 'contacto':
                $this->guardarContacto ();
                $_SESSION[VISTA] = 'view/egresado/index.php';
                $_SESSION[MENSAJE_EXITO] = 'Datos guardados';
                include ('templates/index.php');
                break;
            default:
                $_SESSION[VISTA] = 'view/404.php';
                include ('templates/index.php');
                break;
        }
    }
    
    private function guardarPersonal (){
        var_dump ($_POST);
    }
    
    private function formularioContacto (){
        
        $form = new FormGenerator(new EgreEgresado(), 'egresado/guardar/personal');
    }
    
    private function formularioDatos (){
        $form = new FormGenerator(new EgreEgresado(), 'egresado/guardar/personal');
        $form->get('iDEGRESADO')->visible = false;
        
        $form->get('aPPATERNO')->label = 'Apellido Paterno';
        $form->get('aPPATERNO')->placeholder = 'Apellido Paterno';
        $form->get('aPPATERNO')->isRequired = true;
        $form->get('aPPATERNO')->value = isset($_SESSION['aPPATERNO'])? $_SESSION['aPPATERNO'] : "";
        
        $form->get('aPMATERNO')->label = 'Apellido Materno';
        $form->get('aPMATERNO')->placeholder = 'Apellido Materno';
        $form->get('aPMATERNO')->isRequired = true;
        
        $form->get('nOMBRE')->label = 'Nombres';
        $form->get('nOMBRE')->placeholder = 'Nombres';        
        $form->get('nOMBRE')->isRequired = true;
        
        $form->get('iDGENERO')->label = 'Genero';
        $form->get('iDGENERO')->placeholder = 'Genero';
        $form->get('iDGENERO')->type = 'select';
        $form->get('iDGENERO')->options = array(1=>'Masculino', 2=>'Femenino');
        
        $form->get('iDESTADOCIVIL')->label = 'Estado Civil';
        $form->get('iDESTADOCIVIL')->placeholder = 'Estado Civil';
        $form->get('iDESTADOCIVIL')->type = 'select';
        $form->get('iDESTADOCIVIL')->options = array(1=>'Soltero', 2=>'Casado', 3=>'Divorciado');
        
        /*
        $dao = DAOFactory::getInstitucionDAO();
        $instituciones = $dao->queryAll();        
        $opciones = array ();        
        foreach ($instituciones as $institucion){
            $opciones[$institucion->idInstitucion] = $institucion->nombre;            
        }
        $fg->get('idInstitucion')->options = $opciones;
         */
        $form->get('iDGENTILICIO')->label = 'Nacionalidad';
        $form->get('iDGENTILICIO')->placeholder = 'Nacionalidad';
        $form->get('iDGENTILICIO')->type = 'select';
        $form->get('iDGENTILICIO')->options = array(1=>'Mexicano', 2=>'Extranjero');
        
        $form->get('rESIDEMEXICO')->label = 'Reside en México';
        $form->get('rESIDEMEXICO')->placeholder = 'Reside en México';
        $form->get('rESIDEMEXICO')->type = 'select';
        $form->get('rESIDEMEXICO')->options = array(1=>'Si', 2=>'No');
        
        $form->get('iDESTADONAC')->label = 'Estado';
        $form->get('iDESTADONAC')->placeholder = 'Estado';
        $form->get('iDESTADONAC')->type = 'select';
        $form->get('iDESTADONAC')->options = array(1=>'DF', 2=>'Morelos');
//        
//        $correo = new FormElement('email');
//        $correo->type = "email";
//        $correo->label = "Email";
//        $correo->placeholder = "Email";

//        $form->addInnerElement($correo, 10);
        
        $form->get('iDUSUARIO')->visible = false;
        $form->get('fECHAREGISTRO')->visible = false;
        return $form->build();
    }
    
    private function formularioAcademico (){        
       $form = new FormGenerator (new EgreDatosAcadsIpn (), 'egresado/guardar/academico');
       
       $form->get('iDDATOACADIPN')->visible = false;
              
       $form->get('iDMOTIVOINTERRUPCION')->options = 
               $this->getOpciones(DAOFactory::getEgreCatMotivosInterrupcionDAO(), 
                                    'iDMOTIVOINTERRUPCION', 'mOTIVOINTERRUPCION');
       $form->get('iDMOTIVOINTERRUPCION')->type = 'select';
       $form->get('iDMOTIVOINTERRUPCION')->label = 'Motivo Interrupción';
              
       $form->get('iDESTATUSEGRE')->options = 
               $this->getOpciones(DAOFactory::getEgreCatEstatusEgreDAO(), 
                                    'iDESTATUSEGRE', 'eSTATUS');
       $form->get('iDESTATUSEGRE')->type = 'select';
       $form->get('iDESTATUSEGRE')->label = 'Status egresado';
       
       $form->get('iDMOTIVONOTITULACION')->options = 
               $this->getOpciones(DAOFactory::getEgreCatMotivosNotitulacionDAO(), 
                                    'iDMOTIVONOTITULACION', 'mOTIVONOTITULACION');
       $form->get('iDMOTIVONOTITULACION')->type = 'select';
       $form->get('iDMOTIVONOTITULACION')->label = 'Motivo no titulación';
       
       $form->get('iDFORMATITULACION')->options = 
               $this->getOpciones(DAOFactory::getEgreCatFormasTitulacionDAO(), 
                                    'iDFORMATITULACION', 'fORMATITULACION');
       $form->get('iDFORMATITULACION')->type = 'select';
       $form->get('iDFORMATITULACION')->label = 'Forma de Titulación';
       
       $form->get('iDCARRERA')->options = 
               $this->getOpciones(DAOFactory::getEgreCatCarrerasDAO(), 
                                    'iDCARRERA', 'cARRERA');
       $form->get('iDCARRERA')->type = 'select';
       $form->get('iDCARRERA')->label = 'Carrera';
       
       $form->get('iDEGRESADO')->visible = false;
       
       //TODO falta este catálogo
//       $form->get('iDUNIDADRESPONSABLE')->options = 
//               $this->getOpciones(DAOFactory::getEgreCatUnidadResponsable(), 
//                                    'iDUNIDADRESPONSABLE', 'uNIDADRESPONSABLE');
       $form->get('iDUNIDADRESPONSABLE')->type = 'select';
       $form->get('iDUNIDADRESPONSABLE')->label = 'Unidad Responsable';
       
       for ($i = 1936; $i<date("Y"); $i++){
           $anios [$i] = $i;
       }
       $form->get('aNIOINGRESO')->options = $anios;
       $form->get('aNIOINGRESO')->type = 'select';
       $form->get('aNIOINGRESO')->label = 'Año de Ingreso';
       
       $form->get('aNIOEGRESO')->options = $anios;
       $form->get('aNIOEGRESO')->type = 'select';
       $form->get('aNIOEGRESO')->label = 'Año de Egreso';
       
       $form->get('bOLETA')->label = 'Boleta';
       
       $form->get('pROMEDIO')->label = 'Promedio';
       
       $form->get('vALIDADOECU')->visible = false;
       
       $form->get('fECHAREGISTRO')->visible = false;
       
       return $form->build();
    }
    
    private function getOpciones ($dao, $id, $descripcion){       
       $elementos = $dao->queryAll();
       $opciones = array();
       foreach ($elementos as $elemento){
           $opciones[$statu->$id] = $statu->$descripcion;
       } 
       return $opciones;
    }
}