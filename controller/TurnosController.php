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
		        	
		        	
		        	    
		        	    $columnas ="";
		        	    $tablas = "";
		        	    $where = "";
		        	    $id="";
		        	    
		        	    
		        	    
		        	    
		        	    
		        	    $html="";
		        	    $fechaactual = getdate();
		        	    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		        	    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		        	    $fechaactual=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
		        	    
		        	    $directorio = $_SERVER ['DOCUMENT_ROOT'] . '/cap_tramites';
		        	    $dom=$directorio.'/view/dompdf/dompdf_config.inc.php';
		        	    $domLogo=$directorio.'/view/images/logo.png';
		        	    $logo = '<img src="'.$domLogo.'" alt="Responsive image" width="80" height="45">';
		        	    
		        	     
		        	        $html.='<table style="width: 100%;">';
		        	        $html.='<tr>';
		        	        $html.='<th colspan="12" style="text-align:center;">'.$domLogo.'</th>';
		        	        $html.='<th colspan="12" style="text-align:center;">'.$domLogo.'</th>';
		        	        $html.='</tr>';
		        	        $html.='</table">';
		        	       
		        	        
		        	        $this->report("Turno",array( "resultSet"=>$html));
		        	        die();
		        	        
		        	    }
		        	    
		        	    
		        	    $this->redirect("Turnos", "index");
		        	
		        	
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
