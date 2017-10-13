<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "database.php";

class Rel_plan_datos
{
    public function listar()
    {
        $db=new database();
        $db->conectar();

        $consulta="SELECT *
                   FROM rel_plan_datos;";

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar las relaciones plan-datos.");

        $rel_plan_datos = array(array("id", "idPlan", "idDatos"));
        $i=0;
        while($dato = mysqli_fetch_assoc($resultado))
        {
            $rel_plan_datos[$i]["id"]=$dato["id"];
            $rel_plan_datos[$i]["idPlan"]=$dato["idPlan"];
            $rel_plan_datos[$i]["idDatos"]=$dato["idDatos"];
            $i++;
        }

        return $rel_plan_datos;
    }


    public function guardar($linea)
    {
        $db=new database();
        $db->conectar();

        $consulta='SELECT * 
                   FROM rel_plan_datos
                   WHERE idPlan = "'.$linea['idPlan'].'"
                   AND idDatos = "'.$linea['idDatos'].'";';
        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pudo consultar la relacion.");

        if(mysqli_num_rows($resultado)==0)
        {
            $consulta='INSERT INTO rel_plan_datos (idPlan, idDatos)
                       VALUES ("'.$linea['idPlan'].'",
                               "'.$linea['idDatos'].'");';
            $resultado=mysqli_query($db->conexion, $consulta)
            or die ("No se pudo guardar la relacion.");

            $consulta='SELECT * 
                       FROM rel_plan_datos
                       WHERE idPlan = "'.$linea['idPlan'].'"
                       AND idDatos = "'.$linea['idDatos'].'";';
            $resultado=mysqli_query($db->conexion, $consulta)
            or die ("No se pudo consultar la relacion.");

            while($rel = mysqli_fetch_assoc($resultado))
            {
                $linea["idPlanDatos"]=$rel["id"];
            }
        }
        else{
            while($rel = mysqli_fetch_assoc($resultado))
                {
                    $linea["idPlanDatos"]=$rel["id"];
                }
            }

    return $linea;
    }


    public function actualizar($lineas)
    {
        $db=new database();
        $db->conectar();

        $i=0;
        foreach($lineas as $linea)
        {
            $consulta='SELECT * 
                       FROM rel_plan_datos
                       WHERE idPlan = "'.$linea['idPlan'].'"
                       AND idDatos = "'.$linea['idDatos'].'";';
            $resultado=mysqli_query($db->conexion, $consulta)
            or die ("No se pudo consultar la relacion.");

            if(mysqli_num_rows($resultado)==1)
            {
                $rel = mysqli_fetch_assoc($resultado);
                $linea["idPlanDatos"]=$rel["id"];
            }
            else{
                $consulta='INSERT INTO rel_plan_datos (idPlan, idDatos)
                           VALUES ("'.$linea['idPlan'].'",
                                   "'.$linea['idDatos'].'");';
                $resultado=mysqli_query($db->conexion, $consulta)
                or die ("No se pudo guardar la relacion.");

                $linea["idPlanDatos"]=mysqli_insert_id($db->conexion);
                }

            $lineas_actualizadas[$i]=$linea;
            $i++;
        }

        $lineas=$lineas_actualizadas;
        return $lineas;
    }
/*ANDA
    public function actualizar($lineas)
    {
        $db=new database();
        $db->conectar();

        foreach($lineas as $linea)
        {
            $consulta ='UPDATE rel_plan_datos
                        SET idPlan = "'.$linea['idPlan'].'",
                            idDatos = "'.$linea['idDatos'].'"             
                        WHERE id = "'.$linea['idPlanDatos'].'";
                        ';

            $resultado=mysqli_query($db->conexion, $consulta)
            or die ("No se pudo actualizar la relacion.");
        }
        return $lineas;
    }
*/
//Cierre de clase
}