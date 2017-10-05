<?php
session_start();
//print_r($_SESSION);
if(isset($_SESSION['usuario'])){
    $marca=true;
    $rol=$_SESSION['rol'];
    $apeyNom=$_SESSION['apellido'].', '.$_SESSION['nombre'];
}//si no es usuario que ingrese como guesped
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
        $(document).ready(function(){
        
        setTimeout('tabla()', 100);
       });

        
        
    
      
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
              <li><a href="summary.php"><i class="icon-th icon-white"></i>Summary</a></li>
        <li class="active"><a href="actions.php"><i class="icon-th icon-white"></i>Actions</a></li>
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
		<h4><strong>Acciones</strong></h4>

		<table class="display" id="dt1">
        <thead>
          <tr>
           <th style="display:none;">ID</th>
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Dispositivo/Accion</th>
            <th>H Suelon %</th>
            <th>H Ambiente %</th>
            <th>Temperatura °C</th>
            <th>Luminosidad %</th>
          </tr>
        </thead>
        <tbody>
        <?php include ("acciones.php");?>
        </tbody>
      </table><!--/END SECOND TABLE -->
	
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