<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Solicitud_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function solicitud_guardar($data)
    {
        $this->db->insert("t_solicitudes", $data);
        
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function cotizacion_guardar($data)
    {
        $this->db->insert("t_solicitudes", $data);
        
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function mensaje_guardar($data)
    {
        $this->db->insert("t_mensajes", $data);
        
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function solicitudes_pendientes($id_usuario)
    {
        $query = $this->db->query("select s.id_solicitud,s.tipo_solicitud,
      s.descripcion_solicitud,s.id_usuario, u.nombres,s.categoria, to_char(s.fecha_registro,'DD-MM-YYY') as fecha_registro, case when s.estatus=1 then 'PENDIENTE' else 'CERRADA' end estatus,s.region_id,n.region_nombre,s.provincia_id,p.provincia_nombre,s.comuna_id,c.comuna_nombre
       from t_solicitudes s
       
       left join t_usuarios u on (s.id_usuario=u.id_usuario)
       left join n_regiones n on (s.region_id=n.region_id)
       left join n_provincias p on (s.provincia_id = p.provincia_id)
       left join n_comunas c on (s.comuna_id = c.comuna_id)
       where s.id_usuario='{$id_usuario}' and s.estatus='1'
       order by s.id_solicitud desc");
        
        return $query->result();
    }
    
    public function solicitudes_pendientes_todas()
    {
        $query = $this->db->query("select s.id_solicitud,s.tipo_solicitud,
      s.descripcion_solicitud,s.id_usuario, u.nombres,s.categoria, to_char(s.fecha_registro,'DD-MM-YYY') as fecha_registro, case when s.estatus=1 then 'PENDIENTE' else 'CERRADA' end estatus,s.region_id,n.region_nombre,s.provincia_id,p.provincia_nombre,s.comuna_id,c.comuna_nombre
       from t_solicitudes s
       
       left join t_usuarios u on (s.id_usuario=u.id_usuario)
       left join n_regiones n on (s.region_id=n.region_id)
       left join n_provincias p on (s.provincia_id = p.provincia_id)
       left join n_comunas c on (s.comuna_id = c.comuna_id)
       where s.estatus='1'
       order by s.id_solicitud desc limit 200");
        
        return $query->result();
    }
    
    public function solicitudes_todas()
    {
        $query = $this->db->query("select s.id_solicitud,s.tipo_solicitud,
      s.descripcion_solicitud,s.id_usuario, u.nombres, to_char(s.fecha_registro,'DD-MM-YYY') as fecha_registro, case when s.estatus=1 then 'PENDIENTE' else 'CERRADA' end estatus, s.id_usuario, f.foto
       from t_solicitudes s
       left join t_usuarios u on (s.id_usuario=u.id_usuario)
       left join t_fotos f on (s.id_usuario=f.id_usuario)
       
       order by s.id_solicitud desc limit 200");
        
        return $query->result();
    }
    
    
    public function solicitudes_todas_parametros($categoria, $tipo_solicitud, $region_id, $provincia_id, $comuna_id)
    {
        $query = $this->db->query("select s.id_solicitud,s.categoria,s.tipo_solicitud,
      s.descripcion_solicitud,s.id_usuario, u.nombres, to_char(s.fecha_registro,'DD-MM-YYY') as fecha_registro, case when s.estatus=1 then 'PENDIENTE' else 'CERRADA' end estatus, s.id_usuario, f.foto
       from t_solicitudes s
      
       left join t_usuarios u on (s.id_usuario=u.id_usuario)
       left join t_fotos f on (s.id_usuario=f.id_usuario)
       where  s.estatus='1' and  s.categoria='{$categoria}' and s.tipo_solicitud='{$tipo_solicitud}' and s.region_id='{$region_id}' and s.provincia_id='{$provincia_id}' and s.comuna_id='{$comuna_id}'
       order by s.id_solicitud desc");
        
        return $query->result();
    }
    
    public function solicitudes_todas_parametros2($categoria, $tipo_solicitud, $region_id)
    {
        $query = $this->db->query("select s.id_solicitud,s.categoria,s.tipo_solicitud,
      s.descripcion_solicitud,s.id_usuario, u.nombres, to_char(s.fecha_registro,'DD-MM-YYY') as fecha_registro, case when s.estatus=1 then 'PENDIENTE' else 'CERRADA' end estatus, s.id_usuario, f.foto
       from t_solicitudes s
       left join t_usuarios u on (s.id_usuario=u.id_usuario)
       left join t_fotos f on (s.id_usuario=f.id_usuario)
       where  s.estatus='1' and  s.categoria='{$categoria}' and s.tipo_solicitud='{$tipo_solicitud}' and s.region_id='{$region_id}'
       order by s.id_solicitud desc");
        
        return $query->result();
    }
    public function solicitudes_todas_parametros3($categoria, $tipo_solicitud, $region_id, $provincia_id)
    {
        $query = $this->db->query("select s.id_solicitud,s.categoria,s.tipo_solicitud,
      s.descripcion_solicitud,s.id_usuario, u.nombres, to_char(s.fecha_registro,'DD-MM-YYY') as fecha_registro, case when s.estatus=1 then 'PENDIENTE' else 'CERRADA' end estatus, s.id_usuario, f.foto
       from t_solicitudes s
       left join t_usuarios u on (s.id_usuario=u.id_usuario)
       left join t_fotos f on (s.id_usuario=f.id_usuario)
       where  s.estatus='1' and  s.categoria='{$categoria}' and s.tipo_solicitud='{$tipo_solicitud}' and s.region_id='{$region_id}' and s.provincia_id='{$provincia_id}'
       order by s.id_solicitud desc");
        
        return $query->result();
    }
    
    public function usuarios_parametros($categoria, $region_id2)
    {
        $query = $this->db->query("select u.id_usuario, cedula,u.nombres, u.correo, u.telefono, f.foto,
                                    u.region_id, r.region_nombre, n.provincia_nombre,
                                    (select categoria FROM regexp_split_to_table('{$categoria}', ',') AS categoria)
                                    FROM t_usuarios u  
                                    left join t_fotos f on (u.id_usuario=f.id_usuario)
                                    left join n_regiones r on (u.region_id=r.region_id)
                                    left join n_provincias n on (u.provincia_id=n.provincia_id)
                                    where categoria && '{$categoria}' and u.region_id='{$region_id2}'");
        return $query->result();
    }
    
    public function usuarios_parametros2($categoria, $region_id2, $provincia_id2)
    {
        $query = $this->db->query("select u.id_usuario, cedula,u.nombres, u.correo, u.telefono, f.foto,
                                u.region_id, r.region_nombre, n.provincia_nombre,
                                (select categoria FROM regexp_split_to_table('{$categoria}', ',') AS categoria)
                                FROM t_usuarios u  
                                left join t_fotos f on (u.id_usuario=f.id_usuario)
                                left join n_regiones r on (u.region_id=r.region_id)
                                left join n_provincias n on (u.provincia_id=n.provincia_id)
                                where categoria && '{$categoria}' and u.region_id='{$region_id2}' and u.provincia_id='{$provincia_id2}'");
        return $query->result();
    }
    public function usuarios_parametros3($categoria, $region_id2, $provincia_id2, $comuna_id2)
    {
        $query = $this->db->query("select u.id_usuario, cedula,u.nombres, u.correo, u.telefono, f.foto,
                                u.region_id, r.region_nombre, n.provincia_nombre,
                                (select categoria FROM regexp_split_to_table('{$categoria}', ',') AS categoria)
                                FROM t_usuarios u  
                                left join t_fotos f on (u.id_usuario=f.id_usuario)
                                left join n_regiones r on (u.region_id=r.region_id)
                                left join n_provincias n on (u.provincia_id=n.provincia_id)
                                where categoria && '{$categoria}' and u.region_id='{$region_id2}' and
                                 u.provincia_id='{$provincia_id2}' and u.comuna_id='{$comuna_id2}'");
        return $query->result();
    }
    
    public function solicitudes_cerradas($id_usuario)
    {
        $query = $this->db->query("select s.id_solicitud,s.categoria,s.tipo_solicitud,s.descripcion_solicitud,s.id_usuario, u.nombres, to_char(s.fecha_registro,'DD-MM-YYY') as fecha_registro, s.estatus,
       a.id_asignacion_solicitud,a.id_usuario, (select u.nombres from t_asignacion_solicitudes a left join t_usuarios u on (a.id_usuario=u.id_usuario) 
       where a.id_usuario_solicitante='{$id_usuario}' limit 1) as nombre_pituto,a.valoracion,a.puntuacion,r.region_nombre,
       p.provincia_nombre, c.comuna_nombre
       
       from t_solicitudes s
       
       left join t_usuarios u on (s.id_usuario=u.id_usuario)
       left join t_asignacion_solicitudes a on (a.id_solicitud=s.id_solicitud)
       left join n_regiones r  on (r.region_id=s.region_id)
       left join n_provincias p  on (p.provincia_id=s.provincia_id)
       left join n_comunas c  on (c.comuna_id=s.comuna_id)
       where s.estatus='2' and s.id_usuario='{$id_usuario}'
       
       order by s.id_solicitud desc");
        
        return $query->result();
    }
    
    
    public function solicitudes_procesando($id_usuario)
    {
        $query = $this->db->query("select s.id_solicitud,s.categoria,s.tipo_solicitud,s.descripcion_solicitud,s.id_usuario, u.nombres, to_char(s.fecha_registro,'DD-MM-YYY') as fecha_registro, s.estatus
       from t_solicitudes s
      
       left join t_usuarios u on (s.id_usuario=u.id_usuario)
       where s.estatus='3' and s.id_usuario='{$id_usuario}'
       order by s.id_solicitud desc");
        
        return $query->result();
    }
    public function cantidad_pendientes($id_usuario)
    {
        
        $query = $this->db->query("SELECT count(id_solicitud) as cantidad  FROM t_solicitudes where id_usuario='{$id_usuario}' and estatus='1'");
        // si hay resultados
        return $query->result();
    }
    
    public function cantidad_cerradas($id_usuario)
    {
        
        $query = $this->db->query("SELECT count(id_solicitud) as cantidad  FROM t_solicitudes where id_usuario='{$id_usuario}' and estatus='2'");
        // si hay resultados
        return $query->result();
    }
    
    public function cantidad_procesando($id_usuario)
    {
        
        $query = $this->db->query("SELECT count(id_solicitud) as cantidad  FROM t_solicitudes where id_usuario='{$id_usuario}' and estatus='3'");
        // si hay resultados
        return $query->result();
    }
    public function delete_solicitud_pendiente($id_solicitud)
    {
        $this->db->where('id_solicitud', $id_solicitud);
        
        $this->db->delete('t_solicitudes');
    }
    
    public function get_idSolicitud_pendiente($id_solicitud, $categoria)
    {
        $query = $this->db->query("SELECT s.id_solicitud, s.id_usuario, s.categoria, s.region_id,r.region_nombre,s.provincia_id,p.provincia_nombre,s.comuna_id,c.comuna_nombre, s.descripcion_solicitud,s.tipo_solicitud,
to_char(s.fecha_registro,'DD-MM-YYY') as fecha_registro, (select categoria FROM regexp_split_to_table('{$categoria}', ',') AS categoria)

from t_solicitudes s

left join n_regiones r on (s.region_id=r.region_id)
left join n_provincias p on (s.provincia_id=p.provincia_id)
left join n_comunas c on (s.comuna_id=c.comuna_id)
        
        where id_solicitud='{$id_solicitud}'");
        // si hay resultados
        return $query->result();
    }
    
    public function upd($param)
    {
        $campos = array(
            'tipo_solicitud' => $param['tipo_solicitud'],
            'descripcion_solicitud' => $param['descripcion_solicitud'],
            'region_id' => $param['region_id'],
            'provincia_id' => $param['provincia_id'],
            'comuna_id' => $param['comuna_id']
        );
        $this->db->where('id_solicitud', $param['id_solicitud']);
        $this->db->update('t_solicitudes', $campos);
        
        $query = $this->db->query("select * from t_solicitudes");
        return $query->result();
    }
    
    public function buscar_pitutos($categoria, $id_solicitud)
    {
        $query = $this->db->query("select u.cedula,u.nombres, u.id_perfil,r.descripcion_perfil,u.nombres ,u.usuario ,u.correo,u.id_usuario,f.foto, 
                                   u.region_id,n.region_nombre,u.provincia_id,p.provincia_nombre,u.comuna_id,c.comuna_nombre,
                                   (select id_solicitud from t_solicitudes where id_solicitud='{$id_solicitud}'),
                                   (select categoria FROM regexp_split_to_table('{$categoria}', ',') AS categoria)

               from t_usuarios u

               left join n_perfil r on (r.id_perfil=u.id_perfil)
               left join t_fotos f on (f.id_usuario=u.id_usuario)
               left join n_regiones n on (u.region_id=n.region_id)
               left join n_provincias p on (u.provincia_id = p.provincia_id)
               left join n_comunas c on (u.comuna_id = c.comuna_id)

               where u.categoria &&'{$categoria}' and u.estatus=1 
               order by u.id_usuario desc");
        
        return $query->result();
    }
    
    public function buscar_detalles_pitutos($id_usuarioP, $categoria)
    {
        $query = $this->db->query("select a.id_asignacion_solicitud,a.id_solicitud,a.id_usuario,a.valoracion,a.estatus, to_char(a.fecha_registro,'DD-MM-YYY') as fecha_asignacion, s.descripcion_solicitud,
                to_char(s.fecha_registro,'DD-MM-YYY') as fecha_solicitud, u.nombres as nombre_pituto,u.correo,
                (select categoria FROM regexp_split_to_table('$categoria}', ',') AS categoria),a.puntuacion
               from t_asignacion_solicitudes a
               left join t_solicitudes s on (a.id_solicitud=s.id_solicitud)
               left join t_usuarios u on (a.id_usuario=u.id_usuario)
               where a.id_usuario='{$id_usuarioP}' and a.estatus=2
               order by a.id_asignacion_solicitud desc");
        return $query->result();
    }
    
    
    public function perfil_pituto($id_usuarioP)
    {
        $query = $this->db->query("select u.tipo_persona,u.cedula, u.nombres,u.telefono,u.correo,r.region_nombre,p.provincia_nombre,c.comuna_nombre,
u.conocimientos_habilidades,u.experiencia,u.id_usuario

from t_usuarios u

left join n_regiones r on (u.region_id=r.region_id)
left join n_provincias p on (u.provincia_id=p.provincia_id)
left join n_comunas c on (u.comuna_id=c.comuna_id)

where id_usuario='{$id_usuarioP}'");
        return $query->result();
    }
    public function galeria_pituto($id_usuarioP, $categoria)
    {
        $query = $this->db->query("select id_foto_galeria,id_usuario,foto,categoria 
                                  from t_fotos_galeria 
                                  where id_usuario='{$id_usuarioP}' and categoria && '{$categoria}'");
        return $query->result();
    }
    
    
    
    public function buscar_detalles_pitutos_asignado($id)
    {
        $query = $this->db->query("select a.id_asignacion_solicitud,a.id_solicitud,a.id_usuario,a.valoracion,a.estatus, to_char(a.fecha_registro,'DD-MM-YYY') as fecha_asignacion, s.descripcion_solicitud,u.categoria, to_char(s.fecha_registro,'DD-MM-YYY') as fecha_solicitud, u.nombres as nombre_pituto,u.correo

               from t_asignacion_solicitudes a
  
               left join t_solicitudes s on (a.id_solicitud=s.id_solicitud)
               left join t_usuarios u on (a.id_usuario=u.id_usuario)
               where a.id_solicitud='{$id}' and a.estatus=1
               order by a.id_asignacion_solicitud desc");
        return $query->result();
    }
    
    public function consultar_id_solicitud($id_solicitud)
    {
        
        $query = $this->db->query("SELECT id_solicitud FROM t_solicitudes where id_solicitud='{$id_solicitud}'");
        // si hay resultados
        return $query->result();
    }
    public function consultar_id_solicitud_valoracion($id_solicitud)
    {
        
        $query = $this->db->query("SELECT id_solicitud FROM t_asignacion_solicitudes where id_solicitud='{$id_solicitud}'");
        // si hay resultados
        return $query->result();
    }
    public function consultar_id_solicitud_usuario($id_solicitud, $id_usuarioP)
    {
        
        $query = $this->db->query("SELECT s.id_solicitud,s.descripcion_solicitud,
                                 (select id_usuario from t_usuarios where id_usuario='{$id_usuarioP}'),
                                 (select nombres from t_usuarios where id_usuario='{$id_usuarioP}')
                                 
                                FROM t_solicitudes s 

                                where id_solicitud='{$id_solicitud}'");
        // si hay resultados
        return $query->result();
    }
    public function existen_datos($id_usuarioP)
    {
        $sql    = "SELECT * from t_asignacion_solicitudes where id_usuario = '{$id_usuarioP}' and estatus=2";
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
    
    
    public function guardar_contratacion($array)
    {
        extract($array);
        $sql = "INSERT INTO t_asignacion_solicitudes(id_solicitud,id_usuario,id_usuario_solicitante) 
                VALUES ('{$id_solicitud}','{$id_usuario}','{$id_usuario_solicitante}')";
        $this->db->query($sql);
        //return 1;
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    
    public function upd_estatus_solicitud($id_solicitud)
    {
        
        $query = $this->db->query("UPDATE t_solicitudes set  estatus=3 where id_solicitud='{$id_solicitud}'");
        
    }
    
    public function finalizar_solicitud($id_solicitud, $valoracion, $puntuacion)
    {
        
        $query = $this->db->query("UPDATE t_asignacion_solicitudes set  valoracion ='{$valoracion}', 
                                                   puntuacion ='{$puntuacion}', estatus=2
                                 where id_solicitud='{$id_solicitud}' and estatus =1");
        
    }
    
    public function cerrar_solicitud($id_solicitud)
    {
        
        $query = $this->db->query("UPDATE t_solicitudes set  estatus=2 where id_solicitud='{$id_solicitud}'");
        
    }
    
    public function getFoto($id_usuario)
    {
        
        return $this->db->where('id_usuario', $id_usuario)->get('t_fotos')->row()->foto;
    }
    
    public function regiones()
    {
        
        $query = $this->db->query("SELECT region_id, region_nombre FROM n_regiones");
        // si hay resultados
        return $query->result();
    }
    public function regiones2()
    {
        
        $query = $this->db->query("SELECT region_id, region_nombre FROM n_regiones");
        // si hay resultados
        return $query->result();
    }
    
    public function get_provincia($region_id)
    {
        $query = $this->db->query("select provincia_id,provincia_nombre 
                                   FROM n_provincias 
                                   where region_id ={$region_id}");
        return $query->result();
    }
    
    public function get_comuna($provincia_id)
    {
        $query = $this->db->query("select comuna_id,comuna_nombre 
                                   FROM n_comunas 
                                   where provincia_id ={$provincia_id}");
        return $query->result();
    }
    public function mensajes_enviados_solicitante($id_usuario)
    {
        $query = $this->db->query("select m.id_mensaje,m.id_usuarios,us.nombres as nombres_Solicitante, m.id_usuariop, up.nombres as nombres_pituto,
      m.id_solicitud,s.descripcion_solicitud,s.categoria, substring(m.mensaje from 1 for 10) as mensaje, to_char(m.fecha_registro,'DD-MM-YYY') as fecha_registro,
     to_char(m.hora_registro,'HH:MM:SS') as hora_registro,f.foto,m.leido

       from t_mensajes m

      left join t_usuarios us on (us.id_usuario=m.id_usuarios)
      left join t_usuarios up on (up.id_usuario=m.id_usuariop)
      left join t_solicitudes s on (s.id_solicitud=m.id_solicitud)
      left join t_fotos f on (f.id_usuario=m.id_usuariop)

       where m.id_usuarios={$id_usuario} and m.estatus=1 and m.eliminado_solicitante=1

       order by id_mensaje desc");
        
        return $query->result();
    }
    
    
    public function mensajes_recibidos_solicitante($id_usuario)
    {
        $query = $this->db->query("select m.id_mensaje,m.id_usuarios,us.nombres as nombres_Solicitante, m.id_usuariop, up.nombres as nombres_pituto,
      m.id_solicitud,s.descripcion_solicitud,s.categoria, substring(m.mensaje from 1 for 10) as mensaje, to_char(m.fecha_registro,'DD-MM-YYY') as fecha_registro,
     to_char(m.hora_registro,'HH:MM:SS') as hora_registro,f.foto,m.leido

       from t_mensajes m

      left join t_usuarios us on (us.id_usuario=m.id_usuarios)
      left join t_usuarios up on (up.id_usuario=m.id_usuariop)
      left join t_solicitudes s on (s.id_solicitud=m.id_solicitud)
      left join t_fotos f on (f.id_usuario=m.id_usuariop)

       where m.id_usuarios={$id_usuario} and m.estatus=2 and m.eliminado_solicitante=1

       order by id_mensaje desc");
        
        return $query->result();
    }
    
    
    public function mensajes_enviados_pituto($id_usuario)
    {
        $query = $this->db->query("select m.id_mensaje,m.id_usuarios,us.nombres as nombres_Solicitante, m.id_usuariop, up.nombres as nombres_pituto,
      m.id_solicitud,s.descripcion_solicitud,s.categoria, substring(m.mensaje from 1 for 10) as mensaje, to_char(m.fecha_registro,'DD-MM-YYY') as fecha_registro,
     to_char(m.hora_registro,'HH:MM:SS') as hora_registro,f.foto,m.leido

       from t_mensajes m

      left join t_usuarios us on (us.id_usuario=m.id_usuarios)
      left join t_usuarios up on (up.id_usuario=m.id_usuariop)
      left join t_solicitudes s on (s.id_solicitud=m.id_solicitud)
      left join t_fotos f on (f.id_usuario=m.id_usuarios)

       where m.id_usuariop={$id_usuario} and m.estatus=2 and m.eliminado_pituto=1

       order by id_mensaje desc");
        
        return $query->result();
    }
    
    
    public function mensajes_recibidos_pituto($id_usuario)
    {
        $query = $this->db->query("select m.id_mensaje,m.id_usuarios,us.nombres as nombres_Solicitante, m.id_usuariop, up.nombres as nombres_pituto,
      m.id_solicitud,s.descripcion_solicitud,s.categoria, substring(m.mensaje from 1 for 10) as mensaje, to_char(m.fecha_registro,'DD-MM-YYY') as fecha_registro,
     to_char(m.hora_registro,'HH:MM:SS') as hora_registro,f.foto,m.leido

       from t_mensajes m

      left join t_usuarios us on (us.id_usuario=m.id_usuarios)
      left join t_usuarios up on (up.id_usuario=m.id_usuariop)
      left join t_solicitudes s on (s.id_solicitud=m.id_solicitud)
      left join t_fotos f on (f.id_usuario=m.id_usuarios)

       where m.id_usuariop={$id_usuario} and m.estatus=1 and m.eliminado_pituto=1

       order by id_mensaje desc");
        
        return $query->result();
    }
    
    
    public function contar_mensajes($id_usuario)
    {
        
        $query = $this->db->query("SELECT count(id_mensaje) as cantidad_mensajes from t_mensajes where id_usuarios='{$id_usuario}'
                                and estatus='2' and leido='0'");
        // si hay resultados
        return $query->result();
    }
    
    
    public function contar_mensajesPituto($id_usuario)
    {
        
        $query = $this->db->query("SELECT count(id_mensaje) as cantidad_mensajes from t_mensajes where id_usuariop='{$id_usuario}'
                                and estatus='1' and leido='0'");
        // si hay resultados
        return $query->result();
    }
    
    public function delete_mensaje($id_mensaje)
    {
        $this->db->where('id_mensaje', $id_mensaje);
        
        $this->db->delete('t_mensajes');
    }
    
    public function consultar_datos_mensaje($id_solicitud, $id_mensaje)
    {
        $query = $this->db->query("select m.id_mensaje,m.id_usuarios,us.nombres as nombres_Solicitante, m.id_usuariop, up.nombres as nombres_pituto,
      m.id_solicitud,s.descripcion_solicitud,s.categoria, m.mensaje, to_char(m.fecha_registro,'DD-MM-YYY') as fecha_registro,
     to_char(m.hora_registro,'HH:MM:SS') as hora_registro,f.foto

       from t_mensajes m

      left join t_usuarios us on (us.id_usuario=m.id_usuarios)
      left join t_usuarios up on (up.id_usuario=m.id_usuariop)
      left join t_solicitudes s on (s.id_solicitud=m.id_solicitud)
      left join t_fotos f on (f.id_usuario=m.id_usuariop)

       where m.id_solicitud={$id_solicitud} and m.estatus=1 and m.id_mensaje={$id_mensaje}

       order by id_mensaje desc limit 1");
        // si hay resultados
        return $query->result();
        
    }
    
    public function consultar_datos_mensaje2($id_solicitud, $id_mensaje)
    {
        $query = $this->db->query("select m.id_mensaje,m.id_usuarios,us.nombres as nombres_Solicitante, m.id_usuariop, up.nombres as nombres_pituto,
      m.id_solicitud,s.descripcion_solicitud,s.categoria, m.mensaje, to_char(m.fecha_registro,'DD-MM-YYY') as fecha_registro,
     to_char(m.hora_registro,'HH:MM:SS') as hora_registro,f.foto

       from t_mensajes m

      left join t_usuarios us on (us.id_usuario=m.id_usuarios)
      left join t_usuarios up on (up.id_usuario=m.id_usuariop)
      left join t_solicitudes s on (s.id_solicitud=m.id_solicitud)
      left join t_fotos f on (f.id_usuario=m.id_usuariop)

       where m.id_solicitud={$id_solicitud} and m.estatus=2 and m.id_mensaje={$id_mensaje}

       order by id_mensaje desc limit 1");
        // si hay resultados
        return $query->result();
        
    }
    
    public function marcar_msj_leido($id_solicitud, $id_mensaje)
    {
        
        $query = $this->db->query("UPDATE t_mensajes set  leido=1 where id_solicitud='{$id_solicitud}'and  id_mensaje='{$id_mensaje}'");
        
    }
    
    
    public function upd_eliminado2($param)
    {
        $campos = array(
            'id_mensaje' => $param['id_mensaje'],
            'eliminado' => '1'
        );
        $this->db->where('id_mensaje', $param['id_mensaje']);
        $this->db->update('t_mensajes', $campos);
        
        $query = $this->db->query("select * from t_mensajes");
        return $query->result();
    }
    
    public function upd_eliminado_solicitante($id_mensaje)
    {
        
        $query = $this->db->query("UPDATE t_mensajes set  eliminado_solicitante=0 where id_mensaje='{$id_mensaje}'");
    }
    
    public function consulata_media_valoracion($id_usuarioP)
    {
        $query = $this->db->query("select (select SUM(puntuacion) FROM t_asignacion_solicitudes where id_usuario='{$id_usuarioP}')/
       (select count(id_usuario) from t_asignacion_solicitudes where id_usuario='{$id_usuarioP}')as promedio
        from t_asignacion_solicitudes where id_usuario='{$id_usuarioP}' limit 1");
        return $query->result();
    }
    
    
    public function contrataciones_pituto($id_usuario)
    {
        $query = $this->db->query("select a.id_solicitud,a.id_usuario,a.id_usuario_solicitante,a.valoracion,to_char(a.fecha_registro,'DD-MM-YYY') as fecha_registro, a.puntuacion,
       s.descripcion_solicitud, s.categoria,u.nombres as pituto, us.nombres as solicitante,s.region_id,r.region_nombre,p.provincia_nombre,c.comuna_nombre,
       s.tipo_solicitud

       from t_asignacion_solicitudes a

         left join t_usuarios u on (a.id_usuario=u.id_usuario)
         left join t_usuarios us on (a.id_usuario_solicitante=us.id_usuario)
         left join t_solicitudes s on (a.id_solicitud=s.id_solicitud)
         left join n_regiones r on (s.region_id=r.region_id)
         left join n_provincias p on (s.provincia_id=p.provincia_id)
         left join n_comunas c on (s.comuna_id=c.comuna_id)


       where a.valoracion <> '' and a.estatus=2 and a.id_usuario='{$id_usuario}'

       order by s.id_solicitud desc");
        return $query->result();
    }
    
    
    //    SELECT id_sub_opcion,ruta,id_opcion,id_n_sub_opcion FROM r_opciones_sub_opciones where id_sub_opcion=ANY(p_id_subOpciones) order by id_sub_opcion
    
    //    select categoria from t_usuarios
    
    //    select categoria from t_usuarios where categoria && '{INDUSTRIA}'
    
    
    
    // select * from t_usuarios where categoria in ('INDUSTRIA')
    
    // SELECT  * FROM (select unnest(array['AGRICULTURA'])) AS tbl(categoria)
    
    // SELECT  * FROM (VALUES('CONSTRUCCION','EDUCACION','FINANZAS','INDUSTRIA','INFORMATICA','JARDINERIA','SALUD','SISTEMAS','TELECOMUNICACIONES','TRANSPORTE','TURISMO')) AS tbl(categoria)
    
    // SELECT  * FROM (select unnest(array['AGRICULTURA'])) AS tbl(col1)
    
    
}
?>