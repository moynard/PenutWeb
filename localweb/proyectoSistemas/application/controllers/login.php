<?php
    class Login extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('login_model');
        }
        public function index(){
            
            $this->load->view('head_login');
            $this->load->view("login_view");
            $this->load->view('footer');
        }
        
        
        public function volverLogin($param){
            if ( $param == "logueado"){                
                $data['verificacion']=FALSE;
                $data['is_loged_in']=TRUE;
            }else{
                $data['verificacion']=TRUE;
                $data['is_loged_in']=FALSE;
            }
            $this->load->view('head_login');
            $this->load->view('login_view',$data);
            $this->load->view('footer');
        }
        
        
        public function loginValidation(){
            /*Obtenemos de la vista los valores del formulario 
             * por medio de un POST*/
            $data= $this->input->post();
            $data['txtPassword'] =$data['txtPassword'];

            /*Creamos la Instancia de la clase usuario y 
             * realizamos la validación y concidencias.*/
            $this->load->library('Class/usuario',$data,'usuario');
            $datos=$this->usuario->validadExistencia();
            $userdata = $this->session->userdata('email');
            
            if($datos['verificacion']){
                if ($userdata == $this->usuario->email){
                    $this->session->sess_destroy();
                    $this->volverLogin("logueado");
                }else{
                    $this->session->set_userdata($datos);
                    redirect('catalogoProductos/index');
                }
            }else{
                $this->volverLogin("null");
            }
        }
        
        
        public function logOut(){
            $this->session->sess_destroy();
            $this->index(); 
        }
    }
?>