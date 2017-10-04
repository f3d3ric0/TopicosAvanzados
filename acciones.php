<?php
include ("conectar.php");
$i=2;
$j=1;
$result = $conn->query("SELECT a.fechaHora as fecha, u.apellido as ape, u.nombre as nom, a.dispositivo as disp, a.accion as acc, d.humedadSuelo as hs, d.humedadAmbiente as ha, d.temperatura as t, d.intensidadLuz as i 
	FROM acciones a
	INNER JOIN usuarios u
	ON a.id_usuario=u.id_usuario
	INNER JOIN datos d
	ON a.id_dato=d.id
	ORDER BY a.id_accion DESC")
	or die ("Consulta Fallida");
	while ($fila = mysqli_fetch_array($result)){
		if ($i%2==0){
   		 echo '<tr class="odd gradeX">';
		}else{
  		  echo '<tr class="even gradeC">';
		}
		if($fila['acc']==0){
			$accion="Apagado";
		}else{
			$accion="Encendido";
		}
		echo '<td class="center" style="display:none;">'.$j.'</td>';
		echo '<td class="center">'.$fila['fecha'].'</td>';
	    echo '<td class="center">'.$fila['ape'].', '.$fila['nom'].'</td>';
	    echo '<td class="center">'.$fila['disp'].'/'.$accion.'</td>';
	    echo '<td class="center">'.$fila['hs'].'</td>';
	    echo '<td class="center">'.$fila['ha'].'</td>';
	    echo '<td class="center">'.$fila['t'].'</td>';
	    echo '<td class="center">'.$fila['i'].'</td>';
	    echo '</tr>';
	    $i=$i+1;
	    $j=$j+1;
	}
$conn->close();


?>