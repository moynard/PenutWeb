<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class catalogoProd_Model extends CI_Model{
    public function construct(){
        parent::__construct();
    } 
    public function busquedaFiltrada($tabla,$where,$param){
        $this->db->select('*');
        $this->db->like($where,$param);
        $this->db->where('idProveedor', $this->session->userdata['idProveedor']);
        $query = $this->db->get($tabla);
        
        if($query->num_rows()>0){
            if($query->num_rows == 1){
                $data=$query->row_array();
                $query->free_result();

                return $data;
            }elseif($query->num_rows > 1){
                
                foreach ($query->result_array() as $row) {
                    $data[]=$row;
                }   
                $query->free_result();
                return $data;
            }
        }else{
            return False;
        } 
    }
    
    public function detallesProducto($tabla,$where,$datoWhere){
        $whereRef=array($where => $datoWhere);
        $this->db->order_by('fechamovimiento DESC');
        $query = $this->db->get_where($tabla,$whereRef);
        
        
        if($query->num_rows()>0){
            if($query->num_rows == 1){
                $data=$query->row_array();
                $query->free_result();

                return $data;
            }elseif($query->num_rows > 1){
                
                foreach ($query->result_array() as $row) {
                    $data[]=$row;
                }   
                $query->free_result();

                return $data;
            }
        }else{
            return False;
        } 
    
    }
    
}
?>
