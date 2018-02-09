<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
  
  public function __construct(){
    parent::__construct();
  }

	public function sendSms()
	{
      header('Content-Type: application/json');
        if( $this->verify_min_level(EJECUTIVE_LEVEL) ){
            if(($_SERVER['REQUEST_METHOD'] == 'POST') ){
              // $doctor = strtoupper($_POST['doctor']);
               $profesional = $_POST['profesional'];
               $fecha = $_POST['fecha'];
               $hora = $_POST['hora'];
               $paciente = strtoupper($_POST['paciente']);
               $id_lugar = $_POST['lugar'];
               $numero = $_POST['celular'];
               $id_especialidad = $_POST['especialidad'];
                  $this->load->model('locations_model');
               $this->load->model('specialties_model');
               $this->load->model('global_model');
               $doctor = $this->global_model->findProfesional($profesional);
                  $lugar = $this->locations_model->find($id_lugar);
                  $especialidad = $doctor->especialidad;
                  
                  $direccion = $lugar->location;
                  $nombre_doctor = $doctor->profesional;
                 $mensajeria = new Mensajeria($numero,$nombre_doctor,$fecha,$hora,$paciente,$direccion,$especialidad);
                 $batchId = $mensajeria->sendMessage();
                 $tempId = $batchId;
                //var_dump($result);
               
           if($tempId =! false){
             $this->load->model('tareas_model');
             $data = array(
               'number' => $numero,
               'date' => $this->mysql_date($fecha),
               'time' => $hora,
               'patient' => $paciente,
               'doctor' => $nombre_doctor,
               'location_id' => $id_lugar,
               'location' => $direccion,
               'message' => $mensajeria->getMessage(),
              'sender_id' => $this->auth_user_id,
              'doctor_id' => $profesional,
              'batch_id' =>  $batchId
			  
               );
             if($this->tareas_model->createLog($data)){
              echo json_encode(array('result' => true));
            }else{
              echo json_encode(array('result' => false));
            }
             
           }else{
            echo json_encode(array('result' => false));
           }
            }

          }
}

	private function mysql_date($date) { 
		$year = substr($date,6,4); // 01-12-2007
		$month = substr($date,3,2); $day = substr($date,0,2); 
		$date = $year."-".$month."-".$day; 
		return ($date); 
}  

    
	
}



class Mensajeria {

	private $movil;
	private $doctor;
	private $fecha;
	private $hora;
	private $paciente;
	private $id_lugar;
	private $message;
	private $especialidad;
  private $batchId;


	public function __construct($movil,$doctor,$fecha,$hora,$paciente,$lugar,$especialidad){
           $this->movil = $movil;
           $this->doctor = $doctor;
           $this->fecha = $fecha;
           $this->hora = $hora;
           $this->paciente = $paciente;
           $this->lugar = $lugar;
		       $this->especialidad = $especialidad;

	}

    public function getMessage(){
    	return $this->message;
    }
	public function sendMessage(){
		
		$movil = substr($this->movil, 1);
		$datos = [];
        $datos[] = [
          "destination" => "569$movil",
          "field" => "mensaje"
          ];
		 $mensaje = $this->paciente.'. Hora: '.$this->fecha.', '.$this->hora. ' hrs. Con '.$this->doctor.', Esp. '.$this->especialidad.'. Lugar: '.$this->lugar.'.';
		 $mensaje = ltrim($mensaje);
         $message = rtrim($mensaje);
         $mensaje = substr($mensaje, 0,160);


		 
         $post = [
        'bulkName' => 'REST',
        'message' => $mensaje,
        'message_details' => $datos,
        ];
        $this->message = $mensaje;

         try {
      	$ch = curl_init();
      	 curl_setopt($ch, CURLOPT_URL, 'https://sms.lanube.cl/services/rest/send');
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
        	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        	curl_setopt($ch, CURLOPT_USERPWD, "KROPSYS:KROPSYS2017");
        	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        	curl_setopt($ch, CURLOPT_POST, true);
        	$response = curl_exec($ch);
          curl_close($ch);
          $obj = json_decode($response);
          
         return ($response !== false) ? $obj->batchId : false;  
      } catch (Exception $e) {
      	var_dump($e);

        }
    return false;;

	}

  public static function messageState($batchId){
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://sms.lanube.cl/services/rest/'.$batchId.'/status');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          curl_setopt($ch, CURLOPT_USERPWD, "KROPSYS:KROPSYS2017");
          curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
          $response = curl_exec($ch);
          return  json_decode($response);
  }

}
