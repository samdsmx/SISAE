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
                        <i class="fa fa-envelope fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">&nbsp;</div>
                        <div class="medium">Envío de correos</div>
                    </div>
                </div>
            </div>
            <a href="email/compose">
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
                        <i class="fa fa-check-circle fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">12</div>
                        <div>Validar Egresados</div>
                    </div>
                </div>
            </div>
            <a href="unidad/validar">
                <div class="panel-footer">
                    <span class="pull-left">Ingresar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-search fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">&nbsp;</div>
                        <div>Encontrar egresados</div>
                    </div>
                </div>
            </div>
            <a href="unidad/busca">
                <div class="panel-footer">
                    <span class="pull-left">Ingresar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bar-chart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">&nbsp;</div>
                        <div>Mostrar Reportes</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Ingresar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-purple">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">&nbsp;</div>
                        <div>Polired</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">Ingresar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>