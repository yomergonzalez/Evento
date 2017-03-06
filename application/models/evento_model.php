
<?
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Evento_model extends CI_Model {

		
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
	

	  public function listado_eventos() {
	  	$this->db->select('eventos.id, eventos.name, eventos.date, tipo_cupo.name as nombre');
        $this->db->join('tipo_cupo', 'tipo_cupo.id = eventos.tipo_cupo');
        $resultado = $this->db->get('eventos');
        return ($resultado->result() > 0) ? $resultado->result() : false;
    }

	  public function listado_vendidos($id) {
	  	$this->db->where('evento_id',$id);
	  	$this->db->where('estatus',2);
	  	$this->db->select('entradas.nombre as entrada, users.name as usuario, tickets.fecha,tickets.email');
        $this->db->join('entradas', 'entradas.id = tickets.entrada_id');
        $this->db->join('users', 'users.id = tickets.user_id');
        $resultado = $this->db->get('tickets');
        return ($resultado->result() > 0) ? $resultado->result() : false;
    }

	  public function listado_entradas($id) {
        $this->db->where('evento_id',$id);
        $resultado = $this->db->get('entradas');
        return ($resultado->result() > 0) ? $resultado->result() : false;
    }
    public function crear($form){

		$date = $form['fecha'].' '.$form['hora'];

		$data = array(
		   'name' => $form['nombre'],
		   'date' =>  date_create($date)->format('Y-m-d H:i') ,
		   'tipo_cupo' => $form['tipo']
		);

		$this->db->insert('eventos', $data); 

    	return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function crear_entrada($form){


		$data = array(
			'evento_id' => $form['event_id'],
		   'nombre' => $form['nombre'],
		   'cantidad' =>  $form['cantidad'] ,
		   'precio' => $form['precio'],
			'desc' => $form['desc']

		);

		$this->db->insert('entradas', $data); 

    	return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function borrar_entrada($id) {
		$this->db->delete('entradas', array('id' => $id)); 
    	return ($this->db->affected_rows() != 1) ? false : true;
    }
   	public function borrar_evento($id) {
			$this->db->delete('eventos', array('id' => $id)); 
    	return ($this->db->affected_rows() != 1) ? false : true;
    }



	  public function detalles_evento($id) {
        $this->db->where('id',$id);
        $resultado = $this->db->get('eventos');
        return ($resultado->result() > 0) ? $resultado->result() : false;
    }


	 public function comprar_ticket($form) {
	 $this->db->where('id',$form['entrada']);
	 $this->db->set('cantidad', 'cantidad-1', FALSE);
	 $this->db->update('entradas');

		$codigo = rand(100,1000);

     	$data = array(
			'email' => $form['email'],
		   'user_id' => $this->session->userdata('user')->id,
		   'estatus' =>  1,
		   'codigo' => $codigo,
		   'fecha' => date(),
			'entrada_id' => $form['entrada']

		);

		$this->db->insert('tickets', $data); 

		$this->load->library('email');

		$this->email->from('eventos@veneservsum.com.ve', 'Eventos ticket');
		$this->email->to($form['email']);

		$this->email->subject('Codigo de ticket');
		$this->email->message("Tu codigo es: $codigo");

		$this->email->send();

    	return ($this->db->affected_rows() != 1) ? false : true;
    }

   	public function verificar_ticket($form) {
        $this->db->where('codigo',$form['ticket']);
        $resultado = $this->db->get('tickets');
        if($resultado->num_rows() > 0){ 
        	if($resultado->row()->estatus==1){

        		$this->db->where('id',$resultado->row()->id);
       	 		$this->db->set('estatus', '2', FALSE);
	 			$this->db->update('tickets');
	 			return  json_encode(array('used'=>false, 'exist' => true));		
        	}else{

        		return  json_encode(array('used'=>true,'exist' => true));
        	}


        }else{
        	return json_encode(array('used'=>false,'exist' => false));;

        }
    }
    
}
