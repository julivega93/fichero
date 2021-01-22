<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	protected $datos=array();

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('ingreso_model');
		$this->load->model('admin_model');
	}

	public function index()
	{
		redirect('inicio/ingreso');
	}

	public function ingreso(){
		
		$this->form_validation->set_rules('pin','Pin','required|min_length[2]|max_length[3]');

        if ($this->form_validation->run() == FALSE){

            $this->load->view('inicio/portada',$this->datos);

        }else{
			
			$pin=$this->input->post('pin');
			
			$correcto=$this->ingreso_model->ingreso($pin);
			
			if($correcto){
				$this->session->set_userdata('empleado_id',$correcto['empleado_id']);
				$this->session->set_userdata('pin',$correcto['pin']);
				$this->session->set_userdata('nombre',$correcto['nombre']);
				$this->session->set_userdata('apellido',$correcto['apellido']);
				$this->session->set_userdata('ultlogin',$correcto['ultlogin']);
				$this->session->set_userdata('estado',$correcto['estado']);
				$this->session->set_userdata('rol',$correcto['rol']);
				$this->ingreso_model->ultlogin($correcto['empleado_id']);
				redirect('panel/obtener_ficha');
            }else{
				$this->datos=$this->session->set_flashdata('ERROR','Pin incorrecto');
				$this->load->view('inicio/portada',$this->datos);
            }
        }
	}

	public function ingreso_admin(){
        $this->form_validation->set_rules('pinadm','Pin','required|min_length[2]|max_length[3]');

        if ($this->form_validation->run() == FALSE){

            $this->load->view('inicio/portada',$this->datos);
			
        }else{
			
			$pinadm=$this->input->post('pinadm');
			
			$correcto=$this->admin_model->ingreso_admin($pinadm);
			
			if($correcto){
				$this->session->set_userdata('empleado_id',$correcto['empleado_id']);
				$this->session->set_userdata('pin',$correcto['pin']);
				$this->session->set_userdata('nombre',$correcto['nombre']);
				$this->session->set_userdata('apellido',$correcto['apellido']);
				$this->session->set_userdata('ultlogin',$correcto['ultlogin']);
				$this->session->set_userdata('estado',$correcto['estado']);
				$this->session->set_userdata('rol',$correcto['rol']);
				
				redirect('admin/index');
            }else{
				$this->datos=$this->session->set_flashdata('ERROR','Pin incorrecto');
				$this->load->view('inicio/portada',$this->datos);
            }
        }
    }
}
