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

class Inmunomedica extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
    $this->load->model('inmunomedica_model', 'inmuno');
		$this->response = array('error' => false, 'data' => array() );

	}

	public function index(){
           if($this->require_group('inmunomedica')){
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
               'pages/inmunomedica/index.js');		
				   $this->template->set('title', 'Inmunomedica');
			       $this->template->set('page_header', 'Inmunomedica');
			       $this->template->set('css', $css);
			       $this->template->set('scripts', $scripts);
			       $this->template->load('default_layout', 'contents' , 'inmunomedica/index',  array('data' => null));
           }
	}


  public function listar(){
            header('Content-Type: application/json');
            
            if($this->input->post()){
                $fecha = str_replace('/', '-',$this->input->post('fecha'));
                $estado = $this->input->post('state');
                $data = array();
                switch ($estado) {
                  case '1':
                    
                              $servicio="http://190.151.33.10:3010/reservaService.asmx?wsdl"; //url del servicio
                              $parametros=array(); //parametros de la llamada
                              $parametros['fecha']=$fecha;
                              $client = new SoapClient($servicio, $parametros);
                              $result = $client->obtenerReservas($parametros);//llamamos al métdo que nos interesa con los parámetros                            
                               if(isset($result->ObtenerReservasResult->reserva)){
                                        $data = $result->ObtenerReservasResult->reserva;
                                       // sacar los registros que han sido confirmados
                                        foreach ($data as $key => $row) {
                                            $folio = $row->FOLIO;
                                            //si está en la base de datos es porque esta confirmado
                                            if($this->inmuno->exists($row->FOLIO)){
                                              //quitar de la lista actual porque solo traer los que no han sido confirmados
                                               unset($data[$key]);
                                        }
                                    }
                                      $data = array_values($data); 

                                      foreach ($data as $key => $row) {
                                              $x = (array) $row;
                                              $x['FECHA'] = $fecha;
                                              $data[$key] =  (object) $x;
                                      }

                                  

                                     
                                }

                    break;
                  case '2': 
                              $data = $this->inmuno->listarConfirmados(datepicker_to_mysql($this->input->post('fecha')));
                              


                    break;
                  
                  default:
                    # code...
                    break;
                }
                
            }
             
         echo json_encode(array('data' => $data));
      
  }

  public function test(){
    header('Content-Type: application/json');


  }



  public function confirm(){
    header('Content-Type: application/json');
    if($this->require_min_level(1)){
      if($this->input->post()){
          $output = array('result' => false);
           $obj = false;
           $servicio="http://190.151.33.10:3010/reservaService.asmx?wsdl"; //url del servicio
                              $parametros=array(); //parametros de la llamada
                              $fecha = trim($this->input->post('fecha'));
                              $folio = $this->input->post('id');
                              $date_format = trim($fecha);
                              $parts = explode('-', $date_format);

                              $date_format = "$parts[2]-$parts[1]-$parts[0]";
                              $parametros['fecha']=$fecha;
                              $client = new SoapClient($servicio, $parametros);
                              $result = $client->obtenerReservas($parametros);//llamamos al métdo que nos interesa con los parámetros 
                              if(isset($result->ObtenerReservasResult->reserva)){
                                        $data = $result->ObtenerReservasResult->reserva;
                                           foreach ($data as $key => $row) {
                                            if($row->FOLIO == $folio){
                                                $obj = $row;
                                                break;
                                            }
                                                 
                                              }
                                      } 

             if($obj == false){
                  echo json_encode(array('result' => false));
             }else{
                        //$output['result'] = $row;
                                $insertado =  $this->inmuno->confirmar(array(
                                                  'folio' => $obj->FOLIO,
                                                   'confirmado_por' => $this->auth_user_id,
                                                   'fecha_confirmacion' => date('Y-m-d H:i:s'),
                                                   'fecha' => $date_format,
                                                   'paciente' => $obj->PACIENTE,
                                                    'prestador' => $obj->PRESTADOR,
                                                    'lugar' => $obj->SUCURSAL,
                                                    'telefono' => $obj->TELEFONO,
                                                    'celular' => $obj->CELULAR,
                                                    'email' => $obj->EMAIL,
                                                    'hora' => $obj->HORA,
                                                    'fecha_realizacion' => $obj->FECHA_REALIZACION,
                                                    'prevision' => $obj->PREVISION,
                                                    'rut_prestador' => $obj->RUT_PRESTADOR,
                                                    'ejecutivo' => $obj->EJECUTIVO,
                                                    'especialidad' => $obj->ESPECIALIDAD


                                              ));

                                if($insertado){
                                    echo json_encode(array('result' => true));
                                }else{
                                    echo json_encode(array('result' => false));
                                }
             }
       }
    }
  }


}