<?php

foreach($usuarios as $usuario)
{
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
	</tr>
	';
}

?>