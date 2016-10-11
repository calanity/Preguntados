<?php
session_start();
if(!isset($_SESSION ["userid"])){
header ("location: login.php");
} else {
	$nom = $_SESSION["userid"];
}
?>
Bienvenido <?php echo $nom;?> 
<a href= "CerrarSesion.php" > Salir </a>
<br> <br>
<form action = "/preguntados/controller/partidasController.php" method="post">
	<a href= "partida-form.php" > Nueva partida </a>
	<p> Partidas abiertas </p>
	<table border = 1>
		<tr>
			<th> Fecha </th>
			<th> Rival </th>
			<th> Puntos </th>
			<th> Puntos rival </th>
			<th> Accion </th>
		</tr>
		<tr>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> <a href=""> Continuar </a> </td>
		</tr>
	</table>
</form>