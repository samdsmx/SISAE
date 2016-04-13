<?php

class EgresadoController extends _BaseController {

    
    public function defaultAction() {

        $_SESSION[VISTA] = 'view/egresado/index.php';
        $usuario = unserialize($_SESSION[USUARIO]);
        $_SESSION[NOMBRE_VISTA] = 'Bienvenido '.$usuario->usuario;
        include ('templates/egresado.php');
    }
    
    public function actualizaDatos (){
        $_SESSION[VISTA] = 'view/egresado/actualizaDatos.php';
        $_SESSION[NOMBRE_VISTA] = '';
        $usuario = unserialize($_SESSION[USUARIO]);
        
        $datos = DAOFactory::getDAOFactory()->getEgreEgresadosDAO()->queryByIDUSUARIO($usuario->idUsuario);
        $egresado = $datos[0];

        include ('templates/egresado.php');
    }
        
    
    public function updateDatos (){
        
        $datos = new EgreEgresado ();
        ObjectMap::map($_POST, $datos);        
        $dao = DAOFactory::getDAOFactory();
        $dao->getEgreEgresadosDAO()->update($datos);
        $_SESSION[VISTA] = 'view/egresado/datosGuardados.php';
        include ('templates/egresado.php');
    }
    
    public function actualizaDatosAcademicos (){
        $_SESSION[VISTA] = 'view/egresado/actualizaDatosAcademicos.php';
        $_SESSION[NOMBRE_VISTA] = '';
        $usuario = unserialize($_SESSION[USUARIO]);
        $datosEgre = DAOFactory::getDAOFactory()->getEgreEgresadosDAO()->queryByIDUSUARIO($usuario->idUsuario);
        $egresado = $datosEgre[0];
        $datosAcad = DAOFactory::getDAOFactory()->getEgreDatosAcadsIpnDAO()->queryByIDEGRESADO($egresado->idEgresado);
        $academico = $datosAcad[0];
        //Deshabilita todos los componentes del formulario
        $disabled = ($academico->validadoEcu == 1)? 'disabled':'';
        $urs = DAOFactory::getDAOFactory()->getEgreUrNombresDAO()->queryAll();

        $carreras = DAOFactory::getDAOFactory()->getEgreCatCarrerasDAO()->queryAll();
        $anios = [];
        for ($i = 2016; $i>1935; $i--) 
            $anios[] = $i;
        
        include ('templates/egresado.php');
    }
    
    public function updateDatosAcademicos (){
        $datos = new EgreDatosAcadsIpn ();
        ObjectMap::map($_POST, $datos);        
        $dao = DAOFactory::getDAOFactory();
        $dao->getEgreDatosAcadsIpnDAO()->update($datos);
        $_SESSION[VISTA] = 'view/egresado/datosGuardados.php';
        include ('templates/egresado.php');
    }
    
    public function actualizaDireccion (){
        $dao = DAOFactory::getDAOFactory();
        $egresado = unserialize($_SESSION[EGRESADO][DATOS]);
        $datos = $dao->getEgreAsoEgreDomiciliosDAO()->queryByIdEgresado($egresado->idEgresado);
        
        //TODO Se puede mejorar con un query
        
        $_SESSION[VISTA] = 'view/egresado/muestraDirecciones.php';
        include ('templates/egresado.php');
    }
    
    public function cerrar (){        
        session_destroy();
        header("Location: http://" . SERVER_URL );
    }

