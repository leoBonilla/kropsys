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

class Documentos extends MY_Controller
{

	public function __construct(){
			parent::__construct();
	}

	public function index(){
			  if($this->require_min_level(1)){
        $this->template->set('title', 'Tareas');
        
            $this->template->set('page_header', 'Tareas');
             $css =  array(
                        'vendor/datatables-plugins/dataTables.bootstrap.css',
                        'vendor/datatables-responsive/dataTables.responsive.css',
                        'vendor/clockpicker/dist/bootstrap-clockpicker.css',
                         'vendor/switch/bootstrap-switch.min.css',
                         'custom.css'

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
               '../init_tables.js',
               'pages/documentos/index.js'
                         
                         );
            $this->template->set('css', $css);
            $this->template->set('scripts', $scripts);
            $this->load->model('documents/documents_model');
    		$data = $this->documents_model->getDocumentsByUser($this->auth_user_id);
            $this->load->model('global_model');
            $estados_llamada = $this->global_model->getStates();
            $anexo = $this->global_model->findAnexoByUser($this->auth_user_id);
    	    $this->template->load('default_layout', 'contents' , 'documentos/index', array('documentos' => $data,'anexo' => $anexo, 'estados' => $estados_llamada));
  }
	}


	public function getMyDocuments(){
    if($this->require_min_level(1)){
    	if($this->input->post()){
    			$userid = $this->input->post('userid');
    			$this->load->model('documents/documents_model');
    			$data = $this->documents_model->getDocumentsByUser($userid);
    			//var_dump($documentos);
    				header('Content-Type: application/json');
				$out = array();
        		 if($data != false)
    				foreach ($data as $nrow) {

					$out['data'][] = $nrow;
							}
    	 			echo json_encode($out);
    	}
    }
	}

	public function test(){
    
    		 $this->load->model('documents/documents_model');
                 $adjuntos = $this->documents_model->tieneAdjuntos(13);
                 var_dump($adjuntos);
  
	}


	public function loadModal(){
		if($this->require_min_level(1)){
    	if($this->input->post()){
    			$id = $this->input->post('id');
                $idmail = $this->input->post('id_email');
                //var_dump($idmail);

    			 $this->load->model('documents/documents_model');
                  $adjuntos = $this->documents_model->tieneAdjuntos((int)$idmail);
                 //var_dump($adjuntos);
       //           $data = null;
                  if($adjuntos){
                                    $data = $this->documents_model->getDocumentFile($id);
                                    
                             }else{
                                    $data = $this->documents_model->getNoDocument($idmail);
                             }


                 //  var_dump($data);
                 if(is_array($data)){
                    $data = $data[0];               
                 }

                 $observacion = $this->documents_model->getLastHistory($data->id);



    			if($data->id_estado < 2){
    				$this->load->view('documentos/modal_gestionar',array('data' => $data, 'historial' => $observacion));
    			}else{
    				$this->load->view('documentos/modal_gestionar2',array('data' => $data, 'historial' => $observacion));
    			}
    			
    			
    }
}
}

public function changeState(){
	header('Content-Type: application/json');
    	if($this->require_min_level(1)){
    	if($this->input->post()){
    			$id = $this->input->post('id');
    			$state = $this->input->post('state');
                $id_email = $this->input->post('id_email');
    			$this->load->model('documents/documents_model');
    			if($this->documents_model->changeState($id, $state, $this->auth_user_id, false, $id_email)){
    				echo json_encode(array('result' => true));
    			}else{
    				echo json_encode(array('result' => false));
    			}
    			
   			 }
		}
    }


        public function call(){
        header('Content-Type: application/json');
        if($this->require_min_level(1)){
            if($this->input->post()){
                $telefono = $this->input->post('numero');
                $anexo = $this->input->post('anexo');
                return $this->makeCall($telefono,$anexo);
                 //echo json_encode(array('respuestaOk' => true, 'message' => 'mensaje', 'uniqueId' => '3434322.3443' ));
                }
            }
        }

        private function makeCall($number, $extension){
       try {

                $arrContextOptions=array(
                                          "ssl"=>array(
                                            "verify_peer"=>false,
                                                "verify_peer_name"=>false,
                                            ),
                                        );

                $xml = file_get_contents("https://192.168.0.150/generaLlamada.php?telefono=$number&anexo=$extension", false, stream_context_create($arrContextOptions));
                $obj = json_decode($xml);
                
                echo json_encode($obj);
       } catch (Exception $e) {
        return json_encode(array('result' => false));
       }
    }



