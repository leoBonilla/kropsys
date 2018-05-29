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
   
  private $servicio;
	public function __construct()
	{
		parent::__construct();
    $this->load->model('inmunomedica_model', 'inmuno');
    $this->servicio="http://190.151.33.10:3010/reservaService.asmx?wsdl";  
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
			       $this->template->set('page_header', 'Gestión de confirmaciones');
			       $this->template->set('css', $css);
			       $this->template->set('scripts', $scripts);
			       $this->template->load('default_layout', 'contents' , 'inmunomedica/index',  array('data' => null));
           }
	}

  public function home(){
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
                $sucursales = array();
                $especialidades = array();
                $doctores = array();
                switch ($estado) {
                  case '1':
                    
                             
                              $parametros=array(); //parametros de la llamada
                              $parametros['fecha']=$fecha;
                              $client = new SoapClient($this->servicio, $parametros);
                              $result = $client->obtenerReservas($parametros);//llamamos al métdo que nos interesa con los parámetros                            
                               if(isset($result->ObtenerReservasResult->reserva)){
                                        $data = $result->ObtenerReservasResult->reserva;


                                       // sacar los registros que han sido confirmados, obtener sucursales , especialidades y medicos para poder filtrar
                                        foreach ($data as $key => $row) {
                                            $folio = $row->FOLIO;
                                             if(!in_array($row->SUCURSAL, $sucursales)){
                                              $sucursales[] = $row->SUCURSAL;
                                             }

                                              if(!in_array($row->ESPECIALIDAD, $especialidades)){
                                              $especialidades[] = $row->ESPECIALIDAD;
                                             }
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
             
         echo json_encode(array('data' => $data, 'sucursales' => $sucursales, 'especialidades' => $especialidades));
      
  }



  public function confirm(){
    header('Content-Type: application/json');
    if($this->require_group('inmunomedica')){
      if($this->input->post()){
          $output = array('result' => false);
           $obj = false;
              $this->load->model('global_model', 'global');
              $anexo = $this->global->findAnexoByUser($this->auth_user_id);

                              $parametros=array(); //parametros de la llamada
                              $fecha = trim($this->input->post('fecha'));
                              $folio = $this->input->post('id');
                              $number = $this->input->post('number');
                              $date_format = trim($fecha);
                              $parts = explode('-', $date_format);

                              $date_format = "$parts[2]-$parts[1]-$parts[0]";
                              $parametros['fecha']=$fecha;
                              $client = new SoapClient($this->servicio, $parametros);
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
                               if($this->inmuno->isBlocked($obj->FOLIO)){
                                   echo json_encode(array('respuestaOk' => false, 'message' => 'Otro usuario está realizando una llamada a este numero, intentelo mas tarde', 'uniqueId' => ''));
                               }
                               else{
                                   $this->generarLlamada($number,$anexo->anexo,$obj->FOLIO); 
                                // var_dump($number);
                                // var_dump($anexo);
                                // var_dump($obj);
                               }
             }
       }
    }
  }


private function generarLlamada($number, $extension,$folio){
    header('Content-Type: application/json');
      if($this->input->post()){
       

         try {

          $arrContextOptions=array(
                          "ssl"=>array(
                            "verify_peer"=>false,
                              "verify_peer_name"=>false,
                          ),
                        );
          ini_set('max_execution_time', 300);
          $callUrl = "https://192.168.0.205/generaLlamada.php?telefono=$number&anexo=$extension";
         // var_dump($callUrl);
        $xml = file_get_contents($callUrl, false, stream_context_create($arrContextOptions));
          $obj = json_decode($xml);
            if($obj->respuestaOk == true){
              $this->inmuno->guardarLLamada(
                array(
                  'unique_id' => $obj->uniqueId,
                  'fecha' => date('Y-m-d H:i:s'),
                  'user_id' => $this->auth_user_id,
                  'anexo' => $extension,
                  'folio' => $folio,
                  'telefono' => $number
                ));
            }
          
            echo json_encode(array('respuestaOk' => $obj->respuestaOk, 'message' => $obj->mensaje, 'uniqueId' => $obj->uniqueId));
     } catch (Exception $e) {
      var_dump($e);
      echo json_encode(array('result' => false));
     }
      
    }
   }


   public function preparamodal(){
    if($this->require_group('inmunomedica')){
       if($this->input->post()){
        $obj = false;
                              $parametros=array(); //parametros de la llamada
                              $fecha = trim($this->input->post('fecha'));
                              $folio = $this->input->post('id');
                              $date_format = trim($fecha);
                              $parts = explode('-', $date_format);

                              $date_format = "$parts[2]-$parts[1]-$parts[0]";
                              $parametros['fecha']=$fecha;
                              $client = new SoapClient($this->servicio, $parametros);
                              $result = $client->obtenerReservas($parametros);//llamamos al métdo que nos interesa con los parámetros 
                              if(isset($result->ObtenerReservasResult->reserva)){
                                        $data = $result->ObtenerReservasResult->reserva;
                                           foreach ($data as $key => $row) {
                                            if($row->FOLIO == $folio){
                                                $tmp = (array) $row;
                                                $tmp['FECHA'] = $fecha;
                                                $obj = (object) $tmp;
                                                break;
                                            }
                                                 
                                              }
                                      } 
                         $this->load->view('inmunomedica/modal_call', array('obj' => $obj));

       }
    }
   }


   public function markConfirmed(){
    header('Content-Type: application/json');
    if($this->require_group('inmunomedica')){
      if($this->input->post()){
          $output = array('result' => false);
           $obj = false;

                              $parametros=array(); //parametros de la llamada
                              $fecha = trim($this->input->post('fecha'));
                              $folio = $this->input->post('id');
                              $date_format = trim($fecha);
                              $parts = explode('-', $date_format);
                              $id_llamada = trim($this->input->post('uniqueId'));
                              $estado = trim($this->input->post('estado'));
                              $destino = trim($this->input->post('destino'));
                              $observaciones = trim($this->input->post('observaciones'));
                              $date_format = "$parts[2]-$parts[1]-$parts[0]";
                              $parametros['fecha']=$fecha;
                              $client = new SoapClient($this->servicio, $parametros);
                              $result = $client->obtenerReservas($parametros);//llamamos al métdo que nos interesa con los parámetros 
                              if(isset($result->ObtenerReservasResult->reserva)){
                                        $data = $result->ObtenerReservasResult->reserva;
                                           foreach ($data as $key => $row) {
                                            if($row->FOLIO == $folio){
                                                $tmp = (array) $row;
                                                $tmp['FECHA'] = $fecha;
                                                $obj = (object) $tmp;
                                                break;
                                            }
                                                 
                                              }
                                      } 

                           if($obj != false){
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
                                                    'especialidad' => $obj->ESPECIALIDAD,
                                                    'id_llamada' => $id_llamada,
                                                    'estado' => $estado,
                                                    'observaciones' => $observaciones,
                                                    'numero_destino' => $destino


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


   public function reportes(){
          if($this->require_group('inmunomedica')){
                  $css =  array(
                        'vendor/datatables-plugins/dataTables.bootstrap.css',
                        'vendor/datatables-responsive/dataTables.responsive.css',
                        'vendor/clockpicker/dist/bootstrap-clockpicker.css',
                         'vendor/switch/bootstrap-switch.min.css',
                         'vendor/fullcalendar/fullcalendar.css',
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
                         'vendor/fullcalendar/fullcalendar.js',
                         'vendor/fullcalendar/locale/es.js',
                         'vendor/flot/jquery.flot.js',
                         'vendor/flot/jquery.flot.resize.js',
                         'vendor/flot-tooltip/jquery.flot.tooltip.min.js',
                         'vendor/flot/jquery.flot.time.js',
               '../init_tables.js',
               'pages/inmunomedica/reportes.js');    
           $this->template->set('title', 'Inmunomedica - Reportes');
             $this->template->set('page_header', 'Inmunomedica - Reportes');
             $this->template->set('css', $css);
             $this->template->set('scripts', $scripts);
             $this->template->load('default_layout', 'contents' , 'inmunomedica/reportes',  array('data' => null));
           }
   }

   public function sms(){
              if($this->require_group('inmunomedica')){
                  $css =  array(
                        'vendor/datatables-plugins/dataTables.bootstrap.css',
                        'vendor/datatables-responsive/dataTables.responsive.css',
                        'vendor/clockpicker/dist/bootstrap-clockpicker.css',
                         'vendor/switch/bootstrap-switch.min.css',
                         'vendor/fullcalendar/fullcalendar.css',
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
               'pages/inmunomedica/sms.js');    
           $this->template->set('title', 'Inmunomedica - Reportes');
             $this->template->set('page_header', 'Inmunomedica - Visor de sms');
             $this->template->set('css', $css);
             $this->template->set('scripts', $scripts);
             $this->template->load('default_layout', 'contents' , 'inmunomedica/sms',  array('data' => null));
           }

   }


   public function sendReminder(){
         $database = $this->load->database('kropsys_service',TRUE);
          $query = $database->select('mensaje')->get_where('sms', array('motivo' => 'AGENDADO'));
           if($query->num_rows() > 0){
                  foreach ($query->result() as $row) {
                     echo $row->mensaje;
                  }
           }
   }


   public function listar_sms(){
    $this->load->database('kropsys_service');
            if($this->require_group('inmunomedica')){
          $inicio = '';
          $fin= '';
          $users = null;
            if($this->input->post()){

                $inicio = ($this->input->post('inicio') != '') ? datepicker_to_mysql($this->input->post('inicio')) : '';
                 $fin = ($this->input->post('fin') != '') ? datepicker_to_mysql($this->input->post('fin')) : '';
                  $motivo = ($this->input->post('motivo') != '') ? $this->input->post('motivo') : '';
                 
                 $where = "date(fecha_envio) between '".$inicio."' and '".$fin."'";
                  if($motivo != 'TODOS'){
                    $where = $where. " AND motivo = '".$motivo."'";
                  }
                           
               $this->load->model('datatables/inmuno_sms_model', 'sms');
                       $list = $this->sms->get_datatables($where);
           $data = array();
           $no = $_POST['start'];
           foreach ($list as $fila) {
              //var_dump($tareas);
                $no++;
                $row = array();
                $row[] = $fila->numero;
                $row[] = $fila->mensaje;
                $row[] = $fila->fecha_envio;
                 $row[] = $fila->motivo;
                  $row[] = $fila->fecha_cita;
                   $row[] = $fila->hora_cita;
             $row[] = "<a class='btn btn-warning btn-xs' href='#'></a>";
 
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->sms->count_all($where),
                        "recordsFiltered" => $this->sms->count_filtered($where),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
            }

              }
      // if($this->auth_level < ADMIN_LEVEL){
      //    $where = "id_usuario = ". $this->auth_user_id;
      //     if($inicio != '' and $fin != ''){
      //       $where .= " AND ((date(fecha) BETWEEN '".$inicio."' AND '".$fin."')) ";
      //     }elseif($inicio != ''){
      //       $where .= " AND ((date(fecha) >= '".$inicio."')) ";
      //     }elseif($fin != ''){
      //       $where .= " AND ((date(fecha) <= '".$fin."')) ";
      //     }
          
      // }else{
      //   $where = "";
      //   if($inicio != '' and $fin != ''){
      //       $where .= " ((date(fecha) BETWEEN '".$inicio."' AND '".$fin."')) ";
      //     }elseif($inicio != ''){
      //       $where .= " ((date(fecha) >= '".$inicio."')) ";
      //     }elseif($fin != ''){
      //       $where .= " ((date(fecha) <= '".$fin."')) ";
      //     }

         
      //     if(is_array($users)){
      //         $in = '';
      //         foreach ($users as $id) {
      //           if($id != '')
      //           $in = $in .' '.$id.',';
      //         }
      //         $in = substr($in, 0, -1);

      //                    if($where != ''){
      //                    $where = $where. " AND id_usuario IN (".$in.")"; 
      //                  }else{
      //                  $where = $where. " id_usuario IN (".$in.")"; 
      //                  }
      //          }
      // }
     

   }
   


}