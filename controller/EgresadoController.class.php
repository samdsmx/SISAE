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
                break;
            case 'academico':
                $this->guardarAcademico ();                
                break;
            case 'contacto':
                $this->guardarContacto ();
                $_SESSION[VISTA] = 'view/egresado/index.php';                
                include ('templates/index.php');
                break;
            default:
                $_SESSION[VISTA] = 'view/404.php';
                include ('templates/index.php');
                break;
        }
    }
    
    private function guardarContacto (){
        if ( !isset ($_SESSION[EGRESADO][PERSONAL]) ){
            $_SESSION[MENSAJE] = 'Te faltaron los datos personales.';
            header("Location: http://".SERVER_URL."egresado/agregar/personal");
        }
        
        if ( !isset ($_SESSION[EGRESADO][ACADEMICO]) ){
            $_SESSION[MENSAJE] = 'Te faltaron los datos académicos.';
            header("Location: http://".SERVER_URL."egresado/agregar/acedemico");
        }
        
        $egresado = new EgreEgresado ();
        ObjectMap::map($_SESSION[EGRESADO][PERSONAL], $egresado);
        
        
    }
    
    private function guardarPersonal (){
        $_SESSION[EGRESADO][PERSONAL] = $_POST;        
        header("Location: http://".SERVER_URL."egresado/agregar/academico");        
    }
    
    private function guardarAcademico (){
        $_SESSION[EGRESADO][ACADEMICO] = $_POST;        
        header("Location: http://".SERVER_URL."egresado/agregar/contacto");
    }
    
    private function formularioContacto (){
        
        $form = new FormGenerator(new EgreContactosEgresado(), 'egresado/guardar/personal');
        $form->get('idContactoEgresado')->visible = false;
        $form->get('idEgresado')->visible = false;        
        return $form->build();
        
    }
    
    private function formularioDatos (){
        print_r ($_SESSION[EGRESADO][PERSONAL]);
        $form = new FormGenerator(new EgreEgresado(), 'egresado/guardar/personal');
        $form->get('idEgresado')->visible = false;
                
        $form->get('apPaterno')->label = 'Apellido Paterno';
        $form->get('apPaterno')->placeholder = 'Apellido Paterno';
        $form->get('apPaterno')->isRequired = true;
        $form->get('apPaterno')->value = 
                isset($_SESSION[EGRESADO][PERSONAL]['apPaterno'])? 
                $_SESSION[EGRESADO][PERSONAL]['apPaterno'] : "";
        
        $form->get('apMaterno')->label = 'Apellido Materno';
        $form->get('apMaterno')->placeholder = 'Apellido Materno';
        $form->get('apMaterno')->isRequired = true;
        $form->get('apMaterno')->value = 
                isset($_SESSION[EGRESADO][PERSONAL]['apMaterno'])? 
                $_SESSION[EGRESADO][PERSONAL]['apMaterno'] : "";
        
        $form->get('nombre')->label = 'Nombres';
        $form->get('nombre')->placeholder = 'Nombres';        
        $form->get('nombre')->isRequired = true;
        $form->get('nombre')->value = 
                isset($_SESSION[EGRESADO][PERSONAL]['nombre'])? 
                $_SESSION[EGRESADO][PERSONAL]['nombre'] : "";
        
        $form->get('idGenero')->label = 'Genero';
        $form->get('idGenero')->placeholder = 'Genero';
        $form->get('idGenero')->type = 'select';
        $form->get('idGenero')->options = array(1=>'Masculino', 2=>'Femenino');
        $form->get('idGenero')->selected = 
                isset($_SESSION[EGRESADO][PERSONAL]['idGenero'])?
                $_SESSION[EGRESADO][PERSONAL]['idGenero'] : "";
                    
        $form->get('idEstadoCivil')->label = 'Estado Civil';
        $form->get('idEstadoCivil')->placeholder = 'Estado Civil';
        $form->get('idEstadoCivil')->type = 'select';
        $form->get('idEstadoCivil')->options = array(1=>'Soltero', 2=>'Casado', 3=>'Divorciado');
        $form->get('idEstadoCivil')->selected = 
                isset($_SESSION[EGRESADO][PERSONAL]['idEstadoCivil'])?
                $_SESSION[EGRESADO][PERSONAL]['idEstadoCivil'] : "";
        
        /*
        $dao = DAOFactory::getInstitucionDAO();
        $instituciones = $dao->queryAll();        
        $opciones = array ();        
        foreach ($instituciones as $institucion){
            $opciones[$institucion->idInstitucion] = $institucion->nombre;            
        }
        $fg->get('idInstitucion')->options = $opciones;
         */
        $form->get('idGentilicio')->label = 'Nacionalidad';
        $form->get('idGentilicio')->placeholder = 'Nacionalidad';
        $form->get('idGentilicio')->type = 'select';
        $form->get('idGentilicio')->options = array(1=>'Mexicano', 2=>'Extranjero');
        $form->get('idGentilicio')->selected = 
                isset($_SESSION[EGRESADO][PERSONAL]['idGentilicio'])?
                $_SESSION[EGRESADO][PERSONAL]['idGentilicio'] : "";
        
        $form->get('resideMexico')->label = 'Reside en México';
        $form->get('resideMexico')->placeholder = 'Reside en México';
        $form->get('resideMexico')->type = 'select';
        $form->get('resideMexico')->options = array(1=>'Si', 2=>'No');
        $form->get('resideMexico')->selected = 
                isset($_SESSION[EGRESADO][PERSONAL]['resideMexico'])?
                $_SESSION[EGRESADO][PERSONAL]['resideMexico'] : "";
        
        $form->get('idEstadoNac')->label = 'Estado';
        $form->get('idEstadoNac')->placeholder = 'Estado';
        $form->get('idEstadoNac')->type = 'select';
        $form->get('idEstadoNac')->options = array(1=>'DF', 2=>'Morelos');
        $form->get('idEstadoNac')->selected = 
                isset($_SESSION[EGRESADO][PERSONAL]['idEstadoNac'])?
                $_SESSION[EGRESADO][PERSONAL]['idEstadoNac'] : "";
//        
//        $correo = new FormElement('email');
//        $correo->type = "email";
//        $correo->label = "Email";
//        $correo->placeholder = "Email";

//        $form->addInnerElement($correo, 10);
        
        $form->get('idUsuario')->visible = false;
        $form->get('fechaRegistro')->visible = false;
        return $form->build();
    }
    
    private function formularioAcademico (){        
       $form = new FormGenerator (new EgreDatosAcadsIpn (), 'egresado/guardar/academico');
       
       $form->get('idDatoAcadIpn')->visible = false;
              
       $form->get('idMotivoInterrupcion')->options = 
               $this->getOpciones(DAOFactory::getEgreCatMotivosInterrupcionDAO(), 
                                    'idMotivoInterrupcion', 'idMotivoInterrupcion');
       $form->get('idMotivoInterrupcion')->type = 'select';
       $form->get('idMotivoInterrupcion')->label = 'Motivo Interrupción';
              
       $form->get('idEstatusEgre')->options = 
               $this->getOpciones(DAOFactory::getEgreCatEstatusEgreDAO(), 
                                    'idEstatusEgre', 'estatus');
       $form->get('idEstatusEgre')->type = 'select';
       $form->get('idEstatusEgre')->label = 'Status egresado';
       
       $form->get('idMotivoNotitulacion')->options = 
               $this->getOpciones(DAOFactory::getEgreCatMotivosNotitulacionDAO(), 
                                    'idMotivoNotitulacion', '$motivoNotitulacion');
       $form->get('idMotivoNotitulacion')->type = 'select';
       $form->get('idMotivoNotitulacion')->label = 'Motivo no titulación';
       
       $form->get('idFormaTitulacion')->options = 
               $this->getOpciones(DAOFactory::getEgreCatFormasTitulacionDAO(), 
                                    'idFormaTitulacion', 'formaTitulacion');
       $form->get('idFormaTitulacion')->type = 'select';
       $form->get('idFormaTitulacion')->label = 'Forma de Titulación';
       
       $form->get('idCarrera')->options = 
               $this->getOpciones(DAOFactory::getEgreCatCarrerasDAO(), 
                                    'idCarrera', 'carrera');
       $form->get('idCarrera')->type = 'select';
       $form->get('idCarrera')->label = 'Carrera';
       
       $form->get('idEgresado')->visible = false;
       
       //TODO falta este catálogo
//       $form->get('iDUNIDADRESPONSABLE')->options = 
//               $this->getOpciones(DAOFactory::getEgreCatUnidadResponsable(), 
//                                    'iDUNIDADRESPONSABLE', 'uNIDADRESPONSABLE');
       $form->get('idUnidadResponsable')->type = 'select';
       $form->get('idUnidadResponsable')->label = 'Unidad Responsable';
       
       for ($i = 1936; $i<date("Y"); $i++){
           $anios [$i] = $i;
       }
       $form->get('anioIngreso')->options = $anios;
       $form->get('anioIngreso')->type = 'select';
       $form->get('anioIngreso')->label = 'Año de Ingreso';
       
       $form->get('anioEgreso')->options = $anios;
       $form->get('anioEgreso')->type = 'select';
       $form->get('anioEgreso')->label = 'Año de Egreso';
       
       $form->get('boleta')->label = 'Boleta';
       
       $form->get('promedio')->label = 'Promedio';
       
       $form->get('validadoEcu')->visible = false;
       
       $form->get('fechaRegistro')->visible = false;
       
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