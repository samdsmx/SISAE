<?php

class AdminController extends _BaseController {
    
    public static $guardaUsuario = 'admin/guardaUsuario';
    
    public function defaultAction() {
        
        $_SESSION[NOMBRE_VISTA] = 'Administración SISAE';
        $_SESSION[VISTA] = 'view/admin/index.php';
        include 'templates/admin.php';
    }
    
    public function usuarios (){
        $form = new FormGenerator(new EgreResponsablesUr (), self::$guardaUsuario, 'Guardar');
        $form->get('idResponsableUr')->visible = false;
        $form->get('idUsuario')->visible = false;
        
        $form->get('idUnidadResponsable')->type = 'select';
        $form->get('idUnidadResponsable')->options = 
                parent::getOpciones(DAOFactory::getCipnCatUnidadesResponsablesDAO(), 'iDUNIDADRESPONSABLE', 'uNIDADRESPONSABLE');
        
        $rol = new FormElement('idRol');
        $rol->label = 'Rol';
        $rol->type = 'select';
        $rol->options = array(2=>'Escuela', 4=>'Red virtual');
        $form->addInnerElement($rol, 5);
        
        $usuario = new FormElement ('usuario');
        $usuario->label = 'Usuario';
        $form->addInnerElement($usuario, 6);
        
        
        $usuario = new FormElement ('password');
        $usuario->type = 'password';
        $usuario->label = 'Contraseña';
        $form->addInnerElement($usuario, 7);
        
        $_SESSION[FORMULARIO] = $form->build();
        $_SESSION[NOMBRE_VISTA] = 'Alta usuarios';        
        $_SESSION[VISTA] = 'view/admin/formularios.php';
        include 'templates/admin.php';
    }
}