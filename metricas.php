<?php
include ("conectar.php");
$fecha1=$_REQUEST['fecha1'];
$fecha2=$_REQUEST['fecha2'];

//print_r($_REQUEST);
/*
$fecha1=strtotime($fecha1);
$fecha1 = date ('Y-m-d' , $fecha1);

$fecha2=strtotime($fecha2);
$fecha2 = date ('Y-m-d' , $fecha2);
*/
$i=2;
$j=1;
$result1 = $conn->query("CALL maximas('$fecha1','$fecha2')")
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


?>
