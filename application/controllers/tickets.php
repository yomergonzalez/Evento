<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Tickets extends CI_Controller {
	
	    function __construct() {
	        parent::__construct();

	    }
	
		public function index()
		{
			$this->load->model('evento_model');
			$variables['listado'] =$this->evento_model->listado_eventos();
			$this->load->view('eventos/tickets',$variables);
		}


	    public function getEvento() {
	    		$this->load->model('evento_model');
	            $resultado = $this->evento_model->detalles_evento($this->input->post('evento_id'));
	           	$resultado2 = $this->evento_model->listado_entradas($this->input->post('evento_id'));
	            if ($resultado !== FALSE && $resultado2 !== FALSE)
	                $variables['entradas'] = $resultado2;
	                $variables['detalles'] = $resultado[0];
	                $this->load->view('eventos/detalles',$variables);
	        
	    }

	    public function comprar() {
	   	    	$this->load->model('evento_model');
	            $resultado = $this->evento_model->comprar_ticket($this->input->post());
	            if ($resultado !== FALSE){
	                echo json_encode(true);
	            }else{
	            	echo json_encode(false);
	            }
	        
	    }
	

	    public function vendidas() {
	   	    	$this->load->model('evento_model');
	            $resultado = $this->evento_model->listado_vendidos($this->input->get('event_id'));
	            if ($resultado !== FALSE)
	              	  echo json_encode(array("success" => true, "data" => $resultado));
	            
	        
	    }


	}
	        


?>