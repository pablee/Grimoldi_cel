<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "database.php";

class Linea
{			
    public function listar()
	{
	$db=new database();
	$db->conectar();
	
	$consulta="SELECT L.id AS idLinea, 
                      L.numero AS numero, 
                      L.estado AS estado,
                      L.estadoFecha AS estadoFecha, 
                      L.idPlanDatos AS idPlanDatos,
                      P.id AS idPlan, 
                      P.nombre AS nombrePlan,
                      D.id AS idDatos,
                      D.gb AS gb, 
                      L.observaciones AS observaciones		
			   FROM Linea L
			   JOIN rel_plan_datos RPD ON L.idPlanDatos = RPD.id
			   JOIN Plan P  ON RPD.idPlan = P.id
			   JOIN Datos D ON RPD.idDatos = D.id;";
			   
	$resultado=mysqli_query($db->conexion, $consulta) 
	or die ("No se pueden mostrar las lineas.");	

	$lineas = array(array("idLinea", "numero", "estado", "estadoFecha", "idPlanDatos", "idPlan", "nombrePlan", "idDatos", "gb", "observaciones"));
	$i=0;
	while($linea = mysqli_fetch_assoc($resultado))
	{
		$lineas[$i]["id"]=$linea["idLinea"];
		$lineas[$i]["numero"]=$linea["numero"];
		$lineas[$i]["estado"]=$linea["estado"];
		$lineas[$i]["estadoFecha"]=$linea["estadoFecha"];
		$lineas[$i]["idPlanDatos"]=$linea["idPlanDatos"];
        $lineas[$i]["idPlan"]=$linea["idPlan"];
        $lineas[$i]["nombrePlan"]=$linea["nombrePlan"];
        $lineas[$i]["idDatos"]=$linea["idDatos"];
        $lineas[$i]["gb"]=$linea["gb"];
		$lineas[$i]["observaciones"]=$linea["observaciones"];
		$i++;
	}

	return $lineas;
	}


    public function guardar($linea)
    {
    $db=new database();
    $db->conectar();

    $estadoFecha=date("Y-m-d");

    $consulta='INSERT INTO Linea (numero, estado, estadoFecha, idPlanDatos, observaciones)
               VALUES ("'.$linea['numero'].'",
                       "1",
                       "'.$estadoFecha.'",
                       "'.$linea['idPlanDatos'].'",
                       "'.$linea['observaciones'].'");';

    $resultado=mysqli_query($db->conexion, $consulta)
    or die ("No se pudo guardar la linea.");
    }


    public function actualizar($lineas)
    {
    $db=new database();
    $db->conectar();

    foreach($lineas as $linea) 
        {
        $consulta ='UPDATE Linea
                    SET numero = "'.$linea['numero'].'",
                        estado = "'.$linea['estado'].'",
                        estadoFecha = "'.$linea['estadoFecha'].'",
                        idPlanDatos = "'.$linea['idPlanDatos'].'",
                        observaciones = "'.$linea['observaciones'].'"              
                    WHERE id = "'.$linea['id'].'";
                    ';

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pudo actualizar la linea.");
        }
    }
    
    
}		
?>