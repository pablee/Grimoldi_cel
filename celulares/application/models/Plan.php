<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "database.php";

class Plan
{
    public function listar()
    {
        $db=new database();
        $db->conectar();
/*
        $consulta="SELECT RPD.id AS idPlanDatos,
                          P.id AS idPlan, 
                          P.nombre AS nombre, 
                          P.adicional AS adicional,
                          P.minutos AS minutos, 
                          D.id AS idDatos, 
                          D.gb AS gb				
			       FROM Plan P
			       JOIN rel_plan_datos RPD ON P.id = RPD.idPlan
			       JOIN Datos D ON RPD.idDatos = D.id;";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar los planes.");

        $planes = array(array("id", "nombre", "adicional", "minutos", "idDatos", "gb", "idPlanDatos"));
        $i=0;
        while($plan = mysqli_fetch_assoc($resultado))
        {
            $planes[$i]["id"]=$plan["idPlan"];
            $planes[$i]["nombre"]=$plan["nombre"];
            $planes[$i]["adicional"]=$plan["adicional"];
            $planes[$i]["minutos"]=$plan["minutos"];
            $planes[$i]["idDatos"]=$plan["idDatos"];
            $planes[$i]["gb"]=$plan["gb"];
            $planes[$i]["idPlanDatos"]=$plan["idPlanDatos"];
            $i++;
        }
*/
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