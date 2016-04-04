<div class="row">
    <div  class="col-md-2"></div>
    <div  class="col-md-6">
        <form action="egresado/updateDatos" role="form"  method="POST" autocomplete="off">
            <div class="form-group">
                <label for="apPaterno"  >Apellido Paterno</label>

                <input name="apPaterno" type="text" id="apPaterno" placeholder="Apellido Paterno" class="form-control" value="<?= $egresado->apPaterno ?>" required autocomplete="off" />

            </div>
            <div class="form-group">
                <label for="apMaterno" >Apellido Materno</label>

                <input name="apMaterno" type="text" id="apMaterno" placeholder="Apellido Materno" class="form-control" value="<?= $egresado->apMaterno ?>" required autocomplete="off" />

            </div>
            <div class="form-group">
                <label for="nombre" >Nombres</label>

                <input name="nombre" type="text" id="nombre" placeholder="Nombres" class="form-control" value="<?= $egresado->nombre ?>" required autocomplete="off" />

            </div>
            <div class="form-group">
                <label for="curp" >Curp</label>

                <input name="curp" type="text" id="curp" placeholder="Curp" class="form-control" value="<?= $egresado->curp ?>" autocomplete="off" />

            </div>
            <div class="form-group">
                <label for="idGenero" >Genero</label>

                <select name="idGenero" id="idGenero" class="form-control" autocomplete="off">
                    
                    <option value="1" <?php print ($egresado->idGenero == 1)? 'selected':'' ?>>Femenino</option>
                    <option value="2" <?php print ($egresado->idGenero == 2)? 'selected':'' ?>>Masculino</option>
                </select>

            </div>
            <div class="form-group">
                <label for="idEstadoCivil" >Estado Civil</label>

                <select name="idEstadoCivil" id="idEstadoCivil" class="form-control" autocomplete="off">
                    <option value="1" <?= ($egresado->idEstadoCivil == 1)? 'selected':'' ?> >Casada/O</option>
                    <option value="2" <?= ($egresado->idEstadoCivil == 2)? 'selected':'' ?> >Divorciada/O</option>
                    <option value="3" <?= ($egresado->idEstadoCivil == 3)? 'selected':'' ?> >Pareja De Hecho</option>
                    <option value="4" <?= ($egresado->idEstadoCivil == 4)? 'selected':'' ?> >Soltera/O</option>
                    <option value="5" <?= ($egresado->idEstadoCivil == 5)? 'selected':'' ?> >Union Libre</option>
                    <option value="6" <?= ($egresado->idEstadoCivil == 6)? 'selected':'' ?> >Viuda/O</option>
                </select>

            </div>
            <div class="form-group">
                <label for="idGentilicio" >Nacionalidad</label>

                <select name="idGentilicio" id="idGentilicio" class="form-control" autocomplete="off">
                    <option value="1" <?= ($egresado->idGentilicio == 1)? 'selected':'' ?>>Mexicano</option>
                    <option value="2" <?= ($egresado->idGentilicio == 2)? 'selected':'' ?>>Extranjero</option>
                </select>

            </div>
            <div class="form-group">
                <label for="resideMexico" >Reside en México</label>

                <select name="resideMexico" id="resideMexico" class="form-control" autocomplete="off">
                    <option value="1" <?= ($egresado->resideMexico == 1)? 'selected':'' ?>>Si</option>
                    <option value="0" <?= ($egresado->resideMexico == 0)? 'selected':'' ?>>No</option>
                </select>

            </div>
            <div class="form-group">
                <label for="idEstadoNac" >Estado de Nacimiento</label>

                <select name="idEstadoNac" id="idEstadoNac" class="form-control" autocomplete="off">
                    <option value="1" <?= ($egresado->idEstadoNac == 1)? 'selected':'' ?>>Aguascalientes</option>
                    <option value="2" <?= ($egresado->idEstadoNac == 2)? 'selected':'' ?>>Baja California Norte</option>
                    <option value="3" <?= ($egresado->idEstadoNac == 3)? 'selected':'' ?>>Baja California Sur</option>
                    <option value="4" <?= ($egresado->idEstadoNac == 4)? 'selected':'' ?>>Campeche</option>
                    <option value="5" <?= ($egresado->idEstadoNac == 5)? 'selected':'' ?>>Chiapas</option>
                    <option value="6" <?= ($egresado->idEstadoNac == 6)? 'selected':'' ?>>Chihuahua</option>
                    <option value="33" <?= ($egresado->idEstadoNac == 33)? 'selected':'' ?>>Ciudad de México</option>
                    <option value="7" <?= ($egresado->idEstadoNac == 7)? 'selected':'' ?>>Coahuila De Zaragoza</option>
                    <option value="8" <?= ($egresado->idEstadoNac == 8)? 'selected':'' ?>>Colima</option>
                    <option value="10" <?= ($egresado->idEstadoNac == 10)? 'selected':'' ?>>Durango</option>
                    <option value="11" <?= ($egresado->idEstadoNac == 11)? 'selected':'' ?>>Guanajuato</option>
                    <option value="12" <?= ($egresado->idEstadoNac == 12)? 'selected':'' ?>>Guerrero</option>
                    <option value="13" <?= ($egresado->idEstadoNac == 13)? 'selected':'' ?>>Hidalgo</option>
                    <option value="14" <?= ($egresado->idEstadoNac == 14)? 'selected':'' ?>>Jalisco</option>
                    <option value="16" <?= ($egresado->idEstadoNac == 16)? 'selected':'' ?>>Michoacán De Ocampo</option>
                    <option value="17" <?= ($egresado->idEstadoNac == 17)? 'selected':'' ?>>Morelos</option>
                    <option value="15" <?= ($egresado->idEstadoNac == 15)? 'selected':'' ?>>México</option>
                    <option value="18" <?= ($egresado->idEstadoNac == 18)? 'selected':'' ?>>Nayarit</option>
                    <option value="19" <?= ($egresado->idEstadoNac == 19)? 'selected':'' ?>>Nuevo León</option>
                    <option value="20" <?= ($egresado->idEstadoNac == 20)? 'selected':'' ?>>Oaxaca</option>
                    <option value="21" <?= ($egresado->idEstadoNac == 21)? 'selected':'' ?>>Puebla</option>
                    <option value="22" <?= ($egresado->idEstadoNac == 22)? 'selected':'' ?>>Querétaro</option>
                    <option value="23" <?= ($egresado->idEstadoNac == 23)? 'selected':'' ?>>Quintana Roo</option>
                    <option value="24" <?= ($egresado->idEstadoNac == 24)? 'selected':'' ?>>San Luis Potosí</option>
                    <option value="25" <?= ($egresado->idEstadoNac == 25)? 'selected':'' ?>>Sinaloa</option>
                    <option value="26" <?= ($egresado->idEstadoNac == 26)? 'selected':'' ?>>Sonora</option>
                    <option value="27" <?= ($egresado->idEstadoNac == 27)? 'selected':'' ?>>Tabasco</option>
                    <option value="28" <?= ($egresado->idEstadoNac == 28)? 'selected':'' ?>>Tamaulipas</option>
                    <option value="29" <?= ($egresado->idEstadoNac == 29)? 'selected':'' ?>>Tlaxcala</option>
                    <option value="30" <?= ($egresado->idEstadoNac == 30)? 'selected':'' ?>>Veracruz De Ignacio De La Llave</option>
                    <option value="31" <?= ($egresado->idEstadoNac == 31)? 'selected':'' ?>>Yucatán</option>
                    <option value="32" <?= ($egresado->idEstadoNac == 32)? 'selected':'' ?>>Zacatecas</option>
                </select>

            </div>
            <input type="hidden" name="idUsuario" value="<?=$egresado->idUsuario?>">
            <input type="hidden" name="idEgresado" value="<?=$egresado->idEgresado?>">
            <input type="hidden" name="fechaRegistro" value="<?=$egresado->fechaRegistro?>">
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" > Actualizar </button>
            </div>
        </form>

    </div>
</div>
<script>
    $(document).ready(function () {
        $('#ml-1').addClass('active');
    });
</script>