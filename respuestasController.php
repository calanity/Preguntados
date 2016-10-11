<?php
//abro conexion

include_once ($_SERVER["DOCUMENT_ROOT"] . '/preguntados/dao/PreguntaDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/preguntados/dao/RespuestaDao.php');


$accion =isset($_POST["action"]) ? $_POST["action"] : $_GET["action"];
$idObtenido= isset ($_POST["id"]) ? ($_POST["id"]) :($_GET["id"]);
$idPreguntaObt= isset ($_POST["idPregunta"]) ? ($_POST["idPregunta"]) :"";
$respuestaObt = isset ($_POST["respuesta"]) ? ($_POST["respuesta"]) :"";
$correctaObt=isset ($_POST["Rcorrecta"]) ? ($_POST["Rcorrecta"]) :"";


switch($accion)
{
	case "agregar":
			$respuesta= new respuesta();
			$respuesta->idpregunta=$idPreguntaObt;
			$respuesta->respuesta=$respuestaObt;
			$respuesta->correcta= $correctaObt;
			RespuestaDao::Insertar($respuesta);
			
		//actualizar la cant de respuestas de una preguntados		
		
		break;
		
	case "eliminar":	
		RespuestaDao::Eliminar($idObtenido);		
		//restar la cant de respuestas 		
		break;
		
	case "editar":	
			$respuesta = RespuestaDao::ObtenerPorId($idObtenido);
			$respuesta->respuesta = $respuestaObt;
			$respuesta->idpregunta= $idPreguntaObt;
			$respuesta->correcta=$correctaObt;			
			
			RespuestaDao::Actualizar($respuesta);
	
		break;
	
	
	
}

header("Location:/preguntados/respuestas-listado.php");
?>