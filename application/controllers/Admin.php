<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	protected $datos=array();

	public function __construct(){
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('admin_model');
        

        if($this->session->userdata('rol')=="u"){
            redirect('inicio');
        }
	}

	public function index($offset = 0){

        $data=$this->admin_model->lista_registros();
        $config['base_url'] = base_url('index.php/admin/index/');
        $config['uri_segment'] = 3;
        $config['total_rows'] = count($data);
        $config['per_page'] = 10;

        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
            
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
            
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
            
        $config['next_link'] = '<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';

        $config['prev_link'] = '<i class="fa fa-chevron-circle-left" aria-hidden="true"></i>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';

        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
    
        $this->pagination->initialize($config);

        $this->datos['usuarios']=$this->admin_model->lista_usuarios();
        //$this->datos['registros']=$this->admin_model->lista_registros();
        $this->datos['registros']=$this->admin_model->paginacion($config['per_page'],$offset);

        $this->load->view('admin/paneladm',$this->datos);

	}

	public function paneladm(){
        $this->datos['usuarios']=$this->admin_model->lista_usuarios();
        $this->datos['registros']=$this->admin_model->lista_registros();
		$this->load->view('admin/paneladm',$this->datos);
    }
    
    public function nuevo_usuario(){

        $this->form_validation->set_rules('nombre','Nombre','required');
        $this->form_validation->set_rules('apellido','Apellido','required');
        $this->form_validation->set_rules('pin','Pin','required|min_length[2]|max_length[3]|is_unique[empleados.pin]');

        if ($this->form_validation->run() == FALSE){

            $this->datos=$this->session->set_flashdata('ERROR','No pudo crear el usuario');
            redirect('admin/paneladm');
			
        }else{

			$datos=array();
            $datos['nombre']=$this->input->post('nombre');
            $datos['apellido']=$this->input->post('apellido');
            $datos['pin']=$this->input->post('pin');
			
			$correcto=$this->admin_model->nuevo_usuario($datos);
			
			if($correcto){
                $this->datos=$this->session->set_flashdata('EXITO','Empleado agregado');
                $empleado_id=$this->db->insert_id();
                $this->admin_model->registro_vacio($empleado_id);
				redirect('admin/paneladm/');
            }else{
				$this->datos=$this->session->set_flashdata('ERROR','No pudo crear el usuario');
				$this->load->view('admin/paneladm',$this->datos);
            }
        }
    }

    public function borrar_usuario($empleado_id){
        //$empleado_id=$this->db->userdata('empleado_id');
        $resultado=$this->admin_model->borrar_usuario($empleado_id);

        if($resultado){
            redirect('admin/paneladm/');
        }
    }

    public function activar_usuario($empleado_id){
        //$empleado_id=$this->db->userdata('empleado_id');
        $resultado=$this->admin_model->activar_usuario($empleado_id);

        if($resultado){
            redirect('admin/paneladm/');
        }
    }
    
}
