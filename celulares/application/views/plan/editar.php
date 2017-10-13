<?php

foreach($planes as $plan)
{
echo'
<form name="grilla" method="POST" action="actualizar"
<tr>	  
	<td>
		<input type="hidden" class="form-control" id="" name="grilla['.$plan["id"].'][id]"     value="'.$plan["id"].'"></input>
		<input type="text"   class="form-control" id="" name="grilla['.$plan["id"].'][nombre]" value="'.$plan["nombre"].'" onchange="campoModificado('.$plan["id"].')"></input>
	</td>

	<td>
	    <input type="text"   class="form-control" id="" name="grilla['.$plan["id"].'][adicional]" value="'.$plan["adicional"].'" onchange="campoModificado('.$plan["id"].')"></input>
	</td>		

	<td>
	    <input type="text"   class="form-control" id="" name="grilla['.$plan["id"].'][minutos]" onchange="campoModificado('.$plan["id"].')"></input>
	</td>
	
	<td><input type="hidden" class="form-control" id="'.$plan["id"].'-modificado" name="grilla['.$plan["id"].'][modificado]" value="0"></input></td>
</tr>
';
}

echo'
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
';


?>