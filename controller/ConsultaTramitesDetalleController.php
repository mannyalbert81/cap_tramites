<?php
class ConsultaTramitesDetalleController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
    
    
  
    
		public function index(){
	
		session_start();
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			
			$_id_estado_atendido = 1;
			
			$turno_tramites_detalle = new TurnoTramitesDetalleModel();
			
			
			$resultTram= ""; //$turno_tramites_detalle->getBy("id_estado='$_id_estado_atendido'");
			$controladores = new ControladoresModel();
			
			$nombre_controladores = "TurnoTramitesDetalle";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $controladores->getPermisosVer("controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
				
			if (!empty($resultPer))
			{
			
					
					
					$this->view("ConsultaTramitesDetalle",array(
							 "resultTram"=>$resultTram
					
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
	
	
	
	
	
	
	
	
	public function ConsultaTurnoTramitesDetalle(){
			
		session_start();
		
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			$turnos_tramites_detalle=new TurnoTramitesDetalleModel();
			$turnos = new TurnosTramitesModel();
		    $estado_tramites = new EstadoTramitesModel();
		    
		    
		    $resultEst=$estado_tramites->getAll("nombre_estado_tramites");
		    $resultEdit = "";
		    $resultSet = "";
		    $resultEst = "";
		    
		    
		    
		    $columnas  = "turnos_tramites.numero_turnos_tramites,
  							  afiliado.cedula_afiliado,
  								afiliado.apellidos_afiliado,
  								afiliado.nombres_afiliado,
  								turnos_tramites.id_turnos_tramites,
								turnos_tramites.creado,
  								turnos_tramites.modificado,
  								estado.nombre_estado,
  								departamentos.nombre_departamentos,
  								empleados.nombres_empleados,
  								empleados.apellidos_empleados,
  								tramites_departamentos.nombre_tramites_departamentos";
		    $tablas = "		public.turnos_tramites,
  								public.estado,
  								public.afiliado,
  								public.empleados,
  								public.departamentos,
  								public.tramites_departamentos";
		    
			
		    if (isset ($_GET["id_turnos_tramites"]))
		    {
		    	$_id_turnos_tramites =  $_GET["id_turnos_tramites"];
		    	
		    	
		    	$columnas  = "turnos_tramites.numero_turnos_tramites, 
  								turnos_tramites.id_turnos_tramites, 
  								turno_tramites_detalle.descripcion_turno_tramites_detalle, 
  								turno_tramites_detalle.creado, 
 	 							usuarios.nombre_usuario, 
  								estado_tramites.nombre_estado_tramites";
		    	$tablas = "		 public.turno_tramites_detalle, 
  								public.estado_tramites, 
  								public.turnos_tramites, 
  								public.usuarios";
		    	
		    	
		    	$where = " turno_tramites_detalle.id_estado_tramites = estado_tramites.id_estado_tramites AND
  							turnos_tramites.id_turnos_tramites = turno_tramites_detalle.id_turno_tramites AND
  							usuarios.id_usuario = turno_tramites_detalle.id_usuario
		    				AND turnos_tramites.id_turnos_tramites = '$_id_turnos_tramites' ";
		    	$id   = " turno_tramites_detalle.creado ";
		    	
		    	$resultEdit = $turnos->getCondiciones($columnas ,$tablas , $where, $id);
		    	$resultEst=$estado_tramites->getAll("nombre_estado_tramites");
		    	
		    	
		    
		    }
		    	
		    			
		    
		    		
			
			if (isset ($_POST["id_afiliado"]) && isset($_POST["btnBuscar"]) )
			{
			
				$_id_afiliado = $_POST["id_afiliado"];
				
				$where = "		estado.id_estado = turnos_tramites.id_estado AND
  								afiliado.id_afiliado = turnos_tramites.id_afiliado AND
  								empleados.id_empleados = turnos_tramites.id_empleados AND
  								departamentos.id_departamentos = turnos_tramites.id_departamentos AND
  								tramites_departamentos.id_tramites_departamentos = turnos_tramites.id_tramites_departamentos
								AND afiliado.id_afiliado = '$_id_afiliado' ";
				$id   = " turnos_tramites.creado ";
				
				$resultSet = $turnos->getCondiciones($columnas ,$tablas , $where, $id);
				
				
				
				
			}
			
			if (isset ($_POST["id_turnos_tramites"])  && isset($_POST["btnGuardar"]) )
			{
			
				
				$_id_turno_tramites = $_POST["id_turnos_tramites"];
				$_id_estado_tramites = $_POST["id_estado_tramites"];
				$_descripcion_turno_tramites_detalle =  $_POST["descripcion_turno_tramites_detalle"];
				$_id_usuario = $_SESSION['id_usuario'];
				
				$funcion = "ins_turno_tramites_detalle";
				$parametros = " '$_id_turno_tramites' ,'$_id_estado_tramites' , '$_descripcion_turno_tramites_detalle', '$_id_usuario'";
				$estado_tramites->setFuncion($funcion);
				$estado_tramites->setParametros($parametros);
				$resultado=$estado_tramites->Insert();
			}
			
			
			$this->view("ConsultaTramitesDetalle",array(
					"resultSet"=>$resultSet , "resultEst"=>$resultEst, "resultEdit"=>$resultEdit
			
			));
			
			
			
	   }
	   else
	   {
	   	
	   	$error = TRUE;
	   	$mensaje = "Te sesión a caducado, vuelve a iniciar sesión.";
	   		
	   	$this->view("Login",array(
	   			"resultSet"=>"$mensaje", "error"=>$error
	   	));
	   		
	   		
	   	die();
	   	
	   }
	}
	
	public function  lanzarPag(){
	    
	    
	    $empleados = new EmpleadosModel();
	    $tramites_departamentos = new TramitesDepartamentosModel();
	    
	    $_modulo_empleados="";
	    $_nombre_tramites_departamentos="";
	    
	    if(isset($_GET["id_empleados"]) && isset($_GET["id_afiliado"]) && isset($_GET["numero_turnos_tramites"])){
	        
	        $_id_afiliado    = $_GET["id_afiliado"];
	        $_id_tramites_departamentos       = $_GET["id_tramites_departamentos"];
	        $_id_empleados         = $_GET["id_empleados"];
	        $_numero_turnos_tramites   	   = $_GET["numero_turnos_tramites"];
	        
	        
	        $resultEmp=$empleados->getBy("id_empleados='$_id_empleados'");
	        
	        $resultTram=$tramites_departamentos->getBy("id_tramites_departamentos='$_id_tramites_departamentos'");
	        
	        if(!empty($resultEmp)){
	            
	            $_modulo_empleados = $resultEmp[0]->modulo_empleados;
	            
	        }else{
	            
	            $_modulo_empleados="";
	        }
	        
	        if(!empty($resultTram)){
	            
	            $_nombre_tramites_departamentos = $resultTram[0]->nombre_tramites_departamentos;
	            
	        }else{
	            
	            $_nombre_tramites_departamentos="";
	        }
	        
	        
	        $html="";
	        $fechaactual = getdate();
	        $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	        $fechaactual=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
	        
	        
	        
	        date_default_timezone_set('America/Guayaquil');
	        $fechaActual = date('d-m-Y H:i:s');
	     
	        
	        
	        $directorio = $_SERVER ['DOCUMENT_ROOT'] . '/cap_tramites';
	        $dom=$directorio.'/view/dompdf/dompdf_config.inc.php';
	        $domLogo=$directorio.'/view/images/logo.png';
	        $logo = '<img src="'.$domLogo.'" alt="Responsive image" width="100" height="55">';
	        
	        
	        $html.='<html lang="es">';
	        $html.='<head>';
	        $html.='</head>';
	        $html.='<body style="margin: 0px;">';
	        
	        $html.='<table style="width: 100%;">';
	        $html.='<tr>';
	        $html.='<th  style="text-align:center;">'.$logo.'</th>';
	        $html.='</tr>';
	        $html.='<tr>';
	        $html.='<th  style="font-size:12px; text-align:center;">'.$_numero_turnos_tramites.'</th>';
	        $html.='</tr>';
	        $html.='<tr>';
	        $html.='<th  style="font-size:12px; text-align:center;">'.$_nombre_tramites_departamentos.'</th>';
	        $html.='</tr>';
	        $html.='<tr>';
	        $html.='<th style="font-size:12px; text-align:center;">Módulo '.$_modulo_empleados.'</th>';
	        $html.='</tr>';
	        $html.='<tr>';
	        $html.='<th style="font-size:10px; text-align:center;">'.$fechaActual.'</th>';
	        $html.='</tr>';
	        
	        $html.='<br>';
	      
	        
	        $html.='</table>';
	        
	        
	        $html.='</body>';
	        
	        $html.='</html>';
	        
	        
	        
	        
	        $this->report("Turno",array( "resultSet"=>$html));
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
