<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('email');
        $this->load->model('Pgsql');
        $this->load->model('Consultas_usuarios_model');
        $this->load->model('Solicitud_model');
        $this->load->library('Configemail');
        $this->load->library('user_agent');
    }
    
    public function index()
    {
        
        redirect('principal/presentacion', 'refresh');
    }

    public function presentacion()
    {
        
        $data_perfiles['perfiles']     = $this->Consultas_usuarios_model->get_perfiles_login();
        $data_categorias['categorias'] = $this->Consultas_usuarios_model->get_categorias();
        $data_solicitudes['resultados'] = $this->Solicitud_model->solicitudes_todas();
        $data_regiones['regiones'] = $this->Solicitud_model->regiones();
        $data_regiones2['regiones2'] = $this->Solicitud_model->regiones2();

        
        $this->load->view('plantillas/login/header');
        $this->load->view('menu_login');
        $this->load->view('pagina_principal', $data_perfiles + $data_categorias + $data_solicitudes +$data_regiones +$data_regiones2);
        $this->load->view('plantillas/footer');
    }

    public function obtener_provincia() {
        extract($_GET);
        $datos = $this->Solicitud_model->get_provincia($region_id);
        $combo = "<select name='provincia_id' id='provincia_id' class='form-control'>";
        $combo.="<option value='0'>Seleccione...</option>";
        foreach ($datos as $provincia) {
            $combo .= "<option value='" . $provincia->provincia_id . "'>$provincia->provincia_nombre";
            
        }
        $combo .= "</select>";
        echo $combo;
    }

    public function obtener_provincia2() {
        extract($_GET);
        $datos = $this->Solicitud_model->get_provincia($region_id2);
        $combo = "<select name='provincia_id2' id='provincia_id2' class='form-control'>";
        $combo.="<option value='0'>Seleccione...</option>";
        foreach ($datos as $provincia2) {
            $combo .= "<option value='" . $provincia2->provincia_id . "'>$provincia2->provincia_nombre";
            
        }
        $combo .= "</select>";
        echo $combo;
    }

    public function obtener_comuna() {
        extract($_GET);
        $datos = $this->Solicitud_model->get_comuna($provincia_id);
        $combo = "<select name='comuna_id' id='nombre_comuna' class='form-control'>";
        $combo.="<option value='0'>Seleccione...</option>";
   
        foreach ($datos as $comuna) {
            $combo .= "<option value='" . $comuna->comuna_id . "'>$comuna->comuna_nombre";
            
        }
        $combo .= "</select>";
        echo $combo;
    }

    public function obtener_comuna2() {
        extract($_GET);
        $datos = $this->Solicitud_model->get_comuna($provincia_id2);
        $combo = "<select name='comuna_id2' id='nombre_comuna2' class='form-control'>";
        $combo.="<option value='0'>Seleccione...</option>";
    
        foreach ($datos as $comuna2) {
            $combo .= "<option value='" . $comuna2->comuna_id . "'>$comuna2->comuna_nombre";
            
        }
        $combo .= "</select>";
        echo $combo;
    }


    function consulatarSolicitudes()
    {
        
    extract($_POST); 
    $array_categoria=$this->input->post('categoria');
    $categoria= '{'.$array_categoria.'}';

    if(($provincia_id == '') || ($comuna_id=='')){

    $data_perfiles['perfiles']     = $this->Consultas_usuarios_model->get_perfiles_login();
    $data_categorias['categorias'] = $this->Consultas_usuarios_model->get_categorias();
    $data_solicitudes['resultados'] = $this->Solicitud_model->solicitudes_todas_parametros2($categoria,$tipo_solicitud,$region_id);
    $data_regiones['regiones'] = $this->Solicitud_model->regiones();

    }
    else if($comuna_id==''){
    $data_perfiles['perfiles']     = $this->Consultas_usuarios_model->get_perfiles_login();
    $data_categorias['categorias'] = $this->Consultas_usuarios_model->get_categorias();
    $data_solicitudes['resultados'] = $this->Solicitud_model->solicitudes_todas_parametros3($categoria,$tipo_solicitud,$region_id,$provincia_id);
    $data_regiones['regiones'] = $this->Solicitud_model->regiones();

    }
    else
    {
     
    $data_perfiles['perfiles']     = $this->Consultas_usuarios_model->get_perfiles_login();
    $data_categorias['categorias'] = $this->Consultas_usuarios_model->get_categorias();
    $data_solicitudes['resultados'] = $this->Solicitud_model->solicitudes_todas_parametros($categoria,$tipo_solicitud,$region_id,$provincia_id, $comuna_id);
    $data_regiones['regiones'] = $this->Solicitud_model->regiones();

    }
        
        $this->load->view('plantillas/login/header');
        $this->load->view('menu_login');
        $this->load->view('pagina_principal', $data_perfiles + $data_categorias + $data_solicitudes +$data_regiones);
        $this->load->view('plantillas/footer');

    }

    function consultarUsuarios(){

        extract($_POST);
         //print_r($_POST);

        $array_categoria=$this->input->post('categoria');
        $categoria= '{'.$array_categoria.'}';


    if(($provincia_id2 == '0') || ($comuna_id2=='0')){
    $data['resultados'] = $this->Solicitud_model->usuarios_parametros($categoria,$region_id2);
    //print_r($data);
    $data_categorias['categorias'] = $this->Consultas_usuarios_model->get_categorias();
    $data_regiones['regiones'] = $this->Solicitud_model->regiones();
    $data_regiones2['regiones2'] = $this->Solicitud_model->regiones2();
    //print_r($data_regiones2);

     }

     else if($comuna_id2=='0'){
    $data['resultados'] = $this->Solicitud_model->usuarios_parametros2($categoria,$region_id2,$provincia_id2);
    //print_r($data);
    $data_categorias['categorias'] = $this->Consultas_usuarios_model->get_categorias();
    $data_regiones['regiones'] = $this->Solicitud_model->regiones();
    $data_regiones2['regiones2'] = $this->Solicitud_model->regiones2();
    //print_r($data_regiones2);

    
    }
    else
    {
    $data['resultados'] = $this->Solicitud_model->usuarios_parametros2($categoria,$region_id2,$provincia_id2,$comuna_id2);
    //print_r($data);
    $data_categorias['categorias'] = $this->Consultas_usuarios_model->get_categorias();
    $data_regiones['regiones'] = $this->Solicitud_model->regiones();
    $data_regiones2['regiones2'] = $this->Solicitud_model->regiones2();
    //print_r($data_regiones2);


    }
    
    $this->load->view('plantillas/login/header');
    $this->load->view('menu_login');
    $this->load->view('pagina_principal_usuarios', $data + $data_categorias + $data_regiones + $data_regiones2);
    $this->load->view('plantillas/footer');   
        
    }
    
    function inicio()
    {
        
        $data_perfiles['perfiles']     = $this->Consultas_usuarios_model->get_perfiles_login();
        $data_categorias['categorias'] = $this->Consultas_usuarios_model->get_categorias();
        $data_regiones['regiones'] = $this->Solicitud_model->regiones();
        
        $this->load->view('plantillas/login/header');
        $this->load->view('menu_login');
        $this->load->view('login', $data_perfiles + $data_categorias +$data_regiones);
        $this->load->view('plantillas/footer');
    }
    
    function login()
    {
        
        $this->load->view('plantillas/login/header');
        $this->load->view('login');
        $this->load->view('plantillas/footer');
        
        if (isset($_POST['usuario'])) {
            
            //Recogemos las variables 'usuario' y 'contrasena'
            $usuario = $this->input->post('usuario');
            $clave   = md5($this->input->post('clave'));
            
            //print_r($usuario); exit;
            $arrayValidar   = array();
            $arrayValidar[] = $usuario;
            $arrayValidar[] = $clave;
            
            // cargamos el modelo para verificar el usuario/contraseña
            // si el usuario y contraseña son correctos
            //$consultarUsuario = $this->Pgsql->SELECTPLSQL('usuarios', $arrayValidar);
            $consultarUsuario = $this->Consultas_usuarios_model->consultar_usuario($usuario, $clave);
            //print_r($consultarUsuario); exit;
            
            if ($consultarUsuario == "") {
                $consultarUsuario[0] = "";
            }
            
            if (isset($consultarUsuario[0])) {
                
                //Creamos las variables de Sesión
                $datasession = array(
                    'cedula' => $consultarUsuario[0]->cedula,
                    'nombres' => $consultarUsuario[0]->nombres,
                    'id_perfil' => $consultarUsuario[0]->id_perfil,
                    'id_usuario' => $consultarUsuario[0]->id_usuario,
                    'usuario' => $consultarUsuario[0]->usuario,
                    'correo' => $consultarUsuario[0]->correo
                    //'id_categoria' => $consultarUsuario[0]->id_categoria,
                    //'descripcion_categoria' => $consultarUsuario[0]->descripcion_categoria
                );
                
                $this->session->set_userdata('usuario', $datasession);
                $variablesSesion = $this->session->userdata('usuario');
                //print_r($variablesSesion); exit();
                
                redirect('Solicitudes/solicitudes', 'refresh');
            } else {
                // si el usuario y contraseña son incorrectos
                $this->session->set_flashdata('danger', '<div class="alert alert-danger alert-dismissable fade in" style="display:block" >
                                           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                         <i class="icon fa fa-ban"></i> <strong>Alerta! </strong>Clave Incorrecta....!!!</div>');
                redirect('principal/inicio', 'refresh');
            }
        } else {
            // SI NO EXISTE LA VARIABLE SESION REFRESCAMO EL INICIO
            redirect('principal/inicio', 'refresh');
        }
    }
    // MENSAJE QUE APARECE CUANDO SE CIERRA EL SISTEMA POR INACTIVIDAD
    function session()
    {
        $this->session->set_flashdata('info', '<div class="alert alert-info alert-dismissable fade in" style="display:block" >
                                           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                         <i class="icon fa fa-info"></i> <strong>Informacion! </strong>Sesion Cerrada por Inactividad....!!!</div>');
        redirect('principal/inicio', 'refresh');
    }
    
    
    
    // Función logout. Elimina las variables de sesión y redirige al controlador principal  
    function logout()
    {
        
        $this->session->sess_destroy();
        // redirigimos al controlador principal
        redirect('principal/presentacion', 'refresh');
    }
    
    ///CLAVES DE USUARIO recibe el tama�o de la clave
    function generarClaveAleatoria($tamanio)
    {
        $chars        = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charsLength  = strlen($chars);
        $randomString = '';
        for ($i = 0; $i < $tamanio; $i++) {
            $randomString .= $chars[rand(0, $charsLength - 1)];
        }
        return $randomString;
    }
    
    // CONSULTAMOS SI EXISTE EL CORREO 
    function consultar_correo()
    {
        extract($_POST);
        
        $consultarUsuario = $this->Consultas_usuarios_model->existe_correo($correo);
        
        if ($consultarUsuario[0] != '0') {
            echo 1;
        } else {
            echo 2;
        }
    }
    
    // ENVIAMOS LA CONTRASE�A ALEATORIA, AL CORREO REGISTRADO
    function recuperarClave()
    {
        extract($_POST);
        
        $claveNueva = $this->generarClaveAleatoria(8);
        print_r($claveNueva);
        $correo = $this->input->post('correo');
        $clave  = md5($claveNueva);
        
        $this->Consultas_usuarios_model->actualizar_contrasenia($correo, $clave);
        
        $msje = "Reciba un cordial saludo sr(a)  ud, a solicitado sus datos de acceso al sistema. 
    A continuaci�n los <b>datos de ingreso</b>: <br>

    Contrase�a: <b>" . $claveNueva . "</b>";
        
        $configuracionSrvCorreo = $this->configemail->ConfigSrvEmail();
        $this->email->initialize($configuracionSrvCorreo);
        $this->email->from('idsistemas15@gmail.com');
        $this->email->to($correo);
        $this->email->subject('Recuperación de Contraseña');
        $this->email->message($msje);
        $this->email->message($msje);
        $this->email->send();
    }
}