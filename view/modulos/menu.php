
<?php 
$controladores=$_SESSION['controladores'];
 function getcontrolador($controlador,$controladores){
 	$display="display:none";
 	
 	if (!empty($controladores))
 	{
 	foreach ($controladores as $res)
 	{
 		if($res->nombre_controladores==$controlador)
 		{
 			$display= "display:block";
 			break;
 			
 		}
 	}
 	}
 	
 	return $display;
 }
?>








<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li  style="<?php echo getcontrolador("MenuAdministracion",$controladores) ?>"  ><a    ><i class="fa fa-home"></i> Administración <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li style="<?php echo getcontrolador("Usuarios",$controladores) ?>"><a href="index.php?controller=Usuarios&action=index">Usuarios</a></li>
                      <li style="<?php echo getcontrolador("Roles",$controladores) ?>"><a href="index.php?controller=Roles&action=index">Roles de Usuario</a></li>
                      <li style="<?php echo getcontrolador("PermisosRoles",$controladores) ?>"><a href="index.php?controller=PermisosRoles&action=index">Permisos Roles</a></li>
                      <li style="<?php echo getcontrolador("EstadoTramites",$controladores) ?>"><a href="index.php?controller=EstadoTramites&action=index">Registro Estado Trámites</a></li>
                      <li style="<?php echo getcontrolador("Departamentos",$controladores) ?>"><a href="index.php?controller=Departamentos&action=index">Registro Departamentos</a></li>
                      <li style="<?php echo getcontrolador("Empleados",$controladores) ?>"><a href="index.php?controller=Empleados&action=index">Registro Empleados</a></li>
                    
                    </ul>
                  </li>
                  <li style="<?php echo getcontrolador("MenuProcesos",$controladores) ?>"><a><i class="fa fa-edit"></i> Procesos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li style="<?php echo getcontrolador("Turnos",$controladores) ?>"><a href="index.php?controller=Turnos&action=index">Turnos</a></li>
                      <li style="<?php echo getcontrolador("TurnoTramitesDetalle",$controladores) ?>"><a href="index.php?controller=TurnoTramitesDetalle&action=index">Actualización de Trámites</a></li>
                      <li style="<?php echo getcontrolador("Pantalla",$controladores) ?>"><a href="index.php?controller=Pantalla&action=index">Pantalla</a></li>
                      
                      
                    </ul>
                  </li>
                  
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              
              <a data-toggle="tooltip" data-placement="top" title="Salir" href="index.php?controller=Usuarios&action=Loguear">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
