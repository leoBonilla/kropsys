<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apicall extends MY_Controller {
	public function __construct(){
		parent::__construct();
		ini_set('max_execution_time', 0); 
        ini_set('memory_limit','2048M');
	}

	public function call(){
		header('Content-Type: application/json');
		if($this->require_min_level(1)){
			if($this->input->post()){
				$telefono = $this->input->post('numero');
				$anexo = $this->input->post('anexo');
				return $this->makeCall($telefono,$anexo);
				//echo json_encode(array('respuestaOk' => true, 'message' => 'mensaje', 'uniqueId' => '3434322.3443' ));
		}
	}

}
	private function makeCall($number, $extension){
	   try {

			   	$arrContextOptions=array(
								       	  "ssl"=>array(
								          	"verify_peer"=>false,
								          		"verify_peer_name"=>false,
		        							),
		      							);

				$xml = file_get_contents("https://192.168.0.150/generaLlamada.php?telefono=$number&anexo=$extension", false, stream_context_create($arrContextOptions));
	   			$obj = json_decode($xml);
	    		
	    		echo json_encode($obj);
	   } catch (Exception $e) {
	   	return json_encode(array('result' => false));
	   }
	}


	public function callLog(){
		header('Content-Type: application/json');
		if($this->require_min_level(1)){
			if($this->input->post()){
			     //$intento = $this->input->post('intento');
			     $task_id = $this->input->post('task_id');
			     $subtask_id = $this->input->post('subtask_id');
			     $numero  = $this->input->post('numero');
			     $id = $this->input->post('id');
			     $call_id = $this->input->post('call_id');
			     $estado_llamada = $this->input->post('estado_llamada');
			     $otro = $this->input->post('otro');
			     $this->load->model('tasks/task_model','tareas');
			     $data = array(
			     		'id_task' => $task_id,
			     		'id_subtask' => $subtask_id,
			     		'numero' => $numero,
			     		'call_id' => $call_id,
			     		'user_id' => $this->auth_user_id,
			     		'id_estado' => $estado_llamada,
			     		'otro' => $otro,
			     	);

			     if($this->tareas->registerCall($data)){
						echo json_encode(array('result' => true));
			     }else{
			     	echo json_encode(array('result' => false));
			     }

			}
		}
}
	public function closeSubTask(){
		header('Content-Type: application/json');
		if($this->require_min_level(1)){
			if($this->input->post()){
				//si viene del popup
				if($this->input->post('popup') == 1){
					//echo json_encode(array('popup' => true));$task_id = $this->input->post('task_id');
									     $tarea_id = $this->input->post('tarea_id');
									     $numero  = $this->input->post('numero_telef');
									     $id = $this->input->post('subtarea_id');
									     $call_id = $this->input->post('uniqueId');
									     $especialidad = $this->input->post('especialidad');
									     $profesional = $this->input->post('profesional');
									     $lugar = $this->input->post('lugar');
									     $estado_llamada = 4;
									     $this->load->model('tasks/task_model','tareas');
									     $data = array(
									     		'id_task' => $tarea_id,
									     		'id_subtask' => $id,
									     		'numero' => $numero,
									     		'call_id' => $call_id,
									     		'user_id' => $this->auth_user_id,
									     		'id_estado' => $estado_llamada,

									     	);

									     if($this->tareas->registerCall($data)){
									     	     $observaciones = $this->input->post('observaciones');
						    					 $fecha_cita  = $this->input->post('fecha_cita');
						     					 $hora_cita  = $this->input->post('hora_cita');
												 $data = array('observaciones' => $observaciones,
								     					'fecha_cita' => $fecha_cita,
								     					'hora_cita' => $hora_cita,
								     					'finalizada' => 1,
								     					'id_especialidad' => $especialidad,
									     				'id_profesional' => $profesional,
									     				'id_lugar' => $lugar
						     					);
													    $this->load->model('tasks/task_model','tareas');
													    if($this->tareas->closeSubTask($id,$data)){
													    	echo json_encode(array('result' => true));
													    }else{
													    		echo json_encode(array('result' => false));
													    }
									    			 }else{
									     
									     		}
									
				}else{
							 $observaciones = $this->input->post('observaciones');
						     $fecha_cita  = $this->input->post('fecha_cita');
						     $hora_cita  = $this->input->post('hora_cita');
						     $id = $this->input->post('subtask_id');
						     
						     $data = array('observaciones' => $observaciones,
						     				'fecha_cita' => $fecha_cita,
						     				'hora_cita' => $hora_cita,
						     				'finalizada' => 1
						     	);
						    $this->load->model('tasks/task_model','tareas');
						    if($this->tareas->closeSubTask($id,$data)){
						    	echo json_encode(array('result' => true));
						    }else{
						    		echo json_encode(array('result' => false));
						    }
				}
			    

			}
		}
	}
}