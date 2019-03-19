<?php
class TurnosController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
    
    
  
    
		public function index(){
	
		session_start();
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			
			$turnos = new TurnosTramitesModel();
			
			$departamentos = new DepartamentosModel();
			$resultDepa=$departamentos->getAll("nombre_departamentos");
			
			
			$nombre_controladores = "Turnos";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $turnos->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
			if (!empty($resultPer))
			{
			
					
					
					$this->view("Turnos",array(
							 "resultDepa"=>$resultDepa
					
					));
				
			}
			else
			{
				$this->view("Error",array(
						"resultado"=>"No tiene Permisos de Acceso a Generación de Turnos"
			
				));
			
			}
			
		
		}
		else{
       	
       	$this->redirect("Usuarios","sesion_caducada");
       	
       }
		
	}
	
	
	
	
	
	
	
	
	public function InsertaTurnos(){
			
		session_start();
		
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			$turnos=new TurnosTramitesModel();
			$departamentos = new DepartamentosModel();
			
		if (isset ($_POST["id_afiliado"]))
		{
		
		    $_id_afiliado    = $_POST["id_afiliado"];
		    $_id_departamentos  = $_POST["id_departamentos"];
		    $_id_tramites_departamentos       = $_POST["id_tramites_departamentos"];
		    $_id_empleados         = $_POST["id_empleados"];
		    $_numero_turnos_tramites   	   = $_POST["numero_turnos_tramites"];
			
		    
		    if($_id_afiliado > 0){
		    	
		    		
		        	$funcion = "turnos_tramites";
		        	$parametros = "'$_numero_turnos_tramites',
		        	'$_id_departamentos',
		        	'$_id_tramites_departamentos',
		        	'$_id_empleados',
		        	'$_id_afiliado'";
		        	$turnos->setFuncion($funcion);
		        	$turnos->setParametros($parametros);
		        	$resultado=$turnos->Insert();
		        
		        	if($resultado){
		        	    
		        	    $departamentos->UpdateBy("consecutivo_departamentos = consecutivo_departamentos+1", "departamentos", "id_departamentos = '$_id_departamentos'");
		        	
		        	
		        	
		        	
		        	    
		        	    
		        	    
		        	    $html="";
		        	    $fechaactual = getdate();
		        	    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		        	    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		        	    $fechaactual=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
		        	    
		        	    $directorio = $_SERVER ['DOCUMENT_ROOT'] . '/aguafacturacion';
		        	    $dom=$directorio.'/view/dompdf/dompdf_config.inc.php';
		        	    $domLogo=$directorio.'/view/images/agua.png';
		        	    $logo = '<img src="'.$domLogo.'" alt="Responsive image" width="130" height="70">';
		        	    
		        	    
		        	    
		        	    $columnas = "solicitudes.id_solicitudes,
								  clientes.id_clientes,
								  clientes.razon_social_clientes,
								  clientes.id_tipo_identificacion,
								  clientes.id_tipo_persona,
								  clientes.identificacion_clientes,
								  tipo_consumo.id_tipo_consumo,
								  tipo_consumo.nombre_tipo_consumo,
								  solicitudes.numero_factura,
						          tipo_persona.nombre_tipo_persona,
						          tipo_identificacion.nombre_tipo_identificacion,
						          solicitudes.fecha_registro,
						          solicitudes.id_estado,
						          solicitudes.id_usuarios_registra,
						          solicitudes.id_usuarios_aprueba";
		        	    
		        	    $tablas   = "public.solicitudes,
									  public.clientes,
									  public.tipo_consumo,
						              public.tipo_identificacion,
						              public.tipo_persona";
		        	    
		        	    $id       = "solicitudes.id_solicitudes";
		        	    
		        	    
		        	    $where    = " tipo_identificacion.id_tipo_identificacion =clientes.id_tipo_identificacion AND tipo_persona.id_tipo_persona= clientes.id_tipo_persona AND solicitudes.id_tipo_consumo = tipo_consumo.id_tipo_consumo AND
		    				clientes.id_clientes = solicitudes.id_clientes AND solicitudes.id_solicitudes='$_id_solicitudes' AND clientes.id_clientes = '$_id_clientes' ";
		        	    
		        	    
		        	    
		        	    
		        	    
		        	    $resultSetCabeza=$solicitudes->getCondiciones($columnas, $tablas, $where, $id);
		        	    
		        	    
		        	    $usuarios = new UsuariosModel();
		        	    
		        	    
		        	    $_id_usuarios_registra=0;
		        	    $_id_usuarios_aprueba=0;
		        	    $_nombre_usuarios_registra="";
		        	    $_nombre_usuarios_aprueba="";
		        	    
		        	    
		        	    if(!empty($resultSetCabeza)){
		        	        
		        	        
		        	        
		        	        $numero_solicitudes     =$resultSetCabeza[0]->numero_factura;
		        	        $_nombre_tipo_persona       =$resultSetCabeza[0]->nombre_tipo_persona;
		        	        $_nombre_tipo_identificacion   =$resultSetCabeza[0]->nombre_tipo_identificacion;
		        	        $_razon_social_clientes   =$resultSetCabeza[0]->razon_social_clientes;
		        	        $_identificacion_clientes =$resultSetCabeza[0]->identificacion_clientes;
		        	        $_nombre_tipo_consumo =$resultSetCabeza[0]->nombre_tipo_consumo;
		        	        $_id_estado	=$resultSetCabeza[0]->id_estado;
		        	        $_id_usuarios_registra =$resultSetCabeza[0]->id_usuarios_registra;
		        	        $_id_usuarios_aprueba =$resultSetCabeza[0]->id_usuarios_aprueba;
		        	        
		        	        $_fecha_registro          =date("d/m/Y", strtotime($resultSetCabeza[0]->fecha_registro));
		        	        $_fecha_registro=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
		        	        
		        	        
		        	        if($_id_usuarios_registra>0){
		        	            
		        	            $resultUsuReg= $usuarios->getBy("id_usuarios='$_id_usuarios_registra'");
		        	            $_nombre_usuarios_registra=$resultUsuReg[0]->nombre_usuarios;
		        	            
		        	        }else{
		        	            
		        	            $_nombre_usuarios_registra="";
		        	        }
		        	        
		        	        
		        	        
		        	        
		        	        if($_id_usuarios_aprueba>0){
		        	            
		        	            $resultUsuAprue= $usuarios->getBy("id_rol='47'");
		        	            $_nombre_usuarios_aprueba=$resultUsuAprue[0]->nombre_usuarios;
		        	            
		        	        }else{
		        	            
		        	            $_nombre_usuarios_aprueba="";
		        	        }
		        	        
		        	        
		        	        $columnas1 = "solicitudes_detalle.id_solicitudes_detalle,
									  solicitudes_detalle.id_solicitudes,
									  tarifas.id_tarifas,
									  tarifas.nombre_tarifa,
							          tarifas.valor_tarifa";
		        	        
		        	        $tablas1   = " public.tarifas,
  										public.solicitudes_detalle";
		        	        
		        	        $id1       = "solicitudes_detalle.id_solicitudes_detalle";
		        	        
		        	        
		        	        $where1    = " solicitudes_detalle.id_tarifas = tarifas.id_tarifas AND solicitudes_detalle.id_solicitudes='$_id_solicitudes' ";
		        	        
		        	        $resultSetDetalle=$solicitides_detalle->getCondiciones($columnas1, $tablas1, $where1, $id1);
		        	        
		        	        
		        	        $html.='<p style="text-align: right;">'.$logo.'<hr style="height: 2px; background-color: black;"></p>';
		        	        $html.='<p style="text-align: right; font-size: 13px;"><b>Fecha Factura:</b> '.$fechaactual.'</p>';
		        	        $html.='<p style="text-align: center; font-size: 16px; margin-top:60px;"><b>Factura No. '.$numero_solicitudes.'</b></p>';
		        	        
		        	        
		        	        $html.='<table style="width: 100%; margin-top:30px;">';
		        	        
		        	        $html.='<tr>';
		        	        $html.='<th colspan="2" style="text-align:left; font-size: 13px;">Tipo Persona</th>';
		        	        $html.='<th colspan="2" style="text-align:left; font-size: 13px;">Tipo Identificación</th>';
		        	        $html.='<th colspan="2" style="text-align:left; font-size: 13px;">Identificación</th>';
		        	        $html.='<th colspan="4" style="text-align:left; font-size: 13px;">Razón Social</th>';
		        	        $html.='<th colspan="2" style="text-align:left; font-size: 13px;">Tipo Consumo</th>';
		        	        $html.='<th colspan="2" style="text-align:left; font-size: 13px;">Estado Solicitud</th>';
		        	        $html.='</tr>';
		        	        
		        	        $html.='<tr>';
		        	        
		        	        $html.='<td colspan="2" style="text-align:left; font-size: 13px;">'.$_nombre_tipo_persona.'</td>';
		        	        $html.='<td colspan="2" style="text-align:left; font-size: 13px;">'.$_nombre_tipo_identificacion.'</td>';
		        	        $html.='<td colspan="2" style="text-align:left; font-size: 13px;">'.$_identificacion_clientes.'</td>';
		        	        $html.='<td colspan="4" style="text-align:left; font-size: 13px;">'.$_razon_social_clientes.'</td>';
		        	        $html.='<td colspan="2" style="text-align:left; font-size: 13px;">'.$_nombre_tipo_consumo.'</td>';
		        	        
		        	        if($_id_estado==3){
		        	            $html.='<td colspan="2" style="text-align:left; font-size: 13px;">Pendiente</td>';
		        	        }else if($_id_estado==2){
		        	            $html.='<td colspan="2" style="text-align:left; font-size: 13px;">Anulada</td>';
		        	        }else {
		        	            $html.='<td colspan="2" style="text-align:left; font-size: 13px;">Aprobada</td>';
		        	        }
		        	        
		        	        $html.='</tr>';
		        	        $html.='</table>';
		        	        
		        	        
		        	        if(!empty($resultSetDetalle)){
		        	            
		        	            
		        	            
		        	            $html.= "<table style='width: 100%; margin-top:40px;' border=1 cellspacing=0>";
		        	            $html.= "<thead>";
		        	            $html.= "<tr>";
		        	            $html.='<th style="text-align: left;  font-size: 13px;">Descripción</th>';
		        	            $html.='<th style="text-align: left;  font-size: 13px;">Cantidad</th>';
		        	            $html.='<th style="text-align: left;  font-size: 13px;">Valor C/U</th>';
		        	            $html.='<th style="text-align: left;  font-size: 13px;">Valor Total</th>';
		        	            $html.='</tr>';
		        	            $html.='</thead>';
		        	            $html.='<tbody>';
		        	            
		        	            $i=0;
		        	            $i=0; $valor_total_db=0; $valor_total_vista=0;
		        	            
		        	            foreach ($resultSetDetalle as $res)
		        	            {
		        	                $valor_total_db=$res->valor_tarifa;
		        	                $valor_total_vista=$valor_total_vista+$valor_total_db;
		        	                
		        	                
		        	                $i++;
		        	                $html.='<tr>';
		        	                $html.='<td style="font-size: 11px;">'.$res->nombre_tarifa.'</td>';
		        	                $html.='<td style="font-size: 11px;">1</td>';
		        	                $html.='<td style="font-size: 11px;">'.$res->valor_tarifa.'</td>';
		        	                $html.='<td style="font-size: 11px;">'.$res->valor_tarifa.'</td>';
		        	                $html.='</tr>';
		        	                
		        	                $valor_total_db=0;
		        	            }
		        	            
		        	            $valor_total_vista= number_format($valor_total_vista, 2, '.', ',');
		        	            
		        	            
		        	            $html.='<tr>';
		        	            $html.='<td class="text-right" colspan=2></td>';
		        	            $html.='<td class="text-right" colspan=1 style="font-size: 11px;"><b>SubTotal</b></td>';
		        	            $html.='<td class="text-left" style="font-size: 12px;">'.$valor_total_vista.'</td>';
		        	            $html.='</tr>';
		        	            
		        	            $valor_iva=0; $valor_iva=$valor_total_vista*0.12;
		        	            $valor_iva= number_format($valor_iva, 2, '.', ',');
		        	            
		        	            
		        	            $html.='<tr>';
		        	            $html.='<td class="text-right" colspan=2></td>';
		        	            $html.='<td class="text-right" colspan=1 style="font-size: 11px;"><b>Iva 12%</b></td>';
		        	            $html.='<td class="text-left" style="font-size: 11px;">'.$valor_iva.'</td>';
		        	            $html.='</tr>';
		        	            
		        	            $valor_FIN=0; $valor_FIN=$valor_total_vista+$valor_iva;
		        	            $valor_FIN= number_format($valor_FIN, 2, '.', ',');
		        	            
		        	            $html.='<tr>';
		        	            $html.='<td class="text-right" colspan=2></td>';
		        	            $html.='<td class="text-right" colspan=1 style="font-size: 11px;"><b>TOTAL $</b></td>';
		        	            $html.='<td class="text-right" style="font-size: 11px;">'.$valor_FIN.'</td>';
		        	            
		        	            $html.='</tr>';
		        	            
		        	            
		        	            
		        	            
		        	            $html.='</tbody>';
		        	            $html.='</table>';
		        	            
		        	            
		        	        }
		        	        
		        	        
		        	        $html.='<table style="width: 100%; margin-top:40px;">';
		        	        
		        	        $html.='<tr>';
		        	        $html.='<th colspan="4" style="text-align:left; font-size: 13px;">Cajero</th>';
		        	        $html.='<th colspan="4" style="text-align:left; font-size: 13px;"></th>';
		        	        $html.='<th colspan="2" style="text-align:left; font-size: 13px;"></th>';
		        	        $html.='<th colspan="2" style="text-align:left; font-size: 13px;"></th>';
		        	        $html.='</tr>';
		        	        
		        	        $html.='<tr>';
		        	        
		        	        $html.='<td colspan="4" style="text-align:left; font-size: 13px;">'.$_nombre_usuarios_aprueba.'</td>';
		        	        $html.='<td colspan="4" style="text-align:left; font-size: 13px;"></td>';
		        	        $html.='<td colspan="2" style="text-align:left; font-size: 13px;"></td>';
		        	        $html.='<td colspan="2" style="text-align:left; font-size: 13px;"></td>';
		        	        
		        	        $html.='</tr>';
		        	        $html.='</table>';
		        	        
		        	        
		        	    }
		        	    
		        	    
		        	    $this->report("Factura",array( "resultSet"=>$html, "numero_solicitudes"=>$numero_solicitudes));
		        	    die();
		        	    
		        	    
		        	    
		        	    
		        	    
		        	    
		        	    
		        	    
		        	    
		        	    
		        	    
		        	    
		        	    
		        	
		        	
		        	
		        	}
		        	
		        	
		        	
		  }
		  
		   
		    $this->redirect("Turnos", "index");
		}
		
	   }else{
	   	
	   	$error = TRUE;
	   	$mensaje = "Te sesión a caducado, vuelve a iniciar sesión.";
	   		
	   	$this->view("Login",array(
	   			"resultSet"=>"$mensaje", "error"=>$error
	   	));
	   		
	   		
	   	die();
	   	
	   }
	}
	
	
	


	public function AutocompleteCedula(){
			
		session_start();
		
		$afiliados = new AfiliadoModel();
		$cedula_afiliado = $_GET['term'];
			
		$resultSet=$afiliados->getBy("cedula_afiliado LIKE '$cedula_afiliado%'");
			
		if(!empty($resultSet)){
	
			foreach ($resultSet as $res){
					
			    $_cedula_afiliado[] = $res->cedula_afiliado;
			}
			echo json_encode($_cedula_afiliado);
		}
			
	}
	
	
	
	
	
	public function AutocompleteDevuelveNombres(){
			
		session_start();
	
		$afiliados = new AfiliadoModel();
			
		$cedula_afiliado = $_POST['cedula_afiliado'];
		$resultSet=$afiliados->getBy("cedula_afiliado = '$cedula_afiliado'");
			
		$respuesta = new stdClass();
			
		if(!empty($resultSet)){
	
		    $respuesta->id_afiliado = $resultSet[0]->id_afiliado;
		    $respuesta->cedula_afiliado = $resultSet[0]->cedula_afiliado;
		    $respuesta->nombres_afiliado = $resultSet[0]->nombres_afiliado;
		    $respuesta->apellidos_afiliado = $resultSet[0]->apellidos_afiliado;
		    $respuesta->entidad_patronal_afiliado = $resultSet[0]->entidad_patronal_afiliado;
		    $respuesta->estado_afiliado = $resultSet[0]->estado_afiliado;
		    
			
			
			echo json_encode($respuesta);
		}
			
	}
	
	

	public function devuelveTramites()
	{
		session_start();
		$resultTram = array();
	
		if(isset($_POST["id_departamentos"]))
		{
	
		    $id_departamentos=(int)$_POST["id_departamentos"];
	
			$tramites=new TramitesDepartamentosModel();
	
			$resultTram = $tramites->getBy(" id_departamentos = '$id_departamentos'  ");
	
		}
			
		echo json_encode($resultTram);
	
	}
	
	
	
	
	public function devuelveEmpleados()
	{
		session_start();
		$resultEmp = array();
	
		if(isset($_POST["id_departamentos"]))
		{
	
		    $id_departamentos=(int)$_POST["id_departamentos"];
	
			$empleados=new EmpleadosModel();
	
			$resultEmp = $empleados->getBy("id_departamentos = '$id_departamentos'");
	
		}
		
			
		echo json_encode($resultEmp);
	
	}
	
	
	
	
	public function  consulta_turno(){
	    
	    session_start();
	    
	    $departamentos = new DepartamentosModel();
	    
	    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	    $id_departamentos =  (isset($_REQUEST['id_departamentos'])&& $_REQUEST['id_departamentos'] !=NULL)?$_REQUEST['id_departamentos']:0;
	    
	    if($action == 'ajax' && $id_departamentos > 0)
	    {
	        
	        $columnas_enc = "departamentos.id_departamentos, 
                              departamentos.nombre_departamentos, 
                              departamentos.prefijo_departamentos, 
                              departamentos.consecutivo_departamentos";
	        $tablas_enc ="public.departamentos";
	        $where_enc ="1=1
			AND departamentos.id_departamentos='$id_departamentos'";
	        $id_enc="departamentos.id_departamentos";
	        $resultSet=$departamentos->getCondiciones($columnas_enc ,$tablas_enc ,$where_enc, $id_enc);
	        
	       
	        
	        if(!empty($resultSet)){
	            
	            $_prefijo_departamentos    =$resultSet[0]->prefijo_departamentos;
	            $_consecutivo_departamentos    =$resultSet[0]->consecutivo_departamentos;
	            
	          
	            
	            
	            echo $_prefijo_departamentos.$_consecutivo_departamentos;
	        }
	        
	        
	    }
	    
	}
	
	
	

	
	
	
	
	
	
	
}
?>
