<div class="row">
    <div class="col-md-12">
        <select id="select-reporte" class="form-control" onchange="cambiaReporte()">
            <option value="Femenino.xml"> Femenino</option>
            <option value="Masculino.xml">Masculino</option>            
        </select>
    </div>
</div>
<hr>
<a href="http://localhost/reportico-4.4/run.php?execute_mode=EXECUTE&project=SISAE&xmlin=Femenino.xml&target_format=PDF" target="_blank">pdf</a>

<div class="row">
    <iframe id="iframe-reporte" frameBorder="0" src="http://localhost/reportico-4.4/run.php?execute_mode=EXECUTE&project=SISAE&xmlin=Femenino.xml&target_format=HTML" width="100%" height="600px"></iframe>    
</div>

<script>
    $('#select-reporte').on('change', function () {
        $('#iframe-reporte').attr('src', 'http://localhost/reportico-4.4/run.php?execute_mode=EXECUTE&project=SISAE&xmlin='+this.value);
    });
</script>

 <?php
            set_include_path('http://localhost/reportico-4.4/');
            require_once('reportico.php'); 
            $a = new reportico();
            $a->embedded_report = true;
            $a->forward_url_get_parameters = "x1=y1&x2=y2"; 
            $a->execute();
          ?> 