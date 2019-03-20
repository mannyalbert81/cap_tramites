<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Turnos - Capremci</title>

           <link rel="stylesheet" href="view/css/estilos.css">

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
				
			
			<!-- Datatables -->
		    <link href="view/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		    <link href="view/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
		    <link href="view/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
		    <link href="view/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
		    <link href="view/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
					
	
        	        
    </head>
    
    
    <body class="nav-md"  >
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
           
    <div class="container">

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Generación de Turnos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

            <form  action="<?php echo $helper->url("Turnos","InsertaTurnos"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12 col-md-12 col-xs-12">
                               
             <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Datos Participe</h4>
	         </div>
	         <div class="panel-body">
                               
                              <div class="col-lg-2 col-xs-12 col-md-2">
                    		  <div class="form-group">
                                                  <label for="cedula_afiliado" class="control-label">Cedula:</label>
                                                  <input type="hidden" class="form-control" id="id_afiliado" name="id_afiliado" value="0" >
                                                  <input type="number" class="form-control" id="cedula_afiliado" name="cedula_afiliado" value=""  placeholder="cedula..">
                                                  <div id="mensaje_cedula_afiliado" class="errores"></div>
                              </div>
                              </div>
                                 
                                    
                               <div class="col-lg-2 col-xs-12 col-md-2">
                    		   <div class="form-group">
                                                  <label for="apellidos_afiliado" class="control-label">Apellidos:</label>
                                                  <input type="text" class="form-control" id="apellidos_afiliado" name="apellidos_afiliado" value=""  placeholder="apellidos.." readonly>
                                                  <div id="mensaje_apellidos_afiliado" class="errores"></div>
                                </div>
                                </div>
                                
                               <div class="col-lg-2 col-xs-12 col-md-2">
                    		   <div class="form-group">
                                                  <label for="nombres_afiliado" class="control-label">Nombres:</label>
                                                  <input type="text" class="form-control" id="nombres_afiliado" name="nombres_afiliado" value=""  placeholder="nombres.." readonly>
                                                  <div id="mensaje_nombres_afiliado" class="errores"></div>
                                </div>
                                </div>
                                
                                <div class="col-lg-3 col-xs-12 col-md-3">
                    		    <div class="form-group">
                                                  <label for="entidad_patronal_afiliado" class="control-label">Entidad Patronal:</label>
                                                  <input type="text" class="form-control" id="entidad_patronal_afiliado" name="entidad_patronal_afiliado" value=""  placeholder="entidad patronal.." readonly>
                                                  <div id="mensaje_entidad_patronal_afiliado" class="errores"></div>
                                </div>
                                </div>
                                
                                <div class="col-lg-3 col-xs-12 col-md-3">
                    		    <div class="form-group">
                                                  <label for="estado_afiliado" class="control-label">Estado:</label>
                                                  <input type="text" class="form-control" id="estado_afiliado" name="estado_afiliado" value=""  placeholder="estado.." readonly>
                                                  <div id="mensaje_estado_afiliado" class="errores"></div>
                                </div>
                                </div>
                                
                 </div>
                 </div>               
                                
                 
             <div class="panel panel-info">
	         <div class="panel-heading">
	         <h4><i class='glyphicon glyphicon-edit'></i> Asignación Departamento</h4>
	         </div>
	         <div class="panel-body">
                               
                                <div class="col-lg-2 col-xs-12 col-md-2">
                    		    <div class="form-group">
                                                          <label for="id_departamentos" class="control-label">Departamentos:</label>
                                                          <select name="id_departamentos" id="id_departamentos"  class="form-control" >
                                                          <option value="0" selected="selected">--Seleccione--</option>
                        									<?php foreach($resultDepa as $res) {?>
                        										<option value="<?php echo $res->id_departamentos; ?>"><?php echo $res->nombre_departamentos; ?> </option>
                        							        <?php } ?>
                        								   </select> 
                                                          <div id="mensaje_id_departamentos" class="errores"></div>
                                </div>
                    		    </div>
                                
                                
                                <div class="col-lg-2 col-xs-12 col-md-2">
                    		    <div class="form-group">
                                                          <label for="id_tramites_departamentos" class="control-label">Trámite a Realizar:</label>
                                                          <select name="id_tramites_departamentos" id="id_tramites_departamentos"  class="form-control" >
                                                          <option value="0" selected="selected">--Seleccione--</option>
                        								  </select> 
                                                          <div id="mensaje_id_tramites_departamentos" class="errores"></div>
                                </div>
                    		    </div>
                    		    
                    		    <div class="col-lg-2 col-xs-12 col-md-2">
                    		    <div class="form-group">
                                                          <label for="id_empleados" class="control-label">Funcionario:</label>
                                                          <select name="id_empleados" id="id_empleados"  class="form-control" >
                                                          <option value="0" selected="selected">--Seleccione--</option>
                        								  </select> 
                                                          <div id="mensaje_id_empleados" class="errores"></div>
                                </div>
                    		    </div>
                    		    
                    		    <div class="col-lg-2 col-xs-12 col-md-2">
                    		    <div class="form-group">
                                                  <label for="numero_turnos_tramites" class="control-label">Número Turno:</label>
                                                  <input type="text" class="form-control" id="numero_turnos_tramites" name="numero_turnos_tramites" value=""  placeholder="número turno.." >
                                                  <div id="mensaje_numero_turnos_tramites" class="errores"></div>
                                </div>
                                </div>
                    		    
                                
              </div>
              </div>                       
                   	 
                   	 
                   	 
                   	            <div class="row">
                    		    <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center; margin-top:20px">
                    		    <div class="form-group">
                                                      <button type="submit" id="Guardar" name="Guardar" class="btn btn-success"><i class="glyphicon glyphicon-floppy-saved"> Generar</i></button>
                                					  <button type="button" id="Cancelar" name="Cancelar" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-remove"> Cancelar</i></button>
                                
                                </div>
                    		    </div>
                    		    </div>     
                  
              </form>
  			
                  </div>
                </div>
              </div>
		
    		
    		
     
     
		
    
    
    
     </div>
    </div></div></div>
        <!-- jQuery -->
    <script src="view/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="view/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="view/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="view/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="view/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="view/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="view/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="view/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="view/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="view/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="view/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="view/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="view/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="view/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="view/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="view/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="view/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="view/vendors/jszip/dist/jszip.min.js"></script>
    <script src="view/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="view/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="view/js/table-sorter/jquery.tablesorter.min.js" >  </script>
    
    
    <!-- Custom Theme Scripts -->
    <script src="view/build/js/custom.min.js"></script>   
    
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
   <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
 
     <script>
       $("#id_departamentos").click(function() {
    		
     	  var id_departamentos = $(this).val();
    			
           if(id_departamentos > 0 )
           {
        	   load_turno(id_departamentos);
        	  
        	   
           }
        	  else
           {
        		  $("#numero_turnos_tramites").val("");
           }
          
    	    });
    	    
    	    $("#id_departamentos").change(function() {
    			  
               var id_departamentos = $(this).val();
    				
               if(id_departamentos > 0)
               {
            	   load_turno(id_departamentos);
    	       	  
               }
               else
               {
            	   $("#numero_turnos_tramites").val("");
               }
               
         });


	       function load_turno(id_departamentos){
		     
	    	   $.ajax({
	                    url: 'index.php?controller=Turnos&action=consulta_turno',
	                    type: 'POST',
	                    data: {action:'ajax', id_departamentos:id_departamentos},
	                    success: function(x){
	                      $("#numero_turnos_tramites").val(x);
	                      
	                    }
	             });
	        }
		    

		
   </script>
   
		 
		 
		 
     <script>
		$(document).ready(function(){
             $("#id_departamentos").change(function(){

				
	            // obtenemos el combo de resultado combo 2
	           var $id_tramites_departamentos = $("#id_tramites_departamentos");
	       	

	            // lo vaciamos
	           var id_departamentos = $(this).val();

	          
	          
	            if(id_departamentos != 0)
	            {
	            	 $id_tramites_departamentos.empty();
	            	
	            	 var datos = {
	                   	   
	            			 id_departamentos:$(this).val()
	                  };
	             
	            	
	         	   $.post("<?php echo $helper->url("Turnos","devuelveTramites"); ?>", datos, function(resultado) {

	          		  if(resultado.length==0)
	          		   {
	          				$id_tramites_departamentos.append("<option value='0' >--Seleccione--</option>");	
	             	   }else{
	             		    $id_tramites_departamentos.append("<option value='0' >--Seleccione--</option>");
	          		 		$.each(resultado, function(index, value) {
	          		 			$id_tramites_departamentos.append("<option value= " +value.id_tramites_departamentos +" >" + value.nombre_tramites_departamentos  + "</option>");	
	                     		 });
	             	   }	
	            	      
	         		  }, 'json');


	            }else{

	            	var id_tramites_departamentos=$("#id_tramites_departamentos");
	            	id_tramites_departamentos.find('option').remove().end().append("<option value='0' >--Seleccione--</option>").val('0');
	            	
	            	
	            }
	            

			});
		});
	
	</script>
		    
		    
		    
		    
 <script>
		$(document).ready(function(){
             $("#id_departamentos").change(function(){

				
	            // obtenemos el combo de resultado combo 2
	           var $id_empleados = $("#id_empleados");
	       	

	            // lo vaciamos
	           var id_departamentos = $(this).val();

	          
	          
	            if(id_departamentos != 0)
	            {


		            
	            	 $id_empleados.empty();
	            	
	            	 var datos = {
	                   	   
	            			 id_departamentos:$(this).val()
	                  };
	             
	            	
	         	   $.post("<?php echo $helper->url("Turnos","devuelveEmpleados"); ?>", datos, function(resultado) {

	          		  if(resultado.length==0)
	          		   {
	          				$id_empleados.append("<option value='0' >--Seleccione--</option>");	
	             	   }else{
	             		    $id_empleados.append("<option value='0' >--Seleccione--</option>");
	          		 		$.each(resultado, function(index, value) {
	          		 			$id_empleados.append("<option value= " +value.id_empleados +" >" + value.apellidos_empleados+' '+ value.nombres_empleados + "</option>");	
	                     		 });
	             	   }	
	            	      
	         		  }, 'json');


	            }else{

	            	var id_empleados=$("#id_empleados");
	            	id_empleados.find('option').remove().end().append("<option value='0' >--Seleccione--</option>").val('0');
	            	
	            	
	            }
	            

			});
		});
	
	</script>
			
        
        
        
        
         <script >
		    // cada vez que se cambia el valor del combo
		    $(document).ready(function(){
    		    $("#Cancelar").click(function() 
    			{
    		    	$('#id_afiliado').val("0");
    				$('#cedula_afiliado').val("");
    				$('#nombres_afiliado').val("");
    				$('#apellidos_afiliado').val("");
    				$('#entidad_patronal_afiliado').val("");
    				$('#estado_afiliado').val("");
    				$('#id_departamentos').val("0");
    				$('#id_tramites_departamentos').val("");
    				$('#id_empleados').val("0");
    				$('#numero_turnos_tramites').val("");
		     
		    	}); 
		    }); 
			</script>
        
        
          
        <script>
        	$(document).ready(function(){

                        var id_afiliado = $("#id_afiliado").val();

                        if(id_afiliado>0){}else{
        	       		
						$( "#cedula_afiliado" ).autocomplete({
		      				source: "<?php echo $helper->url("Turnos","AutocompleteCedula"); ?>",
		      				minLength: 5
		    			});
		
						$("#cedula_afiliado").focusout(function(){
		    				$.ajax({
		    					url:'<?php echo $helper->url("Turnos","AutocompleteDevuelveNombres"); ?>',
		    					type:'POST',
		    					dataType:'json',
		    					data:{cedula_afiliado:$('#cedula_afiliado').val()}
		    				}).done(function(respuesta){

		    				    $('#id_afiliado').val(respuesta.id_afiliado);
		    					$('#cedula_afiliado').val(respuesta.cedula_afiliado);
		    					$('#nombres_afiliado').val(respuesta.nombres_afiliado);
		    					$('#apellidos_afiliado').val(respuesta.apellidos_afiliado);

		    					$('#entidad_patronal_afiliado').val(respuesta.entidad_patronal_afiliado);
		    					$('#estado_afiliado').val(respuesta.estado_afiliado);
		    			
		        			}).fail(function(respuesta) {
		        				
		        				$('#id_afiliado').val("0");
		        				$('#cedula_afiliado').val("");
		        				$('#nombres_afiliado').val("");
		        				$('#apellidos_afiliado').val("");
		        				$('#entidad_patronal_afiliado').val("");
		        				$('#estado_afiliado').val("");
   
		        			  });
		    				
		    			});  
                      }
						
		    		});
		     </script>
        
         
        <script >
		    // cada vez que se cambia el valor del combo
		    $(document).ready(function(){
		    
		    $("#Guardar").click(function() 
			{


				
		    	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
		    	var validaFecha = /([0-9]{4})\-([0-9]{2})\-([0-9]{2})/;

		    	var id_afiliado  =  $('#id_afiliado').val();
		    	var id_empleados = $("#id_empleados").val();
		    	var id_departamentos  =  $('#id_departamentos').val();
		    	var id_tramites_departamentos  =  $('#id_tramites_departamentos').val();
		    	var numero_turnos_tramites  =  $('#numero_turnos_tramites').val();
		    	
		    	var contador=0;
		    	var tiempo = tiempo || 1000;


		    	

		    	if (id_afiliado == 0 )
		    	{
			    	
		    		$("#mensaje_cedula_afiliado").text("Ingrese Cedula");
		    		$("#mensaje_cedula_afiliado").fadeIn("slow"); //Muestra mensaje de error
		    		$("html, body").animate({ scrollTop: $(mensaje_cedula_afiliado).offset().top-120 }, tiempo);
					
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_cedula_afiliado").fadeOut("slow"); //Muestra mensaje de error
		            
				}


		    	if (id_departamentos == 0 )
		    	{
			    	
		    		$("#mensaje_id_departamentos").text("Seleccione Departamento");
		    		$("#mensaje_id_departamentos").fadeIn("slow"); //Muestra mensaje de error
		    		$("html, body").animate({ scrollTop: $(mensaje_id_departamentos).offset().top-120 }, tiempo);
					
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_id_departamentos").fadeOut("slow"); //Muestra mensaje de error
		            
				}


		    	if (id_tramites_departamentos == 0 )
		    	{
			    	
		    		$("#mensaje_id_tramites_departamentos").text("Seleccione Trámite");
		    		$("#mensaje_id_tramites_departamentos").fadeIn("slow"); //Muestra mensaje de error
		    		$("html, body").animate({ scrollTop: $(mensaje_id_tramites_departamentos).offset().top-120 }, tiempo);
					
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_id_tramites_departamentos").fadeOut("slow"); //Muestra mensaje de error
		            
				}



		    	if (id_empleados == 0 )
		    	{
			    	
		    		$("#mensaje_id_empleados").text("Seleccione Empleado");
		    		$("#mensaje_id_empleados").fadeIn("slow"); //Muestra mensaje de error
		    		$("html, body").animate({ scrollTop: $(mensaje_id_empleados).offset().top-120 }, tiempo);
					
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_id_empleados").fadeOut("slow"); //Muestra mensaje de error
		            
				}



		    
		    	
		    	if (numero_turnos_tramites == "" )
		    	{
			    	
		    		$("#mensaje_numero_turnos_tramites").text("Ingrese Número");
		    		$("#mensaje_numero_turnos_tramites").fadeIn("slow"); //Muestra mensaje de error
		    		$("html, body").animate({ scrollTop: $(mensaje_numero_turnos_tramites).offset().top-120 }, tiempo);
					
		            return false;
			    }
		    	else 
		    	{
		    		$("#mensaje_numero_turnos_tramites").fadeOut("slow"); //Muestra mensaje de error
		            
				}

			    

			}); 

		    

		        $( "#cedula_afiliado" ).focus(function() {
				  $("#mensaje_cedula_afiliado").fadeOut("slow");
			    });
		        $( "#id_empleados" ).focus(function() {
					  $("#mensaje_id_empleados").fadeOut("slow");
				 });
		        $( "#id_departamentos" ).focus(function() {
					  $("#mensaje_id_departamentos").fadeOut("slow");
				 });
		        $( "#id_tramites_departamentos" ).focus(function() {
					  $("#mensaje_id_tramites_departamentos").fadeOut("slow");
				 });
		       
		        $( "#numero_turnos_tramites" ).focus(function() {
					  $("#mensaje_numero_turnos_tramites").fadeOut("slow");
				 });  

		}); 

	</script>
        
      
   
	
  </body>
</html>   