
<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="panel panel-primary">
        <div class="panel-heading">Alta de linea</div>
        <div class="panel-body">
            <form name="grilla" method="POST" action="guardar">
                <div class="form-group">
                    <label for="numero"> Numero </label>
                    <input type="text" class="form-control" id="numero" name="linea[numero]"></input>
                </div>

                <div class="form-group">
                    <label for="plan"> Plan </label>
                    <select class="form-control" id="plan" name="linea[idPlan]">
                        <option value=""> </option>
                        <?php
                        foreach ($planes as $plan)
                        {
                        echo '<option value="'.$plan["id"].'"> '.$plan["nombre"].' </option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="datos"> Datos </label>
                    <select class="form-control" id="datos" name="linea[idDatos]">
                        <option value=""> </option>
                        <?php
                        foreach ($datos as $dato)
                        {
                            echo '<option value="'.$dato["id"].'"> '.$dato["gb"].' GB</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="observaciones"> Observaciones </label>
                    <textarea class="form-control" id="observaciones" name="linea[observaciones]">

                    </textarea>
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

