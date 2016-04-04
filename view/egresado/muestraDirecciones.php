
<?php if (!empty( $direccionesMexico)){ ?>
<table class="table table-responsive">
    <?php 
        foreach ($direccionesMexico as $direccion){
    ?>
    <tr>
        <td>
            <?=$direccion->idDomicilio?>
        </td>
    </tr>
    <?php
        }
    ?>
</table>
<?php }?>

<script>
    $(document).ready(function () {
        $('#ml-3').addClass('active');
    });
</script>