<?php


include_once ($_SERVER["DOCUMENT_ROOT"] . '/preguntados/dao/dbconfig.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/preguntados/model/partida.php');

final class PartidaDao {
	public static function Insertar($partida) {
		$query = "INSERT INTO partidas (
										usuario1, usuario2, estado, fecha										
										)
									VALUES (						
										" . $partida->usuario1 . "	,		
										" . $partida->usuario2 . "	,
										" . $partida->estado . "	,
										" . $partida->fecha . "
										)";			
												
				
		mysqli_query(getConnection(),$query) or die(mysqli_error(getConnection()));		
		
		mysqli_close(getConnection());
		return mysqli_insert_id(getConnection());
	}// insert
	
	public static function Actualizar($partida) {

		$query = "UPDATE partidas SET 
			usuario1 = ".$partida->usuario1.",
			usuario2 = ".$partida->usuario2.",
			estado = ".$partida->estado.",
			fecha = ".$partida->fecha.",
			WHERE id = ".$partida->idPartida;
		
		$result = mysqli_query(getConnection(),$query) or die(mysql_error());

		mysqli_close(getConnection());
	}// update
	
	public static function ObtenerPorId($id){
		$query = "SELECT * FROM partidas WHERE id = ".$id;
		$rs = mysqli_query(getConnection(),$query) or die(mysqli_error(getConnection()));
		mysqli_close(getConnection());
		return PartidaDao::setEntity($rs, false);
	}		
	
	public static function Eliminar($id) {
		$query = "DELETE FROM partidas WHERE id = " . $id;		
		mysqli_query(getConnection(),$query) or die(mysqli_error(getConnection()));
		mysqli_close(getConnection());
		
		return true;
	}// delete
	
	public static function ObtenerTodos(){
		$query="SELECT * FROM partidas";
		$result = mysqli_query(getConnection(),$query) or die(mysqli_error(getConnection()));
		
		mysqli_close(getConnection());
		
		return PartidaDao::setEntity($result, true);
	}//listar todos	

	public static function setEntity($rs, $list){
		$result = array();
		$partida = null;
		$count = 0;
		
		while ($row = mysqli_fetch_array($rs)) {
			$partida = new Partida();
			$partida->id = $row['id'];
			$partida->usuario1 = $row['usuario1'];	
			$partida->usuario2 = $row['usuario2'];
			$partida->estado = $row['estado'];
			$partida->fecha = $row['fecha'];

			$result[$count] = $partida;
			$count++;
		}

		if ($list) {
			return $result;
		} else {
			return $partida;
		}			
	}
	
};
?>