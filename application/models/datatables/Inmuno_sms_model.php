<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inmuno_sms_model extends Datatables_Model {


protected $table = 'kropsys_service.sms';
protected $column_order = array('numero','mensaje','fecha_envio','motivo','fecha_cita','hora_cita','id_batch'); //set column field database for datatable orderable
protected $column_search = array('numero','mensaje','fecha_envio','motivo','fecha_cita','hora_cita','id_batch'); //set column field database for datatable searchable 
protected $order = array('fecha_envio' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
