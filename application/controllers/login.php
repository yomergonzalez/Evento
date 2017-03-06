<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Login extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();

	    }
	
		public function index()
		{
			if($this->input->post()){

				$this->load->model('Usuario_model');
				if($this->Usuario_model->login($this->input->post('email'),$this->input->post('password'))){
					
					redirect('welcome');
				}
			}
			$this->load->view('login');
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect('login','refresh');
		}

	    public function registrar() {
	   	    	$this->load->model('Usuario_model');
	            $resultado = $this->Usuario_model->registrar($this->input->post());
	            if ($resultado !== FALSE)
	                echo json_encode(true);
	        
	    }
	   
	}
	        


?>