    public function agregar($seccion) {
// Validación usuario loggeado
//        if (!isset ($_SESSION[USUARIO]) ){
//            print 'error';
//            die();
//        }
        // Si la URL es /sisae/egresado/agregar se va a agregar los datos pesonales
        if (!isset($seccion)) {
            $seccion = 'personal';
        }
        switch ($seccion) {
            case 'personal':
                $_SESSION[NOMBRE_VISTA] = 'Datos personales';
                $_SESSION[FORMULARIO] = $this->formularioDatos();
                $_SESSION[VISTA] = 'view/egresado/registroEgresadoDatos.php';
                break;
            case 'academico':                
                $_SESSION[NOMBRE_VISTA] = 'Datos académicos';                
                $_SESSION[FORMULARIO] = $this->formularioAcademico();                
                $_SESSION[VISTA] = 'view/egresado/registroEgresadoAcademico.php';                
                break;
            case 'direccion':
                $_SESSION[NOMBRE_VISTA] = 'Dirección';
                $_SESSION[FORMULARIO] = $this->formularioDireccion();
                $_SESSION[VISTA] = 'view/egresado/registroEgresadoDireccion.php';
                break;
            case 'contacto':
                $_SESSION[NOMBRE_VISTA] = 'Medios de contacto';
                $_SESSION[FORMULARIO] = $this->formularioContacto();
                $_SESSION[VISTA] = 'view/egresado/registroEgresadoContacto.php';
                break;
            default:
                $_SESSION[VISTA] = 'view/404.php';
                break;
        }
        
        

        include ('templates/base.php');
    }

    public function guardar($seccion) {

        switch ($seccion) {
            case 'personal':
                $this->guardarPersonal();
                break;
            case 'academico':
                $this->guardarAcademico();
                break;
            case 'egresado':                
                $this->guardarEgresado();
//                header("Location: http://" . SERVER_URL . "egresado/agregar/personal");
                break;
            case 'direccion':
                $this->guardarDireccion();
                break;
            default:                
                $_SESSION[VISTA] = 'view/404.php';
                include ('templates/base.php');
                break;
        }
    }

    private function guardarEgresado() {
        
//        print (!isset($_SESSION[EGRESADO][PERSONAL]));
//        print (isset($_SESSION[EGRESADO][PERSONAL]));
        //var_dump ($_SESSION);
        
        if (!isset($_SESSION[EGRESADO][PERSONAL])) {
            $_SESSION[MENSAJE] = 'Te faltaron los datos personales.';
            header("Location: http://" . SERVER_URL . "egresado/agregar/personal");
            return;
        }
        if (!isset($_SESSION[EGRESADO][DIRECCION])) {
            $_SESSION[MENSAJE] = 'Te faltó agregar la dirección';
            header("Location: http://" . SERVER_URL . "egresado/agregar/direccion");
            return;
        }

        if (!isset($_SESSION[EGRESADO][ACADEMICO])) {
            $_SESSION[MENSAJE] = 'Te faltaron los datos académicos.';
            header("Location: http://" . SERVER_URL . "egresado/agregar/academico");
            return;
        }

        $egresado = new EgreEgresado ();
        ObjectMap::map($_SESSION[EGRESADO][PERSONAL], $egresado);
        

        
        $academico = new EgreDatosAcadsIpn ();
        ObjectMap::map($_SESSION[EGRESADO][ACADEMICO], $academico);
               
        $usuario = new EgreUsuario ();
        $usuario->contrasenia = md5 ($_SESSION[EGRESADO][PERSONAL]['password']);
        $usuario->idRol = '1';
        $usuario->usuario = $_SESSION[EGRESADO][PERSONAL]['email'];
        $usuario->foto = ' ';
        
        //$dao = new EgreUsuariosOracleExtDAO ();
        DAOFactory::getDAOFactory()->getEgreUsuariosDAO()->insert($usuario);
         //$this->daoFactory.getEgreUsuariosDAO()->insert($usuario);
//        print 'llego aqui';
                
        $egresado->idUsuario = $usuario->idUsuario;
        
        DAOFactory::getDAOFactory()->getEgreEgresadosDAO()->insert($egresado);
        

        $academico->idEgresado = $egresado->idEgresado;
        //TODO validar anio ingreso < anio egreso
        DAOFactory::getDAOFactory()->getEgreDatosAcadsIpnDAO()->insert($academico);
        
        
        /*if (!empty($_SESSION[EGRESADO][PERSONAL]['email'])){
            $contacto = new EgreContactosEgresado();
            ObjectMap::map($_SESSION[EGRESADO][PERSONAL], $contacto);
            DAOFactory::getDAOFactory()->getEgreContactosEgresadosDAO()->insert($contacto);
        } 
        */
        //isset($_SESSION[EGRESADO][PERSONAL]['email']
        //$_SESSION[EGRESADO][PERSONAL]['telefonoFijo']
        //$_SESSION[EGRESADO][PERSONAL]['telefonoMovil']
                
                
        
        if ($_SESSION[EGRESADO][PERSONAL]['resideMexico'] == 1){
            $domicilio = new EgreDomicilio();            
            ObjectMap::map($_SESSION[EGRESADO][DIRECCION], $domicilio);            
            DAOFactory::getDAOFactory()->getEgreDomiciliosDAO()->insert($domicilio);
            //$domicilio->idDomicilio = DAOFactory::getDAOFactory()->getEgreDomiciliosDAO()->getLastID ();
            $aso = new EgreAsoEgreDomicilio ();
            $aso->idDomicilio = $domicilio->idDomicilio;
            $aso->idEgresado = $egresado->idEgresado;
            DAOFactory::getDAOFactory()->getEgreAsoEgreDomiciliosDAO()->insert($aso);
            
        }else{
            $domicilio = new EgreDomiciliosExtranjero();            
            ObjectMap::map($_SESSION[EGRESADO][DIRECCION], $domicilio);
            DAOFactory::getDAOFactory()->getEgreDomiciliosExtranjerosDAO()->insert($domicilio);
            
            $aso = new EgreAsoEgreDomExt ();
            $aso->idDomicilio = $domicilio->idDomicilio;
            $aso->idEgresado = $egresado->idEgresado;
            DAOFactory::getDAOFactory()->getEgreAsoEgreDomExtDAO()->insert($aso);
            
        }
        unset ($_SESSION[EGRESADO][ACADEMICO]);
        unset ($_SESSION[EGRESADO][PERSONAL]);
        unset ($_SESSION[EGRESADO][DIRECCION]);
        header("Location: http://" . SERVER_URL . "egresado/registrado");
    }
    
