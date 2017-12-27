<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

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

	public function index()
	{
	

	}


	public function sendSms(){
		if( $this->require_min_level(1) )
		{

			$this->load->model('locations_model');
			$this->load->model('global_model');
			$css = array('vendor/clockpicker/dist/bootstrap-clockpicker.css');
			$scripts = array( 'vendor/clockpicker/dist/bootstrap-clockpicker.js',
				              'pages/sms/index.js');
		    $locations = $this->locations_model->getAll();
			$specialties = $this->global_model->getEspecialidades();
			//$this->load->view('send_sms_',array('locations'=> $locations, 'specialties' => $specialties));
			$this->template->set('title', 'Enviar SMS');
			$this->template->set('page_header', 'Enviar SMS');
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'sms/index', array('locations'=> $locations, 'specialties' => $specialties));
		}
	}
}
