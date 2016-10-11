<?php 
include_once ($_SERVER["DOCUMENT_ROOT"] . '/preguntados/dao/PersonaDao.php');
?>
<form action = "/preguntados/controller/partidasController.php" method="post">
	<label>Rival:</label>
	<select id="idrival" name="idrival">
	
		<?php
			$personas = PersonaDao::ObtenerTodos();
			foreach($personas as $pers){?>
				<option value = "<?php echo $pers->id; ?>" > <?php echo $pers->nombre; ?> </option>	
			<?php }	?>
	</select>
	<br> <br>
	<input type="submit" value="Jugar" >
</form>