<!DOCTYPE HTML>
<html lang="es">
      <head>
        <meta charset="utf-8"/>
        <title>Usuarios - aDocument 2015</title>

		
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
					

		  <script src="view/css/bootstrapValidator.min.js"></script>
		  <script src="view/css/ValidarUsuarios.js"></script>
       
		  
		  
		  
		  
		  <script>
        
               $(document).ready(function(){
        
        		    // cada vez que se cambia el valor del combo
        		    $("#id_controladores").change(function() {
        
                       // obtenemos el combo de subcategorias
                        var $id_acciones = $("#id_acciones");
                       // lo vaciamos
                       
        				///obtengo el id seleccionado
        				
        
                       var id_controladores = $(this).val();
        
        
                       $id_acciones.empty();
        
                       $id_acciones.append("<option value= " +"0" +" > --TODOS--</option>");
                   
                       if(id_controladores > 0)
                       {
                    	   var datos = {
                    			   id_controladores : $(this).val()
                           };
        
        
                    	   $.post("<?php echo $helper->url("PermisosRoles","devuelveAcciones"); ?>", datos, function(resultAcc) {
        
                    		 		$.each(resultAcc, function(index, value) {
                       		 	    $id_acciones.append("<option value= " +value.id_acciones +" >" + value.nombre_acciones  + "</option>");	
                               		 });
        
                    		 		 	 		   
                    		  }, 'json');
        
        
                       }
                       else
                       {
                    	   $.post("<?php echo $helper->url("PermisosRoles","devuelveAllAcciones"); ?>", datos, function(resultAcc) {
        
           		 		        $.each(resultAcc, function(index, value) {
                  		 	    $id_acciones.append("<option value= " +value.id_acciones +" >" + value.nombre_acciones  + "</option>");	
                        	  });
             		  		}, 'json');
        
                       }
                       
        		    });
            
        		}); 
        
        	</script>
        		
        	<script>
        
        		$(document).ready(function(){
        
        			$("#id_acciones").change(function() {
        
        	               // obtenemos el combo de categorias
        	                var $id_controladores = $("#id_controladores");
        	               
        					///obtengo el id seleccionado
        					var id_acciones = $(this).val();
        
        	               if(id_acciones > 0)
        
        	               {
        	            	   var datos = {
        	            			   id_acciones : $(this).val()
        	                   };
        
        
        	            	   //$categorias.append("<option value= " +"0" +" >"+ id_subcategorias  +"</option>");
        	                   $.post("<?php echo $helper->url("PermisosRoles","devuelveSubByAcciones"); ?>", datos, function(resultAcc) {
        	            		   
                 		 		  $.each(resultAcc, function(index, value) {
                 		 			$('#id_controladores').val( value.id_controladores );//To select Blue	 
         								
        							 });
        
                 		 		 	 		   
                 		  		}, 'json');
        	                   
        	               }
        	               else
        	               {
        
        	          		 $('#controladres').val( 0 );//To select Blue
        
        			        }
        	               
        	               
        			    });
        		}); 
        
        	</script>
        		  		        
			        
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
            <?php
       $sel_menu = "";
       
    
       if($_SERVER['REQUEST_METHOD']=='POST' )
       {
       	 
       	 
       	$sel_menu=$_POST['criterio'];
       	
       	 
       }
      
	 	?>
    <div class="container">
  
  	<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>INSERTAR<small>Permisos Roles</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
			
            <form id="form-usuarios" action="<?php echo $helper->url("PermisosRoles","InsertaPermisosRoles"); ?>" method="post" enctype="multipart/form-data"  class="col-lg-12 col-md-12 col-xs-12">
                                <?php if ($resultEdit !="" ) { foreach($resultEdit as $resEdit) {?>
                                
                                <div class="row">
                        		    <div class="col-xs-6 col-md-2 col-md-2 ">
                        		    <div class="form-group">
                                                          <label for="nombre_permisos_rol" class="control-label">Nombres Permiso Rol</label>
                                                          <input type="text" class="form-control" id="nombre_permisos_rol" name="nombre_permisos_rol" value="<?php echo $resEdit->nombre_permisos_rol; ?>"  placeholder="Nombres">
                                                          <span class="help-block"></span>
                                    </div>
                        		    </div>
                        		    
                        		    <div class="col-xs-6 col-md-2 col-md-2">
                        		    <div class="form-group">
                                                          <label for="id_rol" class="control-label">Rol</label>
                                                          <select name="id_rol" id="id_rol"  class="form-control">
																<?php foreach($resultRol as $resRol) {?>
				 												<option value="<?php echo $resRol->id_rol; ?>" <?php if ($resRol->id_rol == $resEdit->id_rol )  echo  ' selected="selected" '  ;  ?> ><?php echo $resRol->nombre_rol; ?> </option>
													            <?php } ?>
								    					  </select>
		   		   										  <span class="help-block"></span>
                                    </div>
                                    </div>
                        			
                        			
                        			<div class="col-xs-6 col-md-2 col-md-2">
                        		    <div class="form-group">
                                                          <label for="id_controladores" class="control-label">Controladores</label>
                                                          <select name="id_controladores" id="id_controladores"  class="form-control">
                        									<?php foreach($resultCon as $resCon) {?>
                        				 						<option value="<?php echo $resCon->id_controladores; ?>" <?php if ($resCon->id_controladores == $resEdit->id_controladores )  echo  ' selected="selected" '  ;  ?> ><?php echo $resCon->nombre_controladores; ?> </option>
                        						            <?php } ?>
                        								    	
                        									</select>
                                                          <span class="help-block"></span>
                                    </div>
                        		    </div>
                        		    
                        			
                        	    	<div class="col-xs-6 col-md-2 col-md-2">
                        		    <div class="form-group">
                                                          <label for="ver" class="control-label">Ver</label>
                        								  <select name="ver_permisos_rol" id="ver_permisos_rol"  class="form-control">
                                    										<option value="TRUE"  <?php  if ( $resEdit->ver_permisos_rol =='t')  echo ' selected="selected" ' ; ?> >Permitir </option>
                                    						            	<option value="FALSE" <?php  if ( $resEdit->ver_permisos_rol =='f')  echo ' selected="selected" ' ; ?> >Denegar </option>
                                    					   </select>	                                  
                                                          <span class="help-block"></span>
                                    </div>
                        		    </div>
                        			<div class="col-xs-6 col-md-2 col-md-2">
                        		    <div class="form-group">
                                                          <label for="editar" class="control-label">Ver</label>
                        								  <select name="editar_permisos_rol" id="editat_permisos_rol"  class="form-control">
                                										<option value="TRUE"  <?php  if ( $resEdit->editar_permisos_rol =='t')  echo ' selected="selected" ' ; ?>>Permitir </option>
                                						            	<option value="FALSE" <?php  if ( $resEdit->editar_permisos_rol =='f')  echo ' selected="selected" ' ; ?>  >Denegar </option>
                                					    </select>	                                  
                                                          <span class="help-block"></span>
                                    </div>
                        		    </div>    
                        		    <div class="col-xs-6 col-md-2 col-md-2">
                        		    <div class="form-group">
                                                          <label for="borrar" class="control-label">Borrar</label>
                        								  <select name="borrar_permisos_rol" id="borrar_permisos_rol"  class="form-control">
                                										<option value="TRUE"  <?php  if ( $resEdit->borrar_permisos_rol =='t')  echo ' selected="selected" ' ; ?> >Permitir </option>
                                						            	<option value="FALSE" <?php  if ( $resEdit->borrar_permisos_rol =='f')  echo ' selected="selected" ' ; ?>  >Denegar </option>
                                					    </select>	                                  
                                                          <span class="help-block"></span>
                                    </div>
                        		    </div>
                		    
                        		    
                        		    
                        		    
                        		    
                        		    
                    			
                    			
                    			</div>
                    			
                                 
                                
                    		     <?php } } else {?>
                    		    
                    		   
								 <div class="row">
                        		    <div class="col-xs-6 col-md-2 col-md-2 ">
                        		    <div class="form-group">
                                                          <label for="nombre_permisos_rol" class="control-label">Nombres Permiso Rol</label>
                                                          <input type="text" class="form-control" id="nombre_permisos_rol" name="nombre_permisos_rol" value=""  placeholder="Nombres">
                                                          <span class="help-block"></span>
                                    </div>
                        		    </div>
                        		    
                        		    <div class="col-xs-6 col-md-2 col-md-2">
                        		    <div class="form-group">
                                                          <label for="id_rol" class="control-label">Rol</label>
                                                          <select name="id_rol" id="id_rol"  class="form-control">
																<?php foreach($resultRol as $resRol) {?>
				 												<option value="<?php echo $resRol->id_rol; ?>"  ><?php echo $resRol->nombre_rol; ?> </option>
													            <?php } ?>
								    					  </select>
		   		   										  <span class="help-block"></span>
                                    </div>
                                    </div>
                        			
                        			
                        			<div class="col-xs-6 col-md-2 col-md-2">
                        		    <div class="form-group">
                                                          <label for="id_controladores" class="control-label">Controladores</label>
                                                          <select name="id_controladores" id="id_controladores"  class="form-control">
                        									<?php foreach($resultCon as $resCon) {?>
                        				 						<option value="<?php echo $resCon->id_controladores; ?>"  ><?php echo $resCon->nombre_controladores; ?> </option>
                        						            <?php } ?>
                        								    	
                        									</select>
                                                          <span class="help-block"></span>
                                    </div>
                        		    </div>
                        		    
									
									
							    	<div class="col-xs-6 col-md-2 col-md-2">
                        		    <div class="form-group">
                                                          <label for="ver" class="control-label">Ver</label>
                        								  <select name="ver_permisos_rol" id="ver_permisos_rol"  class="form-control">
                                    										<option value="TRUE"   >Permitir </option>
                                    						            	<option value="FALSE"  >Denegar </option>
                                    					   </select>	                                  
                                                          <span class="help-block"></span>
                                    </div>
                        		    </div>
                        			<div class="col-xs-6 col-md-2 col-md-2">
                        		    <div class="form-group">
                                                          <label for="editar" class="control-label">Ver</label>
                        								  <select name="editar_permisos_rol" id="editat_permisos_rol"  class="form-control">
                                										<option value="TRUE"  >Permitir </option>
                                						            	<option value="FALSE"   >Denegar </option>
                                					    </select>	                                  
                                                          <span class="help-block"></span>
                                    </div>
                        		    </div>    
                        		    <div class="col-xs-6 col-md-2 col-md-2">
                        		    <div class="form-group">
                                                          <label for="borrar" class="control-label">Borrar</label>
                        								  <select name="borrar_permisos_rol" id="borrar_permisos_rol"  class="form-control">
                                										<option value="TRUE"   >Permitir </option>
                                						            	<option value="FALSE"   >Denegar </option>
                                					    </select>	                                  
                                                          <span class="help-block"></span>
                                    </div>
                        		    </div>
                		    
										                        		    
                    			
                    			
                    			</div>
                    			
                                 	                    		   
                    		   
            	        		                     	           	
                    		     <?php } ?>
                    		    <br>  
                    		    <div class="row">
                    		    <div class="col-xs-12 col-md-12 col-lg-12" style="text-align: center; ">
                    		    <div class="form-group">
                                                      <button type="submit" id="Guardar" name="Guardar" class="btn btn-success">Guardar</button>
                                </div>
                    		    </div>
                    		    </div>
                    		      
                    		        
                              
              </form>


                  </div>
                </div>
              </div>
		
      
        <!-- /page content -->
		
		<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>LISTADO<small>Permisos Roles</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre Permisos Rol</th>
                          <th>Nombre Rol</th>
                          <th>Nombre Controlador</th>
                          <th>Ver</th>
                          <th>Editar</th>
                          <th>Borrar</th>
                          
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>

                      <tbody>
    					
    						<?php if (!empty($resultSet)) {  foreach($resultSet as $res) {?>
            	        		<tr>
            	                   <td > <?php echo $res->id_permisos_rol; ?>  </td>
            		               <td > <?php echo $res->nombre_permisos_rol; ?>     </td> 
            		               <td > <?php echo $res->nombre_rol; ?>   </td>
            		               <td > <?php echo $res->nombre_controladores; ?>   </td>
            		               <td > <?php if ($res->ver_permisos_rol =="t"){ echo "Si";}else{echo "No";}; ?>  </td>
            		               <td > <?php if ($res->editar_permisos_rol == "t"){ echo "Si";}else{echo "No";}; ?>  </td>
            		               <td > <?php if ($res->borrar_permisos_rol == "t"){ echo "Si";}else{echo "No";}; ?>  </td>
            		           	   <td>
            			           		<div class="right">
            			                    <a href="<?php echo $helper->url("PermisosRoles","index"); ?>&id_permisos_rol=<?php echo $res->id_permisos_rol; ?>" class="btn btn-warning" style="font-size:65%;"><i class='glyphicon glyphicon-edit'></i></a>
            			                </div>
            			            
            			             </td>
            			             <td>   
            			                	<div class="right">
            			                    <a href="<?php echo $helper->url("PermisosRoles","borrarId"); ?>&id_permisos_rol=<?php echo $res->id_permisos_rol; ?>" class="btn btn-danger" style="font-size:65%;"><i class="glyphicon glyphicon-trash"></i></a>
            			                </div>
            			                <hr/>
            		               </td>
            		    		</tr>
            		    		
            		    		            		    		
            		    		
            		        <?php } } ?>
                    
    					
    					
    					
    					                    				  	

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
		
      </div>
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

    <!-- Custom Theme Scripts -->
    <script src="view/build/js/custom.min.js"></script>
	
	<!-- codigo de las funciones -->
	<script src="view/js/funciones.js"></script> 
	
  </body>
</html>   














