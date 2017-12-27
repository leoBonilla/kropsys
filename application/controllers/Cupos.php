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

class Cupos extends My_Controller
{
    private $response;
	public function __construct()
	{
		parent::__construct();
        $this->response = array('error' => false, 'data' => array() );
		$this->load->model('cupos_model');
	}

	public function index(){
    if($this->require_min_level(1)){
    	$this->load->model('global_model');
    	$especialidades = $this->global_model->getEspecialidades();
    		   $data = array();
       $css =  array(
       					'vendor/datatables-plugins/dataTables.bootstrap.css',
       					'vendor/datatables-responsive/dataTables.responsive.css'


       				);

       $scripts = array( 'pages/cupos/cupos.js' );
       $data = array(
       		'specialties' => $especialidades,

       	);		
       $this->template->set('title', 'Cupos');
       $this->template->set('page_header', 'Cupos');
       $this->template->set('css', $css);
       $this->template->set('scripts', $scripts);
       $this->template->load('default_layout', 'contents' , 'cupos/index', $data);
		//$this->load->view('cupos/index');
    }
	}


	public function processCupos(){
		header('Content-Type: application/json');
     if($this->require_min_level(1)){
		 		if($this->input->post()){
		    $this->form_validation->set_rules('profesional','Profesional', 'required');
			$this->form_validation->set_rules('especialidad','Especialidad', 'required');
            if($this->form_validation->run()){
				$especialidad = $this->input->post('especialidad');
				 $data = array(
				    'id_especialidad' => $this->input->post('especialidad'),
					'id_profesional' => $this->input->post('profesional'),
					 'fecha' => $this->input->post('fecha'),
					  'cupos' => $this->input->post('cupos'),
					   'observaciones' => $this->input->post('observaciones'),
					   'user_id' => $this->auth_user_id
				 );	
				$fec = explode('/', $data['fecha']);
				$data['fecha'] = "{$fec[2]}-{$fec[1]}-{$fec[0]}";
				if($this->cupos_model->save($data)){
					$this->response['error'] = false;
					$this->response['data'] = null;
					echo json_encode($this->response);
				}
			}else{
				    $this->response['error'] = true;
					$this->response['data'] =validation_errors();
					echo json_encode($this->response);
			}
		}
	 }
	}
	
	public function listado(){
		if($this->require_min_level(1)){
			 $css =  array(
       					'vendor/datatables-plugins/dataTables.bootstrap.css',
       					'vendor/datatables-responsive/dataTables.responsive.css',
       					'custom.css'

       				);

             $scripts = array( 
       					'vendor/datatables/js/jquery.dataTables.min.js',
    					 'vendor/datatables-plugins/dataTables.bootstrap.min.js',
    					 	 //buttons js
    					 'vendor/datatables-plugins/dataTables.buttons.min.js',
    					 'vendor/datatables-plugins/buttons.bootstrap.min.js',
    					 'vendor/datatables-plugins/buttons.flash.min.js',
    					 'vendor/datatables-plugins/jszip.min.js',
    					 'vendor/datatables-plugins/pdfmake.min.js',
    					 'vendor/datatables-plugins/vfs_fonts.js',
    					 'vendor/datatables-plugins/buttons.html5.min.js',
    					 'vendor/datatables-plugins/buttons.print.min.js',
               '../init_tables.js',
               '../moment-with-locales.min.js',
    					 'pages/cupos/listado.js'
    					 );
			$this->template->set('title', 'Listado cupos');
			$this->template->set('page_header', 'Cupos');
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'cupos/listado', null);
		}
	}


	public function detalle(){
		if($this->require_min_level(1)){
			$id_especialidad = trim($this->uri->segment(3));
			$fecha = trim($this->uri->segment(4));
			if(is_numeric($id_especialidad) == false or (preg_match('/\d{4}-\d{2}-\d{2}/',$fecha) == false)){
				show_404();
			}
			$detalle = $this->cupos_model->detalleCupo($fecha,$id_especialidad);

			 $css =  array(
       					'vendor/datatables-plugins/dataTables.bootstrap.css',
       					'vendor/datatables-responsive/dataTables.responsive.css'

       				);

             $scripts = array( 
       					'vendor/datatables/js/jquery.dataTables.min.js',
    					 'vendor/datatables-plugins/dataTables.bootstrap.min.js',
    					 	 //buttons js
    					 'vendor/datatables-plugins/dataTables.buttons.min.js',
    					 'vendor/datatables-plugins/buttons.bootstrap.min.js',
    					 'vendor/datatables-plugins/buttons.flash.min.js',
    					 'vendor/datatables-plugins/jszip.min.js',
    					 'vendor/datatables-plugins/pdfmake.min.js',
    					 'vendor/datatables-plugins/vfs_fonts.js',
    					 'vendor/datatables-plugins/buttons.html5.min.js',
    					 'vendor/datatables-plugins/buttons.print.min.js',
               '../init_tables.js',
    					 'pages/cupos/detalle.js'
    					 );


			$this->template->set('title', 'Detalle cupos '.$fecha);
			$this->template->set('page_header', 'Detalle cupos');
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'cupos/detalle', array('detalles' => $detalle));
		}
	}
}