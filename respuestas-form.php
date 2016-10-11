<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/preguntados/dao/RespuestaDao.php');
	$idpregunta = isset($_GET['idpregunta']) ? $_GET ['idpregunta']: 0;
	$id=isset($_GET['id']) ? $_GET ['id']: 0;
	
	$idRespuesta= "";
	$respuesta = "";
	$correcta=0;		
	
	if($id>0)
	{
		$accion= 'editar';
		$respuesta= RespuestaDao::ObtenerPorId($id);
	}
	
	else
	{
		$accion='agregar';
		$respuesta= new respuesta();
	}

	
?>

<form action = "/preguntados/controller/respuestasController.php" method="post">
	<input type= "hidden" name="action" id= "action" value = "<?php echo $accion; ?>" />
	<input type= "hidden" name="id" id= "id" value = "<?php echo $respuesta->id ?>" />
	<input type = "hidden" id="idPregunta" name= "idPregunta" value="<?php echo $idpregunta; ?>" />
	<br> <br>
	<label>Respuesta:</label>
	<input type = "text" id="respuesta" name= "respuesta" value="<?php echo $respuesta->respuesta; ?>" />
	
	<label>Correcta:</label>
	<select name="Rcorrecta" id="Rcorrecta">
	<?php if($respuesta->correcta==1){ ?>
		<option value= 1 selected> Si</option>
		<option value= 2> No</option>
	<?php }else{ ?>
		<option value= 1 > Si</option>
		<option value= 2 selected> No</option>
	<?php } ?>
	</select>
	
	<br> <br>
	<input type = "submit" value= "Guardar respuesta"/>
	<br> <br>
	<a href= "respuestas-listado.php">Volver </a>
</form>	