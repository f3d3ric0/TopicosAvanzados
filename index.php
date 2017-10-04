<?php
session_start();
//print_r($_SESSION);
if(isset($_SESSION['usuario'])){
		$marca=true;
		$rol=$_SESSION['rol'];
		$apeyNom=$_SESSION['apellido'].', '.$_SESSION['nombre'];
		$usuario=$_SESSION['usuario'];
}
else{
	$marca=false;
	$rol="Guest";
	$apeyNom="Guest";
	$usuario="Guest";
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
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/font-style.css" rel="stylesheet">
    <link href="assets/css/flexslider.css" rel="stylesheet">
    
    <link href="highcharts.css" rel="stylesheet">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		
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

<script type="text/javascript">
$(document).ready(function () {

    $("#btn-blog-next").click(function () {
      $('#blogCarousel').carousel('next')
    });
     $("#btn-blog-prev").click(function () {
      $('#blogCarousel').carousel('prev')
    });

     $("#btn-client-next").click(function () {
      $('#clientCarousel').carousel('next')
    });
     $("#btn-client-prev").click(function () {
      $('#clientCarousel').carousel('prev')
    });
    
}

);

 $(window).load(function(){

    $('.flexslider').flexslider({
        animation: "slide",
        slideshow: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
    });  
});

</script>


	<script stype="text/javascript">
			var led="n";
			var val="n";
			var ven="n";

			var dispo="n";
			var acc="0";


			var hsa=0;
			var haa=0;
			var ta=0;
			var la=0;

			function arduino(){
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
							document.getElementById("arduino").innerHTML=xmlHttp.responseText;
							setTimeout('arduino()',1000);//Ejecuta la funcion ventanachat cada 3000ms
						}
						
						}
						xmlHttp.open("GET","cliente.php"+"?t="+timestamp+"&led="+led+"&val="+val+"&ven="+ven,true);//db.php se encarga de leer los mensajes
					xmlHttp.send(null);
			}
			window.onload = function startrefresh(){
					setTimeout('arduino()',1000);
				}


				function accion(){
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
			              //document.getElementById("resultados2").innerHTML=xmlHttp.responseText;
			              //setTimeout('arduino()',1000);//Ejecuta la funcion ventanachat cada 3000ms
			            }
			            
			            }
			            xmlHttp.open("GET","insertarAccion.php"+"?usuario="+<?=$usuario?>+"&dispositivo="+dispo+"&accion="+acc+"&med1="+hsa+"&med2="+haa+"&med3="+ta+"&med4="+la,true);//db.php se encarga de leer los mensajes
			          xmlHttp.send(null);
			          }



	<?php
	 	if($marca==true){
        echo '

	 function encenderLed() {

	 	if(!document.getElementById("ledbtnon").checked){
		document.getElementById("ledbtnon").checked=true;
    	led="1";
    	dispo="luz";
    	acc=1;
    	accion();
		}
    //var encender = document.getElementById("btnEncender");
	//encender.disabled=true;
	//$("ledbtnoff").removeAttribute("checked");
	//document.getElementById("ledbtnon").setAttribute("checked", "false");
	
	//document.getElementById("ledbtnon").checked;
	}

function apagarLed() {

	
	if(!document.getElementById("ledbtnoff").checked){
		document.getElementById("ledbtnoff").checked=true;
    led="0";
    dispo="luz";
    acc=0;
    accion();
	}


    //var apagar = document.getElementById("btnApagar");
    //$("ledbtnon").removeAttribute("checked");
    //document.getElementById("ledbtnoff").setAttribute("checked", "false");
    
    //document.getElementById("ledbtnoff").checked;
 	//apagar.disabled=true;
}

function encenderVal() {

	if(!document.getElementById("valvebtnon").checked){
		document.getElementById("valvebtnon").checked=true;
    val="1";
    dispo="valvula";
    acc=1;
    accion();
	}
}

function apagarVal() {

	if(!document.getElementById("valvebtnoff").checked){
		document.getElementById("valvebtnoff").checked=true;
    val="0";
    dispo="valvula";
    acc=0;
    accion();

	}

	
}	

function encenderVen() {
	if(!document.getElementById("venbtnon").checked){
		document.getElementById("venbtnon").checked=true;
    ven="1";
    dispo="ventilacion";
    acc=1;
    accion();
	}
}

function apagarVen() {
	if(!document.getElementById("venbtnoff").checked){
		document.getElementById("venbtnoff").checked=true;
    ven="0";
    dispo="ventilacion";
    acc=0;
    accion();
	}
}';}?>



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
              <li class="active"><a href="index.php"><i class="icon-home icon-white"></i> Home</a></li>
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
              <li><a href="login.php"><i class="icon-lock icon-white"></i> Login</a></li>
              <?php } ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">

	


	  <!-- FIRST ROW OF BLOCKS -->     
      <div class="row">

      <!-- USER PROFILE BLOCK -->
        <div class="col-sm-6 col-lg-6">
      		<div class="dash-unit">
	      		<dtitle>User Profile</dtitle>
	      		<hr>
				<div class="thumbnail">
					<img src="assets/img/face80x80.jpg" alt="Marcel Newman" class="img-circle">
				</div><!-- /thumbnail -->
				<h1>Skynet</h1>
				<h1><?=$apeyNom?></h1>
				<h3>Corrientes, Argentina</h3>
				<br>
					<div class="info-user">
						<span aria-hidden="true" class="li_user fs1"></span>
						<span aria-hidden="true" class="li_settings fs1"></span>
						<span aria-hidden="true" class="li_mail fs1"></span>
						<span aria-hidden="true" class="li_key fs1"></span>
					</div>
				</div>
        </div>

        
        
        <!-- SWITCHES BLOCK -->     
		<div class="col-sm-3 col-lg-3" id="controles">
			<div class="dash-unit">
	      		<dtitle>Switches</dtitle>
	      		<hr>
	      		<div class="info-user">
					<span aria-hidden="true" class="li_params fs2"></span>
				</div>
				<br>
				<div class="switch" id="hola"> 
					<input type="radio" class="switch-input"  name="view"  value="on" id="ledbtnon">
					<label for="on" class="switch-label switch-label-off" onclick="encenderLed()" id="hola">LED On</label>
					<input type="radio" class="switch-input"  name="view" value="off" id="ledbtnoff">
					<label for="off" class="switch-label switch-label-on"  onclick="apagarLed()">LED Off</label>
					<span class="switch-selection"></span>
				</div>
				<div class="switch switch-blue">
					<input type="radio" class="switch-input" name="view2" value="week2" id="valvebtnon">
					<label for="week2" class="switch-label switch-label-off" onclick="encenderVal()">Valve On</label>
					<input type="radio" class="switch-input" name="view2" value="month2" id="valvebtnoff">
					<label for="month2" class="switch-label switch-label-on" onclick="apagarVal()">Valve Off</label>
					<span class="switch-selection"></span>
				</div>
				
				<div class="switch switch-yellow">
					<input type="radio" class="switch-input" name="view3" value="yes" id="venbtnon">
					<label for="yes" class="switch-label switch-label-off" onclick="encenderVen()">Wind On</label>
					<input type="radio" class="switch-input" name="view3" value="no" id="venbtnoff">
					<label for="no" class="switch-label switch-label-on" onclick="apagarVen()">Wind Off</label>
					<span class="switch-selection"></span>
				</div>
			</div>
		</div>
		




        <div class="col-sm-3 col-lg-3">

      <!-- LOCAL TIME BLOCK -->
      		<div class="half-unit">
	      		<dtitle>Local Time</dtitle>
	      		<hr>
		      		<div class="clockcenter">
			      		<digiclock>12:45:25</digiclock>
		      		</div>
			</div>

      <!-- SERVER UPTIME -->
			<div class="half-unit">
	      		<dtitle>Intel Galileo State</dtitle>
	      		<hr>
	      		<div class="cont">
					<!--<p><img src="assets/img/up.png" alt=""> <bold>Online</bold> | 356ms.</p>-->
					<p><img src="assets/img/up.png" alt="" id="placaimg"> <bold id="placatext">Online</bold> | 356ms.</p>
				</div>
			</div>

        </div>

      </div><!-- /row -->

