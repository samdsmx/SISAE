<div class="col-md-8">
    <?=$_SESSION[FORMULARIO]?>
</div>

<script>
    $("#idRol").change(function() {
        var id = $(this).val ();
        activaCombo (id); 
    });
    
    function activaCombo (id){
        if (id == 4){
            $("#idUnidadResponsable").prop('disabled', 'disabled');
            $("#idUnidadResponsable").append('<option value="0" selected></option>');
        }
        else{
            $("#idUnidadResponsable").removeAttr("disabled");
            $("#idUnidadResponsable option[value='0']").remove();
        }
    }

    $( "#usuario" ).focusout(function() {
        var _url = 'http://<?=SERVER_URL?>api/userExist/' +$('#usuario').val();
        console.log(_url);
        loadDoc (_url);
    });
    $( "#usuario" ).on('input', function() {
        muestraError (false);
    });
</script>