<div class="col-lg-12">

    <?php 
        
        $form = new FormGenerator(new EgreEgresado(), '/sisae/egresado/guardar/personal');
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
        print $form->build();
    ?>

</div>
<div class="row">
    <div class="col-md-5"></div>
    <nav class="col-md-6">
        <ul class="pagination">
            <li class="disabled">                
                    <span aria-hidden="true">&laquo;</span>                
            </li>
            <li class="active"><a> Personales </a></li>
            <li><a href="/sisae/egresado/add/academico">Académicos</a></li>
            <li><a href="#">Medios de Contacto</a></li>            
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>