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
    
    public function __construct() {
        parent::__construct();
        $this->load->model('catalogoProd_Model');
        
        $data ['email'] =  $this->session->userdata['email'];
        $this->load->library('class/Proveedor',$data,'proveedor');
    }
    function index(){
        $this->load->view('head');
        $data['datosTabla'] = $this->listarProductos();
        $this->load->view('walcome_vista',$data);
        $this->load->view('footer');
        
    }
    function listarProductos(){
        $datosTabla = $this->proveedor->buscaSusProductos();
        return $datosTabla;
    }
    
    public function busquedaFiltrada(){
        $data['key'] = $this->input->post('key');
        
       $data['datosBusqueda']=$this->catalogoProd_Model->busquedaFiltrada('tproducto','descProducto',$data['key']);
        
        
        $this->load->view('tabla',$data);
    }
    
}

?>
