<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author Medivh
 */
class Producto {
    var $idProducto;
    var $idProveedor;
    var $idSKU;
    var $descProducto;
    
    function __construct($data) {
        $this->idProducto = $data['idProducto'];
		
		
        $this->ci =& get_instance();
		$this->ci->load->model('login_model');
		
		$datosProducto = $this->ci->login_model->extraerDatos("tProducto",'idProducto',$this->idProducto);
		
		
        $this->idProveedor = $datosProducto['idProveedor'];
        $this->idSKU = $datosProducto['idSKU'];
        $this->descProducto = $datosProducto['descProducto'];
		
    }
	public function setidProducto($idProducto){
		$this->idProducto = $idProducto;
	}
	public function getIdProducto(){
		return $this->idProducto;
	}
	public function setdescProducto($descProducto){
		$this->descProducto = $descProducto;
	}
	public function getdescProducto(){
		return $this->descProducto;
	}
}

?>
