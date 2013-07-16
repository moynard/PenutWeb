<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Medivh
 */
class usuario {
    var $email;
    var $password;
    protected $ci;
    
    function __construct($data){
        $this->email = $data['txtUsuario'];
        $this->password = $data['txtPassword'];
        
        $this->ci =& get_instance();
        $this->ci->load->model('login_model');
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
    public function validadExistencia(){
        $data=$this->ci->login_model->extraerDatos('tProveedor', 'email' , $this->email);

        if($data=='False'){
            return FALSE;
        }elseif($this->password==$data['password']){
            $data['verificacion']=TRUE;
            return $data;
        }else{
            return FALSE;
        }
    }  
}
?>