    public function registrado (){
        $idCarrera = $_SESSION[EGRESADO][ACADEMICO]['idCarrera'];
        $carrera = DAOFactory::getDAOFactory()->getEgreCatCarrerasDAO()->load($idCarrera);                
        $_SESSION[VISTA] = 'view/egresado/confirmacionRegistro.php';
        $_SESSION[NOMBRE_VISTA] = 'Registro completo';
        include_once 'templates/base.php';        
    }

    private function guardarPersonal() {
        $_SESSION[EGRESADO][PERSONAL] = $_POST;
//        var_dump ($_SESSION);
        header("Location: http://" . SERVER_URL . "egresado/agregar/direccion");
    }
    
    private function guardarDireccion() {
        $_SESSION[EGRESADO][DIRECCION] = $_POST;
        header("Location: http://" . SERVER_URL . "egresado/agregar/academico");
    }

    private function guardarAcademico() {
        $_SESSION[EGRESADO][ACADEMICO] = $_POST;        
        header("Location: http://" . SERVER_URL . "egresado/guardar/egresado");
    }

    private function formularioContacto() {

        $form = new FormGenerator(new EgreContactosEgresado(), 'egresado/guardar/contacto');
        $form->get('idContactoEgresado')->visible = false;
        $form->get('idEgresado')->visible = false;
        
        
        $form->get('idMedioContacto')->type = 'select';
        $form->get('idMedioContacto')->options = $this->getOpciones(DAOFactory::getDAOFactory()->getEgreCatMediosContactoDAO(), 'idMedioContacto', 'medioContacto');
        $form->get('idMedioContacto')->value = isset($_SESSION[EGRESADO][CONTACTO]['idMedioContacto']) ?
                $_SESSION[EGRESADO][CONTACTO]['idMedioContacto'] : "";
        return $form->build();
    }

    private function formularioDireccion() {
        if (!isset($_SESSION[EGRESADO][PERSONAL]['resideMexico'])) {
            $_SESSION[MENSAJE] = 'Antes de elegir una dirección, llena los datos personales';
//            var_dump ($_SESSION[MENSAJE]);
            header("Location: http://" . SERVER_URL . "egresado/agregar/personal");
            exit ();
        }        
        
        if ($_SESSION[EGRESADO][PERSONAL]['resideMexico'] == 1) {
            return $this->formularioDireccionMexico();
        } else {
            return $this->formularioDireccionExtranjero();
        }
    }

