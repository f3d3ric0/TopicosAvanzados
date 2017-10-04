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
    <link href="assets/css/font-style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/register.css">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

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

  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
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
        <li><a href="actions.php"><i class="icon-th icon-white"></i>Actions</a></li>
        <?php if($rol==1){?>
              <li class="active"><a href="user.php"><i class="icon-user icon-white"></i> User</a></li>
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
        <div class="row">

        	<div class="col-lg-6">
        		
        		<div class="register-info-wraper">
        			<div id="register-info">
        				<div class="cont2">
        					<div class="thumbnail">
								<img src="assets/img/face.jpg" alt="Marcel Newman" class="img-circle">
							</div><!-- /thumbnail -->
							<h2>Marcel Newman</h2>
        				</div>
        				<div class="row">
        					<div class="col-lg-3">
        						<div class="cont3">
        							<p><ok>Username:</ok> BASICOH</p>
        							<p><ok>Mail:</ok> hola@basicoh.com</p>
        							<p><ok>Location:</ok> Madrid, Spain</p>
        							<p><ok>Address:</ok> Blahblah Ave. 879</p>
        						</div>
        					</div>
        					<div class="col-lg-3">
        						<div class="cont3">
        						<p><ok>Registered:</ok> April 9, 2010</p>
        						<p><ok>Last Login:</ok> January 29, 2013</p>
        						<p><ok>Phone:</ok> +34 619 663553</p>
        						<p><ok>Mobile</ok> +34 603 093384</p>
        						</div>
        					</div>
        				</div><!-- /inner row -->
						<hr>
						<div class="cont2">
							<h2>Choose Your Option</h2>
						</div>
						<br>
							<div class="info-user2">
								<span aria-hidden="true" class="li_user fs1"></span>
								<span aria-hidden="true" class="li_settings fs1"></span>
								<span aria-hidden="true" class="li_mail fs1"></span>
								<span aria-hidden="true" class="li_key fs1"></span>
								<span aria-hidden="true" class="li_lock fs1"></span>
								<span aria-hidden="true" class="li_pen fs1"></span>
							</div>

        				
        			</div>
        		</div>

        	</div>

        	<div class="col-sm-6 col-lg-6">
        		<div id="register-wraper">
        		    <form id="register-form" class="form">
        		        <legend>User Register</legend>
        		    
        		        <div class="body">
        		        	<!-- first name -->
    		        		<label for="name">First name</label>
    		        		<input name="name" class="input-huge" type="text">
        		        	<!-- last name -->
    		        		<label for="surname">Last name</label>
    		        		<input name="surname" class="input-huge" type="text">
        		        	<!-- username -->
        		        	<label>Username</label>
        		        	<input class="input-huge" type="text">
        		        	<!-- email -->
        		        	<label>E-mail</label>
        		        	<input class="input-huge" type="text">
        		        	<!-- password -->
        		        	<label>Password</label>
        		        	<input class="input-huge" type="text">

        		        </div>
        		    
        		        <div class="footer">
        		            <label class="checkbox inline">
        		                <input type="checkbox" id="inlineCheckbox1" value="option1"> I agree with the terms &amp; conditions
        		            </label>
        		            <button type="submit" class="btn btn-success">Register</button>
        		        </div>
        		    </form>
        		</div>
        	</div>

        </div>
    </div>

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
    <script src="assets/js/bootstrap.js"></script>

  
</body></html>