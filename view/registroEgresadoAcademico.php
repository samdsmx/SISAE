<div class="col-lg-12">

    <?php 
//    var $iDDATOACADIPN;
//
//		var $iDMOTIVOINTERRUPCION;
//
//		var $iDESTATUSEGRE;
//
//		var $iDMOTIVONOTITULACION;
//
//		var $iDFORMATITULACION;
//
//		var $iDCARRERA;
//
//		var $iDEGRESADO;
//
//		var $iDUNIDADRESPONSABLE;
//
//		var $aNIOINGRESO;
//
//		var $aNIOEGRESO;
//
//		var $bOLETA;
//
//		var $pROMEDIO;
//
//		var $vALIDADOECU;
//
//		var $fECHAREGISTRO;
       $form = new FormGenerator (new EgreDatosAcadsIpn (), '/sisae/egresado/guardar/academico');
       print $form->build();
    ?>

</div>
<div class="row">
    <div class="col-md-5"></div>
    <nav class="col-md-6">
        <ul class="pagination">
            <li class="disabled">                
                <a href="/sisae/egresado/add/personal" aria-label="Anterior">
                    <span aria-hidden="true">&laquo;</span>                
                    </a>
            </li>
            <li><a href="/sisae/egresado/add/personal">Personales</a></li>
            <li class="active"><a>Académicos</a></li>
            <li><a href="#">Medios de Contacto</a></li>            
            <li>
                <a href="#" aria-label="Siguiente">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>