<?php

foreach($usuarios as $usuario)
{
    if($usuario["estado"]==1)
    {
        $estado='<option value="'.$usuario["estado"].'"> Activo </option>';
    }
    else
    {
        $estado='<option value="'.$usuario["estado"].'"> Inactivo </option>';
    }

echo
	'	
	<tr>
		<td>'.$usuario["nombre"].'</td>
		<td>'.$usuario["apellido"].'</td>
		<td>'.$usuario["sector"].'</td>
		<td>'.$usuario["numero"].'</td>
		<td>'.$usuario["correoLaboral"].'</td>
		<td>'.$usuario["correoLaboral2"].'</td>
		<td>'.$usuario["claveCorreo2"].'</td>
		<td>'.$estado.'</td>
	</tr>
	';
}

?>