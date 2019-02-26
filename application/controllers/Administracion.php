<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Administracion extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('Pgsql');
        $this->load->model('Consultas_usuarios_model');
        $this->load->model('Events_model');
        $this->load->library('parser');
    }

     public function tabla() {
        $arrayData = array();

        $vars['resultados'] =  $this->Consultas_usuarios_model->usuarios_todos();
    
        $this->load->view('administracion/tabla', $vars);
    }

    public function usuarios() {

        $arrayData = array();
        
        $data_perfiles['perfiles'] = $this->Consultas_usuarios_model->get_perfiles();
        $data_categorias['categorias'] = $this->Consultas_usuarios_model->get_categorias();
        
        $this->load->view('plantillas/administracion/header');
        $this->load->view('plantillas/menu');
        $this->load->view('administracion/tabla_usuarios',$data_perfiles+$data_categorias);
        $this->load->view('plantillas/footer');

    }

    public function obtener_sub_categoria() {
        extract($_GET);
        $datos = $this->Consultas_usuarios_model->get_sub_categoria($id_categoria);
        $combo = "<select name='id_sub_categoria' id='id_sub_categoria' class='form-control'>";
        foreach ($datos as $subC) {
            $combo .= "<option value='" . $subC->id_sub_categoria . "'>$subC->descripcion_sub_categoria";
            
        }
        $combo .= "</select>";
        echo $combo;
    }

    //=========================== FUNCION PARA ACTUALIZAR EL ROL Y ESTATUS =================================================       

    public function actualizar_usuario() {

        $param['id'] = $this->input->post('id');
        $param['usuario'] = strtoupper($this->input->post('usuario_modal'));
        $param['correo'] = strtoupper($this->input->post('correo_modal'));
        $param['estatus'] = $this->input->post('estatus_modal');
        $param['rol'] = $this->input->post('rol_modal');
        $param['id_comunidad'] = $this->input->post('id_comunidad_modal');
        $param['nombres'] = $this->input->post('nombres_modal');
        $param['apellidos'] = $this->input->post('apellidos_modal');

        $datos = $this->Events_model->upd($param);
        echo json_encode($datos);
        
    }
//============== FUNCION QUE INSERTA LOS DATOS EN LA BASE DE DATOS ===============        
  public function registrar_usuario(){
 
        extract($_POST); 
        
        $opcionesArray='';
            $separadorOpciones='';
            
                foreach($_POST['categoria'] as $valorOpciones)
                {
                    $opcionesArray.=$separadorOpciones.$valorOpciones;
                    $separadorOpciones=',';
                }
                $categorias= '{'.$opcionesArray.'}';

        
         $arrayData = array(
              'cedula'=>$cedula,
              'nombres'=>strtoupper($nombres),
              'telefono'=>$telefono,
              'correo'=>strtoupper($correo),
              'id_perfil'=> $id_perfil, 
              'categoria'=> $categorias,
              'region_id'=> $region_id,
              'provincia_id'=> $provincia_id,
              'comuna_id'=> $comuna_id,
              'usuario'=>strtoupper($usuario),
              'clave'=>md5($clave),
              'tipo_persona'=>strtoupper($tipo_persona),
             
        );
       $this->Consultas_usuarios_model->usuarios_guardar($arrayData);     
     }  

//===== funcion para obtener la ip del usuario ========///
    function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        return $_SERVER['REMOTE_ADDR'];
    }

    public function eliminar_usuario($id_usuario)
	{
		$this->Events_model->delete_user($id_usuario);
		echo json_encode(array("status" => TRUE));
	}
