<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Cupos_model extends Datatables_Model {


protected $table = 'cupos_view';
protected $column_order = array('id','id_especialidad','id_profesional','fecha','cupos','observaciones','id_usuario','profesional','especialidad','fecha_registro','observaciones'); //set column field database for datatable orderable
protected $column_search = array('id','id_especialidad','id_profesional','fecha','cupos','observaciones','id_usuario','profesional','especialidad','fecha_registro','observaciones'); //set column field database for datatable searchable 
protected $order = array('id' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
