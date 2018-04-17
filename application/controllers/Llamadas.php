<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Llamadas extends MY_Controller{
   function __construct(){
   			parent::__construct();
   }

   function nueva(){
   		if($this->require_min_level(EJECUTIVE_LEVEL)){

			$this->load->model('global_model');
			$this->load->model('anexos_model');
			$currAnexo = $this->global_model->findAnexoByUser($this->auth_user_id);
		    $especialidades = $this->global_model->getEspecialidades();
		    $prestaciones= $this->global_model->getPrestaciones();
		    $anexos = $this->anexos_model->getAll();
		   // var_dump($currAnexo);
			$this->template->set('title', 'Nueva llamada');
			$this->template->set('page_header', 'Nueva llamada');
			$this->template->set('css', array(
				'vendor/switch/bootstrap-switch.min.css',
				'custom.css'
			));
			$this->template->set('scripts', array(
				'vendor/switch/bootstrap-switch.min.js',
				'pages/llamadas/nueva.js')
		);
			$this->template->load('default_layout', 'contents' , 'llamadas/nueva', array('anexos' => $anexos, 'anexo' => $currAnexo,'prestaciones' => $prestaciones, 'especialidades' => $especialidades));
		}
   }


   function generar(){
   	header('Content-Type: application/json');
   	if($this->require_min_level(EJECUTIVE_LEVEL)){
   		if($this->input->post()){
   			$number = $this->input->post('telefono');
   			$extension = $this->input->post('extension');
   			$especialidad = $this->input->post('especialidad');
   			$profesional = $this->input->post('profesional');
   			$prestacion = $this->input->post('prestacion');
   			$paciente = $this->input->post('paciente');
   			 try {

			   	$arrContextOptions=array(
								       	  "ssl"=>array(
								          	"verify_peer"=>false,
								          		"verify_peer_name"=>false,
		        							),
		      							);
			   	ini_set('max_execution_time', 300);
			    $callUrl = "https://192.168.0.150/generaLlamada.php?telefono=$number&anexo=$extension";
			   // var_dump($callUrl);
				$xml = file_get_contents($callUrl, false, stream_context_create($arrContextOptions));
	   			$obj = json_decode($xml);

	   			if($obj->respuestaOk){
	   				$this->load->model('Llamadas_model', 'llamadas');
	   				$this->llamadas->guardarLLamada($obj->uniqueId,
	   													$this->auth_user_id,
	   													$number,
	   													$extension,
	   													$especialidad,
	   													$profesional,
	   													$prestacion,
	   													$paciente
	   												);
	   			}
	   		    echo json_encode(array('respuestaOk' => $obj->respuestaOk, 'message' => $obj->mensaje, 'uniqueId' => $obj->uniqueId));
	   } catch (Exception $e) {
	   	var_dump($e);
	   	echo json_encode(array('result' => false));
	   }
   		}
   	}
   }
   

}