//================== FUNCION QUE CONSULTA TODOS LOS DATOS DE LA TABLA =============
    public function usuarioModificar() {

        $variablesSesion = $this->session->userdata('usuario');
        $cedula = $variablesSesion['cedula'];
        $id_usuario = $variablesSesion['id_usuario'];
        $arrayData[] = $id_usuario;


        $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario);
        if($verficacion==1){
         $data_foto['foto_usuario'] = $this->Consultas_usuarios_model->mostrar_foto($id_usuario);
        $this->load->view('plantillas/administracion/header');
        $this->load->view('plantillas/menu');
        $this->load->view('administracion/usuarioModificar', $data_foto);
        $this->load->view('plantillas/footer');
        } else{
            $this->load->view('plantillas/administracion/header');
        $this->load->view('plantillas/menu');
        $this->load->view('administracion/usuarioModificar');
        $this->load->view('plantillas/footer');
        }

        
    }

  //========== FUNCION PARA CONSULTAR DTOS DE USUARIO POR CEDULA DE LA VARIABLE DE SESION ========  
    function buscar_usuario() {
        extract($_POST);
        //print_r($_POST);

        $id_usuario = $this->input->post('id_usuario');
        $data = $this->Consultas_usuarios_model->buscar_usuario($id_usuario);

        echo '{"data": ' . json_encode($data) . '}';
        
    }
    
//================== FUNCION QUE ACTUALIZA LA CONTRASE�A =============
    public function contrasenna_actualizar() {

        $variablesSesion = $this->session->userdata('usuario');
        $cedula = $variablesSesion['cedula'];
        extract($_POST);

        $this->Consultas_usuarios_model->actualizar_contrasenia2($cedula,md5($clave));
    }

//================== FUNCION QUE ACTUALIZA EL CORREO =============
    function actualizarUsuario() {

        extract($_POST);

        $this->Consultas_usuarios_model->modificar_usuario_cedula($cedula,$correo,$usuario,$telefono,$conocimientos_habilidades, $experiencia);
    }

