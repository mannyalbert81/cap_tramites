<?php
class PantallaController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
public function index(){
	
		session_start();
		if (isset(  $_SESSION['usuario_usuario']) )
		{
			
					
					$this->view("Pantalla",array(
							"resultSet"=>""
				
					));

		}
		else 
		{
			$this->view("ErrorSesion",array(
					"resultSet"=>""
		
			));
			
			
			
		}
		
	}
	
	
	public function tabla_turnos (){
		session_start();
		$html = '';
		$i=0;
		$turnos_tramites = new TurnosTramitesModel();
	
		$columnas = " empleados.modulo_empleados, turnos_tramites.numero_turnos_tramites ";
		$tablas   = "public.empleados, public.turnos_tramites, public.departamentos";
		$where    = "turnos_tramites.id_departamentos = departamentos.id_departamentos AND   turnos_tramites.id_empleados = empleados.id_empleados";
		$id       = "turnos_tramites.numero_turnos_tramites";
			
	
		$resultSet = $turnos_tramites->getCondiciones($columnas ,$tablas ,$where, $id);
	
		$i=count($resultSet);
	
		$html .= '<div class="col-xs-8 col-sm-8 col-lg-8 " style="text-align: left;">';
		$html .= '<div class="col-xs-8 col-sm-8 col-lg-8">';
		$html .= '<h3>TURNO</h3>';
		$html .= '</div>';
		$html .= '<div class="col-xs-4 col-sm-4 col-lg-4" style="text-align: left;">';
		$html .= '<h3>MODULO</h3>';
		$html .= '</div>';
			
		
		if (!empty($resultSet)) {  foreach($resultSet as $res) {
				
			
			
			$html .= '<div class="col-xs-8 col-sm-8 col-lg-8" style="text-align: left;">';
			$html .= '<h1><b> '. $res->numero_turnos_tramites .'</b></h1>';
			$html .= '</div>';
			$html .= '<div class="col-xs-4 col-sm-4 col-lg-4" style="text-align: left;">';
			$html .= '<h1><b>'. $res->modulo_empleados .'</b></h1>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '<tr>';
			
				
				
				
		}
		}else{
	
			$html = "<b>Actualmente no hay turnos...</b>";
		}
	
		echo $html;
		die();
	
	
	
	
	}
	
	
		
	
	
}
?>
