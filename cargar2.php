<?php
include ("conectar.php");
$i=2;
$j=1;
$result = $conn->query("SELECT * FROM datos ORDER BY id DESC  LIMIT 20")
	or die ("Consulta Fallida");
	while ($fila = mysqli_fetch_array($result)){
		if ($i%2==0){
   		 echo '<tr class="odd gradeX">';
		}else{
  		  echo '<tr class="even gradeC">';
		}
		echo '<td class="center" style="display:none;">'.$j.'</td>';
		echo '<td class="center">'.$fila['fechaYhora'].'</td>';
	    echo '<td class="center">'.$fila['humedadSuelo'].'</td>';
	    echo '<td class="center">'.$fila['humedadAmbiente'].'</td>';
	    echo '<td class="center">'.$fila['temperatura'].'</td>';
	    echo '<td class="center">'.$fila['intensidadLuz'].'</td>';
	    echo '</tr>';
	    $i=$i+1;
	    $j=$j+1;
	}
$conn->close();


?>