    public function completarTarea(){
       if($this->require_min_level(1)){
         $this->template->set('title', 'Completar tarea');
           $this->template->set('page_header', '');
            $this->load->model('documents/documents_model', 'doc');

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
               '../init_tables.js',
               'pages/documentos/index.js'
                         
                         );
            $this->template->set('css', $css);
            $this->template->set('scripts', $scripts);

            if($this->input->post()){
                $file_required = $this->input->post('file_required');
               
                if($file_required=='1'){
                     $config['upload_path']   = './uploads/archivos'; 
                     $config['allowed_types'] = 'gif|jpg|png|xlsx|docx|pdf'; 
                     $config['max_size']      = 25600; 
                     $config['max_width']     = 1024; 
                     $config['max_height']    = 768;  
                     $this->load->library('upload', $config);
                        //hubo errores al cargar el archivo
                     if ( ! $this->upload->do_upload('userfile')) {
                        $error = array('error' => $this->upload->display_errors()); 
                        $this->template->load('default_layout', 'contents' , 'documentos/carga_fallida', array('error' => $error));
                     }else{
                        $data = array($this->upload->data()); 
                                // extraer la informacion del archivo
                                $docData = array(
                                            'id_original' => $this->input->post('doc_id'),
                                            'id_email' => $this->input->post('email_id'),
                                            'observaciones' => $this->input->post('observaciones'),
                                            'nombre' => $data[0]['file_name'],
                                            'ruta' => 'uploads/archivos/'. $data[0]['file_name'],
                                            'fecha_subida' => date('Y-m-d H:i:s'),
                                            'id_usuario' => $this->auth_user_id
                                             );
                               

                                if($this->doc->saveModificado($docData)){
                                    $this->template->load('default_layout', 'contents' , 'documentos/carga_exitosa');
                                   //$this->load->view('documentos/carga_exitosa');
                                }else{
                                     $this->template->load('default_layout', 'contents' , 'documentos/carga_fallida');
                                    // $this->load->view('documentos/carga_fallida');
                                }
                     }


                }else{
                    //finalizar archivo 
                    $docData = array(
                                            'id_doc' => $this->input->post('doc_id'),
                                            'id_email' => $this->input->post('email_id'),
                                            'observaciones' => $this->input->post('observaciones'),
                                            'estado' => 3,
                                            'id_usuario' => $this->auth_user_id,
                                            'adjunto' => 0
                                             );
                    if($this->doc->finalizar($docData)){
                        $this->template->load('default_layout', 'contents' , 'documentos/carga_exitosa');
                    }else{
                         $this->template->load('default_layout', 'contents' , 'documentos/carga_fallida');
                    }
                }
            }
       }

    }


    public function envioArchivoFinal(){


            $this->template->set('title', 'Documentos');
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
               '../init_tables.js',
               'pages/documentos/index.js'
                         
                         );
            $this->template->set('css', $css);
            $this->template->set('scripts', $scripts);

      if($this->require_min_level(1)){
         $config['upload_path']   = './uploads/archivos'; 
         $config['allowed_types'] = 'gif|jpg|png|xlsx|docx|pdf'; 
         $config['max_size']      = 25600; 
         $config['max_width']     = 1024; 
         $config['max_height']    = 768;  
         $this->load->library('upload', $config);
            //hubo errores al cargar el archivo
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->template->load('default_layout', 'contents' , 'documentos/carga_fallida', array('error' => $error));
         }
            
         else { 
            //se ha cargado el archivo correctamente
            $data = array($this->upload->data()); 
           // extraer la informacion del archivo
            $docData = array(
                        'id_original' => $this->input->post('doc_id'),
                        'id_email' => $this->input->post('email_id'),
                        'observaciones' => $this->input->post('observaciones'),
                        'nombre' => $data[0]['file_name'],
                        'ruta' => 'uploads/'. $data[0]['file_name'],
                        'fecha_subida' => date('Y-m-d H:i:s'),
                        'id_usuario' => $this->auth_user_id,
                         );
            $this->load->model('documents/documents_model', 'doc');

            if($this->doc->saveModificado($docData)){
                $this->template->load('default_layout', 'contents' , 'documentos/carga_exitosa');
               //$this->load->view('documentos/carga_exitosa');
            }else{
                 $this->template->load('default_layout', 'contents' , 'documentos/carga_fallida');
                // $this->load->view('documentos/carga_fallida');
            }
         } 
      }
    }

    private function set_upload_options(){   
            //upload an image options
                $config = array();
                $config['upload_path'] = './archivos/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '0';
                $config['overwrite']     = FALSE;

                return $config;
    }


    public function documentHistory(){
       if($this->require_min_level(1)){
         $this->load->model('global_model');
         $this->load->model('documents/documents_model');
         $id = $this->input->post('id');
         $users = $this->global_model->getAllUsers();
         $historial= $this->documents_model->getHistory($id);
         $llamadas= $this->documents_model->getHistoryCalls($id);
         $model = $this->documents_model;
         $this->load->view('documentos/history', array('history' => $historial, 'model' => $model, 'id' => $id, 'llamadas' => $llamadas));   


       
    }
    }


    public function guardarLLamada(){
        if($this->require_min_level(1)){
            if($this->input->post()){
                $this->load->model('documents/documents_model');
                $obs = $this->input->post('observaciones');
                $estado = $this->input->post('estado');
                $uniqueId = $this->input->post('uniqueId');
                $doc_id = $this->input->post('doc_id');
                $telefono = $this->input->post('numero');
                header('Content-Type: application/json');
                if($this->documents_model->saveCallLog(array('unique_id' => $uniqueId, 'fecha' => date('Y-m-d H:i:s'), 'documento_id' => $doc_id, 'user_id' => $this->auth_user_id, 'telefono' => $telefono, 'observaciones' => $obs, 'estado' => $estado))){
                    echo json_encode(array('result' => true));
                }else{
                    echo json_encode(array('result' => false));
                }
            }
        }
    }


    public function seenNotification(){
        if($this->input->post()){
            $id = $this->input->post('id');
            $this->documents_model->setSeed($id);
        }
    }


	
}