<?php
	

	include_once ($_SERVER["DOCUMENT_ROOT"] . '/preguntados/dao/PreguntaDao.php');
	
	echo '
	<a href="preguntas-form.php">Crear nueva preguntas </a><br/><br/>
	<table border="1">
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Categoria</th>			
			<th>Acciones</th>
		</tr>
	';
	
	$preguntas = PreguntaDao::ObtenerTodos();
	
	foreach($preguntas as $item){
		echo '
			<tr>
				<td>'.$item->id.'</td>
				<td>'.$item->nombre.'</td>
				<td>'.$item->idcategoria.'</td>				
				<td>
					<a href="/preguntados/preguntas-form.php?id='.$item->id.'">Editar</a>
					<a href="/preguntados/controller/PreguntasController.php?id='.$item->id.'&accion=eliminar">Eliminar</a>
					<a href="/preguntados/respuestas-listado.php?idPregunta='.$item->id.'">Ver respuesta/s</a>
				</td>
			</tr>
		';
	}	
	
	echo '</table>';			
?>