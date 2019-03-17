<!-- jQuery -->
    <script src="view/vendors/jquery/dist/jquery.min.js"></script>
	<script src="view/vendors/jquery/dist/jquery-ui.css"></script>
	<script src="view/vendors/jquery/dist/jquery-ui.js"></script>   
	
	<!-- Bootstrap -->
    <script src="view/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
       



        <div class="top_nav">
          <div class="nav_menu">
        
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
			  <?php  
			     $status = session_status();
			     if  (isset( $_SESSION['nombre_usuario'] ))  {  
              ?>
              	
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="view/images/usuario.jpg" alt=""><?php echo $_SESSION['nombre_usuario'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="index.php?controller=Usuarios&action=Actualiza"> Perfil Usuario</a></li>
                    <li><a href="index.php?controller=Usuarios&action=Loguear"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>
                <li  >
                	
                	<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="fa fa-search"> </span></button>
                </li>
                
			       
             </ul>
              <?php }?>
              
              
            </nav>
          
        
        
        
          
        
          </div>
          
        
        
        </div>
        
        
     
     
     
     
<form class="form-inline" action="<?php echo $helper->url("Documentos","Buscador");?>"  method="post"   >     
     <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Buscador de Documentos</h4>
        </div>
        <div class="modal-body">
          <div class="col-xs-12 col-md-6 col-md-6 ">
                <input type="text" required="required" data-validate-length-range="2" class="form-control" id="contenido_busqueda" name="contenido_busqueda" value=""  placeholder="Texto a Buscar">
          </div>
        
          <div class="col-xs-12 col-md-6 col-md-6 ">
             <select name="criterio_busqueda" id="criterio_busqueda"  class="form-control" >
                    				<option value="1"  >Ruc Cliente/Proveedor</option>
                    				<option value="2"  >Nombre Cliente/Proveedor</option>
                    				<option value="3"  >Número Carton</option>
                    				<option value="4"  >Número Credito</option>
                    				<option value="7"  >Tipo de Documento</option>
                    				<option value="8"  >Número de Prestación</option>
			  </select>
           </div>
        <hr>
        </div>
        <div class="modal-footer">
            <button type="submit"  id="btn_buscar"  name="btn_buscar" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-search" > Buscar</span></button>
        </div>
      </div>
      
    </div>
  </div>
  </form>
  
  
  
  <!-- validator -->
    <script src="view/vendors/validator/validator.js"></script>






  