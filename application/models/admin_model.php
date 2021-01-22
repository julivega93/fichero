<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {


    public function ingreso_admin($pinadm=""){
        $this->db->where('pin',$pinadm);
        $this->db->limit(1);
        $resultado=$this->db->get('empleados');

        return $resultado->row_array();
    }

	public function lista_usuarios(){
        $resultado=$this->db->get('empleados');

        return $resultado->result_array();
    }

    public function lista_registros($datos=""){
        
        $resultado=$this->db->get('registros');

        return $resultado->result_array();
    }

    public function nuevo_usuario($datos=""){
        $this->db->set('nombre',$datos['nombre']);
        $this->db->set('apellido',$datos['apellido']);
        $this->db->set('pin',$datos['pin']);
        $this->db->insert('empleados');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function registro_vacio($empleado_id=""){
        $this->db->set('empleado_id',$empleado_id);
        $this->db->set('entrada');
        $this->db->set('salida');
        $this->db->insert('registros');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function paginacion($limit, $offset){
        $this->db->order_by('registro_id','DESC');
        $sql = $this->db->get('registros',$limit,$offset);
        
        return $sql->result_array();
    }

    public function borrar_usuario($empleado_id=""){
        $this->db->where('empleado_id',$empleado_id);
        $this->db->set('estado',0);
        $this->db->update('empleados');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function activar_usuario($empleado_id=""){
        $this->db->where('empleado_id',$empleado_id);
        $this->db->set('estado',1);
        $this->db->update('empleados');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
