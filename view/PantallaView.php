<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Turnos Capremci</title>

    <!-- Bootstrap -->
    <link href="view/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="view/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="view/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="view/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="view/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="view/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="view/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="view/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md" onload="tabla_turnos();" >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col  menu_fixed">
          <div class="left_col scroll-view">
            <?php include("view/modulos/logo.php"); ?>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
			<?php include("view/modulos/menu_profile.php"); ?>
            <!-- /menu profile quick info -->

            <br />
			<?php include("view/modulos/menu.php"); ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
			<?php include("view/modulos/head.php"); ?>	
        <!-- /top navigation -->

        	<!-- page content -->
        	<div class="right_col" role="main">
          	<!-- top tiles -->
          		<div class="row">
			  		<div class="col-xs-12 col-sm-8 col-lg-8">
			  		
			  			<iframe id="reproducir_video" width="100%" height="400px"></iframe>
			  			
			  		</div>
			  		
			  		
			  		<div class="col-xs-12 col-sm-4 col-lg-4">
						
	
						<div class="panel-group">
						  <div class="panel panel-primary ">
						      <div class="panel-heading " style="text-align: center;"> <h1><b>TURNOS EN ESPERA</b></h1></div>
						      <div class="panel-body" id="tabla_turnos">
									
									 <div id="tabla_turnos">
									 </div>
									
									
						      </div>
						    </div>
						</div>
					</div>
				</div>
        	</div>

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
      
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="view/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="view/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="view/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="view/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="view/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="view/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="view/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="view/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="view/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="view/vendors/Flot/jquery.flot.js"></script>
    <script src="view/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="view/vendors/Flot/jquery.flot.time.js"></script>
    <script src="view/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="view/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="view/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="view/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="view/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="view/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="view/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="view/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="view/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="view/vendors/moment/min/moment.min.js"></script>
    <script src="view/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="view/build/js/custom.min.js"></script>
	
	<!-- codigo de las funciones -->
	<script src="view/js/funciones.js?1.0"></script> 
	
	<script type="text/javascript">
	
	  $(document).ready( function (){

		  	video();
		  
			});


		
	function video(){

			    imgficha = 'view/videos/INFORME DE GESTION-2018.mp4';

		        $("#reproducir_video").attr({'src':imgficha});
	}
	
	setInterval(video, 40000);
	
	</script>
  </body>
</html>
