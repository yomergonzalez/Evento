<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Eventos extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();

	    }
	
		public function index()
		{
			
			$this->load->view('eventos/index');
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('login','refresh');
		}

	    public function getList() {
	    		$this->load->model('evento_model');
	            $resultado = $this->evento_model->listado_eventos();
	            if ($resultado !== FALSE)
	                echo json_encode(array("success" => true, "data" => $resultado));
	        
	    }

	    public function crear() {
	   	    	$this->load->model('evento_model');
	            $resultado = $this->evento_model->crear($this->input->post());
	            if ($resultado !== FALSE)
	                echo json_encode(true);
	        
	    }

	    public function getEntradas() {
	    		$this->load->model('evento_model');
	            $resultado = $this->evento_model->listado_entradas($this->input->get('event_id'));
	            if ($resultado !== FALSE)
	                echo json_encode(array("success" => true, "data" => $resultado));
	        
	    }	


	    public function agregar_entrada() {
	   	    	$this->load->model('evento_model');
	            $resultado = $this->evento_model->crear_entrada($this->input->post());
	            if ($resultado !== FALSE)
	                echo json_encode(true);
	        
	    }	
	   	public function delete_entrada() {
	   	    	$this->load->model('evento_model');
	            $resultado = $this->evento_model->borrar_entrada($this->input->post('entrada_id'));
	            if ($resultado !== FALSE)
	                echo json_encode(true);
	        
	    }	
	    public function delete_evento() {
	   	    	$this->load->model('evento_model');
	            $resultado = $this->evento_model->borrar_evento($this->input->post('evento_id'));
	            if ($resultado !== FALSE)
	                echo json_encode(true);
	        
	    }	
	   
	}
	        


?>