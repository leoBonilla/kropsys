<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webapi extends MY_Controller {

		public function __construct(){
			parent::__construct();
			
			$this->load->model('webapi_model');
		}

		public function index(){

		}

		public function especialidades(){
			//echo json_encode($this->webapi_model->getAllEspecialidades());
			$this->output($this->webapi_model->getAllEspecialidades());

		}

		public function profesionales(){
           $data = $this->webapi_model->getAllProfesionales();
           $this->output($data);

		}

		public function listarCupos(){
           if($this->input->post()){
           			$fecha = $this->input->post('fecha');
                $momento = $this->input->post('momento');
					$data = $this->webapi_model->listarCupos($fecha,$momento);
          
				    $this->output($data);
           }


		}

		public function users(){
			 $data = $this->webapi_model->getAllUsers();
           $this->output($data);
		}
        
        public function agendamientos(){


          if($this->require_min_level(EJECUTIVE_LEVEL)){
            $this->load->model('registros_model');
            if($this->auth_level >= ADMIN_LEVEL){
              $data = $this->registros_model->getAllAgendamientos();
            }else{
              $data = $this->registros_model->getAgendamientosByUser($this->auth_user_id);
            }
            $this->output($data);
          }
        }

         public function reasignaciones(){
 
          if($this->require_min_level(EJECUTIVE_LEVEL)){
            $this->load->model('registros_model');
            if($this->auth_level >= ADMIN_LEVEL){
              $data = $this->registros_model->getAllReasignaciones();
            }else{
              $data = $this->registros_model->getReasignacionesByUser($this->auth_user_id);
            }
            $this->output($data);
          }
        }


         public function confirmaciones(){

          if($this->require_min_level(EJECUTIVE_LEVEL)){
            $this->load->model('registros_model');
            if($this->auth_level >= ADMIN_LEVEL){
              $data = $this->registros_model->getAllConfirmaciones();
            }else{
              $data = $this->registros_model->getConfirmacionesByUser($this->auth_user_id);
            }
            $this->output($data);
          }
        }

         public function otros(){
          if($this->require_min_level(EJECUTIVE_LEVEL)){
            $this->load->model('registros_model');
            if($this->auth_level >= ADMIN_LEVEL){
              $data = $this->registros_model->getAllOtros();
            }else{
              $data = $this->registros_model->getOtrosByUser($this->auth_user_id);
            }
            $this->output($data);
          }

        }

          public function buscarAgendamiento(){
        	if($this->require_min_level(EJECUTIVE_LEVEL)){
        		$this->load->model('registros_model');
        		$data = $this->registros_model->getAgendamiento($id);
        		$this->output($data);
        	}
        }

    public function sms(){

       $this->load->model('registros_model');
          if($this->require_min_level(EJECUTIVE_LEVEL)){
              if($this->auth_level >= ADMIN_LEVEL){
              $data = $this->registros_model->getAllSms();
            }else{
              $data = $this->registros_model->getSmsByUser($this->auth_user_id);
            }
            $this->output($data);
          }
          }
	

		public function output($data){
			header('Content-Type: application/json');
				$out = array();
         if($data != false)
    	foreach ($data as $nrow) {

			$out['data'][] = $nrow;
			}
    	 echo json_encode($out);
		}

}