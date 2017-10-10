<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "database.php";

class Linea
{			
public function listar() 
	{
	$db=new database();
	$db->conectar();
	
	$consulta="SELECT *				
			   FROM Linea;";
			   
	$resultado=mysqli_query($db->conexion, $consulta) 
	or die ("No se pueden mostrar las lineas.");	

	$lineas = array(array("id", "numero", "estado", "estadoFecha", "idPlan", "observaciones"));
	$i=0;
	while($linea = mysqli_fetch_assoc($resultado))
	{
		$lineas[$i]["id"]=$linea["id"];
		$lineas[$i]["numero"]=$linea["numero"];
		$lineas[$i]["estado"]=$linea["estado"];
		$lineas[$i]["estadoFecha"]=$linea["estadoFecha"];
		$lineas[$i]["idPlan"]=$linea["idPlan"];
		$lineas[$i]["observaciones"]=$linea["observaciones"];
		$i++;
	}
	
	return $lineas;
	}
	
}		
?>