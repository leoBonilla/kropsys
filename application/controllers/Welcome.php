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
		if( $this->require_min_level(1) )
		{
			$this->template->set('title', 'Inicio');
			$this->template->set('page_header', 'Inicio');
			$this->template->set('css', array());
			$this->template->set('scripts', array());
			if($this->auth_level >= 4){
				$this->template->load('default_layout', 'contents' , 'welcome_message', null);
			}else{
				if($this->auth_level == 2 || $this->auth_level == 3){
					redirect(base_url('inmunomedica/home'));
				}
			}
			
	     }
	}

	public function test(){
		$cdrdb = $this->load->database('cdr', TRUE);
	}
}