    private function formularioDireccionMexico() {
        $form = new FormGenerator(new EgreDomicilio(), 'egresado/guardar/direccion', 'Continuar');
        $form->get ('idDomicilio')->visible = false;
        
        /*ini_set('display_errors', 1); 
        error_reporting(E_ALL);*/
        //$codigoPostal = DAOFactory::getDAOFactory()->getCipnCatCodigoPostalDAO();
        
        $element = new FormElement ('codigoPostal');
        $element->type = 'number';
        //$element->options = $this->getOpcionesOrder($codigoPostal, 'idCodigoPostal', 'codigoPostal',  'codigo_Postal');
        $form->addInnerElement($element, 1);
         
        $element = new FormElement ('municipio');
        $element->label = 'Municipio - Estado';
        $element->placeholder = 'Municipio - Estado';
        $form->addInnerElement($element, 3);
 
        //$asentamiento = DAOFactory::getDAOFactory()->getEgreCPAsentamientoDAO();
        //$form->get('idAsentamiento')->options = $this->getOpcionesOrder($asentamiento, 'asentamiento', 'id_asentamiento', 'asentamiento');
        
        $form->get('idAsentamiento')->label = 'Asentamiento / Colonia';
        $form->get('idAsentamiento')->placeholder = 'Asentamiento';
        $form->get('idAsentamiento')->type = 'select';
        $form->get('idAsentamiento')->selected = isset($_SESSION[EGRESADO][DIRECCION]['idAsentamiento']) ?
                $_SESSION[EGRESADO][DIRECCION]['idAsentamiento'] : "";
        
//        $form->get('idCodigoPostal')->label = 'Código Postal';
//        $form->get('idCodigoPostal')->placeholder = 'Código Postal';
//        $form->get('idCodigoPostal')->type = 'select';
//        
//        $form->get('idCodigoPostal')->selected = isset($_SESSION[EGRESADO][DIRECCION]['idCodigoPostal']) ?
//                $_SESSION[EGRESADO][DIRECCION]['idCodigoPostal'] : "";
        
        
//        $codigoPostal  = new FormElement ('codigoPostal');
//        $codigoPostal->isRequired = true;
//        $codigoPostal->label = 'Código Postal';
//        $codigoPostal->placeholder = 'Debe contener 5 dígitos';
        
        //$form->addInnerElement($codigoPostal, 1);
                
        return $form->build ();
    }
    
    private function formularioDireccionExtranjero (){
        $form = new FormGenerator(new EgreDomiciliosExtranjero(), 'egresado/guardar/direccion', 'Continuar');
        return $form->build ();
    }

