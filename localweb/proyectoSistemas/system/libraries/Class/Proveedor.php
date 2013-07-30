<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proveedor
 *
 * @author Medivh
 */
class Proveedor {
    var $idProveedor;
    var $descProveedor;
    var $descripcionCorta;
    var $email;
    var $password;
    
    function __construct($data) {
        $this->email = $data['email'];
        
        $this->ci =& get_instance();
        $this->ci->load->model('login_model');
        
        //Llamamos al modelo para extraer los datos completos del Proveedor
        $datosProveedor = $this->ci->login_model->extraerDatos('tProveedor','email',  $this->email);
        
        //Asignamos los datos a las propiedades de la clase
        $this->idProveedor = $datosProveedor['idProveedor'];
        $this->descProveedor = $datosProveedor['descProveedor'];
        $this->descripcionCorta = $datosProveedor['descripcionCorta'];
        $this->password = $datosProveedor['password'];          
    }
    public function getIdproveedor(){
        return $this->idProveedor;
    }
    public function setIdproveedor($idProveedor){
        $this->idProveedor = $idProveedor;
    }
    public function getDescProveedor(){
        return $this->descProveedor;
    }
    public function setDescProveedor($descProveedor){
        $this->descProveedor = $descProveedor;
    }
    public function getDescripcionCorta(){
        return $this->descripcionCorta;                
    }
    public function setDescripcionCorta($descripcionCorta){
        $this->descripcionCorta = $descripcionCorta;
    }
    function getEMail(){
        return $this->email;
    }
    public function setEMail($eMail){
        $this->email = $eMail;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    
    public function buscaSusProductos(){
	
        
        $datos=$this->ci->login_model->extraerDatos('vInventarioReal','idProveedor',  $this->idProveedor);
        if(!$datos){
            return FALSE;
        }  else {
            return $datos;
        }
    }
}

?>
