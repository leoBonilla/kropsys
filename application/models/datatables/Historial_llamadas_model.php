<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Historial_llamadas_model extends Datatables_Model {


protected $table = 'historial_llamadas_view';
protected $column_order = array('id', 'fecha', 'usuario','unique_id','numero','anexo', 'user_id','especialidad','profesional','prestacion','paciente' ); //set column field database for datatable orderable
protected $column_search =  array('id', 'fecha', 'usuario','unique_id','numero','anexo', 'user_id','especialidad','profesional','prestacion','paciente' ); //set column field database for datatable searchable 
protected $order = array('id' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
