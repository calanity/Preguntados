<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/preguntados/dao/PreguntaDao.php');
$idCategoria = isset($_GET['idCategoria']) ? $_GET ['idCategoria']: 0;

$preguntas = PreguntaDao::ObtenerPreguntasPorCategoria($idCategoria);
$random_keys=array_rand($preguntas,1);
$pregunta = $preguntas[$random_keys];
?>
<form action = "/preguntados/controller/partidasController.php" method="post">
	<label><?php echo $pregunta->nombre; ?></label>
	<?php 
		$respuestas = PreguntaDao::ObtenerRespuestasPregunta($pregunta->id);
		foreach($respuestas as $resp){?>
	<input type="radio" name="Respuesta" value="<?php echo $resp->id; ?>"> <?php echo $resp->respuesta; ?> <br>
		<?php } ?>
	<input type="submit" value="Continuar" >
</form>