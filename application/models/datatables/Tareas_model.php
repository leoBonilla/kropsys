<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tareas_model extends Datatables_Model {


protected $table = 'tareas_view';
protected $column_order = array('id','filename','tipo','fecha','hora','descripcion','cargada_por','usuario'); //set column field database for datatable orderable
protected $column_search = array('id','filename','tipo','fecha','hora','descripcion','cargada_por','usuario'); //set column field database for datatable searchable 
protected $order = array('id' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
