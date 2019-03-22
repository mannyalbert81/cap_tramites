<?php

class EstadoTramitesController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }
    
    //maycol
    
    public function index(){
        
        
        $estado_tramites = new EstadoTramitesModel();
        $resultSet=$estado_tramites->getAll("id_estado_tramites");
        $resultEdit = "";
        
        session_start();
        
        if (isset($_SESSION['usuario_usuario']))
        {
            $nombre_controladores = "EstadoTramites";
            $id_rol= $_SESSION['id_rol'];
            $resultPer = $estado_tramites->getPermisosVer("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
            
            if (!empty($resultPer))
            {
                
                
                if (isset ($_GET["id_estado_tramites"]))
                {
                    
                    $nombre_controladores = "EstadoTramites";
                    $id_rol= $_SESSION['id_rol'];
                    $resultPer = $estado_tramites->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
                    
                    if (!empty($resultPer))
                    {
                        
                        $_id_estado_tramites = $_GET["id_estado_tramites"];
                        $columnas = " id_estado_tramites, nombre_estado_tramites";
                        $tablas   = "estado_tramites";
                        $where    = "id_estado_tramites = '$_id_estado_tramites' ";
                        $id       = "nombre_estado_tramites";
                        
                        $resultEdit = $estado_tramites->getCondiciones($columnas ,$tablas ,$where, $id);
                        
                    }
                    else
                    {
                        $this->view("Error",array(
                            "resultado"=>"No tiene Permisos de Editar Estado Tramites"
                            
                        ));
                        
                        
                    }
                    
                }
                
                
                $this->view("EstadoTramites",array(
                    "resultSet"=>$resultSet, "resultEdit" =>$resultEdit
                    
                ));
                
            }
            else
            {
                $this->view("Error",array(
                    "resultado"=>"No tiene Permisos de Acceso a Estado Tramites"
                    
                ));
                
                exit();
            }
            
        }
        else{
            
            $this->redirect("Usuarios","sesion_caducada");
            
        }
        
    }
    
    public function InsertaEstadoTramites(){
        
        session_start();
        
       
        if (isset($_SESSION["usuario_usuario"]))
        {
          
            $estado_tramites=new EstadoTramitesModel();
            
            if (isset ($_POST["nombre_estado_tramites"]) )
            
            {
                
                
                
                $_nombre_estado_tramites = $_POST["nombre_estado_tramites"];
                $_id_estado_tramites = $_POST["id_estado_tramites"];
                
                if($_id_estado_tramites>0)
                {
                    
                    $colval = " nombre_estado_tramites = '$_nombre_estado_tramites'   ";
                    $tabla = "estado_tramites";
                    $where = "id_estado_tramites = '$_id_estado_tramites'    ";
                    
                    $resultado=$estado_tramites->UpdateBy($colval, $tabla, $where);
                    
                    
                    
                }else {
                    
                    
                    
                    $funcion = "ins_estado_tramites";
                    $parametros = " '$_nombre_estado_tramites'  ";
                    $estado_tramites->setFuncion($funcion);
                    $estado_tramites->setParametros($parametros);
                    $resultado=$estado_tramites->Insert();
                    
                }
                
            }
            $this->redirect("EstadoTramites", "index");
            
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
    
    public function borrarId()
    {
        
        session_start();
        
        if (isset($_SESSION["usuario_usuario"]))
        {
            if(isset($_GET["id_estado_tramites"]))
            {
                $id_estado_tramites=(int)$_GET["id_estado_tramites"];
                
                $estado_tramites=new EstadoTramitesModel();
                
                $estado_tramites->deleteBy(" id_estado_tramites",$id_estado_tramites);
                
            }
            
            $this->redirect("EstadoTramites", "index");
            
            
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
    
    
    
    
    
    
    
    
}
?>