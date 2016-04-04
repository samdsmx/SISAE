<form action="egresado/updateDatosAcademicos" method="POST" enctype="multipart/form-data" class="form-horizontal" >
    <div class="form-group" >
        <label for="idMotivoInterrupcion" class="col-md-2" >Motivo Interrupción</label>
        <div class="col-md-10" >
            <select name="idMotivoInterrupcion" id="idMotivoInterrupcion" class="form-control" <?= $disabled ?>>
                <option value="1" <?= ($academico->idMotivoInterrupcion == 1) ? 'selected' : '' ?> >Familiares</option>
                <option value="2" <?= ($academico->idMotivoInterrupcion == 2) ? 'selected' : '' ?>>Económicos</option>
                <option value="3" <?= ($academico->idMotivoInterrupcion == 3) ? 'selected' : '' ?>>Salud</option>
                <option value="4" <?= ($academico->idMotivoInterrupcion == 4) ? 'selected' : '' ?>>Otros</option>
                <option value="5" <?= ($academico->idMotivoInterrupcion == 5) ? 'selected' : '' ?>>Ninguno</option>
            </select>
        </div>
    </div>
    <div class="form-group" >
        <label for="idEstatusEgre" class="col-md-2" >Status egresado</label>
        <div class="col-md-10" >
            <select name="idEstatusEgre" id="idEstatusEgre" class="form-control" <?= $disabled ?>>
                <option value="1" <?= ($academico->idEstatusEgre == 1) ? 'selected' : '' ?>>Titulado</option>
                <option value="2" <?= ($academico->idEstatusEgre == 2) ? 'selected' : '' ?>>Pasante</option>
                <option value="3" <?= ($academico->idEstatusEgre == 3) ? 'selected' : '' ?>>Egresado</option>
            </select>
        </div>
    </div>
    <div class="form-group" >
        <label for="idMotivoNotitulacion" class="col-md-2" >Motivo no titulación</label>
        <div class="col-md-10" >
            <select name="idMotivoNotitulacion" id="idMotivoNotitulacion" class="form-control" <?= $disabled ?> >
                <option value="1" <?= ($academico->idMotivoNotitulacion == 1) ? 'selected' : '' ?>>Familiares</option>
                <option value="2" <?= ($academico->idMotivoNotitulacion == 2) ? 'selected' : '' ?>>Económicos</option>
                <option value="3" <?= ($academico->idMotivoNotitulacion == 3) ? 'selected' : '' ?>>Salud</option>
                <option value="4" <?= ($academico->idMotivoNotitulacion == 4) ? 'selected' : '' ?>>Otros</option>
                <option value="5" <?= ($academico->idMotivoNotitulacion == 5) ? 'selected' : '' ?>>Ninguno</option>
            </select>
        </div>
    </div>
    <div class="form-group" >
        <label for="idFormaTitulacion" class="col-md-2" >Forma de Titulación</label>
        <div class="col-md-10" >
            <select name="idFormaTitulacion" id="idFormaTitulacion" class="form-control" <?= $disabled ?>>
                <option value="1" <?= ($academico->idFormaTitulacion == 1) ? 'selected' : '' ?>>Tesis</option>
                <option value="2" <?= ($academico->idFormaTitulacion == 2) ? 'selected' : '' ?>>Tesina</option>
                <option value="3" <?= ($academico->idFormaTitulacion == 3) ? 'selected' : '' ?>>Examen de conocimientos</option>
                <option value="4" <?= ($academico->idFormaTitulacion == 4) ? 'selected' : '' ?>>Examen profesional</option>
                <option value="5" <?= ($academico->idFormaTitulacion == 5) ? 'selected' : '' ?>>Trabajo Terminal</option>
                <option value="6" <?= ($academico->idFormaTitulacion == 6) ? 'selected' : '' ?>>Excelencia académica</option>
                <option value="7" <?= ($academico->idFormaTitulacion == 7) ? 'selected' : '' ?>>Créditos de posgrado</option>
            </select>
        </div>
    </div>
    <div class="form-group" >
        <label for="idUnidadResponsable" class="col-md-2" >Unidad Responsable</label>
        <div class="col-md-10" >
            <select name="idUnidadResponsable" id="idUnidadResponsable" class="form-control" <?= $disabled ?>>
                <?php
                foreach ($urs as $ur) {
                    $selected = ($academico->idUnidadResponsable == $ur->idUnidadResponsable) ? 'selected' : '';
                    print "<option value='$ur->idUnidadResponsable' $selected>$ur->nombreLargo</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group" >
        <label for="idCarrera" class="col-md-2" >Carrera</label>
        <div class="col-md-10" >
            <select name="idCarrera" id="idCarrera" class="form-control" <?= $disabled ?>>
                <?php
                foreach ($carreras as $carrera) {
                    $selected = ($academico->idCarrera == $carrera->idCarrera) ? 'selected' : '';
                    print "<option value='$carrera->idCarrera' $selected>$carrera->carrera</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group" >
        <label for="anioIngreso" class="col-md-2" >Año de Ingreso</label>
        <div class="col-md-10" >
            <select name="anioIngreso" id="anioIngreso" class="form-control" <?= $disabled ?>>
                <?php
                foreach ($anios as $anio) {
                    $selected = ($academico->anioIngreso == $anio) ? 'selected' : '';
                    print "<option value='$anio' $selected>$anio</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group" >
        <label for="anioEgreso" class="col-md-2" >Año de Egreso</label>
        <div class="col-md-10" >
            <select name="anioEgreso" id="anioEgreso" class="form-control" <?= $disabled ?> >
                <?php
                foreach ($anios as $anio) {
                    $selected = ($academico->anioEgreso == $anio) ? 'selected' : '';
                    print "<option value='$anio' $selected>$anio</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group" >
        <label for="boleta" class="col-md-2" >Boleta</label>
        <div class="col-md-10" >
            <input name="boleta" type="text" id="boleta" placeholder="Boleta" class="form-control" value="<?= $academico->boleta ?>"  <?= $disabled ?>/>
        </div>
    </div>
    <div class="form-group" >
        <label for="promedio" class="col-md-2" >Promedio</label>
        <div class="col-md-10" >
            <input name="promedio" type="text" id="promedio" placeholder="Promedio" class="form-control" value="<?= $academico->promedio ?>"  <?= $disabled ?>/>
        </div>
    </div>
    <input type="hidden" name="idEgresado" value="<?= $academico->idEgresado ?>">
    <input type="hidden" name="idDatoAcadIpn" value="<?= $academico->idDatoAcadIpn ?>">
    <input type="hidden" name="validadoEcu" value="<?= $academico->validadoEcu ?>">
    <input type="hidden" name="fechaRegistro" value="<?= $academico->fechaRegistro ?>">

    <div class="form-group" >
        <div class="col-sm-offset-2 col-sm-10" >
            <button type="submit" class="btn btn-primary btn-block" <?= $disabled ?>>Actualizar</button>
        </div>
    </div>

</form>

<script>
    $(document).ready(function () {
        $('#ml-2').addClass('active');
    });
</script>
