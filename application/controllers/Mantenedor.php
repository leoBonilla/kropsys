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

class Mantenedor extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function especialidades(){
				if($this->require_min_level(9)){

		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('especialidades');
			$crud->set_subject('Especialidades');
			$crud->change_field_type('disabled','true_false');
			//$crud->change_field_type('disabled','true_false');
			//$crud->callback_add_field('disabled',array($this,'add_field_callback_1'));
			$crud->columns('id','especialidad','disabled');

			$output = $crud->render();
			$css =  array(
				"grocery_crud/themes/datatables/css/demo_table_jui.css" ,
				'grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css',
				'grocery_crud/themes/datatables/css/datatables.css',
				'grocery_crud/themes/datatables/css/jquery.dataTables.css',
				'grocery_crud/themes/datatables/extras/TableTools/media/css/TableTools.css',			
				'grocery_crud/css/jquery_plugins/fancybox/jquery.fancybox.css'

			);

			$scripts = array(

		);
			$this->template->set('title', 'Confirmaciones');
			$this->template->set('page_header', 'Mantenedor | especialidades');
			$this->template->set('css', $css);
			$this->template->set('scripts', $scripts);
			$this->template->load('default_layout', 'contents' , 'mantenedor/especialidades', array('output' => $output));

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

		
	}
	}

	

}