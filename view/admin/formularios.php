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

   
</script>