<?php 

$instruccion = $_GET["led"] . $_GET["val"] . $_GET["ven"] . "\n";

$address = '192.168.1.90';//ip del servidor
$port = 800;//puerto al cual se va a conectar en la maquina remota

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);//Creo un nuevo socket

socket_connect($sock, $address, $port);//inicia  una conexion hacia la direccion ip, en el puerto especificado

socket_write($sock, $instruccion, strlen($instruccion)); 
do{
if ($buf=socket_read($sock, 2048, PHP_NORMAL_READ))
{
break;
}
}while(true);
//$buf=socket_read($msgsock, 2048, PHP_NORMAL_READ);
socket_close($sock);//cierro el socket
$datos= array();
$datos= explode(" ", $buf);

echo "Estado del led: " . $datos[0] . "%" . "<br>";
//$estadoLed = $datos[0];

echo "Estado de la valvula de riego: " . $datos[1] . "%" . "<br>";
//$estadoValvula = $datos[1];

echo "Estado de ventilacion: " . $datos[5] . "%" . "<br>";

echo "Humedad del Suelo: " . round(((1023- $datos[2])/763)*100, 2) . "%" . "<br>";

//$humedadSuelo = round(((1023- $datos[2])/763)*100, 2);

echo "Humedad del Ambiente: " . $datos[3] . "%" . "<br>";
//$humedad = $datos[3];

echo "Temperatura del ambiente: " . $datos[4] . "°C" . "<br>";

echo "Intensida de la luz: " . $datos[6] . "%" . "<br>";


if ($datos[0]=="ON"){
	echo '<button id="btnEncender" onclick="encenderLed()" type="button" disabled="true" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-play">LED</span>
</button>';
echo '<button id="btnApagar" onclick="apagarLed()" type="button" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-off">LED</span>
</button><br>';
echo '<img src="img/luzon.png"  style="width:100px;height:100px;">';
}else{
	echo '<button id="btnEncender" onclick="encenderLed()" type="button" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-play">LED</span>
</button>';
echo '<button id="btnApagar" onclick="apagarLed()" type="button" disabled="true" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-off">LED</span>
</button><br>';
echo '<img src="img/luzoff.jpg"  style="width:100px;height:100px;">';
}


if ($datos[1]=="ON"){
	echo '<button id="btnEncenderVal" onclick="encenderVal()" type="button" disabled="true" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-play">Valvula</span>
</button>';
echo '<button id="btnApagarVal" onclick="apagarVal()" type="button" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-off">Valvula</span>
</button>';
}else{
	echo '<button id="btnEncenderVal" onclick="encenderVal()" type="button" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-play">Valvula</span>
</button>';
echo '<button id="btnApagarVal" onclick="apagarVal()" type="button" disabled="true" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-off">Valvula</span>
</button>';
}


if ($datos[5]=="ON"){
	echo '<button id="btnEncenderVal" onclick="encenderVen()" type="button" disabled="true" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-play">Ventilacion</span>
</button>';
echo '<button id="btnApagarVal" onclick="apagarVen()" type="button" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-off">Ventilacion</span>
</button>';
echo '<img src="img/ven2.gif"  style="width:100px;height:100px;">';
}else{
	echo '<button id="btnEncenderVen" onclick="encenderVen()" type="button" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-play">Ventilacion</span>
</button>';
echo '<button id="btnApagarVen" onclick="apagarVen()" type="button" disabled="true" class="btn btn-primary btn-lg">
	<span class="glyphicon glyphicon-off">Ventilacion</span>
</button>';
echo '<img src="img/ven.png"  style="width:100px;height:100px;">';
}



echo "Humedad del suelo: " . '<input type="text" id="hsuelo" value="' . round(((1023- $datos[2])/763)*100, 2) . '"/>';
echo "Humedad del Ambiente: " . '<input type="text" id="ha" value="' . $datos[3] . '"/>' . "<br>";
echo "Temperatura del ambiente: " . '<input type="text" id="tem" value="' . $datos[4] . '"/>';
echo "Intensidad de la luz: " . '<input type="text" id="luz" value="' . $datos[6] . '"/>';


//$temperatura = $datos[4];
//$luz=$datos[5];

/*
echo "Humedad del Suelo: " . round(((1023- $datos[1])/763)*100, 2) . "%";
echo "<br>";
echo "Humedad del Ambiente: " . $datos[2] . "%";
echo "<br>";
echo "Temperatura del ambiente: " . $datos[3] . "°C";

$t = $_GET["t"]."\n";
$n = $_GET["instruccion"]."\n";
echo "Hola 1";
echo "Hola 2";
echo $t;
echo $n;
*/

?>
