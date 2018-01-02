<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users_model extends Datatables_Model {


protected $table = 'users_anexos_view';
protected $column_order = array('nombre','apellido','rut','anexo','email','auth_level','banned'); //set column field database for datatable orderable
protected $column_search = array('nombre','apellido','rut','anexo','email','auth_level','banned'); //set column field database for datatable searchable 
protected $order = array('nombre' => 'desc'); // default order 


public function __construct(){
    parent::__construct();
}

}
