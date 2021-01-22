<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fichar_model extends CI_Model {

    

	public function fichar($data=""){

        $this->db->where('empleado_id',$data['empleado_id']);
        $this->db->where('entrada','NOW()',false);

        $this->db->insert('registros',$data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function obtener_ficha($data=""){

        $this->db->join('empleados','registros.empleado_id=empleados.empleado_id','inner');
        $this->db->where('registros.empleado_id',$data['empleado_id']);
        $this->db->order_by('entrada','desc');
        $this->db->limit(1);
        $resultado=$this->db->get('registros');

        return $resultado->result_array();
    }

    public function salida_ficha($data=""){

        $this->db->where('empleado_id',$data['empleado_id']);
        $this->db->where('registro_id',$data['registro_id']);
        $this->db->set('salida','NOW()',false);

        $this->db->update('registros',$data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
