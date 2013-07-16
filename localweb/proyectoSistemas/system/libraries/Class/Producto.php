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
        $this->idProveedor = $data['idProveedor'];
        $this->idSKU = $data['idSKU'];
        $this->descProducto = $data['desProducto'];
        
        
        $this->ci =& get_instance();
    }
}

?>
