<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	protected $datos=array();
    
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('ingreso_model');
        $this->load->model('fichar_model');
        $this->load->helper('date');
        
        if(!$this->session->userdata('pin')){
            redirect('inicio');
        }

        if($this->session->userdata('estado')==0){
            //$this->datos=$this->session->set_flashdata('DESACTIVADO','Usuario desactivado');
			redirect('inicio');
        }

	}

	public function index()
	{
		redirect('panel/obtener_ficha');
	}

	/*public function fichar(){
	    $this->load->view('panel/fichar',$this->datos);
    }*/
    
    public function cancelar(){
        $this->session->sess_destroy();
        redirect('inicio');
    }

    public function comienzo_jornada(){

        $data=array();
        $data['empleado_id']=$this->session->userdata('empleado_id');
        $this->fichar_model->fichar($data);
        redirect ('panel/obtener_ficha');
    }

    public function obtener_ficha(){
        $data=array();
        //$data['registro_id']=$registro_id;
        $data['empleado_id']=$this->session->userdata('empleado_id');
        $this->datos['ficha']=$this->fichar_model->obtener_ficha($data);
        $this->load->view('panel/fichar',$this->datos);
    }

    public function salida_ficha($registro_id){

        $data=array();
        $data['empleado_id']=$this->session->userdata('empleado_id');
        $data['registro_id']=$registro_id;
        $this->fichar_model->salida_ficha($data);
        redirect ('panel');
    }
}