//========== FUNCION QUE CONSULTA SI YA EXISTE UN NUMERO DE CEDULA REGISTRADO =========   
    public function consultar_usuario() {

        $cedula = $_POST['cedula'];
        if ($cedula == "") {
            exit();
        }

        $consultar_cedula = $this->Consultas_usuarios_model->existe_usuario($cedula);
        if ($consultar_cedula[0]!= 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

//========== FUNCION QUE CONSULTA SI EXISTE UNA CUENTA DE CORREO ASOCIADA A UN USUARIO =========   
    public function consultar_correo2() {

        $correo = $_POST['correo'];
        if ($correo == "") {
            exit();
        }

        $consultar_correo = $this->Consultas_usuarios_model->existe_correo($correo);
        if ($consultar_correo[0]!= 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

//========== FUNCION QUE CONSULTA SI YA EXISTE UN USUARIO REGISTRADO ===============   
    public function consultar_usuario2() {

        $usuario = $_POST['usuario'];
        if ($usuario == "") {
            exit();
        }
        $consultar_usuario = $this->Consultas_usuarios_model->existe_usuario2($usuario);
        if ($consultar_usuario[0]!= 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

//=========================== FUNCION PARA ACTUALIZAR EL ROL Y ESTATUS =================================================       

 public function actualizar_estatus() {

        extract($_POST);

        $this->Consultas_usuarios_model->modificar_usuario($rol,$estatus,$id);
    }


   function do_upload() {

    $variablesSesion = $this->session->userdata('usuario');
    $id_usuario = ($variablesSesion['id_usuario']);

    $config = [
                "upload_path" => "./uploads",
                'allowed_types' => "png|jpg"
             ];

    $this->load->library("upload",$config);

    if ($this->upload->do_upload('foto')) {
        $data = array("upload_data" => $this->upload->data());
        $datos = array(
                        
            "foto" => $data['upload_data']['file_name'],
            "id_usuario" => ($variablesSesion['id_usuario'])
        );
        
         $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario);
         if($verficacion==0){
           $this->Consultas_usuarios_model->guardar_foto($datos);
            redirect('Administracion/usuarioModificar', 'refresh');
          }else{
            $this->Consultas_usuarios_model->actualizar_foto($id_usuario,$datos);
            redirect('Administracion/usuarioModificar', 'refresh');
          }
        }else{
            echo 'error en tipo de archivo';
        }
       
    }


    public function mostrarFoto() {

        extract($_POST);
        $variablesSesion = $this->session->userdata('usuario');
        $id_usuario = ($variablesSesion['id_usuario']);
        $arrayData[] = $id_usuario;

        $dato_foto = $this->Pgsql->SELECTPLSQL('consultar_foto', $arrayData);
        $foto =$dato_foto[0][2] ;
        
        $foto= pg_unescape_bytea($dato_foto[0][2]);
        file_put_contents('foto.png', $foto);   
        echo "<img src='http://127.0.0.1/MundoPituto/foto.png' />";


        $this->load->view('plantillas/administracion/header');
        $this->load->view('plantillas/menu');
        $this->load->view('administracion/detallesConsulta_view', $datos_usuario);
    }

    function galeria()
    {
    extract($_GET); 

    $array_categoria=$this->input->get('categoria');
    $categ=$this->input->get('categoria');
    $categoria= '{'.$array_categoria.'}';

    $variablesSesion = $this->session->userdata('usuario');
    $id_usuario      = ($variablesSesion['id_usuario']);

    $this->load->view('plantillas/administracion/header');
    $this->load->view('plantillas/menu');
    $this->load->view('galeria',array('categoria' => $categoria) + array('categ' => $categ));
    $this->load->view('plantillas/footer');
   }

    function cargar_galeria(){
    extract($_POST);
    $variablesSesion = $this->session->userdata('usuario');
    $id_usuario      = ($variablesSesion['id_usuario']);
    foreach($_FILES["foto"]['tmp_name'] as $key => $tmp_name)
  {
    //condicional si el fuchero existe
    if($_FILES["foto"]["name"][$key]) {
      // Nombres de archivos de temporales
      $archivonombre = $_FILES["foto"]["name"][$key]; 
      $fuente = $_FILES["foto"]["tmp_name"][$key]; 

      $datos = array(
                        
            "foto" => $archivonombre,
            "id_usuario" => ($variablesSesion['id_usuario']),
             "categoria" => $categoria
        );

      $carpeta = 'archivos/'; //Declaramos el nombre de la carpeta que guardara los archivos
      
      if(!file_exists($carpeta)){
        mkdir($carpeta, 0777) or die("Hubo un error al crear el directorio de almacenamiento"); 
      }
      
      $dir=opendir($carpeta);
      $target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
      $this->Consultas_usuarios_model->guardar_foto_galeria($datos);

       if(move_uploaded_file($fuente, $target_path)) { 
       // redirect('Administracion/usuarioModificar', 'refresh');
         //echo "Los archivos $archivonombre se han cargado de forma correcta.<br>";
         } else {  
         //echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
       }
      closedir($dir); //Cerramos la conexion con la carpeta destino
      }
    
    }
    $this->session->set_flashdata('correcto', 'Galeria Creada con Exito...!');
    redirect('Administracion/usuarioModificar', 'refresh');
   }

   public function verGaleria() {

    extract($_GET);

    $array_categoria=$this->input->get('categoria');
    $categ=$this->input->get('categoria');
    $categoria= '{'.$array_categoria.'}';

    $variablesSesion = $this->session->userdata('usuario');
    $id_usuario = ($variablesSesion['id_usuario']);

    $data_fotos['resultados']=$this->Consultas_usuarios_model->mostrar_fotos_galeria($id_usuario, $categoria);

    $this->load->view('plantillas/administracion/header');
    $this->load->view('plantillas/menu');
    $this->load->view('galeria_fotos', $data_fotos + array('categ' => $categ));
    }

    public function eliminar_foto_galeria()
    {
        extract($_GET);
        //print_r($_GET); exit();
       
        $id_foto_galeria=$this->input->get('id_foto_galeria');

        $eliminar=$this->Consultas_usuarios_model->delete_foto_galeria($id_foto_galeria);
        $this->session->set_flashdata('correcto2', 'Imagen eliminada...!');
        redirect('Administracion/usuarioModificar', 'refresh');

    
    }



}
