<div class="col-lg-12">

    <?php print $_SESSION[FORMULARIO];
    //TODO Cargar asentamiento de manera asíncrona dependiendo del código postal
    ?>

</div>

<div class="row">
    <div class="col-md-5"></div>
    <nav class="col-md-6">
        <ul class="pagination">
<!--            <li>                
                <a href="egresado/agregar/personal" aria-label="Anterior">
                    <span aria-hidden="true">&laquo;</span>                
                    </a>
            </li>-->
            <li><a href="egresado/agregar/personal">Personales</a></li>
            <li class="active"><a>Dirección</a></li>
            <li><a href="egresado/agregar/academico">Académicos</a></li>
<!--            <li><a href="egresado/agregar/contacto">Medios de Contacto</a></li>            -->
<!--            <li>
                <a href="egresado/agregar/academico" aria-label="Siguiente">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>-->
        </ul>
    </nav>
</div>