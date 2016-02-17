<div class="col-lg-12">

    <?php print $_SESSION[FORMULARIO]; ?>

</div>
<div class="row">
    <div class="col-md-5"></div>
    <nav class="col-md-6">
        <ul class="pagination">
            <!--                    <li>                
                                    <a href="egresado/agregar/direccion" aria-label="Anterior">
                                        <span aria-hidden="true">&laquo;</span>                
                                        </a>
                                </li>-->

            <li><a href="egresado/agregar/personal">Personales</a></li>
            <li><a href="egresado/agregar/direccion">Dirección</a></li>
            <li class="active"><a>Académicos</a></li>                    
            <!--                    <li>
                                    <a href="egresado/agregar/contacto" aria-label="Siguiente">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>-->
        </ul>
    </nav>
</div>
<script>
    $( document ).ready(function() {
        var id = $("#idUnidadResponsable").val();
        cambiaValores (id);
    });
    $("#idUnidadResponsable").change(function() {
        var id = $(this).val ();
        cambiaValores (id);        
    });
    function cambiaValores (id){
        $.ajax({
            url: "api/getCarreras/"+id,            
        }).done(function(data) {
            if (console && console.log) {
//                console.log("Sample of data:", data.slice(0, 100));
            }
            var $el = $("#idCarrera");            
            $el.empty(); // remove old options
            var jsonData = JSON.parse(data);
            
            $.each(jsonData, function(i, obj) {
                $el.append($("<option></option>")
                   .attr("value", obj.idCarrera).text(obj.carrera));            
                   console.log (obj);
            });            
        });
    }
</script>