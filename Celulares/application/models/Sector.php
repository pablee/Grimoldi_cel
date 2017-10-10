<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "database.php";

class Sector
{			
public function listar() 
	{
	$db=new database();
	$db->conectar();
	
	$consulta="SELECT *				
			   FROM Sector";
			   
	$resultado=mysqli_query($db->conexion, $consulta) 
	or die ("No se pueden mostrar los sectores.");	
	
	$sectores = array(array("id", "nombre"));
	$i=0;
	while($sector = mysqli_fetch_assoc($resultado))
	{
		$sectores[$i]["id"]=$sector["id"];
		$sectores[$i]["nombre"]=$sector["nombre"];
		$i++;
	}
	
	return $sectores;
	}
	
}		
?>
