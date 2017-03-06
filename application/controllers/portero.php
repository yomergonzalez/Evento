<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Portero extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();

	    }
	
		public function index()
		{
			$this->load->view('eventos/portero');
		}

	    public function Verificar() {
	   	    	$this->load->model('evento_model');
	            $resultado = $this->evento_model->verificar_ticket($this->input->post());
	            if ($resultado !== FALSE)
	                echo $resultado;
	        
	    }
	
	   
	}
	        


?>