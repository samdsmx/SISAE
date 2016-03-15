<?php

class AdminController extends _BaseController {
    
    public static $guardaUsuario = 'admin/guardaUsuario';
    public static $index = 'admin';
    public static $usuarios = 'admin/usuarios';
    public static $carreras = 'admin/carreras';
    public static $guardaCarrera = 'admin/guardaCarrera';
    public static $guardaAsociacionCarreraUr = 'admin/guardaAsoCarreraUr';
    
    public function defaultAction() {
        
        $_SESSION[NOMBRE_VISTA] = 'Administración SISAE';
        $_SESSION[VISTA] = 'view/admin/index.php';
        include 'templates/admin.php';
    }
    
    public function asociaCarrera (){
        $form = new FormGenerator(new FormularioAsociacion(), self::$guardaAsociacionCarreraUr, 'Guardar');
        $form->get ('carrera')->type = 'select';
        $form->get ('carrera')->options = 
            parent::getOpciones(DAOFactory::getDAOFactory()->getEgreCatCarrerasDAO(), 'idCarrera', 'carrera');;
            
        $form->get ('unidadResponsable')->type = 'select';
        $form->get ('unidadResponsable')->options = 
            parent::getOpciones(DAOFactory::getDAOFactory()->getCipnCatUnidadesResponsablesDAO(), 'iDUNIDADRESPONSABLE', 'uNIDADRESPONSABLE');
        
        $_SESSION[NOMBRE_VISTA] = 'Asocia Carrera a UR';
        $_SESSION[FORMULARIO] = $form->build();
        $_SESSION[VISTA] = 'view/admin/formularios.php';
        include 'templates/admin.php';
    }
    
    public function guardaAsoCarreraUr (){
        $aso = new EgreAsoCarrerasUr ();
        $aso->idCarrera = $_POST['carrera'];
        $aso->idUnidadResponsable = $_POST['unidadResponsable'];        
        DAOFactory::getDAOFactory()->getEgreAsoCarrerasUrDAO()->insert($aso);
        $_SESSION[MENSAJE] = 'Asociación guardada';
        parent::redirect(self::$index);  
    }
    
    public function carreras (){                        
        $form = new FormGenerator(new EgreCatCarrera(), self::$guardaCarrera, 'Guardar');
        $form->get ('idCarrera')->visible = false;
        $form->get ('idOfertaEducativa')->type = 'select';
        $form->get ('idOfertaEducativa')->options = array (1=>'Técnico', 2=>'Licenciatura o Ingeniería', 3=>'Especialidad', 4=>'Maestría', 5=>'Doctorado');
        
        $form->get ('idNivelEducativo')->type = 'select';
        $form->get ('idNivelEducativo')->options = array(1=>'Media Superior', 2=>'Superior', 3=>'Posgrado');
        $_SESSION[NOMBRE_VISTA] = 'Nueva carrera';
        $_SESSION[FORMULARIO] = $form->build();
        $_SESSION[VISTA] = 'view/admin/formularios.php';
        include 'templates/admin.php';
    }
    
    public function guardaCarrera (){
        $carrera = new EgreCatCarrera();
        ObjectMap::map($_POST, $carrera);
        
        DAOFactory::getDAOFactory()->getEgreCatCarrerasDAO()->insert($carrera);
        $_SESSION[MENSAJE] = 'Carrera guardada';
        parent::redirect(self::$index);        
    }
    
    public function usuarios (){
        $form = new FormGenerator(new EgreResponsablesUr (), self::$guardaUsuario, 'Guardar');
        $form->get('idResponsableUr')->visible = false;
        $form->get('idUsuario')->visible = false;
        
        $form->get('nombre')->isRequired = true;
        
        $form->get('correo')->isRequired = true; 
        $form->get('correo')->type = 'email';
        
        $form->get('extension')->isRequired = true;
        
//        $nombre = new FormElement('nombre');
//        $nombre->isRequired = true;
//        $form->addInnerElement($nombre, 3);
        
        
        $form->get('idUnidadResponsable')->type = 'select';
        $escuelas = DAOFactory::getDAOFactory()->getEgreUrNombresDAO();
        $form->get('idUnidadResponsable')->options = $this->getOpcionesOrder($escuelas, 'idUnidadResponsable', 'nombreLargo', 'nombre_largo');
//      $form->get('idUnidadResponsable')->options =   
//                parent::getOpciones(DAOFactory::getDAOFactory()->getCipnCatUnidadesResponsablesDAO(), 'iDUNIDADRESPONSABLE', 'uNIDADRESPONSABLE');
       
        
        $rol = new FormElement('idRol');
        $rol->label = 'Rol';
        $rol->type = 'select';
        $rol->options = array(2=>'Escuela', 4=>'Area Central');
        $form->addInnerElement($rol, 5);
        
        $usuario = new FormElement ('usuario');
        $usuario->label = 'Usuario';
        $usuario->isRequired = true;
        $form->addInnerElement($usuario, 6);
        
        
        $usuario = new FormElement ('contrasenia');
        $usuario->type = 'password';
        $usuario->label = 'Contraseña';
        $usuario->isRequired = true;
        $form->addInnerElement($usuario, 7);
        
        $_SESSION[FORMULARIO] = $form->build();
        $_SESSION[NOMBRE_VISTA] = 'Alta usuarios';        
        $_SESSION[VISTA] = 'view/admin/formularios.php';
        include 'templates/admin.php';
    }
    
    public function guardaUsuario (){
        
        $usuario = new EgreUsuario ();
        $responsable = new EgreResponsablesUr ();
        ObjectMap::map($_POST, $usuario);
        ObjectMap::map($_POST, $responsable);
        $usuario->contrasenia = md5($usuario->contrasenia);
        DAOFactory::getDAOFactory()->getEgreUsuariosDAO()->insert($usuario);
        $responsable->idUsuario = $usuario->idUsuario;
        DAOFactory::getDAOFactory()->getEgreResponsablesUrDAO()->insert($responsable);        
        $_SESSION[MENSAJE] = 'Usuario guardado';
        parent::redirect(self::$index);        
    }
}

class FormularioAsociacion {var $carrera; var $unidadResponsable;}