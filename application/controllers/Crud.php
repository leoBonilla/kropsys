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

class Crud extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}

	

	public function index()
	{
			if($this->require_min_level(9)){
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}
	}

	

	public function profesionales()
	{
		if($this->require_min_level(9)){
			try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('profesionales');
			$crud->set_subject('Profesionales');
			//$crud->required_fields('city');
			//columnas visibles
			$crud->columns(array('id_especialidad','profesional','nombre_agenda'));
			
			
			$crud->set_relation('id_especialidad','especialidades','especialidad');
			//$crud->change_field_type('disabled','true_false');
			$crud->callback_add_field('disabled',array($this,'add_field_callback_1'));
			$crud->callback_edit_field('disabled',array($this,'edit_field_callback_1'));

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		}
	}

	public function users(){
			if($this->require_min_level(9)){
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('users');
			$crud->set_subject('Users');
				$crud->set_relation('extension_id','extension_phones','anexo');
			$crud->columns('user_id','nombre','apellido','rut', 'email', 'anexo');
		
			//$crud->change_field_type('disabled','true_false');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		}}


    public function profesionales_v2(){
			if($this->require_min_level(9)){
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');
			$crud->set_table('profesionales');
			$crud->set_subject('Users');
			$crud->set_relation_n_n('especialidades', 'especialidades_profesionales', 'especialidades', 'id_profesional', 'id_especialidad','especialidad',null,null, true);
			//$crud->columns('user_id','nombre','apellido','rut', 'email', 'anexo');
		    $crud->unset_columns(array('subespecialidad','regla_prioridad','atencion_hlf','atencion_crs','id_especialidad','prestacion_1',
		    																							 'prestacion_2',
		    																							 'prestacion_3',
		    																							 'prestacion_4',
		    																							 'prestacion_5',
		    																							 'prestacion_6',
		    																							 'prestacion_7',
		    																							 'prestacion_8',
		    																							 'prestacion_9',
		    																							 'prestacion_10',
		    																							 'prestacion_11',
		    																							 'prestacion_12',
		    																							 'prestacion_13',
		    																							 'prestacion_14',
		    																							 'prestacion_15',
		    																							 'prestacion_16',
		    																							 'prestacion_17',
		    																							 'prestacion_18',
		    																							 'prestacion_19',
		    																							 'prestacion_20',
		    																							 'prestacion_21',
		    																							 'prestacion_22',));
		    
			//$crud->change_field_type('disabled','true_false');

			$output = $crud->render();

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
		}}



	public function especialidades()
	{
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

			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	}

	
	public function film_management_twitter_bootstrap()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_theme('twitter-bootstrap');
			$crud->set_table('film');
			$crud->set_relation_n_n('actors', 'film_actor', 'actor', 'film_id', 'actor_id', 'fullname','priority');
			$crud->set_relation_n_n('category', 'film_category', 'category', 'film_id', 'category_id', 'name');
			$crud->unset_columns('special_features','description','actors');

			$crud->fields('title', 'description', 'actors' ,  'category' ,'release_year', 'rental_duration', 'rental_rate', 'length', 'replacement_cost', 'rating', 'special_features');

			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function add_field_callback_1()
{
	return ' <input type="radio" name="disabled" value="0" /> NO
<input type="radio" name="disabled" value="1" /> SI';
}


	function edit_field_callback_1()
{
	return ' <input type="radio" name="disabled" value="0" /> NO
<input type="radio" name="disabled" value="1" /> SI';
}


	

}