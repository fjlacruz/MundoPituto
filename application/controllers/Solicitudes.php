<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Solicitudes extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('Pgsql');
        $this->load->model('Consultas_usuarios_model');
        $this->load->model('Solicitud_model');
        $this->load->model('Events_model');
        $this->load->library('parser');
        $this->load->library("session");
    }
    //========================== PAGINA CUANDO INICIAMOS SESION ================================================//
    function solicitudes()
    {
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuario      = ($variablesSesion['id_usuario']);
        if ($id_usuario == "") {
            echo "<script>
                alert('Sesion cerrada por inactividad');
                location.href ='https://127.0.0.1/MundoPituto/';
                </script>";
        } else {
            
            $variablesSesion = $this->session->userdata('usuario');
            $id_usuario      = ($variablesSesion['id_usuario']);
            $id_perfil      = ($variablesSesion['id_perfil']);
            if($id_perfil==3){ //==== verificamos si el usuario es pituto =========================

            $this->load->view('plantillas/administracion/header');
            $this->load->view('plantillas/menu');
            $this->load->view('tabla_solicitudes_pendientes');
            $this->load->view('plantillas/footer');
        
            }else{
            $data_categorias['categorias']        = $this->Consultas_usuarios_model->get_categorias();
            $solicitudes_pendientes['pendientes'] = $this->Solicitud_model->cantidad_pendientes($id_usuario);
            $solicitudes_cerradas['cerradas']     = $this->Solicitud_model->cantidad_cerradas($id_usuario);
            $solicitudes_procesando['procesando'] = $this->Solicitud_model->cantidad_procesando($id_usuario);
            $data_regiones['regiones']            = $this->Solicitud_model->regiones();

            $this->load->view('plantillas/administracion/header');
            $this->load->view('plantillas/menu');
            $this->load->view('tabla_solicitudes_pendientes', $data_categorias + $solicitudes_pendientes + $solicitudes_cerradas + $solicitudes_procesando + $data_regiones);
            $this->load->view('plantillas/footer');
            }       
        }
    }
    //====================== Funcion que carga los datos de las solicitudes pendientes en la tabla ===========================//
    public function tabla()
    {
            $variablesSesion = $this->session->userdata('usuario');
            $id_usuario      = ($variablesSesion['id_usuario']);
            $id_perfil      = ($variablesSesion['id_perfil']);
            
            $arrayData          = array();
            if($id_perfil==3){
                $vars['resultados'] = $this->Solicitud_model->solicitudes_pendientes_todas();
            }else{
               $vars['resultados'] = $this->Solicitud_model->solicitudes_pendientes($id_usuario);
            }
            //print_r($vars);
            $this->load->view('tabla_pendientes', $vars);
        
    }

    public function tabla_en_vivo()
    {
       
    $arrayData  = array();
    $vars['resultados'] = $this->Solicitud_model->solicitudes_pendientes_todas();
           
            //print_r($vars);
            $this->load->view('tabla_pendientes_vivo', $vars);
        
    }

    public function solicitudes_cerradas()
    {
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuario      = ($variablesSesion['id_usuario']);
        if ($id_usuario == "") {
            echo "<script>
                alert('Sesion cerrada por inactividad');
                location.href ='https://127.0.0.1/MundoPituto/';
                </script>";
            
        } else {
            $variablesSesion                      = $this->session->userdata('usuario');
            $id_usuario                           = ($variablesSesion['id_usuario']);
            $data_categorias['categorias']        = $this->Consultas_usuarios_model->get_categorias();
            $solicitudes_pendientes['pendientes'] = $this->Solicitud_model->cantidad_pendientes($id_usuario);
            $solicitudes_cerradas['cerradas']     = $this->Solicitud_model->cantidad_cerradas($id_usuario);
            $vars['resultados']                   = $this->Solicitud_model->solicitudes_cerradas($id_usuario);
            $solicitudes_procesando['procesando'] = $this->Solicitud_model->cantidad_procesando($id_usuario);
            //print_r($vars);
            
            //print_r($id_usuario);
            $this->load->view('plantillas/administracion/header');
            $this->load->view('plantillas/menu');
            $this->load->view('tabla_solicitudes_cerradas', $data_categorias + $solicitudes_pendientes + $solicitudes_cerradas + $vars + $solicitudes_procesando);
            $this->load->view('plantillas/footer');
        }
    }
    public function solicitudes_procesando()
    {
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuario      = ($variablesSesion['id_usuario']);
        if ($id_usuario == "") {
            echo "<script>
                alert('Sesion cerrada por inactividad');
                location.href ='https://127.0.0.1/MundoPituto/';
                </script>";
            
        } else {
            $variablesSesion                      = $this->session->userdata('usuario');
            $id_usuario                           = ($variablesSesion['id_usuario']);
            $data_categorias['categorias']        = $this->Consultas_usuarios_model->get_categorias();
            $solicitudes_pendientes['pendientes'] = $this->Solicitud_model->cantidad_pendientes($id_usuario);
            $solicitudes_cerradas['cerradas']     = $this->Solicitud_model->cantidad_cerradas($id_usuario);
            $vars['resultados']                   = $this->Solicitud_model->solicitudes_procesando($id_usuario);
            $solicitudes_procesando['procesando'] = $this->Solicitud_model->cantidad_procesando($id_usuario);
            
            //print_r($id_usuario);
            $this->load->view('plantillas/administracion/header');
            $this->load->view('plantillas/menu');
            $this->load->view('tabla_solicitudes_procesando', $data_categorias + $solicitudes_pendientes + $solicitudes_cerradas + $vars + $solicitudes_procesando);
            $this->load->view('plantillas/footer');
        }
    }
    public function eliminar_solicitud_pendiente($id_solicitud)
    {
        $this->Solicitud_model->delete_solicitud_pendiente($id_solicitud);
        echo json_encode(array(
            "status" => TRUE
        ));
    }
    
    
    public function obtener_sub_categoria()
    {
        extract($_GET);
        $datos = $this->Consultas_usuarios_model->get_sub_categoria($id_categoria);
        $combo = "<select name='id_sub_categoria' id='id_sub_categoria' class='form-control'>";
        foreach ($datos as $subC) {
            $combo .= "<option value='" . $subC->id_sub_categoria . "'>$subC->descripcion_sub_categoria";
            
        }
        $combo .= "</select>";
        echo $combo;
    }
    public function consultar_solicitudes_pendientes_id()
    {
        extract($_GET);
        $variablesSesion                      = $this->session->userdata('usuario');
        $id_usuario                           = ($variablesSesion['id_usuario']);
        $array_categoria = $this->input->get('categoria');
        $categoria = '{' . $array_categoria . '}';


        $data['resultados'] = $this->Solicitud_model->get_idSolicitud_pendiente($id_solicitud, $categoria);
        //print_r($data);
        $solicitudes_pendientes['pendientes'] = $this->Solicitud_model->cantidad_pendientes($id_usuario);
        $solicitudes_cerradas['cerradas']     = $this->Solicitud_model->cantidad_cerradas($id_usuario);
        $solicitudes_procesando['procesando'] = $this->Solicitud_model->cantidad_procesando($id_usuario);

        $data_categorias['categorias'] = $this->Consultas_usuarios_model->get_categorias();
        $data_regiones['regiones'] = $this->Solicitud_model->regiones();
        
        $this->load->view('plantillas/administracion/header');
        $this->load->view('plantillas/menu');
        $this->load->view('editar_solicitud', $data +$solicitudes_pendientes+$solicitudes_cerradas+$solicitudes_procesando+ $data_categorias+$data_regiones);
     
    }
    
    public function actualizar_solicitud()
    {

        extract($_POST);
        //print_r($_POST); exit;
        
        $param['id_solicitud']          = $this->input->post('id_solicitud');
        $param['tipo_solicitud']        = strtoupper($this->input->post('tipo_solicitud'));
        $param['descripcion_solicitud'] = strtoupper($this->input->post('descripcion_solicitud'));
        $param['region_id']             = $this->input->post('region_id');
        $param['provincia_id']          = $this->input->post('provincia_id');
        $param['comuna_id']             = $this->input->post('comuna_id');
        
        $datos = $this->Solicitud_model->upd($param);
        //echo json_encode($datos);
        //redirect('Solicitudes/solicitudes', 'refresh');
        echo "<script>
          alertify.log('Solicitud finalizada...!!'); 
        </script>";
        redirect('Solicitudes/solicitudes', 'refresh');
        
    }
    //============== FUNCION QUE INSERTA LOS DATOS EN LA BASE DE DATOS ===============        
    public function registrar_solicitud()
    {
        
        extract($_POST);
        //print_r($_POST);exit();
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuario      = ($variablesSesion['id_usuario']);
        $id_solicitud=31;

        $array_categoria=$this->input->post('categoria');
        $categoria= '{'.$array_categoria.'}';
        
        $arrayData = array(
            'id_usuario' => $id_usuario,
            'categoria' => $categoria,
            'region_id' => $region_id,
            'provincia_id' => $provincia_id,
            'comuna_id' => $comuna_id,
            'descripcion_solicitud' => strtoupper($descripcion_solicitud),
            'tipo_solicitud' => $tipo_solicitud
             
        );
        $this->Solicitud_model->solicitud_guardar($arrayData);
        //$this->Solicitud_model->buscar_pitutos($categoria, $id_solicitud);
           
    }

    
    
    public function VerPitutos()
    {
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuario      = ($variablesSesion['id_usuario']);
        if ($id_usuario == "") {
            echo "<script>
                alert('Sesion cerrada por inactividad');
                location.href ='https://127.0.0.1/MundoPituto/';
                </script>";
            
        } else {
            $arrayData = array();
            extract($_GET);
            //print_r($_GET); exit();
            $array_categoria=$this->input->get('categoria');
            $categoria= '{'.$array_categoria.'}';
            //print_r($categoria); exit();
            
            $variablesSesion = $this->session->userdata('usuario');
            $id_usuario      = ($variablesSesion['id_usuario']);
            $arrayData[] = $id_usuario;
            
            $solicitudes_pendientes['pendientes'] = $this->Solicitud_model->cantidad_pendientes($id_usuario);
            $solicitudes_cerradas['cerradas']     = $this->Solicitud_model->cantidad_cerradas($id_usuario);
            $solicitudes_procesando['procesando'] = $this->Solicitud_model->cantidad_procesando($id_usuario);
            
            $vars['resultados']                   = $this->Solicitud_model->buscar_pitutos($categoria, $id_solicitud);
            //print_r($vars);//exit;
            $data_id_solicitud['solicitud']       = $this->Solicitud_model->consultar_id_solicitud($id_solicitud);
            $verficacion['verficacion']           = $this->Consultas_usuarios_model->existe_foto($id_usuario);
            //print_r($verficacion);

            
            $this->load->view('plantillas/administracion/header');
            $this->load->view('plantillas/menu');
            $this->load->view('tabla_pitutos', $vars+$solicitudes_pendientes+$solicitudes_cerradas+$data_id_solicitud+$solicitudes_procesando+$verficacion);
            
        }
    }
    public function VerDetallesPitutos()
    {
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuario      = ($variablesSesion['id_usuario']);
        if ($id_usuario == "") {
            echo "<script>
                alert('Sesion cerrada por inactividad');
                location.href ='https://127.0.0.1/MundoPituto/';
                </script>";
            
        } else {

            extract($_GET);
            //print_r($_GET);
            $arrayData = array();
            $arrayData2[] = $id_usuarioP;
            
            $variablesSesion = $this->session->userdata('usuario');
            $id_usuario      = ($variablesSesion['id_usuario']);
            
            $solicitudes_pendientes['pendientes'] = $this->Solicitud_model->cantidad_pendientes($id_usuario);
            $solicitudes_cerradas['cerradas']     = $this->Solicitud_model->cantidad_cerradas($id_usuario);
            $solicitudes_procesando['procesando'] = $this->Solicitud_model->cantidad_procesando($id_usuario);
            
            $arrayData           = $id_usuarioP;
           
            
            $vars['resultados']  = $this->Solicitud_model->buscar_detalles_pitutos($id_usuarioP,$categoria);
            $perfil_pituto['perfil']  = $this->Solicitud_model->perfil_pituto($id_usuarioP,$categoria);
            $data_galeria['galeria']=$this->Solicitud_model->galeria_pituto($id_usuarioP, $categoria);
            $verficacion_galeria['verf_foto_galeria'] = $this->Consultas_usuarios_model->existe_foto_galeria($id_usuarioP, $categoria);
            //print_r($verficacion_galeria);
            $verficacion['verf'] = $this->Solicitud_model->existen_datos($id_usuarioP); //verficamos que existan datos en la tabla t_asignacion_solicitud
            $verficacion_foto['verf_foto'] = $this->Consultas_usuarios_model->existe_foto($id_usuarioP);

            $data_foto['foto_usuario'] = $this->Consultas_usuarios_model->mostrar_foto_pituto($id_usuarioP);
            //print_r($data_foto);

            $data_solicitud_usuario['solicitud_usuario'] = $this->Solicitud_model->consultar_id_solicitud_usuario($id_solicitud, $id_usuarioP);
            
            $this->load->view('plantillas/administracion/header');
            $this->load->view('plantillas/menu');
            $this->load->view('detalles_pituto', $vars + $solicitudes_pendientes + $solicitudes_cerradas + $verficacion + $data_solicitud_usuario + $solicitudes_procesando+$data_foto+$verficacion_foto+$perfil_pituto +$data_galeria +$verficacion_galeria);
        }
    }
    
    public function registrar_contratacion()
    {      
        extract($_POST);

         $variablesSesion = $this->session->userdata('usuario');
         $id_usuario_solicitante  = ($variablesSesion['id_usuario']);

        $arrayData = array(
            'id_solicitud'           => $id_solicitud,
            'id_usuario'             => $id_usuario, //==== usuario pituto  =====//
            'id_usuario_solicitante' => $id_usuario_solicitante
        );
        $this->Solicitud_model->guardar_contratacion($arrayData);
        $this->Solicitud_model->upd_estatus_solicitud($id_solicitud);
    }

    public function valoracion()
    {
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuario      = ($variablesSesion['id_usuario']);
        if ($id_usuario == "") {
            echo "<script>
                alert('Sesion cerrada por inactividad');
                location.href ='https://127.0.0.1/MundoPituto/';
                </script>";
            
        } else {
            $arrayData = array();
            extract($_GET);
            
            $variablesSesion = $this->session->userdata('usuario');
            $id_usuario      = ($variablesSesion['id_usuario']);
            
            $solicitudes_pendientes['pendientes'] = $this->Solicitud_model->cantidad_pendientes($id_usuario);
            $solicitudes_cerradas['cerradas']     = $this->Solicitud_model->cantidad_cerradas($id_usuario);
            $solicitudes_procesando['procesando'] = $this->Solicitud_model->cantidad_procesando($id_usuario);
            $data_id_solicitud['solicitud']       = $this->Solicitud_model->consultar_id_solicitud_valoracion($id_solicitud);

            $this->load->view('plantillas/administracion/header');
            $this->load->view('plantillas/menu');
            $this->load->view('finalizar_solicitud', $solicitudes_pendientes + $solicitudes_cerradas + $solicitudes_procesando +$data_id_solicitud);
        }
    }
    public function finalizar_solicitud()
    {
        extract($_POST);

        $valoracion = strtoupper($this->input->post('valoracion'));
        $puntuacion = $this->input->post('puntuacion');
        
        $this->Solicitud_model->finalizar_solicitud($id_solicitud,$valoracion,$puntuacion);
        $this->Solicitud_model->cerrar_solicitud($id_solicitud);
    }

    public function verDetallesPitutoAsignado()
    {
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuario      = ($variablesSesion['id_usuario']);
        if ($id_usuario == "") {
            echo "<script>
                alert('Sesion cerrada por inactividad');
                location.href ='https://127.0.0.1/MundoPituto/';
                </script>";
            
        } else {
            $arrayData = array();
            extract($_GET);
            //print_r($_GET);

            $variablesSesion                      = $this->session->userdata('usuario');
            $id_usuario                           = ($variablesSesion['id_usuario']);
            $solicitudes_pendientes['pendientes'] = $this->Solicitud_model->cantidad_pendientes($id_usuario);
            $solicitudes_cerradas['cerradas']     = $this->Solicitud_model->cantidad_cerradas($id_usuario);
            $solicitudes_procesando['procesando'] = $this->Solicitud_model->cantidad_procesando($id_usuario);
            $vars['resultados']                   = $this->Solicitud_model->solicitudes_procesando($id_usuario);
            $data['result'] = $this->Solicitud_model->buscar_detalles_pitutos_asignado($id_solicitud);
            //print_r($data);

            $this->load->view('plantillas/administracion/header');
            $this->load->view('plantillas/menu');
            $this->load->view('pituto_asignado_detalle', $data+$vars+$solicitudes_cerradas+$solicitudes_pendientes+$solicitudes_procesando);
            
        }
    }       
    public function registrar_mensajes()
    {

        extract($_POST);
        //print_r($_POST);exit();
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuarioS = ($variablesSesion['id_usuario']);

        $arrayData = array(
            'id_usuarios' => $id_usuarioS,
            'id_usuariop' => $id_usuarioP,
            'id_solicitud' => $id_solicitud,
            'mensaje' => strtoupper($mensaje),
            'estatus' => 1
        );

        $this->Solicitud_model->mensaje_guardar($arrayData);
         redirect('Solicitudes/mensajes', 'refresh');
    }


    public function registrar_mensajesPit()
    {

        extract($_POST);
        //print_r($_POST);exit();
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuarioP = ($variablesSesion['id_usuario']);

        $arrayData = array(
            'id_usuarios' => $id_usuarios,
            'id_usuariop' => $id_usuarioP,
            'id_solicitud' => $id_solicitud,
            'mensaje' => strtoupper($mensaje),
            'estatus' => 2
        );

        $this->Solicitud_model->mensaje_guardar($arrayData);
         redirect('Solicitudes/mensajes', 'refresh');
    }



     public function mensajes()
    {
     $variablesSesion = $this->session->userdata('usuario');
     $id_usuario = ($variablesSesion['id_usuario']);
     $id_perfil = ($variablesSesion['id_perfil']);

     if($id_perfil==3){
     $vars_enviados['resultados'] = $this->Solicitud_model->mensajes_enviados_pituto($id_usuario);
     $vars_recibidos['resultados_recb'] = $this->Solicitud_model->mensajes_recibidos_pituto($id_usuario);
     
     }else{
     $vars_enviados['resultados'] = $this->Solicitud_model->mensajes_enviados_solicitante($id_usuario);
     $vars_recibidos['resultados_recb'] = $this->Solicitud_model->mensajes_recibidos_solicitante($id_usuario);

     }

    $this->load->view('plantillas/administracion/header');
    $this->load->view('plantillas/menu');
    $this->load->view('mensajes_view', $vars_enviados + $vars_recibidos);
    }

    public function carga_msj_enviados()
    {
     $variablesSesion = $this->session->userdata('usuario');
     $id_usuario = ($variablesSesion['id_usuario']);
     $id_perfil = ($variablesSesion['id_perfil']);

     if($id_perfil==3){
     $vars_enviados['resultados'] = $this->Solicitud_model->mensajes_enviados_pituto($id_usuario);
     $vars_recibidos['resultados_recb'] = $this->Solicitud_model->mensajes_recibidos_pituto($id_usuario);
     
     }else{
     $vars_enviados['resultados'] = $this->Solicitud_model->mensajes_enviados_solicitante($id_usuario);
     $vars_recibidos['resultados_recb'] = $this->Solicitud_model->mensajes_recibidos_solicitante($id_usuario);

     }
    $this->load->view('tabla_msj_enviados', $vars_enviados + $vars_recibidos);
    }


    public function carga_msj_recibidos()
    {
     $variablesSesion = $this->session->userdata('usuario');
     $id_usuario = ($variablesSesion['id_usuario']);
     $id_perfil = ($variablesSesion['id_perfil']);

     if($id_perfil==3){
     $vars_enviados['resultados'] = $this->Solicitud_model->mensajes_enviados_pituto($id_usuario);
     $vars_recibidos['resultados_recb'] = $this->Solicitud_model->mensajes_recibidos_pituto($id_usuario);
    
     }else{
     $vars_enviados['resultados'] = $this->Solicitud_model->mensajes_enviados_solicitante($id_usuario);
     $vars_recibidos['resultados_recb'] = $this->Solicitud_model->mensajes_recibidos_solicitante($id_usuario);
     }
    $this->load->view('tabla_msj_recibidos', $vars_enviados + $vars_recibidos);
    }


    public function contar_mensajes_solicitante()
    {
    $variablesSesion = $this->session->userdata('usuario');
    $id_usuario = ($variablesSesion['id_usuario']);
    $vars['resultados'] = $this->Solicitud_model->contar_mensajes($id_usuario);

    $this->load->view('conteo_mensajes_view', $vars);
    }


    public function contar_mensajes_pituto()
    {
    $variablesSesion = $this->session->userdata('usuario');
    $id_usuario = ($variablesSesion['id_usuario']);
    $vars['resultados'] = $this->Solicitud_model->contar_mensajesPituto($id_usuario);

    $this->load->view('conteo_mensajesPit_view', $vars);
    }


    public function eliminar_mensaje_solicitante($id_mensaje)
    {
     
        $datos = $this->Solicitud_model->upd_eliminado_solicitante($id_mensaje);
        echo json_encode($datos);
    }

    public function eliminar_mensaje_pituto($id_mensaje)
    {
     
        $datos = $this->Solicitud_model->upd_eliminado_pituto($id_mensaje);
        echo json_encode($datos);
    }

    public function responder_msj_pituto_solicitante()
    {
        extract($_GET); 
        $vars['resultados'] = $this->Solicitud_model->consultar_datos_mensaje($id_solicitud, $id_mensaje);
        $this->Solicitud_model->marcar_msj_leido($id_solicitud, $id_mensaje);
        //print_r($vars); exit();

        $this->load->view('plantillas/administracion/header');
        $this->load->view('plantillas/menu');
        $this->load->view('responder_mensajes_PS_view',$vars);

    }

    

 

    
}