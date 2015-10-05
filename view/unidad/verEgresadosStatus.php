<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Bienvenid@ <span> <?php print $responsable->nombre;?></span></h1>        
    </div>
    <!-- /.col-lg-12 -->
</div>

<h3> Registros por validar: </h3>

<table class="table table-striped table-responsive table-hover">
    <thead>
    <th>Fecha Registro</th><th>Boleta</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombres</th>    
    </thead>    
    <tbody>
        <?php 
        $id = 0;
        foreach ($registros as $registro){
            $id++;        
            print '<tr id="fila_'.$id.'">';
            print '<td>';
            print $registro['FECHA_REGISTRO'];
            print '</td>';
            print '<td>';
            print $registro['BOLETA'];
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
            print '<button type="button" class="btn btn-success" onclick="cambiaStatus('.$registro['ID_DATO_ACAD_IPN'].',4,'.$id.')">Validar</button>';  
            print '</td>';
            print '<td>';
            print '<button type="button" class="btn btn-danger" onclick="cambiaStatus('.$registro['ID_DATO_ACAD_IPN'].',3, '.$id.')">Eliminar</button>';            
            print '</td>';
            print '</tr>';
        }
        ?>
    </tbody>
</table>

<script>
    function cambiaStatus (id, status, fila){
        $.ajax({
            method: "POST",
            url: "unidad/cambiaStatus/",
           data: { id: id, status: status}
        })
        .done(function( msg ) {            
            console.log(msg);
            div = $('#fila_'+fila);
            div.hide();            
        });
    }
</script>