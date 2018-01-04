<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Community Auth - Examples Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2017, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

class Agendamiento extends MY_Controller
{
	private $response;
	public function __construct()
	{
		parent::__construct();
		$this->response = array('error' => false, 'data' => array() );

	}

	public function processAgendamiento(){
		header('Content-Type: application/json');
		if( $this->verify_min_level(EJECUTIVE_LEVEL) ){
		if($this->input->post()){
            $this->form_validation->set_rules('profesional', 'Profesional', 'required');
             $this->form_validation->set_rules('', 'Especialidad', 'required');
             $this->form_validation->set_rules('prestacion', 'Prestacion', 'required');
			if($this->form_validation->run()){
				$this->load->model('agendamientos_model');
				$data = array(
						'id_medico' => $this->input->post('profesional'),
						'id_especialidad' => $this->input->post('especialidad'),
						'id_prestacion' => $this->input->post('prestacion'),
						'pacientes_agendados' => $this->input->post('p_agendados'),
						'no_contestaron' => $this->input->post('no_contestaron'),
						'rechazo_anulaciones' => $this->input->post('rechazos_anulaciones'),
						'hora_ya_asignada' => $this->input->post('hora_ya_asignada'),
						'n_erroneo' => $this->input->post('erroneos'),
						'observaciones' => $this->input->post('observaciones'),
						'id_usuario' => $this->auth_user_id,
					);
				if($this->agendamientos_model->saveAgendamientos($data)){
					$this->response['error'] = false;
					$this->response['data'] = null;
					echo json_encode($this->response);
				}
				else{
					$this->response['error'] = true;
					$this->response['data'] = 'NO SE PUDO GUARDAR EL REGISTRO';
					echo json_encode($this->response);
				}
			}else{
				$this->response['error'] = true;
				$this->response['data'] = validation_errors();
				echo json_encode($this->response);
			}
		}
		}
	}

	public function processReasignaciones(){
		header('Content-Type: application/json');
		if( $this->verify_min_level(EJECUTIVE_LEVEL) ){
		if($this->input->post()){
            $this->form_validation->set_rules('profesional', 'Profesional', 'required');
             $this->form_validation->set_rules('', 'Especialidad', 'required');
             $this->form_validation->set_rules('prestacion', 'Prestacion', 'required');
			if($this->form_validation->run()){
				$this->load->model('agendamientos_model');
				$data = array(
						'id_medico' => $this->input->post('profesional'),
						'id_especialidad' => $this->input->post('especialidad'),
						'id_prestacion' => $this->input->post('prestacion'),
						'pacientes_agendados' => $this->input->post('p_agendados'),
						'no_contestaron' => $this->input->post('no_contestaron'),
						'rechazo_anulaciones' => $this->input->post('rechazos_anulaciones'),
						'hora_ya_asignada' => $this->input->post('hora_ya_asignada'),
						'observaciones' => $this->input->post('observaciones'),
						'id_usuario' => $this->auth_user_id,
						'n_erroneo' => $this->input->post('erroneos'),
						'pacientes' => $this->input->post('pacientes'),
						'sin_cupo' => $this->input->post('sin_cupo'),
					);
				if($this->agendamientos_model->saveReasignaciones($data)){
					$this->response['error'] = false;
					$this->response['data'] = null;
					echo json_encode($this->response);
				}
				else{
					$this->response['error'] = true;
					$this->response['data'] = 'NO SE PUDO GUARDAR EL REGISTRO';
					echo json_encode($this->response);
				}
			}else{
				$this->response['error'] = true;
				$this->response['data'] = validation_errors();
				echo json_encode($this->response);
			}
		}
		}
	}

	public function processConfirmaciones(){
		header('Content-Type: application/json');
		if( $this->verify_min_level(EJECUTIVE_LEVEL) ){
		if($this->input->post()){
            $this->form_validation->set_rules('profesional', 'Profesional', 'required');
             $this->form_validation->set_rules('', 'Especialidad', 'required');
             $this->form_validation->set_rules('prestacion', 'Prestacion', 'required');
			if($this->form_validation->run()){
				$this->load->model('agendamientos_model');
				$data = array(
						'id_medico' => $this->input->post('profesional'),
						'id_especialidad' => $this->input->post('especialidad'),
						'id_prestacion' => $this->input->post('prestacion'),
						'pacientes' => $this->input->post('pacientes'),
						'no_contestaron' => $this->input->post('no_contestaron'),
						'rechazo_anulaciones' => $this->input->post('rechazos_anulaciones'),
						'hora_ya_asignada' => $this->input->post('hora_ya_asignada'),
						'observaciones' => $this->input->post('observaciones'),
						'id_usuario' => $this->auth_user_id,
						'n_erroneo' => $this->input->post('erroneos'),
						'reasignadas' => $this->input->post('reasignadas'),
						'confirmadas' => $this->input->post('confirmadas'),
					);
				if($this->agendamientos_model->saveConfirmaciones($data)){
					$this->response['error'] = false;
					$this->response['data'] = null;
					echo json_encode($this->response);
				}
				else{
					$this->response['error'] = true;
					$this->response['data'] = 'NO SE PUDO GUARDAR EL REGISTRO';
					echo json_encode($this->response);
				}
			}else{
				$this->response['error'] = true;
				$this->response['data'] = validation_errors();
				echo json_encode($this->response);
			}
		}
		}
	}



		public function processOtros(){
		header('Content-Type: application/json');
		if( $this->verify_min_level(EJECUTIVE_LEVEL) ){
		if($this->input->post()){
            $this->form_validation->set_rules('profesional', 'Profesional', 'required');
             $this->form_validation->set_rules('especialidad', 'Especialidad', 'required');
             $this->form_validation->set_rules('prestacion', 'Prestacion', 'required');
			if($this->form_validation->run()){
				$this->load->model('agendamientos_model');
				$data = array(
						'id_medico' => $this->input->post('profesional'),
						'id_especialidad' => $this->input->post('especialidad'),
						'id_prestacion' => $this->input->post('prestacion'),
						'pacientes' => $this->input->post('pacientes'),
						'no_contestaron' => $this->input->post('no_contestaron'),
						'rechazo_anulaciones' => $this->input->post('rechazos_anulaciones'),
						'hora_ya_asignada' => $this->input->post('hora_ya_asignada'),
						'observaciones' => $this->input->post('observaciones'),
						'id_usuario' => $this->auth_user_id,
						'reasignadas' => $this->input->post('reasignadas'),
						'confirmadas' => $this->input->post('confirmadas'),
					);
				if($this->agendamientos_model->saveOtros($data)){
					$this->response['error'] = false;
					$this->response['data'] = null;
					echo json_encode($this->response);
				}
				else{
					$this->response['error'] = true;
					$this->response['data'] = 'NO SE PUDO GUARDAR EL REGISTRO';
					echo json_encode($this->response);
				}
			}else{
				$this->response['error'] = true;
				$this->response['data'] = validation_errors();
				echo json_encode($this->response);
			}
		}
		}
	}


	public function index(){
		if($this->require_min_level(EJECUTIVE_LEVEL)){
			$this->load->model('global_model');
		$especialidades = $this->global_model->getEspecialidades();
		$prestaciones= $this->global_model->getPrestaciones();
			$this->template->set('title', 'Registro de actividad');
			$this->template->set('page_header', 'Registro de actividad');
			$this->template->set('css', array());
			$this->template->set('scripts', array('pages/agendamientos/agendamientos.js'));
			$this->template->load('default_layout', 'contents' , 'agendamientos/index.php', array('espec'=> $especialidades,'prestaciones'=> $prestaciones));
		}
	}
}