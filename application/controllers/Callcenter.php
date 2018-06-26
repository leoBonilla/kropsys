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

class Callcenter extends MY_Controller
{
	private $response;
	public function __construct()
	{
		parent::__construct();
		$this->response = array('error' => false, 'data' => array() );

	}

	public function index(){
				    if($this->require_group('inmunomedica')){
                  $css =  array(
                       'vendor/fullcalendar/fullcalendar.css'
                    );
           $scripts = array( 
           	             'vendor/fullcalendar/fullcalendar.js',
           	             'vendor/fullcalendar/locale/es.js',
                         'pages/callcenter/index.js');    
           $this->template->set('title', 'Consola agente');
             $this->template->set('page_header', 'Call center');
             $this->template->set('css', $css);
             $this->template->set('scripts', $scripts);
              $this->template->load('default_layout', 'contents' , 'callcenter/index',  array());
           }
	}

	public function login_consola(){
			    if($this->require_group('inmunomedica')){
                  $css =  array(
                       'vendor/fullcalendar/fullcalendar.css'
                    );
           $scripts = array( 
           	             'vendor/fullcalendar/fullcalendar.js',
           	             'vendor/fullcalendar/locale/es.js',
                         'pages/callcenter/default.js');    
           $this->template->set('title', 'Agenda ');
             $this->template->set('page_header', 'Call center');
             $this->template->set('css', $css);
             $this->template->set('scripts', $scripts);
              $this->template->load('default_layout', 'contents' , 'callcenter/login',  array());
           }
	}

}