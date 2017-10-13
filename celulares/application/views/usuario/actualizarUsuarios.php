<?php

foreach ($usuarios as $usuario)
{
echo
'	
<tr>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_nombre" value="'.$usuario["nombre"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_apellido" value="'.$usuario["apellido"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_correo1" value="'.$usuario["idSector"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_correo1" value="'.$usuario["idLinea"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_correo1" value="'.$usuario["correoLaboral"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_correo2" value="'.$usuario["correoLaboral2"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_claveCorreo2" value="'.$usuario["claveCorreo2"].'"></input></td>
</tr>
';
}


?>