<div class="row">
<!--    <div class="col-lg-12">
        <h1 class="page-header">Bienvenid@ <span> <?php print $responsable->nombre; ?></span></h1>        
    </div>-->
    <!-- /.col-lg-12 -->
</div>

<h3 id="registros"> Registros <?php print $_SESSION[LISTADO] ?></h3>
<br>
<select onChange="window.location.replace(this.options[this.selectedIndex].value)"> 
    <option value="">Ver status...</option>
    <option value="unidad/validar/0"> No validados </option>
    <option value="unidad/validar/1"> Revisados </option>        
</select>

<table class="table table-striped table-responsive table-hover">
    <thead>
    <th>Fecha Registro</th><th>Boleta</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombres</th>    
</thead>    
<tbody>
    <?php
    $id = 0;
    foreach ($registros as $registro) {
        $id++;
        print '<tr id="fila_' . $id . '">';
        print '<td>';
        print $registro['FECHA_REGISTRO'];
        print '</td>';
        print '<td>';
        print '<a href="unidad/detalleEgresado/' . $registro['ID_EGRESADO'] . '">';
        print $registro['BOLETA'];
        print '</a>';
        print '</td>';
        print '<td>';
        print $registro['AP_PATERNO'];
        print '</td>';
        print '<td>';
        print $registro['AP_MATERNO'];
        print '</td>';
        print '<td>';
        print $registro['NOMBRE'];
        print '</td>';
        print '<td>';
        print '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" aria-label="Close" onclick="cambiaStatus(' . $registro['ID_DATO_ACAD_IPN'] . ',2,' . $id . ')">Validar</button>';
        print '</td>';
        if ( !strcmp($_SESSION[LISTADO], 'no validados')){
            print '<td>';
            print '<button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close" onclick="cambiaStatus(' . $registro['ID_DATO_ACAD_IPN'] . ',1, ' . $id . ')">Marcar</button>';
            print '</td>';
        }
        print '<td>';
        print '<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" onclick="cambiaStatus(' . $registro['ID_DATO_ACAD_IPN'] . ',3, ' . $id . ')">Eliminar</button>';
        print '</td>';
        print '</tr>';
    }
    ?>
</tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

<script>
    function cambiaStatus(id, status, fila) {       
        $.ajax({
            method: "POST",
            url: "unidad/cambiaStatus/",
            data: {id: id, status: status}
        })
                .done(function (msg) {
                    console.log(msg);
                    div = $('#fila_' + fila);
                    div.hide();
                });       
    }
    
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
//    jQuery(document).ready(function ($) {
//        $(".clickable-row").click(function () {
//            window.document.location = $(this).data("href");
//        });
//    });
</script>