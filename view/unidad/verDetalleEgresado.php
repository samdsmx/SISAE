
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Bienvenid@ <span> <?php print $responsable->nombre;?></span></h1>        
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-md-6"> <h3>Datos Personales</h3>
    <table class="table table-striped table-responsive table-hover" data-bind="with: egresado">
        <tr>
            <td><span> Nombre: </span></td> 
            <td data-bind="text: apPaterno + ' ' +apMaterno +' '+nombre"> </td>
        </tr>
        <tr>
            <td><span>Curp: </span></td>
            <td data-bind="text: curp"></td>
        </tr>
        <tr>
            <td><span>Genero: </span></td>
            <!-- ko if: idGenero == 1 -->
            <td> Femenino </td>
            <!-- /ko -->
            <!-- ko if: idGenero == 2 -->
            <td> Masculino </td>
            <!-- /ko -->
        </tr>        
    </table>
</div>
    <div class="col-md-6"> <h3>Datos Académicos</h3>
    <table class="table table-striped table-responsive table-hover" data-bind="with: datosAcad">
        <tr>
            <td><span> Boleta: </span></td> 
            <td data-bind="text: boleta"> </td>
        </tr>
        <tr>
            <td><span>Año Ingreso: </span></td>
            <td data-bind="text: anioIngreso"></td>
        </tr>
        <tr>
            <td><span>Año Egreso: </span></td>
            <td data-bind="text: anioEgreso"></td>            
        </tr>        
        <tr>
            <td><span>Promedio: </span></td>
            <td data-bind="text: promedio"></td>            
        </tr>        
    </table>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>

<script>    
    
var ViewModel = function() {
    var data = <?php echo json_encode($egresado) ?>;
    this.egresado = ko.observable(data);    
    
    var dataAcad = <?php echo json_encode($datoEscuela) ?>;
    this.datosAcad = ko.observable(dataAcad);
};
 
ko.applyBindings(new ViewModel());

</script>
    