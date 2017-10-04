<?php
include("conectar.php");
$usuario=$_REQUEST['usuario'];
$dispositivo=$_REQUEST['dispositivo'];
$accion=$_REQUEST['accion'];

$hs=$_REQUEST['med1'];
$ha=$_REQUEST['med2'];
$tem=$_REQUEST['med3'];
$lum=$_REQUEST['med4'];

$ac=0;

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha=date('Y-m-d \ \ H:i:s');
$fecha = strtotime ( '+1 hour' , strtotime($fecha)) ;
$fecha = date ('Y/m/d \ \ H:i:s' , $fecha );


//Inserto los datos actuales
if (!$conn->query("CALL InsertarDato('$fecha','$hs','$ha', '$tem','$lum', $ac)")) {
	    echo "Falló CALL: (" . $conn->errno . ") " . $conn->error;
	}else{ 
		echo "temperatua: $datos[4], humedadSuelo: $datos[2], luz: $datos[6]";
	}
$conn->close();


//recupero el id del dato registrado
include("conectar.php");
$result = $conn->query("SELECT MAX(id) as id FROM datos WHERE accion='0'")
	or die ("Consulta Fallida");
$conn->close();
while ($fila = mysqli_fetch_array($result)){
	$idDato=$fila['id'];
}

//Inserto la accion
include("conectar.php");
if (!$conn->query("CALL InsertarAccion('$usuario','$dispositivo','$fecha', '$accion','$idDato')")) {
	    echo "Falló CALL: (" . $conn->errno . ") " . $conn->error;
	}else{ 
		echo "temperatua: $datos[4], humedadSuelo: $datos[2], luz: $datos[6]";
	}
	$conn->close();
?>

