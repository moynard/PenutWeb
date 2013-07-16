<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of catalogoProductos
 *
 * @author Medivh
 */
class catalogoProductos extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('catalogoProd_Model');
    }
    function index(){
        $data ['email'] =  $this->session->userdata['email'];
        
        $this->load->library('class/Proveedor',$data,'proveedor');
        
        $this->load->view('head');
        $this->load->view('walcome_vista');
        $this->load->view('footer');
        
    }
    
}

?>
