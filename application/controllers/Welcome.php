<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if( $this->require_min_level(EJECUTIVE_LEVEL) )
		{
			$this->template->set('title', 'Inicio');
			$this->template->set('page_header', 'Inicio');
			$this->template->set('css', array());
			$this->template->set('scripts', array());
			$this->template->load('default_layout', 'contents' , 'welcome_message', null);
	     }
	}

	public function test(){
		$cdrdb = $this->load->database('cdr', TRUE);
	}
}
