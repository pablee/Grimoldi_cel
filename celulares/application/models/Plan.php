<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "database.php";

class Plan
{
    public function listar()
    {
        $db=new database();
        $db->conectar();

        $consulta="SELECT *		
			       FROM Plan;";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar los planes.");

        $planes = array(array("id", "nombre", "adicional", "minutos"));
        $i=0;
        while($plan = mysqli_fetch_assoc($resultado))
        {
            $planes[$i]["id"]=$plan["id"];
            $planes[$i]["nombre"]=$plan["nombre"];
            $planes[$i]["adicional"]=$plan["adicional"];
            $planes[$i]["minutos"]=$plan["minutos"];
            $i++;
        }

        return $planes;
    }


    public function guardar($plan)
    {
        $db=new database();
        $db->conectar();

        $consulta='INSERT INTO Plan (nombre, adicional, minutos)
                   VALUES ("'.$plan['nombre'].'",
                           "'.$plan['adicional'].'",
                           "'.$plan['nombre'].'");';

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pudo guardar el plan.");

        $plan['idPlan']=mysqli_insert_id($db->conexion);

        return $plan;
    }



    public function actualizar($planes)
    {
        $db=new database();
        $db->conectar();

        foreach($planes as $plan)
        {
            $consulta='UPDATE Plan 
                       SET  nombre="'.$plan['nombre'].'",
                            adicional="'.$plan['adicional'].'",
                            minutos="'.$plan['minutos'].'"
                       WHERE id="'.$plan['id'].'";';
            $resultado=mysqli_query($db->conexion, $consulta)
            or die ("No se pudo actualizar el plan.");

            $plan['idPlan']=mysqli_insert_id($db->conexion);
        }

        return $plan;
    }

}

?>