    private function formularioDatos() {
//        print_r ($_SESSION[EGRESADO][PERSONAL]);
        $form = new FormGenerator(new EgreEgresado(), 'egresado/guardar/personal', 'Continuar');
        $form->get('idEgresado')->visible = false;

        $form->get('apPaterno')->label = 'Apellido Paterno';
        $form->get('apPaterno')->placeholder = 'Apellido Paterno';
        $form->get('apPaterno')->isRequired = true;
        $form->get('apPaterno')->value = isset($_SESSION[EGRESADO][PERSONAL]['apPaterno']) ?
                $_SESSION[EGRESADO][PERSONAL]['apPaterno'] : "";

        $form->get('apMaterno')->label = 'Apellido Materno';
        $form->get('apMaterno')->placeholder = 'Apellido Materno';
        $form->get('apMaterno')->isRequired = true;
        $form->get('apMaterno')->value = isset($_SESSION[EGRESADO][PERSONAL]['apMaterno']) ?
                $_SESSION[EGRESADO][PERSONAL]['apMaterno'] : "";

        $form->get('nombre')->label = 'Nombres';
        $form->get('nombre')->placeholder = 'Nombres';
        $form->get('nombre')->isRequired = true;
        $form->get('nombre')->value = isset($_SESSION[EGRESADO][PERSONAL]['nombre']) ?
                $_SESSION[EGRESADO][PERSONAL]['nombre'] : "";

        $form->get('curp')->value = isset($_SESSION[EGRESADO][PERSONAL]['curp']) ?
                $_SESSION[EGRESADO][PERSONAL]['curp'] : "";

        $form->get('idGenero')->label = 'Genero';
        $form->get('idGenero')->placeholder = 'Genero';
        $form->get('idGenero')->type = 'select';
        $form->get('idGenero')->options = array(1 => 'Femenino', 2 => 'Masculino');
        $form->get('idGenero')->selected = isset($_SESSION[EGRESADO][PERSONAL]['idGenero']) ?
                $_SESSION[EGRESADO][PERSONAL]['idGenero'] : "";

        $edoCivil = DAOFactory::getDAOFactory()->getCipnCatEstadosCivilesDAO();
        $form->get('idEstadoCivil')->options = $this->getOpciones($edoCivil, 'iDESTADOCIVIL', 'eSTADOCIVIL');
        $form->get('idEstadoCivil')->label = 'Estado Civil';
        $form->get('idEstadoCivil')->placeholder = 'Estado Civil';
        $form->get('idEstadoCivil')->type = 'select';
        //$form->get('idEstadoCivil')->options = array(1 => 'Soltero', 2 => 'Casado', 3 => 'Divorciado');
        $form->get('idEstadoCivil')->selected = isset($_SESSION[EGRESADO][PERSONAL]['idEstadoCivil']) ?
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
        $form->get('idGentilicio')->options = array(1 => 'Mexicano', 2 => 'Extranjero');
        $form->get('idGentilicio')->selected = isset($_SESSION[EGRESADO][PERSONAL]['idGentilicio']) ?
                $_SESSION[EGRESADO][PERSONAL]['idGentilicio'] : "";

        $form->get('resideMexico')->label = 'Reside en México';
        $form->get('resideMexico')->placeholder = 'Reside en México';
        $form->get('resideMexico')->type = 'select';
        $form->get('resideMexico')->options = array(0 => 'No', 1 => 'Si',);
        $form->get('resideMexico')->selected = isset($_SESSION[EGRESADO][PERSONAL]['resideMexico']) ?
                $_SESSION[EGRESADO][PERSONAL]['resideMexico'] : "";

               
        $estados = DAOFactory::getDAOFactory()->getCipnCatEstadosDAO();
        $form->get('idEstadoNac')->options = $this->getOpcionesOrder($estados, 'iDESTADO', 'eSTADO', 'eSTADO');
        $form->get('idEstadoNac')->label = 'Estado de Nacimiento';
        $form->get('idEstadoNac')->placeholder = 'Estado';
        $form->get('idEstadoNac')->type = 'select';
        //$form->get('idEstadoNac')->options = array(1 => 'DF', 2 => 'Morelos');
        $form->get('idEstadoNac')->selected = isset($_SESSION[EGRESADO][PERSONAL]['idEstadoNac']) ?
                $_SESSION[EGRESADO][PERSONAL]['idEstadoNac'] : "";
//        
//        $correo = new FormElement('email');
//        $correo->type = "email";
//        $correo->label = "Email";
//        $correo->placeholder = "Email";
//        $form->addInnerElement($correo, 10);
        
        $correo = new FormElement ('email');
        $correo->type = 'email';
        $correo->label = 'Correo Electrónico';
        $correo->placeholder = 'Correo Electrónico';
        $correo->value = isset($_SESSION[EGRESADO][PERSONAL]['email']) ?
                $_SESSION[EGRESADO][PERSONAL]['email'] : "";
        $correo->isRequired = true;
        $form->addInnerElement($correo, 10);
        
        $correo2 = new FormElement ('email2');
        $correo2->type = 'email2';
        $correo2->label = 'Confirma tu Correo Electrónico';
        $correo2->placeholder = 'Confirma tu Correo Electrónico';
        $correo2->value = isset($_SESSION[EGRESADO][PERSONAL]['email2']) ?
                $_SESSION[EGRESADO][PERSONAL]['email2'] : "";
        $correo2->isRequired = true;
        $form->addInnerElement($correo2, 11);
        
        $telefonoCasa = new FormElement ('telefonoFijo');
        $telefonoCasa->type = 'tel';
        $telefonoCasa->label = 'Teléfono fijo';
        $telefonoCasa->placeholder = 'Teléfono fijo';
        $telefonoCasa->value = isset($_SESSION[EGRESADO][PERSONAL]['telefonoFijo']) ?
                $_SESSION[EGRESADO][PERSONAL]['telefonoFijo'] : "";
        
        $form->addInnerElement($telefonoCasa, 12);
        
        $telefonoMovil = new FormElement ('telefonoMovil');
        $telefonoMovil->type = 'tel';
        $telefonoMovil->label = 'Teléfono Móvil';
        $telefonoMovil->placeholder = 'Ejemplo: 044 (55) 5555 - 5555';        
        $telefonoMovil->value = isset($_SESSION[EGRESADO][PERSONAL]['telefonoMovil']) ?
                $_SESSION[EGRESADO][PERSONAL]['telefonoMovil'] : "";
        
        $form->addInnerElement($telefonoMovil, 13);

        $password = new FormElement ('password');
        $password->type = 'password';
        $password->label = 'Contraseña';
        $password->placeholder = 'Usa letras mayúsculas, minúsculas, números y símbolos';        
        $password->value = isset($_SESSION[EGRESADO][PERSONAL]['password']) ?
                $_SESSION[EGRESADO][PERSONAL]['password'] : "";
        $password->isRequired = true;
        
        $form->addInnerElement($password, 14);
        
        $password2 = new FormElement ('password2');
        $password2->type = 'password';
        $password2->label = 'Confirma tu Contraseña';
        $password2->placeholder = 'Escribe la misma contraseña que en el campo Contraseña';        
        $password2->value = isset($_SESSION[EGRESADO][PERSONAL]['password2']) ?
                $_SESSION[EGRESADO][PERSONAL]['password2'] : "";
        $password2->isRequired = true;
        
        $form->addInnerElement($password2, 15);

        
        $form->get('idUsuario')->visible = false;
        $form->get('fechaRegistro')->visible = false;
        return $form->build();
    }

