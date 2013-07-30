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
        $this->load->model('login_model');
        
        $data ['email'] =  $this->session->userdata['email'];
        $this->load->library('Class/Proveedor',$data,'proveedor');
		$this->load->model('catalogoProd_Model');
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
       $data['datosBusqueda']=$this->catalogoProd_Model->busquedaFiltrada('vInventarioReal','descProducto',$data['key']);
        
       $this->load->view('tabla',$data);
    }
    
    function detallesProducto($producto){
        $arrayDetalles['detalles'] = $this->catalogoProd_Model->detallesProducto('vDetallesMovimientoXProductos','idProducto',$producto);
		
		
		$data['idProducto'] = $producto;
		$this->load->library('Class/Producto',$data,'productor');
		
		
		$arrayDetalles['descProducto'] = $this->productor->getdescProducto();
		
        $this->load->view('head');
        $this->load->view('detalles_view',$arrayDetalles);
        $this->load->view('footer');
    }

	public function exportarExcel(){
        $data['datosTabla'] = $this->listarProductos();
      	$this->load->view('excel_Vista_ReportedeProductos',$data);
		
        $this->load->view('head');
      	$this->load->view('walcome_vista',$data);
        $this->load->view('footer');
	}

	public function exportarExcelHistorialMovimientos($producto){
        $arrayDetalles['detalles'] = $this->catalogoProd_Model->detallesProducto('vDetallesMovimientoXProductos','idProducto',$producto);
      	$this->load->view('excel_Vista_HistorialProducto',$arrayDetalles);
		
        $this->load->view('head');
        $this->load->view('detalles_view',$arrayDetalles);
        $this->load->view('footer');
	}
}

?>
