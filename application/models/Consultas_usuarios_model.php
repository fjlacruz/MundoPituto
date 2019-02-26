<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consultas_usuarios_model extends CI_Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    
    //obtenemos las entradas de todos o un usuario, dependiendo
    // si le pasamos le id como argument o no
    
    public function consultar_usuario($usuario = false, $clave = false)
    {
        $parametros = get_defined_vars();
        $sql        = "SELECT u.cedula,u.nombres,u.id_perfil,u.id_usuario,u.correo,u.usuario
                              from t_usuarios u
                             
                              where usuario='{$usuario}' and clave='{$clave}' and u.estatus='1'";

        $query      = $this->db->query($sql);
        $result     = $query->result();
        return $query->result();

    }
    
    public function existe_correo($correo)
    {
        $sql    = "SELECT * from t_usuarios where correo = '{$correo}'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        //print_r($result);
        //exit;
        if (isset($result[0])) {
            return "1";
        } else {
            return "0";
        }
    }
    
    public function existe_usuario($cedula)
    {
        $sql    = "SELECT * from t_usuarios where cedula = '{$cedula}'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        //print_r($result);
        //exit;
        if (isset($result[0])) {
            return "1";
        } else {
            return "0";
        }
    }
    public function existe_usuario2($usuario)
    {
        $sql    = "SELECT * from t_usuarios where usuario = '{$usuario}'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        //print_r($result);
        //exit;
        if (isset($result[0])) {
            return "1";
        } else {
            return "0";
        }
    }

    public function existe_foto($id_usuario)
    {
        $sql    = "SELECT * from t_fotos where id_usuario = '{$id_usuario}'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        //print_r($result);
        //exit;
        if (isset($result[0])) {
            return "1";
        } else {
            return "0";
        }
    }

     public function existe_foto_galeria($id_usuario, $categoria)
    {
        $sql    = "SELECT * from t_fotos_galeria where id_usuario = '{$id_usuario}' and categoria && '{$categoria}'";
        $query  = $this->db->query($sql);
        $result = $query->result();
        //print_r($result);
        //exit;
        if (isset($result[0])) {
            return "1";
        } else {
            return "0";
        }
    }
    // ============== Funcion para registrar usuarios ==========================//

    public function usuarios_guardar($data){
        $this->db->insert("t_usuarios",$data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        else{
            return false;
        }
    }
    
    // ============== Funcion para modificar usuarios ==========================// 
    public function actualizar_usuario($rol, $estatus, $id)
    {
        // extract($$arrayData2);
        $sql   = "UPDATE  t_usuarios set rol = '{$rol}',
                                      estatus = '{$estatus}'                          
                                      where id_usuario={$id}";
        $query = $this->db->query($sql);
        // return $query->result();          
    }
    
    // ============== Funcion para cargar la tabla de usuarios ==========================//
    public function usuarios_todos()
    {
        $query = $this->db->query("select u.cedula as cedula, u.id_perfil,r.descripcion_perfil,u.nombres, u.usuario ,u.correo,
case when u.estatus= 1 then 'HABILITADO' else 'DESHABILITADO' end as estatus,u.id_usuario
    from t_usuarios u
    left join n_perfil r on (r.id_perfil=u.id_perfil)
    order by u.id_usuario desc");
        return $query->result();
    }
    //===== funcion para consultar datos del usuario (de la variable de sesion) ==========///
    public function buscar_usuario($id_usuario)
    {
    $query = $this->db->query("SELECT a.id_usuario,a.cedula, a.nombres,a.correo,a.usuario, a.id_perfil,a.fecha_registro,a.telefono,a.conocimientos_habilidades,a.experiencia,
        case when a.estatus= 1 then 'HABILITADO' else 'DESHABILITADO' end estatus
               from t_usuarios a 
               where a.id_usuario = '{$id_usuario}'");
        return $query->result();
    }
    

    public function consultar_foto($id_usuario)
    {
    $query = $this->db->query("select foto from t_fotos where id_usuario='{$id_usuario}'");
        return $query->result();
    }
    
    // ============== Funcion para modificar datos de  usuarios ==========================// 
    public function modificar_usuario_cedula($cedula, $correo, $usuario,$telefono,$conocimientos_habilidades,$experiencia)
    {
        // extract($$arrayData2);
        $sql   = "UPDATE  t_usuarios set correo  = '{$correo}',
                                         usuario = '{$usuario}',
                                         telefono = '{$telefono}',
                                         conocimientos_habilidades = '{$conocimientos_habilidades}',
                                         experiencia = '{$experiencia}'

                                  where cedula='{$cedula}'";
        $query = $this->db->query($sql);
        // return $query->result();          
    }
    // ============== Funcion para actualizar contrase�a ==========================// 
    public function actualizar_contrasenia2($cedula, $clave)
    {
        // extract($$arrayData2);
        $sql   = "UPDATE  t_usuarios set clave = '{$clave}'                          
                                  where cedula='{$cedula}'";
        $query = $this->db->query($sql);
        // return $query->result();          
    }
    // ============== Funcion para actualizar contrase�a aletoria envia al correo ==========================// 
    public function actualizar_contrasenia($correo, $clave)
    {
        // extract($$arrayData2);
        $sql   = "UPDATE  t_usuarios set clave = '{$clave}'                          
                                  where correo='{$correo}'";
        $query = $this->db->query($sql);
        // return $query->result();          
    }
    
    public function fecha_registro()
    {

        $query = $this->db->query("SELECT fecha_registro from t_usuarios order by fecha_registro desc limit 1");
        return $query->result();
        
        
    }
    // ============== Funcion para cargar la tabla de usuarios ==========================//
    public function get_perfiles()
    {
        $query = $this->db->query("select * from n_perfil");
        return $query->result();
    }
    public function get_perfiles_login()
    {
        $query = $this->db->query("select * from n_perfil where id_perfil not in (1)");
        return $query->result();
    }
    
    public function get_categorias()
    {
        $query = $this->db->query("select * from n_categorias order by descripcion_categoria asc");
        return $query->result();
    }
    public function get_sub_categoria($id_categoria)
    {
        $query = $this->db->query("select id_sub_categoria,descripcion_sub_categoria 
                                   FROM n_sub_categorias 
                                   where id_categoria ={$id_categoria}");
        return $query->result();
    }

    public function guardar_foto($data){
        $this->db->insert("t_fotos",$data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        else{
            return false;
        }
    }

    public function guardar_foto_galeria($data){
        $this->db->insert("t_fotos_galeria",$data);

        if ($this->db->affected_rows() > 0) {
            return true;
        }
        else{
            return false;
        }
    }

    public function actualizar_foto($id_usuario,$data){
        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('t_fotos', $data); 
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        else{
            return false;
        }
    }

    public function mostrar_foto($id_usuario)
    {
        $query = $this->db->query("select foto FROM t_fotos  where id_usuario ={$id_usuario}");
        return $query->result();
    }

    public function mostrar_foto_pituto($id_usuarioP)
    {
        $query = $this->db->query("select foto FROM t_fotos  where id_usuario ={$id_usuarioP}");
        return $query->result();
    }
    public function buscar_categorias_usuario($id_usuario)
    {
    $query = $this->db->query("select id_usuario,categoria from t_usuarios where id_usuario='{$id_usuario}'");
        return $query->result();
    }

    public function mostrar_fotos_galeria($id_usuario,$categoria)
    {
        $query = $this->db->query("select id_foto_galeria,id_usuario,foto,categoria 
                                  from t_fotos_galeria 
                                  where id_usuario='{$id_usuario}' and categoria && '{$categoria}'");
        return $query->result();
    }

      public function delete_foto_galeria($id_foto_galeria)
  {
    $this->db->where('id_foto_galeria', $id_foto_galeria);
  
      $this->db->delete('t_fotos_galeria');
  }




   
    
}
?>