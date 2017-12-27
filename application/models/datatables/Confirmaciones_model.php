<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Confirmaciones_model extends Datatables_Model {


protected $table = 'confirmaciones_view';
protected $column_order = array('id','id_medico','id_especialidad','id_prestacion','no_contestaron','rechazo_anulaciones','hora_ya_asignada','observaciones','id_usuario', 'fecha', 'n_erroneo','profesional','especialidad','prestacion','usuario'); //set column field database for datatable orderable
protected $column_search = array('especialidad','id_medico','id_especialidad','id_prestacion','no_contestaron','rechazo_anulaciones','hora_ya_asignada','observaciones','id_usuario', 'fecha', 'n_erroneo','profesional','especialidad','prestacion','usuario'); //set column field database for datatable searchable 
protected $order = array('id' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
