<?php 

$instruccion = $_GET["led"] . $_GET["val"] . $_GET["ven"] . "\n";

$address = '192.168.1.90';//ip del servidor
$port = 800;//puerto al cual se va a conectar en la maquina remota

$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);//Creo un nuevo socket


if(socket_connect($sock, $address, $port)){//inicia  una conexion hacia la direccion ip, en el puerto especificado

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


//Defino las variables ambientales
$hsuelo=round(((520- $datos[2])/520)*100, 2);
$luz=round((($datos[6])/1023)*100, 2);
$resistencia=(1023-$datos[4])*10000/$datos[4];
$temperatura=1/(log10($resistencia/10000)/3975+1/298.15)-273.15;
$temperatura= round($temperatura,2);


/*
echo '<div class="row">';
echo '<div class="col-sm-3 col-lg-3">';
echo '<div class="dash-unit">';
echo '<dtitle>Datos</dtitle><hr>';
echo "Estado del led: " . $datos[0] ."<br>";
//$estadoLed = $datos[0];

echo "Estado de la valvula de riego: " . $datos[1] . "<br>";
//$estadoValvula = $datos[1];

echo "Estado de ventilacion: " . $datos[5] . "<br>";

echo "Humedad del Suelo: " . round(((1023- $datos[2])/763)*100, 2) . "%" . "<br>";

//$humedadSuelo = round(((1023- $datos[2])/763)*100, 2);

echo "Humedad del Ambiente: " . $datos[3] . "%" . "<br>";
//$humedad = $datos[3];

echo "Temperatura del ambiente: " . $temperatura . "°C" . "<br>";

echo "Intensida de la luz: " . $luz . "%" . "<br>";
echo '</div>';
echo '</div>';

echo '<div class="col-sm-3 col-lg-3">';
echo '<div class="dash-unit">';
echo '<dtitle>ON/OFF  Luz</dtitle><hr>';

if ($datos[0]=="ON"){
	echo '<button id="btnEncender" onclick="encenderLed()" type="button" disabled="true" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-play">LED</span>
</button><br>';
echo '<button id="btnApagar" onclick="apagarLed()" type="button" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-off">LED</span>
</button><br>';
//echo '<img src="img/luzon.png"  style="width:100px;height:100px;">';
}else{
	echo '<button id="btnEncender" onclick="encenderLed()" type="button" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-play">LED</span>
</button><br>';
echo '<button id="btnApagar" onclick="apagarLed()" type="button" disabled="true" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-off">LED</span>
</button><br>';
//echo '<img src="img/luzoff.jpg"  style="width:100px;height:100px;">';
}

echo '</div>';
echo '</div>';


echo '<div class="col-sm-3 col-lg-3">';
echo '<div class="dash-unit">';
echo '<dtitle>ON/OFF  valvula de riego</dtitle><hr>';
if ($datos[1]=="ON"){
	echo '<button id="btnEncenderVal" onclick="encenderVal()" type="button" disabled="true" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-play">Valvula</span>
</button><br>';
echo '<button id="btnApagarVal" onclick="apagarVal()" type="button" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-off">Valvula</span>
</button><br>';
}else{
	echo '<button id="btnEncenderVal" onclick="encenderVal()" type="button" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-play">Valvula</span>
</button><br>';
echo '<button id="btnApagarVal" onclick="apagarVal()" type="button" disabled="true" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-off">Valvula</span>
</button><br>';
}
echo '</div>';
echo '</div>';

echo '<div class="col-sm-3 col-lg-3">';
echo '<div class="dash-unit">';
echo '<dtitle>ON/OFF  ventilacion</dtitle><hr>';

if ($datos[5]=="ON"){
	echo '<button id="btnEncenderVal" onclick="encenderVen()" type="button" disabled="true" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-play">Ventilacion</span>
</button><br>';
echo '<button id="btnApagarVal" onclick="apagarVen()" type="button" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-off">Ventilacion</span>
</button><br>';
//echo '<img src="img/ven2.gif"  style="width:100px;height:100px;">';
}else{
	echo '<button id="btnEncenderVen" onclick="encenderVen()" type="button" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-play">Ventilacion</span>
</button><br>';
echo '<button id="btnApagarVen" onclick="apagarVen()" type="button" disabled="true" class="btn btn-success btn-lg">
	<span class="glyphicon glyphicon-off">Ventilacion</span>
</button><br>';
//echo '<img src="img/ven.png"  style="width:100px;height:100px;">';
}

echo '</div>';
echo '</div>';
echo '</div>';
*/


if ($hsuelo>100){
	$hsuelo=100;
}

//Datos para los graficos de los indicadore
echo "Humedad del suelo: " . '<input type="hidden" id="hs" value="' . $hsuelo . '"/>';
echo "Humedad del Ambiente: " . '<input type="hidden" id="ha" value="' . $datos[3] . '"/>';
echo "Temperatura del ambiente: " . '<input type="hidden" id="tem" value="' . $temperatura . '"/>';
echo "Intensidad de la luz: " . '<input type="hidden" id="lz" value="' . $luz . '"/>';

//Datos para el estado de los botones
echo "Estado del Led: " . '<input type="hidden" id="led2" value="' . $datos[0] . '"/>';
echo "Estado de Valvula: " . '<input type="hidden" id="valve" value="' . $datos[1] . '"/>';
echo "Estado de Ventilacion: " . '<input type="hidden" id="vent" value="' . $datos[5] . '"/>';
echo "Estado de la Placa: " . '<input type="hidden" id="placa" value="On"/>';

}else{
	//Datos para los graficos de los indicadore
echo "Humedad del suelo: " . '<input type="hidden" id="hs" value="1"/>';
echo "Humedad del Ambiente: " . '<input type="hidden" id="ha" value="1"/>';
echo "Temperatura del ambiente: " . '<input type="hidden" id="tem" value="1"/>';
echo "Intensidad de la luz: " . '<input type="hidden" id="lz" value="1"/>';

//Datos para el estado de los botones
echo "Estado del Led: " . '<input type="hidden" id="led2" value="1"/>';
echo "Estado de Valvula: " . '<input type="hidden" id="valve" value="1"/>';
echo "Estado de Ventilacion: " . '<input type="hidden" id="vent" value="1"/>';
echo "Estado de la Placa: " . '<input type="hidden" id="placa" value="Off"/>';
}





?>
