<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Descartados_model extends Datatables_Model {


protected $table = 'email_descartados_view';
protected $column_order = array('id_email','fecha','id_user','asunto','enviado_por','fecha_envio','mensaje','numero_email','fecha_descarte','motivo', 's_descartado_por'); //set column field database for datatable orderable
protected $column_search = array('id_email','fecha','id_user','asunto','enviado_por','fecha_envio','mensaje','numero_email','fecha_descarte','motivo', 's_descartado_por'); //set column field database for datatable searchable 
protected $order = array('id_email' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
