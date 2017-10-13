
<div class="row">

    <div class="col-md-2"></div>

    <div class="col-md-8">
        <div class="panel panel-primary">
        <div class="panel-heading">Nuevo plan</div>
        <div class="panel-body">
            <form name="grilla" method="POST" action="guardar">
                <div class="form-group">
                    <label for="nombre"> Nombre </label>
                    <input type="hidden" class="form-control" id="id" name="plan[idPlan]"></input>
                    <input type="text" class="form-control" id="nombre" name="plan[nombre]"></input>
                </div>

                <div class="form-group">
                    <label for="adicional"> Adicional </label>
                    <input type="text" class="form-control" id="adicional" name="plan[adicional]"></input>
                </div>

                <div class="form-group">
                    <label for="datos"> Datos </label>
                    <select class="form-control" id="datos" name="plan[idDatos]">
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
                    <textarea class="form-control" id="observaciones" name="plan[observaciones]">

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

