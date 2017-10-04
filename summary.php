<?php
session_start();
//print_r($_SESSION);
if(isset($_SESSION['usuario'])){
    $marca=true;
    $rol=$_SESSION['rol'];
    $apeyNom=$_SESSION['apellido'].', '.$_SESSION['nombre'];
}
else{
  $marca=false;
  $rol="";
  $apeyNom="Guest";
}
?>
<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>BLOCKS - Bootstrap Dashboard Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- DATA TABLE CSS -->
    <link href="assets/css/table.css" rel="stylesheet">



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  	<!-- Google Fonts call. Font Used Open Sans -->
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

  	<!-- DataTables Initialization -->
    <script type="text/javascript" src="assets/js/datatables/jquery.dataTables.js"></script>
  			


<script type="text/javascript" charset="utf-8">
      
            function tabla(){
        $('#dt1').dataTable();
      } 

  </script>
    
  <script type="text/javascript">
    function metricas()
        {
          var fechaInicio1=document.getElementById("fechaIn1").value;
          var fechaFin1=document.getElementById("fechaFi1").value;
          
          var xmlHttp;
        if (window.XMLHttpRequest)
          {
          xmlHttp=new XMLHttpRequest();
          }
        else
          {
          xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          
          var fetch_unix_timestamp ="";//posibilidad de realizar una actualizacion de tiempo
          fetch_unix_timestamp = function()
            {
            return parseInt(new Date().getTime().toString().substring(0, 10))
            }
          var timestamp = fetch_unix_timestamp();
          
        xmlHttp.onreadystatechange=function(){
            if(xmlHttp.readyState==4){
              document.getElementById("resultados").innerHTML=xmlHttp.responseText;
              //setTimeout('arduino()',1000);//Ejecuta la funcion ventanachat cada 3000ms
            }
            
            }
            xmlHttp.open("GET","metricas.php"+"?fecha1="+fechaInicio1+"&fecha2="+fechaFin1,true);//db.php se encarga de leer los mensajes
          xmlHttp.send(null);
          setTimeout('tabla()', 500);


          $(function () {
    $('#grafico').highcharts({
        title: {
            text: 'Resumen de Metricas',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: Skynet.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Metricas'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Humedad del Ambiente',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'Humedad del Suelo',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Temperatura',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'Luminosidad',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
});




          }





          



  </script>




  </head>
  <body>
  
  	<!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="assets/img/logo30.png" alt=""> BLOCKS Dashboard</a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php"><i class="icon-home icon-white"></i> Home</a></li>
              <?php if($marca==true){?>
              <li><a href="recentValues.php"><i class="icon-th icon-white"></i>Recent Values</a></li>
              <li><a href="customSearch.php"><i class="icon-th icon-white"></i>Custom Search</a></li>
              <li class="active"><a href="summary.php"><i class="icon-th icon-white"></i>Summary</a></li>
        <li><a href="actions.php"><i class="icon-th icon-white"></i>Actions</a></li>
        <?php if($rol==1){?>
              <li><a href="user.php"><i class="icon-user icon-white"></i> User</a></li>
              <?php } ?>
              <li><a href="logout.php"><i class="icon-user icon-white"></i> Logout</a></li>
              <?php }else{ ?>
              <li><a href="login.php"><i class="icon-lock icon-white"></i> Login</a></li>
              <?php } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">

      <!-- CONTENT -->
	<div class="row">
		<div class="col-sm-12 col-lg-12">
    <h4><strong>Resumen</strong></h4>
        Fecha Inicio:<input type="date" name="fechaInicio" id="fechaIn1">&nbsp;&nbsp;&nbsp;
        Fecha Fin:<input type="date" name="fechaInicio" id="fechaFi1">&nbsp;&nbsp;<button onclick="metricas()">Buscar</button><br><br>
        <table class="display">
            <thead>
              <tr>
                <th>Metrica</th>
                <th>Humedad del Ambiente (%)</th>
                <th>Humedad del Suelos (%)</th>
                <th>Temperatura (°C)</th>
                <th>Luminosidad (%)</th>
              </tr>
            </thead>
            <tbody id="resultados">
          </tbody>
           </table><!--/END First Table -->
       <br>
       <!--SECOND Table -->
		</div><!--/span12 -->
      </div><!-- /row -->
     </div> <!-- /container -->
    	<br>	

        <br>
  <!-- FOOTER --> 
  <div id="footerwrap">
        <footer class="clearfix"></footer>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-lg-12">
            <p><img src="assets/img/logo.png" alt=""></p>
            <p>Blocks Dashboard Theme - Crafted With Love - Copyright 2013</p>
            </div>

          </div><!-- /row -->
        </div><!-- /container -->   
	</div><!-- /footerwrap -->


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/admin.js"></script>

  
</body></html>