<!-- SECOND ROW OF BLOCKS -->     
      <div class="row">


      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
		  		<dtitle>Humedad del Suelo</dtitle>
		  		<hr>
	        	<div id="hsuelo"></div>
	        	<!--<h2>50%</h2>-->
			</div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
		  		<dtitle>Humedad del Ambiente</dtitle>
		  		<hr>
	        	<div id="hambiente"></div>
	        	<!--<h2>5%</h2>-->
			</div>
        </div>


        <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
		  		<dtitle>Temperatura</dtitle>
		  		<hr>
	        	<div id="temperatura"></div>
	        	<!--<h2>50º C</h2>-->
			</div>
        </div>

      <!-- DONUT CHART BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
		  		<dtitle>Intensidad de luz</dtitle>
		  		<hr>
	        	<div id="luz"></div>
	        	<!--<h2>5%</h2>-->
			</div>
        </div>
        
        
      </div><!-- /row -->
      
      <!--THIRD ROWS-->
      <div class="row">
      	<div class="col-sm-3 col-lg-3">
      		<div class="half-unit">
	      		<dtitle>Humedad Optima del Suelo</dtitle>
	      		<hr>
	      		<div class="cont">
      			<p><bold id="hos">388</bold></p>
      			<p><img src="assets/img/up-small.png" alt=""> 75 Max. | <img src="assets/img/down-small.png" alt=""> 30 Min.</p>
	      		</div>
      		</div>
      	</div>

      	<div class="col-sm-3 col-lg-3">
      		<div class="half-unit">
	      		<dtitle>Humedad Optima del Ambiente</dtitle>
	      		<hr>
	      		<div class="cont">
      			<p><bold id="hoa">388</bold></p>
      			<p><img src="assets/img/up-small.png" alt=""> 75 Max. | <img src="assets/img/down-small.png" alt=""> 60 Min.</p>
	      		</div>
      		</div>
      	</div>

      	<div class="col-sm-3 col-lg-3">
      		<div class="half-unit">
	      		<dtitle>Temperatura Optima</dtitle>
	      		<hr>
	      		<div class="cont">
      			<p><bold id="to">388</bold></p>
      			<p><img src="assets/img/up-small.png" alt=""> 30 Max. | <img src="assets/img/down-small.png" alt=""> 8 Min.</p>
	      		</div>
      		</div>
      	</div>

      	<div class="col-sm-3 col-lg-3">
      		<div class="half-unit">
	      		<dtitle>Luminosidad Optima</dtitle>
	      		<hr>
	      		<div class="cont">
      			<p><bold id="lo">388</bold></p>
      			<p><img src="assets/img/up-small.png" alt=""> 100 Max. | <img src="assets/img/down-small.png" alt=""> 30 Min.</p>
	      		</div>
      		</div>
      	</div>
      </div>

      
	
 		
        <div id="arduino">
			<script type="text/javascript">arduino();</script>
		</div>

     </div><!-- /container -->		
	<!-- /footerwrap -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/lineandbars.js"></script>
    
	<!--<script type="text/javascript" src="assets/js/dash-charts.js"></script>-->
	<script type="text/javascript" src="assets/js/gauge.js"></script>
	
	<!-- NOTY JAVASCRIPT -->
	<script type="text/javascript" src="assets/js/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/top.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topLeft.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topRight.js"></script>
	<script type="text/javascript" src="assets/js/noty/layouts/topCenter.js"></script>
	
	<!-- You can add more layouts if you want -->
	<script type="text/javascript" src="assets/js/noty/themes/default.js"></script>
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<script src="assets/js/jquery.flexslider.js" type="text/javascript"></script>

    <script type="text/javascript" src="assets/js/admin.js"></script>
  



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
<script type="text/javascript">
	$(function () {

    var gaugeOptions = {

        chart: {
            type: 'solidgauge'
        },

        title: null,

        pane: {
            center: ['50%', '50%'],
            size: '200px',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },

        tooltip: {
            enabled: false
        },

        // the value axis
        yAxis: {
            stops: [
                [0.1, '#55BF3B'], // green
                [0.5, '#DDDF0D'], // yellow
                [0.9, '#DF5353'] // red
            ],
            lineWidth: 0,
            minorTickInterval: null,
            tickAmount: 2,
            title: {
                y: -70
            },
            labels: {
                y: 16
            }
        },

        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    };

    // The hsuelo gauge
    $('#hsuelo').highcharts(Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: 'Humedad del Suelo'
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Speed',
            data: [1],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'silver') + '">{y:.0f}</span>' +
                       '<span style="font-size:25px;color:silver"> %</span></div>'
            },
            tooltip: {
            	 valueSuffix: ' km/h'
            }
        }]

    }));



    // The hambiente gauge
    $('#hambiente').highcharts(Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: 'RPM'
            }
        },

        series: [{
            name: 'RPM',
            data: [1],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'silver') + '">{y:.0f}</span>' +
                       '<span style="font-size:25px;color:silver"> %</span></div>'
            },
            tooltip: {
                valueSuffix: ' revolutions/min'
            }
        }]

    }));


    // The Temperatura gauge
    $('#temperatura').highcharts(Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: 'Temperatura'
            }
        },

        series: [{
            name: 'RPM',
            data: [1],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'silver') + '">{y:.2f}</span>' +
                       '<span style="font-size:25px;color:silver"> °C</span></div>'
            },
            tooltip: {
                valueSuffix: ' revolutions/min'
            }
        }]

    }));

