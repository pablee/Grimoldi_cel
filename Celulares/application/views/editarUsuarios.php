<?php

echo '<form name="grilla" method="POST" action="actualizarUsuarios"';

foreach ($usuarios as $usuario)
{
echo
'	
<tr>	  
	<td>
		<input type="hidden" class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][id]" value="'.$usuario["idUsuario"].'"></input>
		<input type="text" class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][nombre]" value="'.$usuario["nombre"].'" onchange="campoModificado('.$usuario["idUsuario"].')"></input>
	</td>
	<td><input type="text" class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][apellido]" value="'.$usuario["apellido"].'"></input></td>
	<td>
		<select class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][sector]">
			<option value="'.$usuario["idSector"].'">'.$usuario["sector"].'</option>
';
		foreach ($sectores as $sector)
		{
		echo '<option value="'.$sector["id"].'">'.$sector["nombre"].'</option>';
		}
echo
'
		</select>
	</td>
	<td>
		<select class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][numero]">
			<option value="'.$usuario["idLinea"].'">'.$usuario["numero"].'</option>
';
		foreach ($lineas as $linea)
		{
		echo '<option value="'.$linea["id"].'">'.$linea["numero"].'</option>';
		}
echo
'
		</select>
	</td>	
	<td><input type="text" class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][correoLaboral]" value="'.$usuario["correoLaboral"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][correoLaboral2]" value="'.$usuario["correoLaboral2"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][claveCorreo2]" value="'.$usuario["claveCorreo2"].'"></input></td>
	<td><input type="hidden" class="form-control" id="'.$usuario["idUsuario"].'-modificado" name="grilla['.$usuario["idUsuario"].'][modificado]" value="false"></input></td>
</tr>
';
}
/*
foreach ($usuarios as $usuario)
{
echo
'	
<tr>
	<input type="hidden" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_idUsuario" value="'.$usuario["nombre"].'"></input>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_nombre" value="'.$usuario["nombre"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_apellido" value="'.$usuario["apellido"].'"></input></td>
	<td>
		<select class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_sector">
			<option value="'.$usuario["idSector"].'">'.$usuario["sector"].'</option>
';
		foreach ($sectores as $sector)
		{
		echo '<option value="'.$sector["id"].'">'.$sector["nombre"].'</option>';
		}
echo
'
		</select>
	</td>
	<td>
		<select class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_numero">
			<option value="'.$usuario["idLinea"].'">'.$usuario["numero"].'</option>
';
		foreach ($lineas as $linea)
		{
		echo '<option value="'.$linea["id"].'">'.$linea["numero"].'</option>';
		}
echo
'
		</select>
	</td>	
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_correo1" value="'.$usuario["correoLaboral"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_correo2" value="'.$usuario["correoLaboral2"].'"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla_'.$usuario["idUsuario"].'_claveCorreo2" value="'.$usuario["claveCorreo2"].'"></input></td>
</tr>
';
}
*/

echo '<button type="submit">Guardar</button>';
echo '</form>';

?>