<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profesionales_model extends Datatables_Model {


protected $table = 'profesionales_view';
protected $column_order = array('id','profesional','nombre_agenda','especialidad','id_especialidad','disabled', 'disabled_str'); //set column field database for datatable orderable
protected $column_search = array('id','profesional','nombre_agenda','especialidad','id_especialidad','disabled', 'disabled_str'); //set column field database for datatable searchable 
protected $order = array('id' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
