<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();

        }

        public function login($email,$pass)
		{
			$this->db->where('email',$email);
			$this->db->where('password',$pass);
			$result = $this->db->get('users');

			if($result->num_rows()>0){
				$this->session->set_userdata('user',$result->row());
				return true;
			}else{
				return false;
			}

		}

		public function registrar($form){


		$data = array(
			'email' => $form['email'],
		   'name' => $form['nombre'],
		   'password' =>  $form['pass'] ,
		   'clasification_id' => $form['tipo'],
		);

		$this->db->insert('users', $data); 

    	return ($this->db->affected_rows() != 1) ? false : true;

    }


}

?>