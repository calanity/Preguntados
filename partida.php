<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/preguntados/dao/CategoriaDao.php');
?>
<label>Categorias</label>
<br> <br>
<div id ="categorias">
	<?php 
		$categorias = CategoriaDao::ObtenerTodos();
		foreach($categorias as $cat){ ?>
			<a class="categoria" href="partidas-preguntas.php?idCategoria=<?php echo $cat->id; ?>"> <?php echo $cat->nombre ?> </div>
			<br> 
		<?php } ?>
</div>