// The Luz gauge
    $('#luz').highcharts(Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: 'Luz'
            }
        },

        series: [{
            name: 'RPM',
            data: [1],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                    ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'silver') + '">{y:.2f}</span>' +
                       '<span style="font-size:25px;color:silver"> %</span></div>'
            },
            tooltip: {
                valueSuffix: ' revolutions/min'
            }
        }]

    }));



    // Bring life to the dials
    setInterval(function () {
        // Humedad Suelo
        var chart = $('#hsuelo').highcharts(),
            point,
            newVal,
            inc,inc2;

        if (chart) {
            point = chart.series[0].points[0];
            //inc = Math.round((Math.random() - 0.5) * 100);
            inc =document.getElementById("hs").value -1;
            point.y=1;
            newVal=point.y + inc;
          	point.update(newVal);

          	document.getElementById("hos").innerHTML= newVal +" %";//Valor actual del cuadro de humedad optima, no corresponde al grafico 
          	hsa=newVal;
        }

        // Humedad ambiente
        chart = $('#hambiente').highcharts();
        if (chart) {
            point = chart.series[0].points[0];
            inc = document.getElementById("ha").value -1;
            point.y=1;
            newVal = point.y + inc;
	        point.update(newVal);

	        document.getElementById("hoa").innerHTML= newVal +" %";
	        haa=newVal;
        }

 //Temperatura
        chart = $('#temperatura').highcharts();
        if (chart) {
            point = chart.series[0].points[0];
            inc = document.getElementById("tem").value -1;
            point.y=1;
            newVal = point.y + inc;
	        point.update(newVal);

	        document.getElementById("to").innerHTML= newVal +" °C";
	        ta=newVal;
        }


        //Luminosidad
        chart = $('#luz').highcharts();
        if (chart) {
            point = chart.series[0].points[0];
            inc = document.getElementById("lz").value -1;
            point.y=1;
            newVal = point.y + inc;
	        point.update(newVal);


	        document.getElementById("lo").innerHTML= newVal +" %";
	        la=newVal;
        }

        if((document.getElementById("placa").value)=="On"){
			document.getElementById("placaimg").src="assets/img/up.png";
			document.getElementById("placatext").innerHTML="Online";
	}else{
		document.getElementById("placaimg").src="assets/img/down.png";
		document.getElementById("placatext").innerHTML="Offline";
		}

		

    }, 2000);


});


