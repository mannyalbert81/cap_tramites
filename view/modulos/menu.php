
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
                      <li style="<?php echo getcontrolador("Carton",$controladores) ?>"><a href="index.php?controller=RegistroCartonDocumentos&action=index">Registro de Cartones</a></li>
                    </ul>
                  </li>
                  <li style="<?php echo getcontrolador("MenuDocumentos",$controladores) ?>"><a><i class="fa fa-edit"></i> Gestión Documental <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li style="<?php echo getcontrolador("Documentos",$controladores) ?>"><a href="index.php?controller=Documentos&action=index">Búsqueda de Documentos</a></li>
                      
                    </ul>
                  </li>
                  <li style="<?php echo getcontrolador("MenuInformes",$controladores) ?>"><a><i class="fa fa-edit"></i> Informes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li style="<?php echo getcontrolador("Categorias",$controladores) ?>"><a href="index.php?controller=Categorias&action=ReporteTotal" target="blank">Documentos por Categorías</a></li>
                      <li style="<?php echo getcontrolador("Categorias",$controladores) ?>"><a href="index.php?controller=SubCategorias&action=ReporteTotal" target="blank">Documentos por Subcategrorías</a></li>
                      <li style="<?php echo getcontrolador("Documentos",$controladores) ?>"><a href="index.php?controller=Documentos&action=BuscaxCarton">Documentos por Cartón</a></li>
                      <li style="<?php echo getcontrolador("Documentos",$controladores) ?>"><a href="index.php?controller=CartonDocumentos&action=ReporteTotal" target="blank">Listado de Cartones Registrados</a></li>
                      <li tyle="<?php echo getcontrolador("Documentos",$controladores) ?>"><a href="index.php?controller=CartonDocumentos&action=FechaCartones" target="blank"">Listado de Cartones con Rangos de Fechas</a></li>
                      
                    </ul>
                  </li>
                  <li style="<?php echo getcontrolador("MenuUtilitarios",$controladores) ?>"><a><i class="fa fa-edit"></i>Utilitarios <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li style="<?php echo getcontrolador("Documentos",$controladores) ?>"><a href="index.php?controller=Documentos&action=ActualizarDocumentos">Actualizar Documentos</a></li>
                      <li style="<?php echo getcontrolador("Documentos",$controladores) ?>"><a href="index.php?controller=VerificarCapremci&action=index">Verificar Capremci</a></li>
                      <li style="<?php echo getcontrolador("ErroresImportacion",$controladores) ?>"><a href="index.php?controller=ErroresImportacion&action=index">Errores Importacion</a></li>
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
