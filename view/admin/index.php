<?php 
/*@var $responsable egreResponsablesUr*/
$responsable = unserialize($_SESSION[RESPONSABLE]);

?>

<!--Iconos https://fortawesome.github.io/Font-Awesome/icons/-->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user-plus fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">&nbsp;</div>
                        <div class="medium">Agregar Usuarios</div>
                    </div>
                </div>
            </div>
            <a href="admin/usuarios">
                <div class="panel-footer">
                    <span class="pull-left">Ingresar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">12</div>
                        <div>Administrar carreras</div>
                    </div>
                </div>
            </div>
            <a href="admin/carreras">
                <div class="panel-footer">
                    <span class="pull-left">Ingresar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
</div>