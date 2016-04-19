<div class="col-lg-12">

    <?php print $_SESSION[FORMULARIO];?>

</div>
<div class="row">
    <div class="col-md-5"></div>
    
<!--    <nav class="col-md-6">
        <ul class="pagination">
            <li class="disabled">                
                    <span aria-hidden="true">&laquo;</span>                
            </li>
            <li class="btn active"><a> Personales </a></li>
            <li><a class="btn" href="egresado/agregar/direccion">Dirección</a></li>
            <li><a class="btn" href="egresado/agregar/academico">Académicos</a></li>
            <li><a href="egresado/agregar/contacto">Medios de Contacto</a></li>            
            <li>
                <a href="egresado/agregar/direccion" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>-->
</div>

<script>
    var mostrando = false;
    function muestraError (flag){
        console.log ('entro a cambiar clase '+flag);
        if (flag){            
            document.getElementById ('email').style.backgroundColor ='lightpink' ;
            document.getElementById ('mensaje-error').innerText = 'El correo ya existe';
            document.getElementById ('btnEnviar').disabled = true;
            $(".btn").prop("disabled", true);
            if (mostrando == false){
                mostrando = true;
               $("#email").parent().append('<div id="msg" class="alert alert-danger"><strong>¡Error!</strong> El correo que tratas de registrar ya existe.</div>');
            }
        } else {
            document.getElementById ('email').style.backgroundColor ='white' ;
            document.getElementById ('mensaje-error').innerText = '';
            document.getElementById ('btnEnviar').disabled = false;
            $(".btn").prop("disabled", false);
            $("#msg").remove ();
            mostrando = false;
        }        
    }
    
    function loadDoc(url) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState == 4 && xhttp.status == 200) {                
                if (xhttp.responseText != 'null'){
                    muestraError (true);
                } else {
                    muestraError (false);
                }
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
    }
    $( "#email" ).focusout(function() {
        var _url = 'http://<?=SERVER_URL?>api/userExist/' +$('#email').val();
        console.log(_url);
        loadDoc (_url);
    });
    $( "#email" ).on('input', function() {
        muestraError (false);
    });
</script>
        