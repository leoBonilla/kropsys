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

class Test extends MY_Controller
{

public function __construct(){
	parent::__construct();
}




public function index(){

            if($this->require_min_level(1)){
                 $this->template->set('title', 'Documentos');
             $this->template->set('page_header', 'Documentos');
             $css =  array(
                        'vendor/datatables-plugins/dataTables.bootstrap.css',
                        'vendor/datatables-responsive/dataTables.responsive.css',
                        'vendor/clockpicker/dist/bootstrap-clockpicker.css',
                         'vendor/switch/bootstrap-switch.min.css'

                    );


             $scripts = array( 
                        'vendor/datatables/js/jquery.dataTables.min.js',
                         'vendor/datatables-plugins/dataTables.bootstrap.min.js',
                         'vendor/datatables-responsive/dataTables.responsive.min.js',
                         'vendor/datatables-responsive/responsive.bootstrap.min.js',
                         'vendor/clockpicker/dist/bootstrap-clockpicker.js',
                         'vendor/confirmation/bootstrap-confirmation.js',
                         'vendor/switch/bootstrap-switch.min.js',
                         'vendor/fileupload/js/vendor/jquery.ui.widget.js',
                         'vendor/fileupload/js/jquery.fileupload.js',
                         //buttons js
                         'vendor/datatables-plugins/dataTables.buttons.min.js',
               'vendor/datatables-plugins/buttons.bootstrap.min.js',
                         'vendor/datatables-plugins/buttons.flash.min.js',
                         'vendor/datatables-plugins/jszip.min.js',
                         'vendor/datatables-plugins/pdfmake.min.js',
                         'vendor/datatables-plugins/vfs_fonts.js',
                         'vendor/datatables-plugins/buttons.html5.min.js',
                         'vendor/datatables-plugins/buttons.print.min.js',
                         //global
                         'pages/test/test.js'                      
                         );
            $this->template->set('css', $css);
            $this->template->set('scripts', $scripts);
  //    $options = array(
  //   'cluster' => 'us2',
  //   'encrypted' => true
  // );
  // $pusher = new Pusher\Pusher(
  //   'd2cee8a3e04c9befaf5d',
  //   'dfba06368a2378a61987',
  //   '451334',
  //   $options
  // );

  // $data['message'] = 'hello world';
  // $pusher->trigger('my-channel', 'my-event', $data);
      $this->template->load('default_layout', 'contents' , 'test/index');

            }
}

	
}