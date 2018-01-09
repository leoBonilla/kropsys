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

class Email extends MY_Controller
{


	public function __construct(){
		parent::__construct();
	}
    

    public function enviarCorreo(){
        if($this->input->post()){
        	    $this->load->model('documents/documents_model', 'doc');
        	    //$to = $this->input->post('to')
        	    $id = $this->input->post('id');
        	    $original = $this->input->post('original');
        	    $subject = $this->input->post('subject');
        	    $message = $this->input->post('message');
        	    $documento = $this->doc->findDocumentoAprobado($original);
                $attach = false;
        	    if($documento != false){
        	    	$attach = array($documento->ruta);
        	    }
        	    $data = array('subject' => $subject , 'message' => $message);
        		header('Content-Type: application/json');
    			if($this->send($data, $attach)){
    				    echo json_encode( array('result' => true) );
    			}else{
    				echo json_encode( array('result' => false) );
    			}
        		
        }
    }
	private function send($data, $attach = false){
		    $config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'leobonillab@gmail.com',// your mail name
				'smtp_pass' => 'leonardo84',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1',
				 'wordwrap' => TRUE
			);
			$this->load->library('email',$config);
			$this->email->from('leobonillab@gmail.com', 'Sistema Kropsys');
			$this->email->to('leobonillab@gmail.com');
			if(is_array($attach)){
				foreach ($attach as $e) {
					$this->email->attach($e);	
				}
			}
			
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');

			$this->email->subject($data['subject']);
			$this->email->message($data['message']);

			if($this->email->send()){
				return true;
			}
			return false;
	}
}