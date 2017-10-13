<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once "database.php";

class Datos
{
    public function listar()
    {
        $db=new database();
        $db->conectar();

        $consulta="SELECT *
			       FROM Datos;";
        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden mostrar los datos.");

        $datos = array(array("id", "gb"));
        $i=0;
        while($dato = mysqli_fetch_assoc($resultado))
        {
            $datos[$i]["id"]=$dato["id"];
            $datos[$i]["gb"]=$dato["gb"];
            $i++;
        }

        return $datos;
    }


    public function guardar($datos)
    {
        $db=new database();
        $db->conectar();

        $consulta='INSERT INTO Datos (gb)
                   VALUES("'.$datos["gb"].'")';
        $resultado=mysqli_query($db->conexion, $consulta)
        or die ("No se pueden guardar los datos.");
    }

}