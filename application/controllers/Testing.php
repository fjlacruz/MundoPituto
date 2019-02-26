<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Testing extends CI_Controller
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
    function inicio()
    {
    $variablesSesion = $this->session->userdata('usuario');
    $id_usuario      = ($variablesSesion['id_usuario']);

    $this->session->set_flashdata('correcto', 'Galeria Creada con Exito...!');

    $this->load->view('plantillas/administracion/header');
   // $this->load->view('plantillas/menu');
    $this->load->view('testing');
    $this->load->view('plantillas/footer');
   }


  function prueba()
  {
    extract($_POST);
    $uno=$this->input->post('uno');
    $dos = $this->input->post('dos');
    $tres= $uno.' '.$dos;
    echo $tres;
    exit;
  }


   function cargar_galerias()
    {
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
            "id_usuario" => ($variablesSesion['id_usuario'])
        );

      $carpeta = 'archivos/'; //Declaramos el nombre de la carpeta que guardara los archivos
      
      if(!file_exists($carpeta)){
        mkdir($carpeta, 0777) or die("Hubo un error al crear el directorio de almacenamiento"); 
      }
      
      $dir=opendir($carpeta);
      $target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
      $this->Consultas_usuarios_model->guardar_foto_galeria($datos);
      
  
      if(move_uploaded_file($fuente, $target_path)) { 
        echo "Los archivos $archivonombre se han cargado de forma correcta.<br>";
        } else {  
        echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
      }
      closedir($dir); //Cerramos la conexion con la carpeta destino
    }
  }

    $this->load->view('plantillas/administracion/header');
    $this->load->view('plantillas/menu');
    $this->load->view('testing');
    $this->load->view('plantillas/footer');
   }
}


