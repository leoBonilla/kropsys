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

class Agenda extends MY_Controller
{
	private $response;
	public function __construct()
	{
		parent::__construct();
		$this->response = array('error' => false, 'data' => array() );

	}

	public function home(){
		    if($this->require_group('inmunomedica')){
                  $css =  array(
                       'vendor/fullcalendar/fullcalendar.css'
                    );
           $scripts = array( 
           	             'vendor/fullcalendar/fullcalendar.js',
           	             'vendor/fullcalendar/locale/es.js',
                         'pages/agenda/home.js');    
           $this->template->set('title', 'Agenda ');
             $this->template->set('page_header', 'Agenda');
             $this->template->set('css', $css);
             $this->template->set('scripts', $scripts);
              $this->template->load('default_layout', 'contents' , 'agenda/home',  array());
           }
	}

	public function reservausuario(){
		 if($this->require_group('inmunomedica')){
                  $css =  array(
                       'vendor/fullcalendar/fullcalendar.css'
                    );
           $scripts = array( 
           	             'vendor/fullcalendar/fullcalendar.js',
           	             'vendor/fullcalendar/locale/es.js',
                         'pages/agenda/reservausuario.js');    
           $this->template->set('title', 'Anulaciones ');
             $this->template->set('page_header', 'Anulacion');
             $this->template->set('css', $css);
             $this->template->set('scripts', $scripts);
              $this->template->load('default_layout', 'contents' , 'agenda/reservausuario',  array());
           }
	}


	public function cancelar(){
		 if($this->require_group('inmunomedica')){
                  $css =  array();
           $scripts = array( 
                         'pages/agenda/cancelar.js');    
           $this->template->set('title', 'Anulaciones ');
             $this->template->set('page_header', 'Anulacion');
             $this->template->set('css', $css);
             $this->template->set('scripts', $scripts);
              $this->template->load('default_layout', 'contents' , 'agenda/cancelar',  array());
           }
	}

	public function buscar_horas(){
		$this->load->model('agenda_model');
		//var_dump($this->agenda_model->findCitas(551,'2018-06-13','2018-06-13'));
		if($this->input->post()){
			   $inicio = $this->input->post('inicio');
			   $fin = $this->input->post('fin');
			   $idmedico = $this->input->post('idmedico');
			   $this->load->model('agenda_model');
			   $result = $this->agenda_model->findCitas($idmedico,$inicio,$fin);
			   $this->load->view('agenda/citas_encontradas', array('citas' => $result));
		}
	}

	public function anular_horas(){
		if($this->input->post()){
			$data = $this->input->post('data');
			$motivo = $this->input->post('motivo');
			$data = explode(',', $data);

			$this->load->model('agenda_model');
			$result  = $this->agenda_model->anular($data,$motivo);
			foreach ($result as $row) {
				    $mensaje = "Por motivos de ".$motivo." el medico ".$row->id_medico." anulo su cita del ".$row->fecha." visite ".$row->enlace_usuario." para reagendar";
					$this->sendSms($row->movil, $mensaje);
			}
			//var_dump($result);
		}
	}

	private function sendSms($movil, $mensaje){
		$movil = substr($movil, 1);
		$datos = [];
        $datos[] = [
          "destination" => "569$movil",
          "field" => "mensaje"
          ];
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



}