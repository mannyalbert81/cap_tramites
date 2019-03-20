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
		
	
	
}
?>
