<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of almacen
 *
 * @author Medivh
 */
class almacen {
    //put your code here
    var $id;
    var $name;
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
       $this->name=$name;
    }
}

?>
