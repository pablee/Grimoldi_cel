
<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="panel panel-primary">
        <div class="panel-heading">Alta de usuario</div>
        <div class="panel-body">
            <form name="grilla" method="POST" action="guardarUsuario">
                <div class="form-group">
                    <label for="nombre"> Nombre </label>
                    <input type="text" class="form-control" id="nombre" name="usuario[nombre]"></input>
                </div>
                <div class="form-group">
                    <label for="apellido"> Apellido </label>
                    <input type="text"   class="form-control" id="apellido" name="usuario[apellido]"></input>
                </div>
                <div class="form-group">
                    <label for="sector"> Sector </label>
                    <select class="form-control" id="sector" name="usuario[idSector]">
                        <option value="999"> Sin asignar </option>

                        <?php
                        foreach ($sectores as $sector)
                        {
                            echo '<option value="'.$sector["id"].'">'.$sector["nombre"].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numero"> Numero </label>
                    <select class="form-control" id="numero" name="usuario[idLinea]">
                        <option value="999"> Sin asignar </option>

                        <?php
                        foreach ($lineas as $linea)
                        {
                            echo '<option value="'.$linea["id"].'">'.$linea["numero"].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="correoLaboral">Correo Laboral</label>
                    <input type="text" class="form-control" id="correoLaboral" name="usuario[correoLaboral]"></input>
                </div>
                <div class="form-group">
                    <label for="correoLaboral2">Correo Laboral 2</label>
                    <input type="text" class="form-control" id="correoLaboral2" name="usuario[correoLaboral2]"></input>
                </div>
                <div class="form-group">
                    <label for="claveCorreo2">Clave correo</label>
                    <input type="text" class="form-control" id="claveCorreo2" name="usuario[claveCorreo2]"></input>
                </div>

                <div class="text-right">
                    <br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>
        </div>
    </div>
    </div>

    <div class="col-md-2"></div>
</div>

