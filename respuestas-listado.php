<?php
$idpregunta = isset($_GET['idPregunta']) ? $_GET ['idPregunta']: 0;
include_once ($_SERVER["DOCUMENT_ROOT"] . '/preguntados/dao/RespuestaDao.php');
 	
	if($idpregunta>0)
	{
		$respuestas= RespuestaDao::ObtenerRespuestasPorPregunta($idpregunta);
	}
	else
	{
		$respuestas=RespuestaDao::ObtenerTodos();
	}
	
	echo '<a href = "respuestas-form.php?idpregunta='.$idpregunta.'"> Crear nueva respuesta </a>
		<table border = "1">
		<tr>
			<th> id </th>
			<th>idPregunta </th>
			<th> Respuesta </th>
			<th> Correcta </th>		
			<th> Accion </th>					
		</tr>
	
	';
	

	//recorroel resultado obtenido y lo muestro por pantalla
	
	
	foreach($respuestas as $item)
	{
			
		echo ' 
			<tr> 
				<td>'.$item->id.'</td>
				<td>'.$item->idpregunta.' </td>
				<td>'.$item->respuesta.' </td>
				<td>'.$item->correcta.'</td>
				<td>
					<a href= "/preguntados/respuestas-form.php?id='.$item->id.'&idpregunta='.$item->idpregunta.'	">Editar</a>
					<a href= "/preguntados/controller/respuestasController.php?id='.$item->id.'&action=eliminar">Eliminar</a>
				</td>
			</tr>
		';	
	}
	echo '</table>';
	
	
	

