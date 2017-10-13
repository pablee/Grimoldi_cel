<?php

foreach($planes as $plan)
{
echo'	
	<tr>	   		
		<td>'.$plan["nombre"].'</td>		
		<td>'.$plan["adicional"].'</td>		
		<td>'.$plan["minutos"].'</td>
		
	</tr>
	';
}

?>