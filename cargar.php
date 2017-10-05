<?php
include ("conectar.php");
$i=1;
$hs="";
$ha="";
$tem="";
$lum="";
$result = $conn->query("SELECT *FROM datos WHERE accion='1' ORDER BY id DESC LIMIT 25")
	or die ("Consulta Fallida");
	while ($fila = mysqli_fetch_array($result)){
		if ($i%2==0){
   		 echo '<tr class="odd">';
		}else{
  		  echo '<tr class="even">';
		}
		echo '<td class="center">'.$fila['fechaYhora'].'</td>';
	    echo '<td class="center">'.$fila['humedadSuelo'].'</td>';
	    echo '<td class="center">'.$fila['humedadAmbiente'].'</td>';
	    echo '<td class="center">'.$fila['temperatura'].'</td>';
	    echo '<td class="center">'.$fila['intensidadLuz'].'</td>';
	    echo '</tr>';
	    $i=$i+1;
	    $hs=$hs.$fila['humedadSuelo'].' ';
		$ha=$ha.$fila['humedadAmbiente'].' ';
		$tem=$tem.$fila['temperatura'].' ';
		$lum=$lum.$fila['intensidadLuz'].' ';
		//comentario
	}
	echo '<input type="hidden" id="humedadS" value="'.$hs.'"/>';
	echo '<input type="hidden" id="humedadA" value="'.$ha.'"/>';
	echo '<input type="hidden" id="temperatura" value="'.$tem.'"/>';
	echo '<input type="hidden" id="luminosidad" value="'.$lum.'"/>';
$conn->close();


?>