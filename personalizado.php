<?php
include ("conectar.php");
$fecha1=$_REQUEST['fecha1'];
$amd=$_REQUEST['fec'];

$fechas=explode('-',$fecha1);
$año=$fechas[0];
$mes=$fechas[1];
$dia=$fechas[2];
//print_r($_REQUEST);
/*
$fecha1=strtotime($fecha1);
$fecha1 = date ('Y-m-d' , $fecha1);

$fecha2=strtotime($fecha2);
$fecha2 = date ('Y-m-d' , $fecha2);
*/

$hs="";
$ha="";
$tem="";
$lum="";
$indices="";

$i=1;
if($amd=="mes"){
	$result1 = $conn->query("CALL promediosMes('$mes','$año')")
	or die ("Consulta Fallida");
	$conn->close();

	while ($fila1 = mysqli_fetch_array($result1)){
		if ($i%2==0){
   		 echo '<tr class="odd gradeX">';
		}else{
  		  echo '<tr class="even gradeC">';
		}
		echo '<td class="center">'.$fila1['dia'].'</td>';
		echo '<td class="center">'.$fila1['humSuelo'].'</td>';
		echo '<td class="center">'.$fila1['humAmb'].'</td>';
		echo '<td class="center">'.$fila1['temp'].'</td>';
		echo '<td class="center">'.$fila1['luz'].'</td>';


	    $i=$i+1;
	    echo '</tr>';
	    $hs=$hs.$fila1['humSuelo'].' ';
		$ha=$ha.$fila1['humAmb'].' ';
		$tem=$tem.$fila1['temp'].' ';
		$lum=$lum.$fila1['luz'].' ';
		$fe=explode('-',$fila1['dia']);
		$indices=$indices.$fe[2].' ';

	}
	   

}elseif($amd=="dia"){

$result1 = $conn->query("CALL promediosDia('$fecha1')")
	or die ("Consulta Fallida");
	$conn->close();

	while ($fila1 = mysqli_fetch_array($result1)){
		if ($i%2==0){
   		 echo '<tr class="odd gradeX">';
		}else{
  		  echo '<tr class="even gradeC">';
		}
		echo '<td class="center">'.$fila1['hora'].'</td>';
		echo '<td class="center">'.$fila1['humSuelo'].'</td>';
		echo '<td class="center">'.$fila1['humAmb'].'</td>';
		echo '<td class="center">'.$fila1['temp'].'</td>';
		echo '<td class="center">'.$fila1['luz'].'</td>';


	    $i=$i+1;
	    echo '</tr>';
	    $hs=$hs.$fila1['humSuelo'].' ';
		$ha=$ha.$fila1['humAmb'].' ';
		$tem=$tem.$fila1['temp'].' ';
		$lum=$lum.$fila1['luz'].' ';
		$fe=explode(' ',$fila1['hora']);
		$indices=$indices.$fe[1].' ';

	}







}else{
$result1 = $conn->query("CALL promediosAnio('$año')")
	or die ("Consulta Fallida 3");
	$conn->close();
	while ($fila1 = mysqli_fetch_array($result1)){
		if ($i%2==0){
   		 echo '<tr class="odd gradeX">';
		}else{
  		  echo '<tr class="even gradeC">';
		}
		echo '<td class="center">'.$fila1['fecha'].'</td>';
		echo '<td class="center">'.$fila1['humSuelo'].'</td>';
		echo '<td class="center">'.$fila1['humAmb'].'</td>';
		echo '<td class="center">'.$fila1['temp'].'</td>';
		echo '<td class="center">'.$fila1['luz'].'</td>';


	    $i=$i+1;
	    echo '</tr>';
	    $hs=$hs.$fila1['humSuelo'].' ';
		$ha=$ha.$fila1['humAmb'].' ';
		$tem=$tem.$fila1['temp'].' ';
		$lum=$lum.$fila1['luz'].' ';
		$fe=explode('-',$fila1['fecha']);
		$indices=$indices.$fe[0].' ';

	}







}

	echo '<input type="hidden" id="humedadS" value="'.$hs.'"/>';
	echo '<input type="hidden" id="humedadA" value="'.$ha.'"/>';
	echo '<input type="hidden" id="temperatura" value="'.$tem.'"/>';
	echo '<input type="hidden" id="luminosidad" value="'.$lum.'"/>';
	echo '<input type="hidden" id="indices" value="'.$indices.'"/>';

/*

$i=2;
$j=1;
$result1 = $conn->query("CALL promediosMes('$fecha1','$fecha2')")
	or die ("Consulta Fallida");
$conn->close();

include ("conectar.php");
$result2 = $conn->query("CALL minimas('$fecha1','$fecha2')")
	or die ("Consulta Fallida 2");
$conn->close();

include ("conectar.php");
$result3 = $conn->query("CALL promedios('$fecha1','$fecha2')")
	or die ("Consulta Fallida 3");


	while ($fila1 = mysqli_fetch_array($result1)){
		if ($i%2==0 and($j==1)){
   		 echo '<tr class="odd gradeX">';
		}else{
  		  //echo '<tr class="even gradeC">';
		}
		if($j==1){
			echo '<td class="center">Maximos</td>';
		}
		echo '<td class="center">'.$fila1['porc'].' -     '.$fila1['fechaYhora'].'</td>'; 
	    $i=$i+1;
	    if($j==4){
	    	echo '</tr>';
	    }
	    $j=$j+1;
	}

	$j=1;
	while ($fila2 = mysqli_fetch_array($result2)){
		if ($i%2==0 and($j==1)){
   		 echo '<tr class="even gradeC">';
		}else{
  		  //echo '<tr class="even gradeC">';
		}
		if($j==1){
			echo '<td class="center">Minimos</td>';
		}
		echo '<td class="center">'.$fila2['porcentaje'].' -  '.$fila2['fechaYhora'].'</td>'; 
	    $i=$i+1;
	    if($j==4){
	    	echo '</tr>';
	    }
	    $j=$j+1;
	}

	$j=1;
	while ($fila3 = mysqli_fetch_array($result3)){
		if ($i%2==0){
   		 echo '<tr class="odd gradeX">';
		}else{
  		  echo '<tr class="even gradeC">';
		}
		if($j==1){
			echo '<td class="center">Promedios</td>';
		}
		echo '<td class="center">'.$fila3['humAmb'].'</td>';
		echo '<td class="center">'.$fila3['humSuelo'].'</td>';
		echo '<td class="center">'.$fila3['temp'].'</td>';
		echo '<td class="center">'.$fila3['luz'].'</td>';
	    $i=$i+1;
	    if($j==1){
	    	echo '</tr>';
	    }
	    $j=$j+1;
	}
$conn->close();
*/

?>
