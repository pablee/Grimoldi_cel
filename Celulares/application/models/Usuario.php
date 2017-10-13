<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "database.php";

class Usuario
{			
    public function listar() 
	{
	$db=new database();
	$db->conectar();
	
	$consulta="SELECT 
				USU.id AS idUsuario,
				USU.nombre AS nombre, 
				USU.apellido AS apellido, 
				SEC.id AS idSector,
				SEC.nombre AS sector,
				CEL.id AS idLinea,
				CEL.numero AS numero, 
				USU.correoLaboral AS correoLaboral,
				USU.correoLaboral2 AS correoLaboral2,
				USU.claveCorreo2 AS claveCorreo2,
				USU.estado AS estado
			   FROM Usuario USU 
			   JOIN Sector SEC ON USU.idSector=SEC.id
			   JOIN Linea CEL ON USU.idLinea=CEL.id";
			   
	$resultado=mysqli_query($db->conexion, $consulta) 
	or die ("No se pueden mostrar los usuarios.");	
	
	$usuarios = array(array("idUsuario", 
							"nombre",
							"apellido", 
							"idSector", 
							"sector", 
							"idLinea", 
							"numero", 
							"correoLaboral",
							"correoLaboral2",
							"claveCorreo2",
                            "estado"));
	$i=0;	
	while($datos = mysqli_fetch_assoc($resultado))
	{
		$usuarios[$i]["idUsuario"]=$datos["idUsuario"];	
		$usuarios[$i]["nombre"]=$datos["nombre"];
		$usuarios[$i]["apellido"]=$datos["apellido"];
		$usuarios[$i]["idSector"]=$datos["idSector"];
		$usuarios[$i]["sector"]=$datos["sector"];
		$usuarios[$i]["idLinea"]=$datos["idLinea"];
		$usuarios[$i]["numero"]=$datos["numero"];
		$usuarios[$i]["correoLaboral"]=$datos["correoLaboral"];
		$usuarios[$i]["correoLaboral2"]=$datos["correoLaboral2"];
		$usuarios[$i]["claveCorreo2"]=$datos["claveCorreo2"];
        $usuarios[$i]["estado"]=$datos["estado"];
		$i++;
	}
	
	return $usuarios;
	}

    public function guardar($usuario)
    {
    $db=new database();
    $db->conectar();
        
    $consulta ='INSERT INTO Usuario (nombre, apellido, correoLaboral, correoLaboral2, claveCorreo2, idSector, idLinea, estado)
                VALUES ("'.$usuario['nombre'].'", 
                        "'.$usuario['apellido'].'", 
                        "'.$usuario['correoLaboral'].'", 
                        "'.$usuario['correoLaboral2'].'", 
                        "'.$usuario['claveCorreo2'].'",
                        "'.$usuario['idSector'].'",
                        "'.$usuario['idLinea'].'",
                        "1");
    
    ';

    $resultado=mysqli_query($db->conexion, $consulta)
    or die ("No se pudo guardar el usuario.");
    }

    public function actualizar($usuarios) 
	{
	$db=new database();
	$db->conectar();
		
	foreach($usuarios as $usuario)
		{
        $consulta ='UPDATE Usuario
                    SET nombre   = "'.$usuario['nombre'].'",
                        apellido = "'.$usuario['apellido'].'",
                        correoLaboral = "'.$usuario['correoLaboral'].'",
                        correoLaboral2= "'.$usuario['correoLaboral2'].'",
                        claveCorreo2  = "'.$usuario['claveCorreo2'].'",
                        idSector      = "'.$usuario['idSector'].'",
                        idLinea		  = "'.$usuario['idLinea'].'",
                        estado		  = "'.$usuario['estado'].'"
                    WHERE id = "'.$usuario['idUsuario'].'";
                    ';

        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden actualizar los usuarios.");
		}
	
	}	
	
}		
?>