    private function formularioAcademico() {
        
        $form = new FormGenerator(new EgreDatosAcadsIpn(), 'egresado/guardar/academico', 'Guardar todo');
        
        $form->get('idDatoAcadIpn')->visible = false;

        //$op = $this->daoFactory.getEgreCatMotivosInterrupcionDAO();
        $op = DAOFactory::getDAOFactory()->getEgreCatMotivosInterrupcionDAO();
        //$op = new EgreCatMotivosInterrupcionOracleExtDAO() ;
        
        $form->get('idMotivoInterrupcion')->options = $this->getOpciones($op, 'idMotivoInterrupcion', 'motivoInterrupcion');
        
        $form->get('idMotivoInterrupcion')->type = 'select';
        $form->get('idMotivoInterrupcion')->label = 'Motivo Interrupción';
        $form->get('idMotivoInterrupcion')->selected = isset($_SESSION[EGRESADO][ACADEMICO]['idMotivoInterrupcion']) ?
                $_SESSION[EGRESADO][ACADEMICO]['idMotivoInterrupcion'] : "";
        
        $form->get('idEstatusEgre')->options = $this->getOpciones(DAOFactory::getDAOFactory()->getEgreCatEstatusEgreDAO(), 'idEstatusEgre', 'estatus');
        $form->get('idEstatusEgre')->type = 'select';
        $form->get('idEstatusEgre')->label = 'Status egresado';
        $form->get('idEstatusEgre')->selected = isset($_SESSION[EGRESADO][ACADEMICO]['idEstatusEgre']) ?
                $_SESSION[EGRESADO][ACADEMICO]['idEstatusEgre'] : "";

        
        $form->get('idMotivoNotitulacion')->options = $this->getOpciones(DAOFactory::getDAOFactory()->getEgreCatMotivosNotitulacionDAO(), 'idMotivoNotitulacion', 'motivoNotitulacion');
        $form->get('idMotivoNotitulacion')->type = 'select';
        $form->get('idMotivoNotitulacion')->label = 'Motivo no titulación';
        $form->get('idMotivoNotitulacion')->selected = isset($_SESSION[EGRESADO][ACADEMICO]['idMotivoNotitulacion']) ?
                $_SESSION[EGRESADO][ACADEMICO]['idMotivoNotitulacion'] : "";

        
        $form->get('idFormaTitulacion')->options = $this->getOpciones(DAOFactory::getDAOFactory()->getEgreCatFormasTitulacionDAO(), 'idFormaTitulacion', 'formaTitulacion');
        $form->get('idFormaTitulacion')->type = 'select';
        $form->get('idFormaTitulacion')->label = 'Forma de Titulación';
        $form->get('idFormaTitulacion')->selected = isset($_SESSION[EGRESADO][ACADEMICO]['idFormaTitulacion']) ?
                $_SESSION[EGRESADO][ACADEMICO]['idFormaTitulacion'] : "";
          
        //TODO falta este catálogo
//       $form->get('iDUNIDADRESPONSABLE')->options = 
//               $this->getOpciones(DAOFactory::getEgreCatUnidadResponsable(), 
//                                    'iDUNIDADRESPONSABLE', 'uNIDADRESPONSABLE');
//        $escuelas = DAOFactory::getDAOFactory()->getEgreUrNombresDAO()->queryAll();
//        var_dump ($escuelas);
        $form->get('idUnidadResponsable')->options = $this->getOpciones(DAOFactory::getDAOFactory()->getEgreUrNombresDAO(), 'idUnidadResponsable', 'nombreLargo');
        $form->get('idUnidadResponsable')->type = 'select';
        $form->get('idUnidadResponsable')->label = 'Unidad Responsable';
        //$form->get('idUnidadResponsable')->options = array(1 => 'ESCOM', 2 => 'ESIME');
        $form->get('idUnidadResponsable')->selected = isset($_SESSION[EGRESADO][ACADEMICO]['idUnidadResponsable']) ?
                $_SESSION[EGRESADO][ACADEMICO]['idUnidadResponsable'] : "";
        
        $form->get('idCarrera')->options = $this->getOpciones(DAOFactory::getDAOFactory()->getEgreCatCarrerasDAO(), 'idCarrera', 'carrera');
        $form->get('idCarrera')->type = 'select';
        $form->get('idCarrera')->label = 'Carrera';
        $form->get('idCarrera')->selected = isset($_SESSION[EGRESADO][ACADEMICO]['idCarrera']) ?
                $_SESSION[EGRESADO][ACADEMICO]['idCarrera'] : "";

        $form->get('idEgresado')->visible = false;
        
        for ($i = date("Y"); $i >= 1936; $i--) {
            $anios [$i] = $i;
        }
        $form->get('anioIngreso')->options = $anios;
        $form->get('anioIngreso')->type = 'select';
        $form->get('anioIngreso')->label = 'Año de Ingreso';
        $form->get('anioIngreso')->selected = isset($_SESSION[EGRESADO][ACADEMICO]['anioIngreso']) ?
                $_SESSION[EGRESADO][ACADEMICO]['anioIngreso'] : "";

        
        $form->get('anioEgreso')->options = $anios;
        $form->get('anioEgreso')->type = 'select';
        $form->get('anioEgreso')->label = 'Año de Egreso';
        $form->get('anioEgreso')->selected = isset($_SESSION[EGRESADO][ACADEMICO]['anioEgreso']) ?
                $_SESSION[EGRESADO][ACADEMICO]['anioEgreso'] : "";

        
        $form->get('boleta')->label = 'Boleta';
        $form->get('boleta')->value = isset($_SESSION[EGRESADO][ACADEMICO]['boleta']) ?
                $_SESSION[EGRESADO][ACADEMICO]['boleta'] : "";

        
        $form->get('promedio')->label = 'Promedio';
        $form->get('promedio')->value = isset($_SESSION[EGRESADO][ACADEMICO]['promedio']) ?
                $_SESSION[EGRESADO][ACADEMICO]['promedio'] : "";

        $form->get('validadoEcu')->visible = false;

        $form->get('fechaRegistro')->visible = false;

        
        return $form->build();
    }

    

}
