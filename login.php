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
<?php
include ("conectar.php");

if(!(isset($_REQUEST['username']))){
$usuario="";
$pass="";
}else{

$usuario=$_REQUEST['username'];
$pass=$_REQUEST['password'];

$result = $conn->query("SELECT * FROM usuarios WHERE usuario='$usuario' AND pass='$pass'")
	or die ("Consulta Fallida");
	$numReg= mysqli_num_rows($result);
	if($numReg>0){
		$fila=mysqli_fetch_array($result);
		session_start();
        $_SESSION['usuario'] = $fila['id_usuario'];
		$_SESSION['rol'] = $fila['id_rol'];
		$_SESSION['nombre'] = $fila['nombre'];
		$_SESSION['apellido'] = $fila['apellido'];
        header('location: index.php?');
}
}
?>




<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>BLOCKS - Bootstrap Dashboard Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Carlos Alvarez - Alvarez.is">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/login.css" rel="stylesheet">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

    <style type="text/css">
      body {
        padding-top: 30px;
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

  	<!-- Jquery Validate Script -->
    <script type="text/javascript" src="assets/js/jquery.validate.js"></script>

  	<!-- Jquery Validate Script - Validation Fields -->
		<script type="text/javascript">
		
		
		$().ready(function() {
			// validate the comment form when it is submitted
			$("#commentForm").validate();
		
			// validate signup form on keyup and submit
			$("#signupForm").validate({
				rules: {
					firstname: "required",
					lastname: "required",
					username: {
						required: true,
						minlength: 1
					},
					password: {
						required: true,
						minlength: 1
					},
					confirm_password: {
						required: true,
						minlength: 2,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					topic: {
						required: "#newsletter:checked",
						minlength: 2
					},
					agree: "required"
				},
				messages: {
					firstname: "Please enter your firstname",
					lastname: "Please enter your lastname",
					username: {
						required: "Please provide a username",
						minlength: "Your username must consist of at least 1 character"
					},
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 1 character long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					agree: "Please accept our policy"
				}
			});
		
			// propose username by combining first- and lastname
			$("#username").focus(function() {
				var firstname = $("#firstname").val();
				var lastname = $("#lastname").val();
				if(firstname && lastname && !this.value) {
					this.value = firstname + "." + lastname;
				}
			});
		
			//code to hide topic selection, disable for demo
			var newsletter = $("#newsletter");
			// newsletter topics are optional, hide at first
			var inital = newsletter.is(":checked");
			var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
			var topicInputs = topics.find("input").attr("disabled", !inital);
			// show when newsletter is checked
			newsletter.click(function() {
				topics[this.checked ? "removeClass" : "addClass"]("gray");
				topicInputs.attr("disabled", !this.checked);
			});
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
			  <li><a href="actions.php"><i class="icon-th icon-white"></i>Actions</a></li>
			  <?php if($rol==1){?>
              <li><a href="user.php"><i class="icon-user icon-white"></i> User</a></li>
              <?php } ?>
              <li><a href="logout.php"><i class="icon-user icon-white"></i> Logout</a></li>
              <?php }else{ ?>
              <li class="active"><a href="login.php"><i class="icon-lock icon-white"></i> Login</a></li>
              <?php } ?>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">
        <div class="row">
   		<div class="col-lg-offset-4 col-lg-4" style="margin-top:100px">
   			<div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
   				<img src="assets/img/face80x80.jpg" alt="" class="img-circle">
   				<br>
   				<br>
					<form class="cmxform" id="signupForm" method="get" action="">
						<fieldset>
							<p>
								<input id="username" name="username" type="text" placeholder="Username">
								<input id="password" name="password" type="password" placeholder="Password">
							</p>
								<input class="submit btn-success btn btn-large" type="submit" value="Login">
						</fieldset>
					</form>
   			</div>

   		</div>


        </div>
    </div>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    
  
</body></html>