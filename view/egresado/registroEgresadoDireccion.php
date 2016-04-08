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
<script>
    $( document ).ready(function() {
        var id = $("#codigoPostal").val();
        cambiaValores (id);
        //window.alert(id);
    });
    $("#codigoPostal").focusout(function() {
        var id = $(this).val ();
        cambiaValores (id); 
        //window.alert(id);
    });
    
    function cambiaValores (id){
        $.ajax({
            url: "api/getAsentamientos/"+id,            
        }).done(function(data) {
            if (console && console.log) {
//                console.log("Sample of data:", data.slice(0, 100));
            }
            var $el = $("#idAsentamiento");            
            $el.empty(); // remove old options
            var jsonData = JSON.parse(data);
            
            $.each(jsonData, function(i, obj) {
                $el.append($("<option></option>")
                   .attr("value", obj.idAsentamiento).text(obj.asentamiento));            
                   console.log (obj);
            });            
        });
    }
</script>