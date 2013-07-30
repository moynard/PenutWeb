<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author Medivh
 */
class login_model extends CI_Model{
    public function construct(){
        parent::__construct();
    } 
    
    public function extraerDatos($tabla,$where,$datoWhere){
        $whereRef=array($where => $datoWhere);
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