</script>
<!--Control de los botones-->
<script type="text/javascript">

/*
	setInterval(function () {
	if((document.getElementById("led2").value)=="ON"){
		//document.getElementById("ledbtnon").setAttribute("checked", "false");
		//document.getElementById("ledbtnoff").setAttribute("checked", "true");
		//document.getElementById("ledbtnoff").checked=true;
		document.getElementById("ledbtnon").checked=true;
	}else{
		//document.getElementById("ledbtnoff").setAttribute("checked", "false");
		document.getElementById("ledbtnoff").checked=true;
		//document.getElementById("ledbtnoff").setAttribute("checked", "false");
	}
}, 1000);
*/





function cargar(){

	//Establecer el estado de los botones en funcion del estado de los leds
  if((document.getElementById("led2").value)=="ON"){
		//document.getElementById("ledbtnon").setAttribute("checked", "false");
		//document.getElementById("ledbtnoff").setAttribute("checked", "true");
		//document.getElementById("ledbtnoff").checked=true;
		document.getElementById("ledbtnon").checked=true;
	}else{
		//document.getElementById("ledbtnoff").setAttribute("checked", "false");
		document.getElementById("ledbtnoff").checked=true;
		//document.getElementById("ledbtnoff").setAttribute("checked", "false");
	} 

	//Establecer el estado de los botones en funcion del estado de las valvulas
  if((document.getElementById("valve").value)=="ON"){
		//document.getElementById("ledbtnon").setAttribute("checked", "false");
		//document.getElementById("ledbtnoff").setAttribute("checked", "true");
		//document.getElementById("ledbtnoff").checked=true;
		document.getElementById("valvebtnon").checked=true;
	}else{
		//document.getElementById("ledbtnoff").setAttribute("checked", "false");
		document.getElementById("valvebtnoff").checked=true;
		//document.getElementById("ledbtnoff").setAttribute("checked", "false");
	} 

	//Establecer el estado de los botones en funcion del estado de las valvulas
  if((document.getElementById("vent").value)=="ON"){
		//document.getElementById("ledbtnon").setAttribute("checked", "false");
		//document.getElementById("ledbtnoff").setAttribute("checked", "true");
		//document.getElementById("ledbtnoff").checked=true;
		document.getElementById("venbtnon").checked=true;
	}else{
		//document.getElementById("ledbtnoff").setAttribute("checked", "false");
		document.getElementById("venbtnoff").checked=true;
		//document.getElementById("ledbtnoff").setAttribute("checked", "false");
	} 


}
setTimeout('cargar()', 1500);
	
</script>





</body></html>