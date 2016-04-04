<form action="egresado/guardar/direccion" method="POST" enctype="multipart/form-data" class="form-horizontal" >
    <div class="form-group" >
        <label for="codigoPostal" class="col-md-2" >Codigo Postal</label>
        <select name="codigoPostal" id="codigoPostal" class="form-control" >

        </select>

    </div>
    <div class="form-group" >
        <label for="idAsentamiento" class="col-md-2" >Asentamiento / Colonia</label>
        
            <select name="idAsentamiento" id="idAsentamiento" class="form-control" >
            </select>
        
    </div>
    <div class="form-group" >
        <label for="calle" class="col-md-2" >Calle</label>
        
            <input name="calle" type="text" id="calle" placeholder="Calle" class="form-control" value=""  />
        
    </div>
    <div class="form-group" >
        <label for="numExt" class="col-md-2" >Num Ext</label>
        
            <input name="numExt" type="text" id="numExt" placeholder="Num Ext" class="form-control" value=""  />
        
    </div>
    <div class="form-group" >
        <label for="numInt" class="col-md-2" >Num Int</label>
        
            <input name="numInt" type="text" id="numInt" placeholder="Num Int" class="form-control" value=""  />
        
    </div>
    <div class="col-sm-offset-2 col-sm-10" >
        <button type="submit" class="btn btn-primary btn-block" >Continuar</button>
    </div>
</form>