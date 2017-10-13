<?php

echo '<form name="grilla" method="POST" action="actualizarUsuarios"';

foreach ($usuarios as $usuario)
{
echo
'	
<tr>	  
	<td>
		<input type="hidden" class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][id]"       value="'.$usuario["idUsuario"].'"></input>
		<input type="text"   class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][nombre]"   value="'.$usuario["nombre"].'" onchange="campoModificado('.$usuario["idUsuario"].')"></input>
	</td>
	<td><input type="text"   class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][apellido]" value="'.$usuario["apellido"].'" onchange="campoModificado('.$usuario["idUsuario"].')"></input></td>
	<td>
		<select class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][sector]" onchange="campoModificado('.$usuario["idUsuario"].')">
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
		<select class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][numero]" onchange="campoModificado('.$usuario["idUsuario"].')">
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
	<td><input type="text" class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][correoLaboral]"  value="'.$usuario["correoLaboral"].'"  onchange="campoModificado('.$usuario["idUsuario"].')"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][correoLaboral2]" value="'.$usuario["correoLaboral2"].'" onchange="campoModificado('.$usuario["idUsuario"].')"></input></td>
	<td><input type="text" class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][claveCorreo2]"   value="'.$usuario["claveCorreo2"].'"   onchange="campoModificado('.$usuario["idUsuario"].')"></input></td>
	<td>
		<select class="form-control" id="" name="grilla['.$usuario["idUsuario"].'][estado]" onchange="campoModificado('.$usuario["idUsuario"].')">
';
		if($usuario["estado"]==1)
        {
            echo '<option value="1"> Activo </option>';
        }
        else
            {
            echo '<option value="0"> Inactivo </option>';
		    }
echo
'
			<option value="1">Activo</option>
			<option value="0">Inactivo</option>
		</select>	
	<td><input type="hidden" class="form-control" id="'.$usuario["idUsuario"].'-modificado" name="grilla['.$usuario["idUsuario"].'][modificado]" value="0"></input></td>
</tr>
';
}

echo '<button type="submit" class="btn btn-primary">Guardar</button>';
echo '</form>';

?>