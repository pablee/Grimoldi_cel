<?php

foreach($lineas as $linea)
{
    if($linea["estado"]==1)
    {
        $estado='<option value="'.$linea["estado"].'"> Activo </option>';
    }
    else
    {
        $estado='<option value="'.$linea["estado"].'"> Inactivo </option>';
    }

    echo
        '	
	<tr>	   		
		<td>'.$linea["numero"].'</td>
		<td>'.$estado.'</td>
		<td>'.$linea["estadoFecha"].'</td>		
		<td>'.$linea["nombrePlan"].'</td>
		<td>'.$linea["gb"].' GB</td>
		<td>'.$linea["observaciones"].'</td>	
	</tr>
	';
}

?>