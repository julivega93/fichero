<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ingreso_model extends CI_Model {

    

	public function ingreso($pin=""){

        $this->db->where('pin',$pin);
        $this->db->limit(1);
        $resultado=$this->db->get('empleados');

        return $resultado->row_array();
    }

    public function ultlogin($empleado_id=""){

        $this->db->set('ultlogin', 'NOW()', FALSE);
        $this->db->where('empleado_id',$empleado_id);  
        $this->db->limit(1);
        $this->db->update('empleados');

        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }

    }
}
