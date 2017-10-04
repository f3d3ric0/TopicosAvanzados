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

echo "Temperatura del ambiente: " . $datos[4] . "°C" . "<br>";

echo "Intensida de la luz: " . $datos[6] . "%" . "<br>";
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