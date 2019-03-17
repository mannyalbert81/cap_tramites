<?php  
   $status = session_status();
   if  (isset( $_SESSION['nombre_usuario'] ))  {  
?>	

<div class="profile clearfix">
             
             
              <div class="profile_pic">
                <img src="view/images/usuario.jpg" alt="view." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hola,</span>
                <h2><?php echo $_SESSION['nombre_usuario'];?></h2>
              </div>
              
              
              
              
              
       
                  
              
              
              
 </div>
 
 <?php }?>